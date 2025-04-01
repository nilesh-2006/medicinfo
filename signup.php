<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup Page</title>
        <!-- Include Font Awesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: 'Times New Roman', Times, serif;
                text-decoration: none;
            }

            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                width: 100%;
                background: url('abc.jpg') no-repeat;
                background-position: center;
                background-size: cover;
                background-image: url('./assets/back_image.jpg');
            }

            .back-button {
                position: absolute;
                top: 10px; 
                left: 10px;
                padding: 10px 15px;
                font-weight: bold;
                color: brown;
                border: none;
                cursor: pointer;
                font-size: 16px;
                text-decoration: none;
                display: inline-block;
            }

            .back-button:hover {
                text-decoration: underline;
            }

            .back-button::before {
                content: '\2190'; 
                margin-right: 5px;
            }

            h2 {
                font-size: 2rem;
                color: rgb(148, 43, 43);
                text-align: center;
            }

            .form-box {
                position: relative;
                width: 400px;
                height: 450px;
                background: transparent;
                border-radius: 20px;
                backdrop-filter: blur(3px);
                display: flex;
                justify-content: center;
                align-items: center;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                background-image: url('./assets/background_image.jpg');
            }

            .inputbox {
                position: relative;
                margin: 30px 0;
                width: 310px;
                border-bottom: 2px solid #fff;
            }

            .inputbox label {
                position: absolute;
                top: 50%;
                left: 5px;
                transform: translateY(-50%);
                color: black;
                font-size: 1rem;
                pointer-events: none;
                transition: 1s;
            }

            input:focus ~ label,
            input:valid ~ label {
                top: -5px;
            }

            .inputbox input {
                width: 100%;
                height: 50px;
                background: transparent;
                border: none;
                outline: none;
                font-size: 1rem;
                padding: 0 35px 0 5px;
                color: #000;
            }

            .password-container {
                position: relative;
                width: 100%;
            }

            .password-container input {
                padding-right: 40px; /* Space for the button */
            }

            .toggle-password {
                position: absolute;
                left:45%;
                top: 50%;
                transform: translateY(-50%);
                background: none;
                border: none;
                cursor: pointer;
                color: rgb(52, 52, 52);
                font-size: 1.2rem;
            }

            button {
                width: 100%;
                height: 40px;
                border-radius: 40px;
                background-color: #fff;
                border: none;
                outline: none;
                cursor: pointer;
                font-size: 1rem;
                font-weight: 600;
            }

            .register {
                font-size: 1rem;
                color: #000;
                text-align: center;
                margin: 25px 0 10px;
            }

            .register p a {
                text-decoration: none;
                color: blue;
                font-weight: 600;
            }

            .register p a:hover {
                text-decoration: underline;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .form-box {
                    width: 90%;
                    height: auto;
                }

                .inputbox {
                    width: 100%;
                }
            }

            @media (max-width: 480px) {
                .form-box {
                    width: 95%;
                    height: auto;
                }

                h2 {
                    font-size: 1.5rem;
                }

                .inputbox label {
                    font-size: 0.8rem;
                }

                .inputbox input {
                    font-size: 0.8rem;
                }

                button {
                    font-size: 0.8rem;
                }

                .register {
                    font-size: 0.8rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="form-box">
                <!-- Back Button -->
                <a href="Index.php" class="back-button">Back</a>

                <div class="form-value">
                    <form action="signup_process.php" method="POST">
                        <h2>Sign Up</h2>
                        <div class="inputbox">
                            <input type="email" name="email" id="email" required>
                            <label for="">Email</label>
                        </div>
                        <div class="inputbox">
                            <div class="password-container">
                                <input type="password" id="password" name="password" required>
                                <label for="">Create strong Password</label>
                                <button type="button" class="toggle-password" onclick="togglePasswordVisibility()">
                                    <i class="fas fa-eye-slash"></i> <!-- Eye icon from Font Awesome -->
                                </button>
                            </div>
                        </div>
                        <button type="submit" id="signup-button" disabled>Sign Up</button>
                        <div class="register">
                            <p>You have an account <a href="Login.php">Log In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function togglePasswordVisibility() {
                const passwordInput = document.getElementById('password');
                const toggleButton = document.querySelector('.toggle-password i');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleButton.classList.remove('fa-eye-slash');
                    toggleButton.classList.add('fa-eye'); // Change to "hide" icon
                } else {
                    passwordInput.type = 'password';
                    toggleButton.classList.remove('fa-eye');
                    toggleButton.classList.add('fa-eye-slash'); // Change back to "show" icon
                }
            }

            // Function to check if both fields are filled
            function checkFields() {
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                const signupButton = document.getElementById('signup-button');

                if (email && password) {
                    signupButton.disabled = false;
                } else {
                    signupButton.disabled = true;
                }
            }

            // Add event listeners to the email and password fields
            document.getElementById('email').addEventListener('input', checkFields);
            document.getElementById('password').addEventListener('input', checkFields);
        </script>
    </body>
</html>