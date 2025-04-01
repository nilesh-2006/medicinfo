<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET['id'])) {
    die("No profile ID specified");
}

$profileId = intval($_GET['id']);

// Database connection
$conn = new mysqli("localhost", "root", "", "medicalsystem");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch profile data
$stmt = $conn->prepare("SELECT * FROM profiles WHERE id = ?");
$stmt->bind_param("i", $profileId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Profile not found");
}

$profile = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($profile['name']); ?>'s Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --danger-color: #f72585;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        .profile-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .profile-image-container {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 1.5rem;
            border: 5px solid var(--light-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .profile-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .default-avatar {
            width: 100%;
            height: 100%;
            background: var(--accent-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 4rem;
        }
        
        .profile-name {
            font-size: 2rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        .profile-title {
            color: var(--accent-color);
            font-weight: 500;
            margin-bottom: 1.5rem;
        }
        
        .profile-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .detail-card {
            background: var(--light-color);
            padding: 1.5rem;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .detail-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .detail-card i {
            color: var(--primary-color);
            margin-right: 0.5rem;
            font-size: 1.2rem;
        }
        
        .detail-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
            display: flex;
            align-items: center;
        }
        
        .detail-value {
            padding-left: 1.7rem;
        }
        
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: white;
            border: 2px solid var(--primary-color);
        }
        
        .btn-primary:hover {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .btn-outline {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }
        
        .btn-outline:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
        
        @media (max-width: 768px) {
            .profile-container {
                margin: 1rem;
                padding: 1.5rem;
            }
            
            .profile-details {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-image-container">
                <?php if (!empty($profile['profile_image'])): ?>
                    <img src="<?php echo htmlspecialchars($profile['profile_image']); ?>" 
                         alt="Profile Image" class="profile-image">
                <?php else: ?>
                    <div class="default-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                <?php endif; ?>
            </div>
            <h1 class="profile-name"><?php echo htmlspecialchars($profile['name']); ?></h1>
            <p class="profile-title">Medical Professional</p>
        </div>
        
        <div class="profile-details">
            <div class="detail-card">
                <h3 class="detail-title"><i class="fas fa-envelope"></i> Contact Information</h3>
                <p class="detail-value">
                    <strong>Email:</strong> <?php echo htmlspecialchars($profile['email']); ?><br>
                    <strong>Phone:</strong> <?php echo htmlspecialchars($profile['phone']); ?>
                </p>
            </div>
            
            <div class="detail-card">
                <h3 class="detail-title"><i class="fas fa-map-marker-alt"></i> Location</h3>
                <p class="detail-value">
                    <strong>State:</strong> <?php echo htmlspecialchars($profile['state']); ?><br>
                    <strong>City:</strong> <?php echo htmlspecialchars($profile['city']); ?>
                </p>
            </div>
        </div>
        
        <div class="action-buttons">
            <a href="editprofile.php?id=<?php echo $profileId; ?>" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit Profile
            </a>
            <a href="Profile.php" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i> Back to Profiles
            </a>
        </div>
    </div>
</body>
</html>