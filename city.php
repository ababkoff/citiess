<?php

session_start();

?>
<html>
<head>
    <title>
    </title>
</head>
<body>

<form action = "/city.php" method ="post">
    <input type = "string" name = "city" value = <?php echo $_POST['city'];?>>
    <input type = "submit" name = "submit" value = "Сделать ход!">
<?php


$x = 1;
while (!empty($used[$x])) {
    $x++;
}




$goroda = ["Орёл", "Архангельск","Москва", "Санкт-Петербург", "Брянск", "Воронеж", "Гвардейск", "Екатеринбург", "Железноводск", "зеленоград","Иркутск", "Калининград", "Ломоносов", "Новосибирск", "Оренбург", "Петрозаводск", "Ростов", "Тагил", "Уфа", "Форос", "Хабаровск", "Цимлянск", "Чехов", "Электросталь", "Южно-Сахалинск", "Якутск"];
$answer = $_POST['city'];

$y = 1;

while (!empty($_SESSION[$y])){
    $y++;
}
$_SESSION[$y] = $_POST['city'];
$used[$x] = $_SESSION[$y];
if (in_array ($_POST, $used) ) {
    echo "ЭТОТ ГОРОД УЖЕ БЫЛ, МУДИЛА!";
}


var_dump($_SESSION);?>
</br> <?php
var_dump($used);


$char = mb_substr($answer, -1);
if ($char == "ь" xor $char == "ы"){
    $char = mb_substr($answer, -2, 1);
}
$char = mb_strtoupper ($char);
function qwe($goroda, $char) {
    foreach ($goroda as $number => $value) {

        $x = mb_substr($value, 0, 1);


        if ($x == $char) {

            return $value;
        }

    }
}

echo  qwe($goroda,$char);


?>


</body>
</html>