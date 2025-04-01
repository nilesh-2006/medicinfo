<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: #f8f9fa;
}

.navbar, .navbar-container {
    background-color: #A59797;
    height: 60px;
    padding: 0 2rem;
    position: sticky;
    top: 0;
    margin-bottom: 2%;
    z-index: 1000;
}

.navbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 auto;
}

.logo {
    color: black;
    font-weight: 700;
    font-size: 1.5rem;
    text-decoration: none;
    white-space: nowrap;
}

.navbar {
    display: flex;
    list-style: none;
    gap: 1.5rem;
    margin-top: 19px;
}

.navbar-item {
    position: relative;
}

.navbar-link {
    color: white;
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem;
    padding: 0.5rem 0;
    transition: all 0.3s ease;
    position: relative;
    white-space: nowrap;
}

.navbar-link:hover {
    color: #fff;
    transform: translateY(-2px);
}

.navbar-link.active {
    font-weight: 600;
}

.navbar-link:not(.disabled):after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: 0;
    left: 0;
    background-color: white;
    transition: width 0.3s ease;
}

.navbar-link:hover:after,
.navbar-link.active:after {
    width: 100%;
}

.navbar-link.disabled {
    cursor: not-allowed;
}

/* Hamburger Menu */
.hamburger {
    display: none;
    cursor: pointer;
    width: 30px;
    height: 20px;
    position: relative;
    z-index: 1001;
}

.hamburger span {
    display: block;
    position: absolute;
    height: 3px;
    width: 100%;
    background: white;
    border-radius: 3px;
    opacity: 1;
    left: 0;
    transform: rotate(0deg);
    transition: .25s ease-in-out;
}

.hamburger span:nth-child(1) {
    top: 0px;
}

.hamburger span:nth-child(2),
.hamburger span:nth-child(3) {
    top: 10px;
}

.hamburger span:nth-child(4) {
    top: 20px;
}

.hamburger.open span:nth-child(1) {
    top: 10px;
    width: 0%;
    left: 50%;
}

.hamburger.open span:nth-child(2) {
    transform: rotate(45deg);
}

.hamburger.open span:nth-child(3) {
    transform: rotate(-45deg);
}

.hamburger.open span:nth-child(4) {
    top: 10px;
    width: 0%;
    left: 50%;
}

/* Responsive Styles */
/* Tablet (768px - 1024px) */
@media (max-width: 1024px) {
    .navbar-container {
        padding: 0 1.5rem;
    }
    
    .navbar {
        gap: 1rem;
    }
    
    .navbar-link {
        font-size: 0.9rem;
    }
}

/* Small Tablet (600px - 768px) */
@media (max-width: 768px) {
    .hamburger {
        display: block;
    }
    
    .navbar {
        position: fixed;
        top: 60px;
        right: -100%;
        width: 60%;
        max-width: 300px;
        height: calc(100vh - 60px);
        background: linear-gradient(135deg, #6c6262, #7a787b);
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding-top: 2rem;
        transition: right 0.3s ease-in-out;
        gap: 1.5rem;
        margin-top: 0;
    }
    
    .navbar.open {
        right: 0;
    }
    
    .navbar-item {
        width: 100%;
        text-align: center;
    }
    
    .navbar-link {
        display: block;
        padding: 1rem;
        font-size: 1.1rem;
    }
    
    .navbar-link:after {
        display: none;
    }
}

/* Mobile (up to 600px) */
@media (max-width: 600px) {
    .navbar-container {
        padding: 0 1rem;
        height: 50px;
    }
    
    .logo {
        font-size: 1.2rem;
    }
    
    .navbar {
        top: 50px;
        height: calc(100vh - 50px);
        width: 70%;
    }
    
    .navbar-link {
        font-size: 1rem;
        padding: 0.8rem;
    }
    
    .hamburger {
        width: 25px;
        height: 18px;
    }
    
    .hamburger span {
        height: 2.5px;
    }
    
    .hamburger span:nth-child(1) {
        top: 0px;
    }
    
    .hamburger span:nth-child(2),
    .hamburger span:nth-child(3) {
        top: 8px;
    }
    
    .hamburger span:nth-child(4) {
        top: 16px;
    }
}

/* Very Small Mobile (up to 400px) */
@media (max-width: 400px) {
    .navbar-container {
        padding: 0 0.8rem;
    }
    
    .logo {
        font-size: 1.1rem;
    }
    
    .navbar {
        width: 80%;
    }
    
    .navbar-link {
        font-size: 0.95rem;
        padding: 0.7rem;
    }
}
    </style>
</head>
<body>
    <header>
        <div class="navbar-container">
            <a href="#" class="logo">MedicInfo</a>
            
            <div class="hamburger" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                
            </div>
            
            <ul class="navbar" id="navbarMenu">
                <li class="navbar-item">
                  <a class="navbar-link " aria-current="page" href="../Index.php">Home</a>
                </li>
                <li class="navbar-item">
                  <a class="navbar-link" href="InformationPage.php">Information</a>
                </li>
                <li class="navbar-item">
                  <a class="navbar-link" href="Professional.php">Professional Directory</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="About.php">About Us</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link " href="../Register.php">Registration</a>
                </li>
                <li class="navbar-item">
                  <a class="navbar-link " href="../Login.php">Log In</a>
                </li>
            </ul>
        </div>
    </header>

    <script>
        function toggleMenu() {
            const navbarMenu = document.getElementById('navbarMenu');
            const hamburger = document.querySelector('.hamburger');
            
            navbarMenu.classList.toggle('open');
            hamburger.classList.toggle('open');
        }
    </script>
</body>
</html>