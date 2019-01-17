<?php
/**
 * Created by PhpStorm.
 * User: Георгий
 * Date: 14.01.2019
 * Time: 22:00
 */

$fp = fopen("test.txt", "w"); // Открываем файл в режиме записи


for ($i = 0; $i <= 100000; $i++) {
    $mytext = "Ключ$i\tЗначение$i\r\n";
    $test = fwrite($fp, $mytext); // Запись в файл
}
echo 'Данные в файл успешно занесены.';
fclose($fp); //Закрытие файла
?>