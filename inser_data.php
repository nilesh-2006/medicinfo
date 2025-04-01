<?php

// Database connection
$host = 'localhost';
$dbname = 'medicalsystem';
$username = 'root'; 
$password = ''; 
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get user email from the URL
    $email = $_GET['email'];

    // Fetch user ID based on email
    $stmt = $conn->prepare("SELECT id FROM Users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $user['id'];

    // Get medicine data from the form
    $medicineNames = $_POST['medicineName'];
    $brandNames = $_POST['brandName'];
    $strengths = $_POST['strength'];
    $prices = $_POST['price'];

    // Insert medicine data into Medicines table
    for ($i = 0; $i < count($medicineNames); $i++) {
        $stmt = $conn->prepare("INSERT INTO Medicines (user_id, medicine_name, brand_name, strength, price) 
                                VALUES (:user_id, :medicine_name, :brand_name, :strength, :price)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':medicine_name', $medicineNames[$i]);
        $stmt->bindParam(':brand_name', $brandNames[$i]);
        $stmt->bindParam(':strength', $strengths[$i]);
        $stmt->bindParam(':price', $prices[$i]);
        $stmt->execute();
    }

    echo "Medicine data submitted successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>