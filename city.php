<html>
<head>
    <title>
    </title>
</head>
<body>

<form action = "/city.php" method ="post">
    <input type = "string" name = "city" value = <?php echo $_POST['city'];?>>
    <input type = "submit" name = "submit" value = "Сделать ход!">
</form>
<?php





$goroda = file_get_contents(__DIR__.'/goroda.txt');
$goroda = explode(",", $goroda);


$answer = mb_strtoupper(mb_substr($_POST['city'], 0, 1)).mb_substr($_POST['city'], 1);


if (!in_array($answer, $goroda)){
    echo "Это не русский город! Попробуй её раз!";
} else {

    $firstChar = file_get_contents(__DIR__ . '/firstChar.txt');
    $firstChar = mb_strtoupper($firstChar);
    $firstCharAnswer = mb_substr($answer, 0, 1);

    $used = file_get_contents(__DIR__ . '/used.txt');
    $used = explode(", ", $used);

    if ($firstChar !== '' & $firstChar !== $firstCharAnswer) {
        echo "Город начинается на неверную букву, попробуй ещё раз! Нужная буква: ".$firstChar;  ?>
        <br>
        <br>
        <?php
        $used = implode(", ", $used);
        echo "Использованные города: ", $used;
    } else {



   
        if (in_array($answer, $used)) {
            echo "Этот город уже был! Введи другой!";
            ?>
            <br>
            <br>
            <?php
            $used = implode(", ", $used);
            echo "Использованные города: ", $used;
        } else {
            $used[] = $answer;


            $lastChar = mb_substr($answer, -1);
            if ($lastChar == "ь" || $lastChar == "ы") {
                $lastChar = mb_substr($answer, -2, 1);
            }
            $lastChar = mb_strtoupper($lastChar);

            $goroda = array_diff($goroda, $used);

            function qwe($goroda, $lastChar)
            {
                foreach ($goroda as $number => $value) {

                    $x = mb_substr($value, 0, 1);


                    if ($x == $lastChar) {

                        return $value;

                        break;
                    }

                }
            }

            $used[] = qwe($goroda, $lastChar);

            $used = implode(", ", $used);

            file_put_contents(__DIR__ . '/used.txt', $used);
            $answerRobo = qwe($goroda, $lastChar);
            echo $answerRobo;
            $firstChar = mb_substr($answerRobo, -1);
            file_put_contents(__DIR__ . '/firstChar.txt', $firstChar);

            ?>
            <br>
            <br>
            <?php
            echo "Использованные города: ", $used;
        }
    }
}
?>
    <br>
    <br>

    <form action = "/index.php" method ="post">
        <input type = "submit" name = "submit" value ="Начать заново">

</body>
</html>
