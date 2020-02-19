<?php
    include(__DIR__ . '/../functions.php');
    $op = $_POST['op'] ?? '&';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Table of True</title>
    <style>
        body{
            text-align: center;
        }
        table{
            margin: auto;
        }
        form {
            margin: 30px 0;
        }
    </style>
</head>
<body>
    <?php
        include __DIR__ . '/../templates/nav.php';
    ?>
    <h1>Таблица истинности</h1>
    <h2>Выберите операнд: </h2>
    <form action="#" method="post">
        <label for="op"></label>
        <select id="op">
            <option value="&"<?=$op=='&'?" selected=\"selected\"":''?>>&</option>
            <option value="||"<?=$op=='||'?" selected=\"selected\"":''?>>||</option>
            <option value="xor"<?=$op=='xor'?" selected=\"selected\"":''?>>xor</option>
        </select>
        <button id="btnOp" type="submit">Отправить</button>
    </form>
        <?php
            tableOfTrue($op);
        ?>
</body>
</html>