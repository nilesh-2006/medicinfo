<?php
$host = 'localhost';
$dbname = 'medicalsystem';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("SELECT * FROM feedbacks ORDER BY created_at DESC");
    $feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($feedbacks);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>