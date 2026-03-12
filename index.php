
<!DOCTYPE html>
<html>
<head>
    <title>Лабораторная 9 - Васильев</title>
    <meta charset="utf-8">
</head>
<body>
   <?php

//Задание 1
echo "Задание 1<br>";

$arr1 = ['a', 'b', 'c', 'd', 'e'];
echo "Исходный массив: ";
print_r($arr1);
echo "<br>";

$result1 = array_map('strtoupper', $arr1);
echo "Результат array_map('strtoupper'): ";
print_r($result1);
echo "<br><br>";

//Задание 2
echo "Задание 2<br>";

$arr2 = ['a', 'b', 'c', 'd', 'e'];
echo "Массив: ";
print_r($arr2);
echo "<br>";

$lastIndex = count($arr2) - 1;
echo "Последний элемент: " . $arr2[$lastIndex] . "<br><br>";

//Задание 3
echo "Задание 3<br>";

$arr3 = [1, 2, 3, 4, 5];
echo "Массив: ";
print_r($arr3);
echo "<br>";

if (array_search(3, $arr3) !== false) {
    echo "В массиве есть элемент со значением 3<br>";
} else {
    echo "В массиве нет элемента со значением 3<br>";
}
echo "<br>";

//Задание 4
echo "Задание 4<br>";

$arr4_1 = [1, 2, 3];
$arr4_2 = ['a', 'b', 'c'];
echo "Первый массив: ";
print_r($arr4_1);
echo "<br>Второй массив: ";
print_r($arr4_2);
echo "<br>";

$result4 = array_merge($arr4_1, $arr4_2);
echo "Результат array_merge(): ";
print_r($result4);
echo "<br><br>";

//Задание 5
echo "Задание 5<br>";

$arr5 = [1, 2, 3, 4, 5];
echo "Исходный массив: ";
print_r($arr5);
echo "<br>";

$result5 = array_slice($arr5, 1, 3);
echo "Результат array_slice(1, 3): ";
print_r($result5);
echo "<br><br>";

//Задание 6
echo "Задание 6<br>";

$arr6 = ['a' => 1, 'b' => 2, 'c' => 3];
echo "Исходный массив: ";
print_r($arr6);
echo "<br>";

$keys = array_keys($arr6);
$values = array_values($arr6);

echo "Массив ключей: ";
print_r($keys);
echo "<br>Массив значений: ";
print_r($values);
echo "<br><br>";

//Задание 7
echo "Задание 7<br>";

$arr7_keys = ['a', 'b', 'c'];
$arr7_values = [1, 2, 3];
echo "Массив ключей: ";
print_r($arr7_keys);
echo "<br>Массив значений: ";
print_r($arr7_values);
echo "<br>";

$result7 = array_combine($arr7_keys, $arr7_values);
echo "Результат array_combine(): ";
print_r($result7);
echo "<br><br>";

//Задание 8
echo "Задание 8<br>";

$arr8 = ['a', '-', 'b', '-', 'c', '-', 'd'];
echo "Массив: ";
print_r($arr8);
echo "<br>";

$position = array_search('-', $arr8);
echo "Позиция первого элемента '-': " . $position . "<br><br>";

//Задание 9
echo "Задание 9<br>";

$arr9 = ['3' => 'a', '1' => 'c', '2' => 'e', '4' => 'b'];
echo "Исходный массив: ";
print_r($arr9);
echo "<br><br>";

// Сортировка по значениям с сохранением ключей (по возрастанию)
$arr9_asort = $arr9;
asort($arr9_asort);
print_r($arr9_asort);
echo "<br><br>";

// Сортировка по ключам (по убыванию)
$arr9_krsort = $arr9;
krsort($arr9_krsort);
print_r($arr9_krsort);
echo "<br><br>";

//Задание 10
echo "Задание 10<br>";

$str10 = '1234567890';
echo "Исходная строка: $str10<br>";

$digits = str_split($str10);
echo "Массив цифр (str_split): ";
print_r($digits);
echo "<br>";

$sum10 = array_sum($digits);
echo "Сумма цифр: $sum10<br><br>";

//Задание 11
echo "Задание 11<br>";

$arr11 = array_fill(0, 10, 'x');
echo "Массив из 10 букв 'x' (array_fill): ";
print_r($arr11);
echo "<br><br>";

//Задание 12
echo "Задание 12<br>";

$arr12_1 = [1, 2, 3, 4, 5];
$arr12_2 = [3, 4, 5, 6, 7];
echo "Первый массив: ";
print_r($arr12_1);
echo "<br>Второй массив: ";
print_r($arr12_2);
echo "<br>";

$intersection = array_intersect($arr12_1, $arr12_2);
echo "Общие элементы (array_intersect): ";
print_r($intersection);
echo "<br><br>";

?>
</body>
</html>
