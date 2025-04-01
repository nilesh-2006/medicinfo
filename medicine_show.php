<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database configuration
$host = 'localhost';
$dbname = 'MedicalSystem';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Fetch user's medicines
    $stmt = $pdo->prepare("SELECT * FROM medicines WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $medicines = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Handle delete action
    if (isset($_GET['delete_id'])) {
        $deleteStmt = $pdo->prepare("DELETE FROM medicines WHERE id = :id AND user_id = :user_id");
        $deleteStmt->bindParam(':id', $_GET['delete_id']);
        $deleteStmt->bindParam(':user_id', $_SESSION['user_id']);
        $deleteStmt->execute();
        
        header("Location: medicine_show.php");
        exit();
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 90%;
            margin: 20px auto;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logout-btn {
            color: white;
            text-decoration: none;
            background-color: #f44336;
            padding: 8px 15px;
            border-radius: 4px;
        }
        .logout-btn:hover {
            background-color: #d32f2f;
        }
        .add-medicine {
            display: inline-block;
            margin: 15px 0;
            padding: 10px 15px;
            background-color: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .add-medicine:hover {
            background-color: #0b7dda;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .action-btns {
            display: flex;
            gap: 5px;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            font-size: 14px;
        }
        .btn-edit {
            background-color: #FFC107;
            color: black;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
        }
        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Welcome, <?= htmlspecialchars($_SESSION['email']) ?></h2>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    
    <div class="container">
        <a href="add_medicine.php" class="add-medicine">Add New Medicine</a>
        
        <?php if (!empty($medicines)): ?>
            <table>
                <tr>
                    <th>Sr. No.</th>
                    <th>Medicine Name</th>
                    <th>Brand Name</th>
                    <th>Strength</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($medicines as $index => $medicine): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($medicine['medicine_name']) ?></td>
                        <td><?= htmlspecialchars($medicine['brand_name']) ?></td>
                        <td><?= htmlspecialchars($medicine['strength']) ?></td>
                        <td><?= htmlspecialchars($medicine['price']) ?></td>
                        <td class="action-btns">
                            <a href="edit_medicine.php?id=<?= $medicine['id'] ?>" class="btn btn-edit">Edit</a>
                            <a href="medicine_show.php?delete_id=<?= $medicine['id'] ?>" class="btn btn-delete" 
                               onclick="return confirm('Are you sure you want to delete this medicine?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No medicine records found. <a href="add_medicine.php">Add your first medicine</a>.</p>
        <?php endif; ?>
    </div>
</body>
</html>