<?php
require_once 'config.php';

if (!isset($_GET['country'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Parameter "country" is required'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$country = $_GET['country'];

$stmt = $pdo->prepare("SELECT * FROM countries WHERE name ILIKE :country");
$stmt->execute(['country' => '%' . $country . '%']);
$countryData = $stmt->fetch();

if (!$countryData) {
    http_response_code(404);
    echo json_encode(['error' => "Country '$country' not found"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$stmt = $pdo->prepare("SELECT id, name, population, is_capital FROM cities WHERE country_id = :country_id ORDER BY population DESC");
$stmt->execute(['country_id' => $countryData['id']]);
$cities = $stmt->fetchAll();

$capital = null;
foreach ($cities as $city) {
    if ($city['is_capital']) {
        $capital = $city;
        break;
    }
}

echo json_encode([
    'success' => true,
    'data' => [
        'country' => [
            'name' => $countryData['name'],
            'code' => $countryData['code'],
            'population' => (int)$countryData['population']
        ],
        'capital' => $capital ? $capital['name'] : null,
        'cities' => $cities,
        'total_cities' => count($cities),
        'largest_city' => $cities[0]['name'] ?? null
    ]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
