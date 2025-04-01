<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$host = 'localhost';
$dbname = 'medicalsystem';
$username = 'root';
$password = '';

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the email from session or URL parameter
    session_start();
    $email = $_SESSION['user_email'] ?? $_GET['email'] ?? null;

    if (empty($email)) {
        throw new Exception("Email address is required to view profile");
    }

    // Prepare and execute query (case-insensitive search)
    $stmt = $conn->prepare("SELECT * FROM UserProfile WHERE LOWER(email) = LOWER(:email)");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Fetch user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        // For debugging - remove in production
        $allUsers = $conn->query("SELECT email FROM UserProfile")->fetchAll(PDO::FETCH_COLUMN);
        error_log("User not found. Available emails: " . implode(", ", $allUsers));
        
        throw new Exception("User profile not found in our database");
    }

} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    die("A database error occurred. Please try again later.");
} catch (Exception $e) {
    error_log("Profile error: " . $e->getMessage());
    die($e->getMessage());
}
?>