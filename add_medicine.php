<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database configuration
$host = 'localhost';
$dbname = 'MedicalSystem';
$username = 'root';
$password = '';

$error = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $medicine_name = $_POST['medicine_name'] ?? '';
        $brand_name = $_POST['brand_name'] ?? '';
        $strength = $_POST['strength'] ?? '';
        $price = $_POST['price'] ?? '';
        
        if (empty($medicine_name) || empty($brand_name)) {
            $error = "Medicine name and brand name are required";
        } else {
            $stmt = $pdo->prepare("
                INSERT INTO medicines 
                (medicine_name, brand_name, strength, price, user_id)
                VALUES (:medicine_name, :brand_name, :strength, :price, :user_id)
            ");
            
            $stmt->bindParam(':medicine_name', $medicine_name);
            $stmt->bindParam(':brand_name', $brand_name);
            $stmt->bindParam(':strength', $strength);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':user_id', $_SESSION['user_id']);
            $stmt->execute();
            
            header("Location: medicine_show.php");
            exit();
        }
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medicine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 500px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #2196F3;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Medicine</h2>
        
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="medicine_name">Medicine Name:</label>
                <input type="text" id="medicine_name" name="medicine_name" required>
            </div>
            <div class="form-group">
                <label for="brand_name">Brand Name:</label>
                <input type="text" id="brand_name" name="brand_name" required>
            </div>
            <div class="form-group">
                <label for="strength">Strength:</label>
                <input type="text" id="strength" name="strength">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" id="price" name="price">
            </div>
            <button type="submit">Save Medicine</button>
            <a href="medicine_show.php" class="back-link">Back to Medicine Page</a>
        </form>
    </div>
</body>
</html>