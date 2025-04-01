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

// Get user email from request
$email = isset($_GET['email']) ? $_GET['email'] : '';

if (!empty($email)) {
    // First get user ID
    $userSql = "SELECT id FROM Users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $userSql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $userResult = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($userResult);

    if ($user) {
        $userId = $user['id'];
        
        // Now get user's medicines
        $medSql = "SELECT * FROM Medicines WHERE user_id = ?";
        $stmt = mysqli_prepare($conn, $medSql);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $medResult = mysqli_stmt_get_result($stmt);

        $medicines = [];
        if (mysqli_num_rows($medResult) > 0) {
            while ($row = mysqli_fetch_assoc($medResult)) {
                $medicines[] = $row;
            }
        }
        
        // Return as JSON
        header('Content-Type: application/json');
        echo json_encode($medicines);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
} else {
    echo json_encode(['error' => 'Email parameter is required']);
}

// Close connection
mysqli_close($conn);
?>