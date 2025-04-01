<?php
require 'db_connect.php'; // Include database connection

// Check if email is provided (pass email from registerdata.php via URL)
if (!isset($_GET['email'])) {
    die("Email is required.");
}

$email = $_GET['email'];

// Fetch user details from Users table
$stmt = $conn->prepare("SELECT id, name, email, phone FROM Users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("User not found.");
}

// Insert user details into Profiles table
$stmt = $conn->prepare("INSERT INTO Profiles (user_id, name, email, state, city, phone) 
                        VALUES (:user_id, :name, :email, '', '', :phone)");
$stmt->execute([
    ':user_id' => $user['id'],
    ':name' => $user['name'],
    ':email' => $user['email'],
    ':phone' => $user['phone']
]);

// Redirect to profile page
header("Location: profile.php?user_id=" . $user['id']);
exit();
?>
