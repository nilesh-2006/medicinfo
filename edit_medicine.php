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
$medicine = null;

// Fetch medicine details if editing
if (isset($_GET['id'])) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("SELECT * FROM medicines WHERE id = :id AND user_id = :user_id");
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();
        
        $medicine = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$medicine) {
            header("Location: medicine_show.php");
            exit();
        }
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}

// Handle form submission
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
                UPDATE medicines SET 
                medicine_name = :medicine_name,
                brand_name = :brand_name,
                strength = :strength,
                price = :price
                WHERE id = :id AND user_id = :user_id
            ");
            
            $stmt->bindParam(':medicine_name', $medicine_name);
            $stmt->bindParam(':brand_name', $brand_name);
            $stmt->bindParam(':strength', $strength);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':id', $_POST['id']);
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
    <title>Edit Medicine</title>
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
        <h2>Edit Medicine</h2>
        
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= $medicine['id'] ?>">
            
            <div class="form-group">
                <label for="medicine_name">Medicine Name:</label>
                <input type="text" id="medicine_name" name="medicine_name" 
                       value="<?= htmlspecialchars($medicine['medicine_name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="brand_name">Brand Name:</label>
                <input type="text" id="brand_name" name="brand_name" 
                       value="<?= htmlspecialchars($medicine['brand_name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="strength">Strength:</label>
                <input type="text" id="strength" name="strength" 
                       value="<?= htmlspecialchars($medicine['strength']) ?>">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" id="price" name="price" 
                       value="<?= htmlspecialchars($medicine['price']) ?>">
            </div>
            <button type="submit">Update Medicine</button>
            <a href="medicine_show.php" class="back-link">Back to Medicine Page</a>
        </form>
    </div>
</body>
</html>