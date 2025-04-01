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

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Use the profile_id from session if available, otherwise use user_id
    $profile_id = isset($_SESSION['profile_id']) ? $_SESSION['profile_id'] : $_SESSION['user_id'];
    
    // Modified query to handle both cases
    $stmt = $conn->prepare("SELECT * FROM Profiles WHERE id = :profile_id OR user_id = :user_id");
    $stmt->execute([
        ':profile_id' => $profile_id,
        ':user_id' => $_SESSION['user_id']
    ]);
    $profile = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$profile) {
        // If no profile found, redirect to create profile page
        header("Location: profiledata.php");
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
    <title>My Profile | MedicInfo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Your CSS styles remain the same -->
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
        
        .profile-header::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .profile-header::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
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
        
        .profile-header p {
            margin: 5px 0 0;
            opacity: 0.9;
            font-weight: 300;
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
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .profile-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
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
        
        .info-item {
            margin-bottom: 15px;
        }
        
        .info-item label {
            display: block;
            font-weight: 500;
            color: #666;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .info-item p {
            margin: 0;
            padding: 12px 15px;
            background: var(--light);
            border-radius: 8px;
            border-left: 4px solid var(--accent);
            font-size: 15px;
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
        
        .btn-danger {
            background: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background: #e5177d;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(247, 37, 133, 0.3);
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
            <h1><?php echo htmlspecialchars($profile['name']); ?></h1>
            <p><?php echo htmlspecialchars($profile['email']); ?></p>
        </div>
        
        <div class="profile-body">
            <div class="profile-section">
                <h2><i class="fas fa-user-circle"></i> Personal Information</h2>
                <div class="profile-info">
                    <div class="info-item">
                        <label>Full Name</label>
                        <p><?php echo htmlspecialchars($profile['name']); ?></p>
                    </div>
                    <div class="info-item">
                        <label>Email</label>
                        <p><?php echo htmlspecialchars($profile['email']); ?></p>
                    </div>
                    <div class="info-item">
                        <label>Phone Number</label>
                        <p><?php echo htmlspecialchars($profile['phone']); ?></p>
                    </div>
                    <div class="info-item">
                        <label>Gender</label>
                        <p><?php echo htmlspecialchars(ucfirst($profile['gender'])); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="profile-section">
                <h2><i class="fas fa-map-marker-alt"></i> Address Information</h2>
                <div class="info-item">
                    <label>Full Address</label>
                    <p><?php echo htmlspecialchars($profile['address']); ?></p>
                </div>
            </div>
            
            <div class="profile-section">
                <h2><i class="fas fa-clinic-medical"></i> Medical Store Information</h2>
                <div class="info-item">
                    <label>Store Name</label>
                    <p><?php echo htmlspecialchars($profile['medical_store_name']); ?></p>
                </div>
            </div>
            
            <div class="action-buttons">
                <a href="edit_profile.php" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
                <a href="Index.php" class="btn btn-outline">
                    <i class="fas fa-home"></i> Back to Home
                </a>
                <a href="logout.php" class="btn btn-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>
</body>
</html>