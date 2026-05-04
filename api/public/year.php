<?php
header('Content-Type: application/json; charset=utf-8');

$year = date('Y');
$isLeap = date('L');
$daysInYear = $isLeap ? 366 : 365;

echo json_encode([
    'success' => true,
    'data' => [
        'year' => (int)$year,
        'is_leap_year' => $isLeap == 1,
        'days_in_year' => $daysInYear,
        'next_year' => $year + 1,
        'previous_year' => $year - 1
    ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
