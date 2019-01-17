<?php
/**
 * Created by PhpStorm.
 * User: Георгий
 * Date: 16.01.2019
 * Time: 23:18
 */

$mem_start = memory_get_usage();//запись памяти
$start = microtime(true);//старт таймера


$x = 'Ключ555532';//заданный ключ
$filename = "test.txt";//заданное имя файла

$file = new SplFileObject("test.txt");//создаём объект файла

$min = 0;//нижняя граница бинарного поиска
$file->seek($file->getSize());
$max = $file->key();//верхняя граница бинарного поиска
echo $max . "строк"."<br>";//количество строк в файле
$file->seek(0);
$a=$file->current();
$a = stristr($a, "\t",$before_needle = true);//начальное значение переменной бинарного поиска
// присваиваем ключу первой строки файла
echo $a.'<br>';

//цикл бинарного поиска, цикл продолжается пока не совпадут ключи,
// либо пока разница между верхней и нижней границе не станет равна 1
while (strnatcmp($x, $a) !==0&&($max>$min+1)) {
    $middle = round(($max+$min)/2);//середина интервала между верней и нижней границей
    $file->seek($middle);
    $b = $file->current();
    $a = stristr($b, "\t",$before_needle = true);
    (strnatcmp($x, $a) < 0)?$max = $middle:$min = $middle;//сравниваем переменную поиска с заданным ключом
    //и в зависимости от рез-та сравнения изменяем или нижнюю или верхнюю границу
    echo $a . "<br>";
}
//если в рез-те поиска ключ так и не совпал, выводим что ключ не найден
if (strnatcmp($x, $a) !== 0) {
    $a = 'undef';
}
    $ans = stristr($b, "\t");
echo 'ответ: ' .'   '. $ans.'<br>';


echo  "кол-во использованной памяти: ". (memory_get_usage() - $mem_start) . "байт".'<br>';
$time = microtime(true) - $start;
echo 'время выполнения: '.number_format($time, 4) . 'сек';
