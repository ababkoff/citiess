<html>
<head>
    <title>Игра в города</title>
</head>
<body>
<h1>Игра в города!</h1>
<?php

file_put_contents(__DIR__ . '/firstChar.txt', '');
file_put_contents(__DIR__ . '/used.txt', '');
?>

<form action = "/city.php" method ="post">
    <input type = "string" name = "city">
    <input type = "submit" name = "submit" value = "Сделать ход!">



</body>
</html>

