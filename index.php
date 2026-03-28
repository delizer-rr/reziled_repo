<?php
try{
    $file = fopen("nonexistent_file.txt", "r");
    if($file === false){
        throw new Exception("Файл не существует");
    }
    fclose($file);
}catch(Exception $ex){
    echo $ex->getMessage() . "<br>";
    $log = fopen("log.txt", "a");
    fwrite($log, $ex->getMessage() . "\n");
    fclose($log);
}

try{
    $a = 10;
    $b = 0;
    if($b == 0){
        throw new Exception("Деление на ноль невозможно");
    }
    $result = $a / $b;
}catch(Exception $ex){
    echo $ex->getMessage() . "<br>";
    $log = fopen("log.txt", "a");
    fwrite($log, $ex->getMessage() . "\n");
    fclose($log);
}

try{
    $countries = ['Spain' => 'Madrid', 'Russia' => 'Moscow'];
    if(!array_key_exists('Germany', $countries)){
        throw new Exception("Элемент с ключом Germany не существует в массиве");
    }
    echo $countries['Germany'];
}catch(Exception $ex){
    echo $ex->getMessage() . "<br>";
    $log = fopen("log.txt", "a");
    fwrite($log, $ex->getMessage() . "\n");
    fclose($log);
}

echo "<br>";

$timestamp = mktime(10, 25, 0, 3, 15, 2025);
echo "Timestamp 15 марта 2025 года, 10:25:00: " . $timestamp . "<br>";

$current = time();
$past = mktime(8, 5, 59, 10, 2, 1990);
$diff = $current - $past;
echo "Разница в секундах: " . $diff . "<br>";

echo "Текущая дата-время: " . date("Y.m.d H:i:s") . "<br>";

$september = mktime(0, 0, 0, 9, 1, date("Y"));
echo "1 сентября текущего года: " . date("Y.m.d", $september) . "<br>";

$dayOfWeek = date("w", mktime(0, 0, 0, 2, 2, 2000));
$week = ["воскресенье", "понедельник", "вторник", "среда", "четверг", "пятница", "суббота"];
echo "2 февраля 2000 года был " . $week[$dayOfWeek] . "<br>";

$currentDay = date("w");
echo "Текущий день недели: " . $week[$currentDay] . "<br>";

$birthday = mktime(0, 0, 0, 6, 12, 2016);
$birthdayDay = date("w", $birthday);
echo "12 июня 2016 года был " . $week[$birthdayDay] . "<br>";

echo "<form method='post'>";
echo "Дата 1 (Год-месяц-день): <input type='text' name='date1'><br>";
echo "Дата 2 (Год-месяц-день): <input type='text' name='date2'><br>";
echo "<input type='submit' value='Сравнить'>";
echo "</form>";

if(isset($_POST['date1']) && isset($_POST['date2'])){
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    if($date1 > $date2){
        echo "Больше дата: " . $date1 . "<br>";
    } elseif($date2 > $date1){
        echo "Больше дата: " . $date2 . "<br>";
    } else {
        echo "Даты равны<br>";
    }
}

$dateStr = "2025-12-31";
$newDate = date("d-m-Y", strtotime($dateStr));
echo "Преобразованная дата: " . $newDate . "<br>";

$date = "2000.02.03";
$dateObj = date_create(str_replace(".", "-", $date));
date_modify($dateObj, "2 days");
date_modify($dateObj, "1 month");
date_modify($dateObj, "3 days");
date_modify($dateObj, "1 year");
date_modify($dateObj, "-3 days");
echo "Результат: " . date_format($dateObj, "d.m.Y") . "<br>";

$newYear = mktime(0, 0, 0, 1, 1, 2027);
$currentDate = mktime(0, 0, 0, 3, 26, 2026);
$daysLeft = ($newYear - $currentDate) / (60 * 60 * 24);
echo "До Нового года осталось " . $daysLeft . " дней<br>";
?>
