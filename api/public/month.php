<?php
header('Content-Type: application/json; charset=utf-8');

$months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
$monthNum = date('n');
$currentMonth = $months[$monthNum - 1];
$daysInMonth = date('t');
$firstDayOfWeek = date('N', strtotime(date('Y-m-01')));

echo json_encode([
    'success' => true,
    'data' => [
        'month_number' => $monthNum,
        'month_name' => $currentMonth,
        'days_in_month' => (int)$daysInMonth,
        'first_day_of_week' => (int)$firstDayOfWeek,
        'year' => (int)date('Y'),
        'is_current_month' => true
    ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
