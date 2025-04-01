<?php
session_start();

// Database configuration
$host = 'localhost';
$dbname = 'MedicalSystem';
$username = 'root';
$password = '';

$error = null;
$success = null;
$validToken = false;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        
        // Check if token exists and is not expired
        $stmt = $pdo->prepare("SELECT id FROM users WHERE reset_token = :token AND reset_token_expires > NOW()");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $validToken = true;
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $userId = $user['id'];
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $newPassword = $_POST['password'] ?? '';
                $confirmPassword = $_POST['confirm_password'] ?? '';
                
                if (empty($newPassword)) {
                    $error = "Please enter a new password";
                } elseif ($newPassword !== $confirmPassword) {
                    $error = "Passwords do not match";
                } else {
                    // Hash the new password
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    
                    // Update password and clear reset token
                    $stmt = $pdo->prepare("UPDATE users SET password = :password, reset_token = NULL, reset_token_expires = NULL WHERE id = :id");
                    $stmt->bindParam(':password', $hashedPassword);
                    $stmt->bindParam(':id', $userId);
                    $stmt->execute();
                    
                    $success = "Password has been reset successfully. You can now login with your new password.";
                    $validToken = false; // Token is now invalid
                }
            }
        }
    }
} catch (PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | Medical System</title>
    <!-- Use the same CSS as your login page -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Copy the same CSS from your login page */
        .success {
            color: #28a745;
            margin-bottom: 1.5rem;
            text-align: center;
            padding: 0.8rem;
            background-color: rgba(40, 167, 69, 0.1);
            border-radius: 8px;
            border-left: 4px solid #28a745;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Reset Password</h2>
        
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="success"><?= htmlspecialchars($success) ?></div>
            <button class="back-btn">
                <a href="login.php" class="back">
                    <i class="fas fa-arrow-left"></i> Back to Login
                </a>
            </button>
        <?php elseif ($validToken): ?>
            <form method="POST" action="reset_password.php?token=<?= htmlspecialchars($_GET['token']) ?>">
                <div class="form-group">
                    <label for="password">New Password</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" required placeholder="Enter new password">
                        <button type="button" class="password-toggle" id="togglePassword" aria-label="Toggle password visibility">
                            <i class="fas fa-eye-slash"></i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <div class="password-container">
                        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm new password">
                        <button type="button" class="password-toggle" id="toggleConfirmPassword" aria-label="Toggle password visibility">
                            <i class="fas fa-eye-slash"></i>
                        </button>
                    </div>
                </div>
                <button type="submit">Reset Password</button>
            </form>
        <?php else: ?>
            <div class="error">Invalid or expired password reset link</div>
            <button class="back-btn">
                <a href="forgot_password.php" class="back">
                    <i class="fas fa-arrow-left"></i> Request new reset link
                </a>
            </button>
        <?php endif; ?>
    </div>

    <script>
        // Password toggle functionality (same as login page)
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
            const confirmPassword = document.querySelector('#confirm_password');
            
            if (togglePassword && password) {
                const icon = togglePassword.querySelector('i');
                togglePassword.addEventListener('click', function() {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    icon.classList.toggle('fa-eye-slash');
                    icon.classList.toggle('fa-eye');
                });
            }
            
            if (toggleConfirmPassword && confirmPassword) {
                const icon = toggleConfirmPassword.querySelector('i');
                toggleConfirmPassword.addEventListener('click', function() {
                    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                    confirmPassword.setAttribute('type', type);
                    icon.classList.toggle('fa-eye-slash');
                    icon.classList.toggle('fa-eye');
                });
            }
        });
    </script>
</body>
</html>