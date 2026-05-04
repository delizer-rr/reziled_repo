<?php
header('Content-Type: application/json; charset=utf-8');

$months = ['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
$days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];

$dayNum = date('j');
$monthNum = date('n');
$year = date('Y');
$monthName = $months[$monthNum - 1];
$dayName = $days[date('w')];

echo json_encode([
    'success' => true,
    'data' => [
        'day_number' => $dayNum,
        'day_name' => $dayName,
        'month_number' => $monthNum,
        'month_name' => $monthName,
        'year' => $year,
        'full_date_russian' => "$dayNum $monthName $year года",
        'full_date_iso' => date('Y-m-d'),
        'day_of_year' => date('z') + 1,
        'week_number' => date('W')
    ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
