<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        :root {
            --primary-color: #4a6fa5;
            --secondary-color: #166088;
            --accent-color: #4fc3f7;
            --success-color: #4CAF50;
            --error-color: #f44336;
            --text-color: #333;
            --light-gray: #f5f5f5;
            --white: #ffffff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: var(--text-color);
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background: var(--white);
            padding: 30px;
            border: solid 2px brown;
            border-radius: 12px;
            box-shadow: var(--shadow);
            position: relative;
            transition: var(--transition);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
        }

        .container:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .back-button {
            position: absolute;
            top: 10px;
            left: 5px;
            padding: 8px 15px;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: var(--transition);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .back-button:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            text-decoration: none;
        }

        .back-button::before {
            content: '←';
            margin-right: 5px;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 25px;
            font-size: 2rem;
            position: relative;
            padding-bottom: 10px;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--accent-color);
            border-radius: 3px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--secondary-color);
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: var(--transition);
            background-color: rgba(255, 255, 255, 0.8);
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus,
        select:focus {
            border-color: var(--accent-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 195, 247, 0.2);
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        .rating-container {
            margin-bottom: 15px;
        }

        .rating-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--secondary-color);
        }

        .rating {
            display: flex;
            justify-content: space-between;
            width: 100%;
            flex-direction: row-reverse;
            margin-bottom: 10px;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 32px;
            color: #ddd;
            cursor: pointer;
            padding: 0 8px;
            transition: var(--transition);
        }

        .rating label:hover,
        .rating label:hover ~ label,
        .rating input:checked ~ label {
            color: #ffc107;
            transform: scale(1.1);
        }

        .rating-text {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 5px;
        }

        button[type="submit"] {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .success {
            color: var(--success-color);
            text-align: center;
            margin-bottom: 20px;
            padding: 12px;
            background-color: rgba(76, 175, 80, 0.1);
            border-radius: 8px;
            font-weight: 500;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 25px;
            }
            
            h1 {
                font-size: 1.8rem;
                margin-top: 20px;
            }
            
            .rating label {
                font-size: 28px;
                padding: 0 6px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            
            .container {
                padding: 20px;
            }
            
            h1 {
                font-size: 1.5rem;
            }
            
            input[type="text"],
            input[type="email"],
            textarea,
            select {
                padding: 10px 12px;
                font-size: 15px;
            }
            
            .rating label {
                font-size: 24px;
                padding: 0 4px;
            }
            
            button[type="submit"] {
                padding: 12px;
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Back Button -->
        <a href="Index.php"> <button class="back-button"> Back</button></a>
        <h1>Feedback Form</h1>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="success">Thank you for your feedback! We appreciate your time.</div>
        <?php endif; ?>
        
        <form id="feedbackForm" action="submit_feedback.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required placeholder="Enter your name">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email (optional)">
            </div>
            
            <div class="form-group">
                <label for="message">Your Feedback:</label>
                <textarea id="message" name="message" required placeholder="Please share your thoughts with us..."></textarea>
            </div>
            
            <div class="rating-container">
                <span class="rating-label">Rating:</span>
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5" required><label for="star5" title="Excellent">★</label>
                    <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="Very Good">★</label>
                    <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="Good">★</label>
                    <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="Fair">★</label>
                    <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="Poor">★</label>
                </div>
                <div class="rating-text">Click to rate your experience</div>
            </div>
            
            <button type="submit">Submit Feedback</button>
        </form>
    </div>

    <script>
        document.getElementById('feedbackForm').addEventListener('submit', function(e) {
            // Prevent the default form submission
            e.preventDefault();
            
            // Get the form data
            const formData = new FormData(this);
            
            // Send the form data using Fetch API
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    // Show success alert
                    alert('Feedback submitted successfully!');
                    
                    // Redirect to history page after user clicks OK
                    window.location.href = 'Index.php';
                } else {
                    alert('There was an error submitting your feedback. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error submitting your feedback. Please try again.');
            });
        });
    </script>
</body>
</html>