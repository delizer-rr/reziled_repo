<?php
require_once 'config.php';

$action = $_GET['action'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

try {
    switch($action) {
        case 'all':
            $stmt = $pdo->query("SELECT * FROM api_items ORDER BY id");
            echo json_encode(['success' => true, 'data' => $stmt->fetchAll(), 'count' => $stmt->rowCount()], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            break;
            
        case 'get':
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $stmt = $pdo->prepare("SELECT * FROM api_items WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $item = $stmt->fetch();
            if ($item) {
                echo json_encode(['success' => true, 'data' => $item], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(404);
                echo json_encode(['success' => false, 'error' => "Item with id $id not found"]);
            }
            break;
            
        case 'del':
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $stmt = $pdo->prepare("SELECT * FROM api_items WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $item = $stmt->fetch();
            if ($item) {
                $stmt = $pdo->prepare("DELETE FROM api_items WHERE id = :id");
                $stmt->execute(['id' => $id]);
                echo json_encode(['success' => true, 'message' => 'Item deleted', 'deleted' => $item]);
            } else {
                http_response_code(404);
                echo json_encode(['success' => false, 'error' => "Item with id $id not found"]);
            }
            break;
            
        case 'add':
            if ($method !== 'POST') {
                http_response_code(405);
                echo json_encode(['success' => false, 'error' => 'POST method required']);
                break;
            }
            $input = json_decode(file_get_contents('php://input'), true);
            $title = $input['title'] ?? 'New Item';
            $description = $input['description'] ?? '';
            $status = $input['status'] ?? 'active';
            
            $stmt = $pdo->prepare("INSERT INTO api_items (title, description, status) VALUES (:title, :description, :status) RETURNING *");
            $stmt->execute(['title' => $title, 'description' => $description, 'status' => $status]);
            $newItem = $stmt->fetch();
            echo json_encode(['success' => true, 'message' => 'Item created', 'data' => $newItem]);
            break;
            
        case 'edit':
            if ($method !== 'POST') {
                http_response_code(405);
                echo json_encode(['success' => false, 'error' => 'POST method required']);
                break;
            }
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $input = json_decode(file_get_contents('php://input'), true);
            $stmt = $pdo->prepare("SELECT * FROM api_items WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $item = $stmt->fetch();
            if ($item) {
                $title = $input['title'] ?? $item['title'];
                $description = $input['description'] ?? $item['description'];
                $status = $input['status'] ?? $item['status'];
                $stmt = $pdo->prepare("UPDATE api_items SET title = :title, description = :description, status = :status, updated_at = NOW() WHERE id = :id");
                $stmt->execute(['title' => $title, 'description' => $description, 'status' => $status, 'id' => $id]);
                echo json_encode(['success' => true, 'message' => 'Item updated', 'old' => $item]);
            } else {
                http_response_code(404);
                echo json_encode(['success' => false, 'error' => "Item with id $id not found"]);
            }
            break;
            
        default:
            echo json_encode([
                'success' => true,
                'help' => [
                    'endpoints' => [
                        'GET ?action=all' => 'Get all items',
                        'GET ?action=get&id=1' => 'Get item by id',
                        'POST ?action=add' => 'Create new item (send JSON)',
                        'GET ?action=del&id=1' => 'Delete item',
                        'POST ?action=edit&id=1' => 'Update item (send JSON)'
                    ],
                    'example_post_body' => ['title' => 'New Item', 'description' => 'Description', 'status' => 'active']
                ]
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
}
?>
