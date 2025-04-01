<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("localhost", "root", "", "medicalsystem");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $profileId = intval($_POST['id']);
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $state = $_POST['state'] ?? '';
    $city = $_POST['city'] ?? '';
    $phone = $_POST['phone'] ?? '';
    
    // Initialize image path (will keep existing if no new upload)
    $profileImagePath = null;
    
    // First get the current image path
    $stmt = $conn->prepare("SELECT profile_image FROM profiles WHERE id = ?");
    $stmt->bind_param("i", $profileId);
    $stmt->execute();
    $result = $stmt->get_result();
    $currentData = $result->fetch_assoc();
    $stmt->close();
    
    $currentImagePath = $currentData['profile_image'] ?? null;
    
    // Handle file upload if present
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

        if (in_array($fileExtension, $validExtensions)) {
            if ($_FILES['profile-image']['size'] <= $maxFileSize) {
                if (move_uploaded_file($_FILES['profile-image']['tmp_name'], $targetFile)) {
                    $profileImagePath = $targetFile;
                    
                    // Delete old image if it exists
                    if ($currentImagePath && file_exists($currentImagePath)) {
                        unlink($currentImagePath);
                    }
                }
            }
        }
    }
    
    // Prepare update statement
    if ($profileImagePath) {
        // Update with new image
        $sql = "UPDATE profiles SET name = ?, email = ?, state = ?, city = ?, phone = ?, profile_image = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $name, $email, $state, $city, $phone, $profileImagePath, $profileId);
    } else {
        // Update without changing image
        $sql = "UPDATE profiles SET name = ?, email = ?, state = ?, city = ?, phone = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $name, $email, $state, $city, $phone, $profileId);
    }
    
    if ($stmt->execute()) {
        echo "<script>
            alert('Profile updated successfully!');
            window.location.href = 'viewprofile.php?id=$profileId';
            </script>";
    } else {
        echo "<script>
            alert('Error updating profile: " . addslashes($conn->error) . "');
            window.history.back();
            </script>";
    }
    
    $stmt->close();
} else {
    header("Location: Profile.php");
}

$conn->close();
?>