<?php

require 'vendor/autoload.php';
require ('src/Magic.php');
require('src/geometry.php');

$magic = new MagicClass("123", 'Hellow World');
#echo $magic->magicName;
#echo PHP_EOL.$magic;
#var_export($magic);

#var_dump($magic);
/*
$magic->a=1;
var_dump(isset($magic->a));

unset($magic->a);

echo $magic->id;
echo PHP_EOL."getDistance result: ".$magic->getDistance(1,2,3,2);
#$magic->do();
echo MagicClass::dosmth();
echo (PHP_EOL.$magic->sum(34,3));
$s = serialize($magic);
var_dump($s);
$uns = unserialize($s);
echo PHP_EOL;
var_dump($magic);
var_dump($uns);
echo (PHP_EOL.$uns->sum(32,3).PHP_EOL);
#echo PHP_EOL;
#print_r(PHP_EOL.$s);

*/

$T1 = new Point(2, 3);


$V1 = new Vector(4, 1);


$V2 = new Vector(0, 0);

#чтобы векторы были перпендикулярны, их скалярное произведение должно быть равно 0
#4*x2 + 1*y2 = 0
#4*x2 = -1*y2
$V3 = new Vector($V1->getY(), -$V1->getX());


echo PHP_EOL."Длина вектора V1: {$V1->length()}";
echo PHP_EOL."Длина вектора V2: {$V2->length()}";
echo PHP_EOL."Длина вектора V3: {$V3->length()}";

if ($V3->isPerpendicular($V1)) {
    echo PHP_EOL."Вектор V3 перпендикулярен вектору V1.";
} else {
    echo PHP_EOL."Вектор V3 не перпендикулярен вектору V1. ";
}

// Перенос точки T1 на вектор V1
$T1->moveX($V1->getX());
$T1->moveY($V1->getY());

echo PHP_EOL."Новые координаты точки T1 после перемещения: X = {$T1->getX()}, Y = {$T1->getY()}";

?>