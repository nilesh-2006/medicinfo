<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}

$host = 'localhost';
$dbname = 'medicalsystem';
$username = 'root'; 
$password = '';

$errors = [];
$success = false;

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch current profile data
    $stmt = $conn->prepare("SELECT * FROM Profiles WHERE user_id = :user_id");
    $stmt->execute([':user_id' => $_SESSION['user_id']]);
    $profile = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$profile) {
        die("Profile not found");
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate and sanitize input
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $gender = trim($_POST['gender'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $medical_store_name = trim($_POST['medical_store_name'] ?? '');

        // Basic validation
        if (empty($name)) {
            $errors['name'] = "Name is required";
        }
        
        if (empty($email)) {
            $errors['email'] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        }
        
        if (empty($phone)) {
            $errors['phone'] = "Phone number is required";
        }
        
        if (empty($gender)) {
            $errors['gender'] = "Gender is required";
        }

        if (empty($errors)) {
            try {
                $updateStmt = $conn->prepare("UPDATE Profiles SET 
                    name = :name, 
                    email = :email, 
                    phone = :phone, 
                    gender = :gender, 
                    address = :address, 
                    medical_store_name = :medical_store_name 
                    WHERE user_id = :user_id");
                
                $updateStmt->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':phone' => $phone,
                    ':gender' => $gender,
                    ':address' => $address,
                    ':medical_store_name' => $medical_store_name,
                    ':user_id' => $_SESSION['user_id']]);
                
                $success = true;
                // Refresh profile data
                $stmt->execute([':user_id' => $_SESSION['user_id']]);
                $profile = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $errors['database'] = "Database error: " . $e->getMessage();
            }
        }
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
    <title>Edit Profile | MedicInfo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
            --info: #560bad;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px;
            color: var(--dark);
        }
        
        .profile-container {
            max-width: 1000px;
            margin: 30px auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }
        
        .profile-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: white;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            color: var(--primary);
            border: 5px solid rgba(255, 255, 255, 0.3);
            position: relative;
            z-index: 2;
        }
        
        .profile-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
            position: relative;
            z-index: 2;
        }
        
        .profile-body {
            padding: 40px;
        }
        
        .profile-section {
            margin-bottom: 30px;
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .profile-section h2 {
            color: var(--primary);
            border-bottom: 2px solid #eee;
            padding-bottom: 12px;
            margin-bottom: 20px;
            font-size: 20px;
            display: flex;
            align-items: center;
        }
        
        .profile-section h2 i {
            margin-right: 10px;
            color: var(--accent);
        }
        
        .profile-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-weight: 500;
            color: #666;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s;
            font-family: 'Poppins', sans-serif;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--accent);
        }
        
        .error-message {
            color: var(--danger);
            font-size: 13px;
            margin-top: 5px;
        }
        
        .success-message {
            color: var(--success);
            background: rgba(76, 201, 240, 0.1);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            border-left: 4px solid var(--success);
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 15px;
            border: none;
            cursor: pointer;
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-outline {
            background: white;
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        .btn-outline:hover {
            background: var(--light);
            transform: translateY(-2px);
        }
        
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 1em;
        }
        
        @media (max-width: 768px) {
            .profile-body {
                padding: 25px;
            }
            
            .profile-info {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .profile-container {
            animation: fadeIn 0.6s ease-out;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-pic">
                <i class="fas fa-user-md"></i>
            </div>
            <h1>Edit Profile</h1>
        </div>
        
        <div class="profile-body">
            <?php if ($success): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i> Profile updated successfully!
                </div>
            <?php endif; ?>
            
            <form method="POST" action="edit_profile.php">
                <div class="profile-section">
                    <h2><i class="fas fa-user-circle"></i> Personal Information</h2>
                    <div class="profile-info">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" 
                                   value="<?php echo htmlspecialchars($profile['name']); ?>" required>
                            <?php if (isset($errors['name'])): ?>
                                <div class="error-message"><?php echo $errors['name']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" 
                                   value="<?php echo htmlspecialchars($profile['email']); ?>" required>
                            <?php if (isset($errors['email'])): ?>
                                <div class="error-message"><?php echo $errors['email']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-control" 
                                   value="<?php echo htmlspecialchars($profile['phone']); ?>" required>
                            <?php if (isset($errors['phone'])): ?>
                                <div class="error-message"><?php echo $errors['phone']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="male" <?php echo ($profile['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                                <option value="female" <?php echo ($profile['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                                <option value="other" <?php echo ($profile['gender'] == 'other') ? 'selected' : ''; ?>>Other</option>
                            </select>
                            <?php if (isset($errors['gender'])): ?>
                                <div class="error-message"><?php echo $errors['gender']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="profile-section">
                    <h2><i class="fas fa-map-marker-alt"></i> Address Information</h2>
                    <div class="form-group">
                        <label for="address">Full Address</label>
                        <textarea id="address" name="address" class="form-control" rows="3"><?php echo htmlspecialchars($profile['address']); ?></textarea>
                    </div>
                </div>
                
                <div class="profile-section">
                    <h2><i class="fas fa-clinic-medical"></i> Medical Store Information</h2>
                    <div class="form-group">
                        <label for="medical_store_name">Store Name</label>
                        <input type="text" id="medical_store_name" name="medical_store_name" class="form-control" 
                               value="<?php echo htmlspecialchars($profile['medical_store_name']); ?>">
                    </div>
                </div>
                
                <div class="action-buttons">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    <a href="profile.php" class="btn btn-outline">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>