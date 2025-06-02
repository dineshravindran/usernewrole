<?php
// Set content type to JSON
header('Content-Type: application/json');

// Hardcoded users array
$users = [
    1 => ['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com'],
    2 => ['id' => 2, 'name' => 'Bob', 'email' => 'bob@example.com'],
    3 => ['id' => 3, 'name' => 'Charlie', 'email' => 'charlie@example.com']
];

// Get the 'id' from the query string
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];
    
    // Check if user exists
    if (isset($users[$id])) {
        echo json_encode($users[$id]);
        exit;
    }
}

// If user not found or id invalid, send 404
http_response_code(404);
echo json_encode(['error' => 'User not found']);
exit;
?>