<?php
// Database connection
$host = 'localhost';
$dbname = 'medicalsystem';
$username = 'root';
$password = '';

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get search term from request
$searchTerm = isset($_GET['term']) ? $_GET['term'] : '';

// Prepare SQL with LIKE for partial matching
$sql = "SELECT m.*, u.email, u.name AS user_name 
        FROM medicines m
        JOIN Users u ON m.user_id = u.id
        WHERE m.medicine_name LIKE ? OR m.brand_name LIKE ?
        ORDER BY m.medicine_name";

$stmt = mysqli_prepare($conn, $sql);
$likeTerm = "%$searchTerm%";
mysqli_stmt_bind_param($stmt, "ss", $likeTerm, $likeTerm);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$medicines = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $medicines[] = $row;
    }
}

// Return as JSON
header('Content-Type: application/json');
echo json_encode($medicines);

// Close connection
mysqli_close($conn);
?>