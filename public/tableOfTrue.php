<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Table of True</title>
</head>
<body>
    <h1>Таблица истинности</h1>
    <h2>Выберите операнд: </h2>
    <form action="#" method="post">
        <select id="selOp" name="op">
            <option value="&"> & </option>
            <option value="||"> || </option>
            <option value="xor"> xor </option>
        </select>
        <button id="btnOp" type="submit">Отправить</button>
    </form>
        <?php
            include (__DIR__.'/functions.php');
            $op = $_POST['op'] ?? '&';
            tableOfTrue($op);
        ?>
</body>
</html>