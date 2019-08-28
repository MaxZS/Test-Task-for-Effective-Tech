<html>
<head>
    <title>Задание №1</title>
</head>
<body>
Вывод 64 первых чисел Фибоначчи: <br>
<?php
$f1=1;
$f2=1;
 print $f1."<br>";
for ($i=0; $i<=64; $i++)  {
    $f=$f1+$f2;
    $f2=$f1;
    $f1=$f;
    print $f."<br>";
}
?>

</body>
</html>