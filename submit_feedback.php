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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    $rating = $_POST['rating'] ?? 0;

    try {
        $stmt = $pdo->prepare("INSERT INTO feedbacks (name, email, message, rating) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $message, $rating]);
        
        header('Location: Index.php?success=1');
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>