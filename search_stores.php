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
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . mysqli_connect_error()]));
}

// Get search term from request
$searchTerm = isset($_GET['term']) ? trim($_GET['term']) : '';
$medicineId = isset($_GET['medicine_id']) ? intval($_GET['medicine_id']) : 0;

header('Content-Type: application/json');

if ($medicineId > 0) {
    // Search stores by medicine ID
    $sql = "SELECT s.* FROM medical_stores s
            JOIN medicine_availability ma ON s.id = ma.store_id
            WHERE ma.medicine_id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $medicineId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    // Search stores by name, address, or pincode
    $sql = "SELECT * FROM medical_stores 
            WHERE store_name LIKE ? OR 
                  address LIKE ? OR 
                  pincode LIKE ?
            LIMIT 10";
    
    $stmt = mysqli_prepare($conn, $sql);
    $likeTerm = "%$searchTerm%";
    mysqli_stmt_bind_param($stmt, "sss", $likeTerm, $likeTerm, $likeTerm);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}

$stores = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $stores[] = [
            'id' => $row['id'],
            'store_name' => $row['store_name'],
            'address' => $row['address'],
            'contact' => $row['contact'],
            'location' => $row['location'],
            'pincode' => $row['pincode'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude']
        ];
    }
}

echo json_encode([
    'status' => 'success',
    'data' => $stores
]);

mysqli_close($conn);
?>