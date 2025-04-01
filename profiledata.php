<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicalsystem";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verify the profiles table exists with correct columns
$tableCheck = $conn->query("SHOW TABLES LIKE 'profiles'");
if ($tableCheck->num_rows == 0) {
    die("Error: The 'profiles' table doesn't exist in the database.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $state = $_POST['state'] ?? '';
    $city = $_POST['city'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $profileImagePath = null;
    $lastInsertId = null;

    // File upload handling
    if (isset($_FILES['profile-image']) && $_FILES['profile-image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $fileExtension = strtolower(pathinfo($_FILES['profile-image']['name'], PATHINFO_EXTENSION));
        $newFilename = uniqid() . '.' . $fileExtension;
        $targetFile = $targetDir . $newFilename;

        $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $maxFileSize = 2 * 1024 * 1024; // 2MB

        if (in_array($fileExtension, $validExtensions) && 
            $_FILES['profile-image']['size'] <= $maxFileSize && 
            move_uploaded_file($_FILES['profile-image']['tmp_name'], $targetFile)) {
            $profileImagePath = $targetFile;
        }
    }

    // Prepare SQL statement with error checking
    $sql = "INSERT INTO profiles (name, email, state, city, phone, profile_image) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters and execute
    $bindResult = $stmt->bind_param("ssssss", $name, $email, $state, $city, $phone, $profileImagePath);
    if ($bindResult === false) {
        die("Error binding parameters: " . $stmt->error);
    }

    if ($stmt->execute()) {
        $lastInsertId = $conn->insert_id;
        // Show success popup and redirect to view profile
        echo "<script>
            alert('Profile saved successfully!');
            window.location.href = 'viewprofile.php?id=$lastInsertId';
            </script>";
    } else {
        echo "<script>alert('Error saving profile: " . addslashes($stmt->error) . "');</script>";
    }

    $stmt->close();
} else {
    echo "Please submit the form.";
}
// At the top of profiledata.php, add session check:
session_start();
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to create a profile");
}

// Then modify the INSERT statement to include user_id:
$sql = "INSERT INTO profiles (user_id, name, email, state, city, phone, profile_image) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issssss", $_SESSION['user_id'], $name, $email, $state, $city, $phone, $profileImagePath);
$conn->close();

// At the top of profiledata.php, add session check:
session_start();
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to create a profile");
}

// Then modify the INSERT statement to include user_id:
$sql = "INSERT INTO profiles (user_id, name, email, state, city, phone, profile_image) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issssss", $_SESSION['user_id'], $name, $email, $state, $city, $phone, $profileImagePath);
?>