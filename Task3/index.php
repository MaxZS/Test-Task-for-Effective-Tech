<html>
<head>
    <title>Задание №3</title>
</head>
<body>
Фигуры <br>
<?php
class file
{
    private $file;  // идентификатор файла

    public function __construct($file_name)
    {
        $this->file = fopen($file_name, 'r');
    }
    // Считывает файл и заносит каждую строку с файла в массив file_str
    public function read_file()
    {
        if($this->file){

            while (!feof($this->file))
            {
                $file_str[] = fgets($this->file, 999); // считываем построчно файла
            }
        }
        else
        {
            echo "Ошибка открытия файла";
        }
        return $file_str;
    }

    // вытаскивает из файла имя фигуры и ее параметры
    public function decrypt_data()
    {
        foreach($this->read_file() as $str){

            $parameters[] = explode(",",trim($str));
        }
        return $parameters;
    }
}


abstract class figure
{
    abstract public function S();
}
// класс прямоугольник
class Rectangle extends figure
{
    public $a; // длина стороны квадрата
    public $b; // ширина стороны квадрата
    public $type = __CLASS__;

    public function __construct($a,$b)
    {
        $this->a = $a;
        $this->b = $b;
    }
        // Вычисляем площадь прямоугольника
    public function S()
    {
        return $this->a * $this->b;
    }
}
// класс круг
class Circle extends figure
{
    public $r; // Радиус круга
    public $type = __CLASS__;

    public function __construct($r)
    {
        $this->r = $r;
    }

    // Вычисляем площадь круга
    public function S()
    {
        return pi() * pow($this->r,2);
    }
}
// класс треугольник
class Triangle extends figure
{
    private $a; // сторона основание
    private $b;
    private $c;
    public $type = __CLASS__;

    public function __construct($a,$b,$c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
    // Вычисляем периметр треугольника
    public function P()
    {
        $P = $this->a + $this->b + $this->c;
        return $P;
    }
    // Вычисляем высоту треугольника
    public function H(){
        $p = $this->P()/2;   // полупериметр треугольника
        return (2/$this->a)*sqrt($p * ($p-$this->a) * ($p-$this->b) * ($p - $this->c));
    }
    // Вычисляем площадь треугольника
    public function S()
    {
        return 0.5 * $this->a *$this->H();
    }
}


$file = new file("C:/Users/Max/Desktop/OSPanel/domains/Task3/figure.txt");
$file_date = $file->decrypt_data();


foreach($file_date as $str){
    switch(strlen($str[0]))
    {
        case 7 : $figure[] = new rectangle($str[1],$str[2]); break;
        case 4 : $figure[] = new circle($str[1]); break;
        case 11 : $figure[] = new triangle($str[1],$str[2],$str[3]); break;
    }
}

foreach($figure as $obj)
{
    if ($obj instanceof Figure) { // Если мы работаем с наследниками Figure
        echo $obj->type.", Площадь = ".round($obj->S(),2)."</br>";
    }
}

?>

</body>
</html>