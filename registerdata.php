<?php
// THIS MUST BE THE FIRST LINE
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = 'localhost';
$dbname = 'medicalsystem';
$username = 'root'; 
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Start transaction
    $conn->beginTransaction();

    // 1. First insert into Medical_Stores table
    $stmt = $conn->prepare("INSERT INTO Medical_Stores 
                          (store_name, address, contact, pincode)
                          VALUES (:store_name, :address, :contact, :pincode)");
    
    $stmt->execute([
        ':store_name' => $_POST['medical_name'],
        ':address' => $_POST['address'],
        ':contact' => $_POST['phone'],
        ':pincode' => $_POST['pin']
    ]);

    $medical_store_id = $conn->lastInsertId();

    // 2. Insert into Users table with medical_store_id
    $stmt = $conn->prepare("INSERT INTO Users 
                          (name, email, password, phone, address, gender, medical_store_id)
                          VALUES (:name, :email, :password, :phone, :address, :gender, :medical_store_id)");
    
    $stmt->execute([
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'], // Make sure to hash passwords
        ':phone' => $_POST['phone'],
        ':address' => $_POST['address'],
        ':gender' => $_POST['gender'],
        ':medical_store_id' => $medical_store_id
    ]);

    $user_id = $conn->lastInsertId();

    // 3. Create profile record
    $stmt = $conn->prepare("INSERT INTO Profiles 
                          (user_id, name, email, phone, address, gender, medical_store_name)
                          VALUES (:user_id, :name, :email, :phone, :address, :gender, :medical_store_name)");
    
    $stmt->execute([
        ':user_id' => $user_id,
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':phone' => $_POST['phone'],
        ':address' => $_POST['address'],
        ':gender' => $_POST['gender'],
        ':medical_store_name' => $_POST['medical_name']
    ]);

    // Commit transaction
    $conn->commit();

    // Store session data
    $_SESSION['user_id'] = $user_id;
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['medical_store_id'] = $medical_store_id;

    // Return success status for AJAX handling
   
    header("Location: MedicineData.php?email=".urlencode($_POST['email']));
    exit();

} catch (PDOException $e) {
    if (isset($conn)) $conn->rollBack();
    
    echo json_encode([
        'success' => false,
        'message' => 'Registration failed: ' . $e->getMessage()
    ]);
    exit();
}
?>