<?php
session_start();

require_once 'PHPMailer/PHPMailer.php';


// 1. Include PHPMailer files at the top
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

// Database configuration
$host = 'localhost';
$dbname = 'MedicalSystem';
$username = 'root';
$password = '';

$error = null;
$success = null;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'] ?? '';
        
        if (empty($email)) {
            $error = "Please enter your email address";
        } else {
            // Check if email exists
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                // Generate a unique token
                $token = bin2hex(random_bytes(32));
                $expires = date("Y-m-d H:i:s", time() + 3600); // 1 hour expiration
                
                // Store token in database
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt = $pdo->prepare("UPDATE users SET reset_token = :token, reset_token_expires = :expires WHERE id = :id");
                $stmt->bindParam(':token', $token);
                $stmt->bindParam(':expires', $expires);
                $stmt->bindParam(':id', $user['id']);
                $stmt->execute();
                
                // Create PHPMailer instance
                $mail = new PHPMailer(true);
                
                
                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.example.com'; // Your SMTP server
                    $mail->SMTPAuth = true;
                    $mail->Username = 'your_email@example.com'; // SMTP username
                    $mail->Password = 'your_email_password'; // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;
                    
                    // Recipients
                    $mail->setFrom('no-reply@yourdomain.com', 'Medical System');
                    $mail->addAddress($email);
                    
                    // Content
                    $resetLink = "http://yourdomain.com/reset_password.php?token=$token";
                    $mail->isHTML(true);
                    $mail->Subject = 'Password Reset Request';
                    $mail->Body = "
                        <h2>Password Reset</h2>
                        <p>Click the button below to reset your password:</p>
                        <a href='$resetLink' style='background-color: #4361ee; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Reset Password</a>
                        <p>This link will expire in 1 hour.</p>
                        <p>If you didn't request this, please ignore this email.</p>
                    ";
                    $mail->AltBody = "Click the following link to reset your password: $resetLink\n\nThis link will expire in 1 hour.";
                    
                    $mail->send();
                    $success = "Password reset link has been sent to your email";
                } catch (Exception $e) {
                    $error = "Failed to send reset email. Please try again later.";
                    // For debugging: $error = "Mailer Error: " . $mail->ErrorInfo;
                }
            } else {
                // Don't reveal if email exists for security
                $success = "If this email exists in our system, a reset link has been sent";
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
    <title>Forgot Password | Medical System</title>
    <!-- Your existing CSS -->
</head>
<body>
    <div class="login-container">
        <h2>Forgot Password</h2>
        
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form method="POST" action="forgot_password.php">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
            <button type="submit">Reset Password</button>
            <hr>
            <button class="back-btn">
                <a href="login.php" class="back">
                    <i class="fas fa-arrow-left"></i> Back to Login
                </a>
            </button>
        </form>
    </div>
</body>
</html>