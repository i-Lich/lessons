<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Квадратные уравнения</title>
    <style>
        form{
            text-align: center;
            background: #f0f0f0;
            padding: 20px 0;
            margin: 0 420px;
            border-radius: 20px;
        }
        .oms{
            border: 1px solid #F4F4F4;
            border-radius: 5px;
            box-shadow: 0 1px 1px #C9C9C9 inset;
            text-align: right;
            width: 50px;
            margin: 0 6px;
        }
        .oms_formula {
            font-style: italic;
            font-size: 1.2em;
            display: inline;
        }
        .sap {
            vertical-align: super;
            font-size: smaller;
        }
        /*убрать стрелочки в инпутах*/
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
        }
    </style>
</head>
<body>
    <?php
        include __DIR__ . '/../templates/nav.php';
    ?>
	<script type="text/javascript" ></script>
    <h1 style="text-align: center">Квадратные уравнения</h1>
    <blockquote style="background: #e9f8ed;padding: 0 20px; border: 1px solid #6c9;">
        <p>Квадратное уравнение — это уравнение вида ax<sup class="sap">2</sup> + bx + c = 0, где коэффициенты a, b и c — произвольные числа, причем a ≠ 0.</p>
    </blockquote>
    <h2 style="text-align: center">Дискриминант</h2>
    <blockquote style="background: #e9f8ed;padding: 0 20px; border: 1px solid #6c9;">
        <p>Пусть дано квадратное уравнение ax<sup class="sap">2</sup> + bx + c = 0. Тогда дискриминант — это просто число D = b<sup>2</sup> − 4ac.</p>
    </blockquote>
    <h2>Калькулятор квадратных уравнений:</h2>
    <form action="#" method="post" title="Квадратное уравнение">
        Введите уравнение:
        <p>
            <input title="Коэффициент 1" type="number" name="coefficient1" class="oms"><span class="oms_formula">x</span><sup class="sap">2</sup> +
            <input title="Коэффициент 2" type="number" name="coefficient2" class="oms"><span class="oms_formula">x</span> +
            <input title="Коэффициент 3" type="number" name="coefficient3" class="oms"> = 0
        </p>
        <button type="submit" value="Решить">Решить</button>
        
    </form>
    <?php

        include(__DIR__ . '/../functions.php');
        if(isset($_POST['coefficient1']) && is_numeric($_POST['coefficient1']) && !empty($_POST['coefficient1'])) {
            $coefficient1 = $_POST['coefficient1'];
        } elseif(isset($_POST['coefficient1']) && ($_POST['coefficient1']==='0')){
            $coefficient1 = 0;
        } else {
            $coefficient1 = 1;
        }
        if(isset($_POST['coefficient2']) && is_numeric($_POST['coefficient2']) && !empty($_POST['coefficient2'])) {
            $coefficient2 = $_POST['coefficient2'];
        } else{
            $coefficient2 = 1;
        }
        if(isset($_POST['coefficient3']) && is_numeric($_POST['coefficient3']) && !empty($_POST['coefficient3'])) {
            $coefficient3 = $_POST['coefficient3'];
        } else{
            $coefficient3 = 1;
        }
        if($coefficient1 == '0'){
            echo '<script>alert(\'Первый коэффицент не может быть равен нулю. Измените его.\');</script>';
            die();
        } elseif ($coefficient1 == '') {
            $coefficient1=1;
        }
        if($coefficient2 < 0) {
            $operand1 = '-';
        } else{
            $operand1 = '+';
        }
        if($coefficient3 < 0) {
            $operand2 = '-';
        } else{
            $operand2 = '+';
        }
        $D = discriminant($coefficient1,$coefficient2,$coefficient3);
        if (isset($_POST['coefficient1'])){
        ?>
            <h2>Решение:</h2>
            <p><span class="oms_formula"><?php echo $coefficient1; ?>x<sup class="sap">2</sup> <?php echo $operand1 . abs($coefficient2); ?> x <?php echo $operand2 . ' ' . abs($coefficient3);?> = 0</span></p>
            <p>Найдем дискриминант квадратного уравнения:</p>
                <p>D = b<sap class="sap">2</sap> - 4ac = (<?=$coefficient2?>)<sup class="sap">2</sup> - 4·<?=$coefficient1?>·<?=$coefficient3?> = <?=$coefficient2**2?> - <?=4*$coefficient1*$coefficient3?> = <?=$D?></p>
                <?php
                if ($D<0){
                    echo 'Так как дискриминант меньше нуля, то уравнение не имеет действительных решений.';
                } elseif ($D==0){
                    echo 'Так как дискриминант равен нулю, то уравнение имеет один корень.';
                    echo '<p>x = '.positiveRadical($coefficient1,$coefficient2,$D),'</p>';
                } else {
                    echo 'Так как дискриминант больше нуля, то квадратное уравнение имеет два действительных корня:';
                    echo '<p>x1 = '.positiveRadical($coefficient1,$coefficient2,$D),'</p>';
                    echo '<p>x2 = '.negativeRadical($coefficient1,$coefficient2,$D).'</p>';
                }
        }?>
</body>
</html>