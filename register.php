<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Back Button */
        .back-button {
            position: absolute;
            top: 30px;
            left: 26px;
            background: #fff;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
            transition: 0.3s;
        }

        .back-button:hover {
            background: #e0e0e0;
            transform: scale(1.1);
        }

        /* Container Styling */
        .container {
            background: #fff;
            padding: 35px;
            border: 2px solid brown;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 420px;
            text-align: center;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 26px;
            font-weight: bold;
        }

        /* Form Styling */
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-weight: 600;
            margin-bottom: 5px;
            color: #444;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"],
        textarea {
            width: 93%;
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #4facfe;
            outline: none;
            box-shadow: 0 0 8px rgba(79, 172, 254, 0.5);
        }

        textarea {
            height: 100px;
            resize: none;
        }

        /* Password Container */
        .password-container {
            position: relative;
            width: 100%;
        }

        /* Password Input */
        .password-container input[type="password"] {
            width: 87%; /* Adjusted width to accommodate the eye icon */
            padding-right: 40px; /* Space for the eye icon */
        }

        /* Eye Icon */
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666; /* Icon color */
            font-size: 18px;
            transition: color 0.3s;
        }

        .toggle-password:hover {
            color: #333; /* Darker color on hover */
        }

        /* Gender Section */
        .gender-group {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .gender-group input {
            margin-right: 5px;
        }

        /* State & City Fields */
        .state-city-group {
            display: flex;
            gap: 15px;
        }

        .state-city-group input {
            width: 86%;
        }

        /* Button Styling */
        button {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        button:hover {
            background: linear-gradient(to right, #00c3ff, #00f2fe);
            transform: scale(1.05);
        }
        .register-footer {
            text-align: center;
            margin-top: 1.5rem;
            color:rgb(2, 10, 17);
        }

        /* Responsive adjustments */
        @media (max-width: 450px) {
            .container {
                width: 90%;
            }

            .state-city-group {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <a href="Index.php" class="back-button">← Back</a>

    <div class="container">
        <h1>Register</h1>

        <form action="registerdata.php" method="post"> 
            <div class="input-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility()">
                        <i class="fas fa-eye-slash"></i>
                    </span>
                </div>
            </div>
            <div class="input-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="input-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div class="input-group">
                <label>Gender:</label>
                <div class="gender-group">
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="input-group">
                <label for="medical_name">Medical Name:</label>
                <input type="text" id="medical_name" name="medical_name" required>
            </div>
            <div class="input-group">
                <label for="state">State & City:</label>
                <div class="state-city-group">
                    <input type="text" id="state" name="state" placeholder="State" required>
                    <input type="text" id="city" name="city" placeholder="City" required>
                </div>
            </div>
            <div class="input-group">
                <label for="pin">Pin Code:</label>
                <input type="text" id="pin" name="pin" required>
            </div>
            <button type="submit">Register</button>
            <div class="register-footer">
            Do you have an account? <a href="Login.php">Log In</a>
        </div>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.querySelector('.toggle-password i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye'); // Change to "hide" icon
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash'); // Change back to "show" icon
            }
        }



        // Function to show pop-up and redirect
        function showPopupAndRedirect() {
            alert('Registration Successful!');
            document.getElementById('registrationForm').reset(); // Clear form data
            window.location.href = 'MedicineData.php'; // Redirect to MedicineData page
        }

        // Handle form submission
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Submit form data via AJAX
            const formData = new FormData(this);
            fetch('registerdata.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    showPopupAndRedirect();
                } else {
                    alert('Registration failed. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });
        document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('registerdata.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success popup
            alert('Profile created successfully!');
            // Redirect to MedicineData.php
            window.location.href = data.redirect;
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred during registration');
    });
});
        
    </script>
</body>
</html>