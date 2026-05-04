<?php
header('Content-Type: application/json; charset=utf-8');

if (!isset($_GET['date'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Parameter "date" is required', 'format' => 'YYYY-MM-DD'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$date = $_GET['date'];
$timestamp = strtotime($date);

if (!$timestamp || $timestamp === -1) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid date format', 'format' => 'YYYY-MM-DD'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$weekDaysEn = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
$weekDaysRu = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];

echo json_encode([
    'success' => true,
    'data' => [
        'date' => $date,
        'weekday_en' => $weekDaysEn[date('w', $timestamp)],
        'weekday_ru' => $weekDaysRu[date('w', $timestamp)],
        'week_number' => (int)date('W', $timestamp),
        'day_of_year' => (int)date('z', $timestamp) + 1,
        'quarter' => ceil(date('n', $timestamp) / 3)
    ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
