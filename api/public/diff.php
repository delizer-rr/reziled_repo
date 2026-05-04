<?php
header('Content-Type: application/json; charset=utf-8');

if (!isset($_GET['date1']) || !isset($_GET['date2'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Parameters "date1" and "date2" are required', 'format' => 'date1=YYYY-MM-DD&date2=YYYY-MM-DD'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$date1 = $_GET['date1'];
$date2 = $_GET['date2'];

$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

if (!$ts1 || !$ts2) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid date format'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$diff = abs($ts2 - $ts1);
$days = floor($diff / 86400);
$hours = floor($diff / 3600);
$minutes = floor($diff / 60);

echo json_encode([
    'success' => true,
    'data' => [
        'date1' => $date1,
        'date2' => $date2,
        'difference' => [
            'days' => $days,
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $diff
        ],
        'formatted' => "$days дней",
        'is_same_date' => ($days === 0)
    ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
