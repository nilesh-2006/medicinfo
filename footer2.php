<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <!-- Font Awesome CDN for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
    <style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Times New Roman', Times, serif;
}

body {
    line-height: 1.6;
    background: #f4f4f4;
}

footer {
    background-color: #000;
    color: #fff;
    padding: 50px 20px;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Footer columns layout */
.footer-columns {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
    justify-content: space-between;
}

.footer-section {
    margin-bottom: 20px;
}

.footer-section h4 {
    font-size: 20px;
    color: #ffffff;
    font-weight: bold;
    margin-bottom: 15px;
    position: relative;
    padding-bottom: 10px;
}

.footer-section h4::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background: #66bb6a;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section li {
    margin-bottom: 8px;
}

.footer-section li a {
    color: #ccc;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
}

.footer-section li a:hover {
    color: rgb(81, 73, 235);
    transform: translateX(5px);
}

/* Social Icons */
.social-icons {
    display: flex;
    gap: 15px;
    margin-top: 20px;
}

.social-icons a {
    color: #fff;
    font-size: 18px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.social-icons a:hover {
    background: #00aaff;
    color: #fff;
    transform: translateY(-3px);
}

/* Divider lines */
.footer-divider {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 0 40px 0;
}

.green-line {
    background: #66bb6a;
    height: 4px;
    width: 80%;
    margin-right: 2%;
}

.red-line {
    background: #e53935;
    height: 4px;
    width: 20%;
}

/* Footer bottom */
.footer-bottom {
    text-align: center;
    margin-top: 50px;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.bottom-links {
    margin-bottom: 15px;
}

.bottom-links a {
    color: #ccc;
    text-decoration: none;
    font-size: 14px;
    margin: 0 10px;
    transition: color 0.3s;
}

.bottom-links a:hover {
    color: #00aaff;
}

.footer-bottom p {
    font-size: 14px;
    color: #ccc;
    margin: 10px 0;
}

.footer-section img {
    border-radius: 50%;
    margin-top: 10px;
    max-width: 120px;
    height: auto;
    display: block;
}

.sitename h2 {
    color: white;
    margin-bottom: 15px;
    font-size: 24px;
}

/* Responsive design */
@media (max-width: 1024px) {
    /* Tablet styles */
    .footer-columns {
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 25px;
    }
    
    footer {
        padding: 40px 20px;
    }
}

@media (max-width: 768px) {
    /* Small tablet styles */
    .footer-columns {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .footer-divider {
        margin-bottom: 30px;
    }
    
    .social-icons {
        justify-content: flex-start;
    }
}

@media (max-width: 480px) {
    /* Mobile styles */
    .footer-columns {
        grid-template-columns: 1fr;
    }
    
    footer {
        padding: 30px 15px;
    }
    
    .footer-section {
        margin-bottom: 25px;
    }
    
    .footer-section h4 {
        font-size: 18px;
    }
    
    .footer-divider {
        flex-direction: column;
        gap: 10px;
    }
    
    .green-line, .red-line {
        width: 100%;
    }
    
    .bottom-links a {
        display: block;
        margin: 5px 0;
    }
    
    .footer-section img {
        max-width: 100px;
    }
}
    </style>
</head>
<body>
    
    <footer>
        <div class="footer-container">

           <!-- Divider Lines -->
           <div class="footer-divider">
             <div class="green-line"></div>
             <div class="red-line"></div>
           </div>

            <div class="footer-columns">
                
                <div class="footer-section">
                    <h2 class="sitename">MedicInfo</h2>
                   <a href="../Index.php"><img src="../assets/logo.jpg" alt="logo"></a>
                </div>
    
                <div class="footer-section">
                    <h4>Home</h4>
                    <ul>
                        <li><a href="latest.php">Latest</a></li>
                        <li><a href="Career.php">Career</a></li>
                        <li><a href="Services.php">Services</a></li>
                        <li><a href="faqs.php">FAQs</a></li>
                    </ul>
                </div>
    
                <div class="footer-section">
                    <h4>Known Us</h4>
                    <ul>
                        <li><a href="About.php">About Us</a></li>
                        <li><a href="Terms.php">Terms Of Use</a></li>
                        <li><a href="Contact.php">Contact Us</a></li>
                        <li><a href="../Feedback.php">Customers Feedback</a></li>
                    </ul>
                </div>
    
                <div class="footer-section">
                    <h4>Privacy Info</h4>
                    <ul>
                        <li><a href="HealthCare.php">Health & Care</a></li>
                        <li><a href="Guidance.php">Guidance</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="Privacy.php">Privacy</a></li>
                    </ul>
                </div>
    
                <div class="footer-section social">
                    <h4>Follow MedicInfo</h4>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
    
            </div>
    
            <div class="footer-bottom">
                <div class="bottom-links">
                    <a href="Terms.php">Terms of Use</a> |
                    <a href="#">Privacy & Cookies</a> |
                    <a href="#">Your Privacy Choices</a>
                </div>
                <p>© 2025 by Ritik Atul Nilesh Thaneshwar. All rights reserved.</p>
            </div>
    
        </div>
    </footer>
    
</body>
</html>