
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





$goroda = file_get_contents(__DIR__.'/goroda.txt');
$goroda = explode(" ", $goroda);

$answer = $_POST['city'];
//["Орёл", "Архангельск","Москва", "Санкт-Петербург", "Брянск", "Воронеж", "Гвардейск", "Екатеринбург", "Железноводск", "зеленоград","Иркутск", "Калининград", "Ломоносов", "Новосибирск", "Оренбург", "Петрозаводск", "Ростов", "Тагил", "Уфа", "Форос", "Хабаровск", "Цимлянск", "Чехов", "Электросталь", "Южно-Сахалинск", "Якутск"];



$a = file_get_contents(__DIR__.'/used.txt');
$a = explode(" ",  $a);
foreach ($a as $number=>$value) {
    if ($value == $_POST['city']){
        echo "Этот город уже был!";
        break;
    }
}
$a[] = $_POST['city'];
$a = implode(" ", $a);
file_put_contents(__DIR__.'/used.txt', $a);


$lastChar = mb_substr($answer, -1);
if ($lastChar == "ь" || $lastChar == "ы"){
    $lastChar = mb_substr($answer, -2, 1);
}
$lastChar = mb_strtoupper ($lastChar);



function qwe($goroda, $lastChar) {
    foreach ($goroda as $number => $value) {

        $x = mb_substr($value, 0, 1);


        if ($x == $lastChar) {

            return $value;
        }

    }
}

echo  qwe($goroda,$lastChar);


?>


</body>
</html>
