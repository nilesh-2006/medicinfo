<?php
session_start();

// Redirect to dashboard if already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: medicine_show.php");
    exit();
}

// Database configuration
$host = 'localhost';
$dbname = 'MedicalSystem';
$username = 'root';
$password = '';

$error = null;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if (empty($email) || empty($password)) {
            $error = "Please enter both email and password";
        } else {
            // First check the users table
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email AND password = :password");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $email;
                
                // Now check for profile data
                $profileStmt = $pdo->prepare("SELECT * FROM profiles WHERE user_id = :user_id");
                $profileStmt->bindParam(':user_id', $user['id']);
                $profileStmt->execute();
                
                if ($profileStmt->rowCount() > 0) {
                    $profile = $profileStmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['profile_id'] = $profile['id'];
                    $_SESSION['name'] = $profile['name'];
                    // Store other profile fields in session as needed
                    $_SESSION['phone'] = $profile['phone'] ?? '';
                    $_SESSION['address'] = $profile['address'] ?? '';
                }
                
                header("Location: medicine_show.php");
                exit();
            } else {
                $error = "Invalid email or password";
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
    <title>Login | Medical System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-hover: #3a56d4;
            --secondary-color: #7209b7;
            --error-color: #ef233c;
            --text-color: #2b2d42;
            --light-gray: #f8f9fa;
            --white: #ffffff;
            --border-color: #dee2e6;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            line-height: 1.5;
            color: var(--text-color);
        }
        
        .login-container {
            background: var(--white);
            padding: 2rem;
            border: 2px solid brown;
            border-radius: 12px;
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 450px;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);

        }
        
        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            font-size: 1.75rem;
            font-weight: 600;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-color);
            font-size: 0.95rem;
        }
        
        input {
            width: 100%;
            padding: 0.85rem 3rem 0.85rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--light-gray);
        }
        
        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
            background-color: var(--white);
        }
        
        .password-container {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 10%;
            cursor: pointer;
            color: #6c757d;
            background: none;
            border: none;
            font-size: 1.1rem;
            width: 2rem;
            height: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        .password-toggle:hover {
            background-color: rgba(0,0,0,0.05);
            color: var(--primary-color);
        }
        
        button {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: var(--white);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: var(--transition);
            margin-top: 0.5rem;
        }
        
        button:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .error {
            color: var(--error-color);
            margin-bottom: 1.5rem;
            text-align: center;
            padding: 0.8rem;
            background-color: rgba(239, 35, 60, 0.1);
            border-radius: 8px;
            border-left: 4px solid var(--error-color);
            font-size: 0.9rem;
        }
        
        .back-btn {
            background: #6c757d;
            margin-top: 1rem;
        }
        
        .back-btn:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }
        
        a.back {
            color: var(--white);
            text-decoration: none;
            display: block;
        }
        
        hr {
            margin: 1.5rem 0;
            border: 0;
            height: 1px;
            background-color: var(--border-color);
        }
        
        /* .forgot-password {
            text-align: right;
            margin-top: 0.5rem;
        }
        
        .forgot-password a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.85rem;
            transition: var(--transition);
        }
        
        .forgot-password a:hover {
            text-decoration: underline;
        }
         */
        .register-footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color:rgb(2, 10, 17);
        }
        
        /* Responsive Breakpoints */
        @media (max-width: 768px) {
            .login-container {
                padding: 1.75rem;
                max-width: 400px;
            }
            
            h2 {
                font-size: 1.6rem;
            }
        }
        
        @media (max-width: 576px) {
            body {
                padding: 15px;
                background-color: var(--white);
            }
            
            .login-container {
                padding: 1.5rem;
                box-shadow: none;
                border: 1px solid var(--border-color);
                max-width: 100%;
            }
            
            h2 {
                font-size: 1.5rem;
                margin-bottom: 1.25rem;
            }
            
            input {
                padding: 0.8rem 2.8rem 0.8rem 1rem;
            }
            
            button {
                padding: 0.85rem;
            }
            
            .form-group {
                margin-bottom: 1.25rem;
            }
            
            .password-toggle {
                right: 0.8rem;
                font-size: 1rem;
            }
        }
        
        @media (max-width: 400px) {
            .login-container {
                padding: 1.25rem;
            }
            
            h2 {
                font-size: 1.4rem;
            }
            
            label {
                font-size: 0.9rem;
            }
            
            input {
                font-size: 0.95rem;
                padding: 0.75rem 2.5rem 0.75rem 0.9rem;
            }
        }
        
        /* Tablet-specific adjustments */
        @media (min-width: 577px) and (max-width: 992px) {
            .login-container {
                max-width: 500px;
                padding: 2.25rem;
            }
            
            h2 {
                font-size: 1.8rem;
            }
            
            input {
                padding: 1rem 3.2rem 1rem 1.2rem;
                font-size: 1.05rem;
            }
            
            button {
                padding: 1rem;
                font-size: 1.05rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Log In</h2>
        
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required placeholder="Enter Password">
                    <button type="button" class="password-toggle" id="togglePassword" aria-label="Toggle password visibility">
                        <i class="fas fa-eye-slash"></i>
                    </button>
                </div>
                <!-- <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div> -->
            </div>
            <button type="submit">Log In</button>
            <hr>
            <button class="back-btn">
                <a href="Index.php" class="back">
                    <i class="fas fa-arrow-left"></i> Back to Home
                </a>
            </button>
        </form>
        
        <div class="register-footer">
            Don't have an account? <a href="Register.php">Register</a>
        </div>
    </div>

    <script>
        // Password toggle functionality
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const icon = togglePassword.querySelector('i');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            icon.classList.toggle('fa-eye-slash');
            icon.classList.toggle('fa-eye');
            
            // Update aria-label for accessibility
            const label = type === 'password' ? 'Show password' : 'Hide password';
            this.setAttribute('aria-label', label);
        });
        
        // Add focus effects
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('label').style.color = 'var(--primary-color)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.querySelector('label').style.color = 'var(--text-color)';
            });
        });
    </script>
</body>
</html>