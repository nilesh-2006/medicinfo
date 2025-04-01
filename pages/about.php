<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        *{
            font-family: 'Times New Roman', Times, serif;
        }
        
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #F6EFEF;
        }

        h1 {
            color:white;
        }

        h3 {
            margin-bottom: 10px;
            color: #003a70 !important;
        }

        section {
            padding: 20px;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
        }

        .about-container {
            display: flex;
            padding: 10px;
            background-color: #008CBA;
            color: white;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 5px;
        }

        .about-content {
            flex: 1;
            margin-right: 20px;
        }

        .about-title {
            font-size: 4rem;
            margin-bottom: 10px;
            margin-left: 200px;
            font-weight: bold;
        }

        .about-title h3 {
            color: white;
        }

        .about-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .about-stat {
            text-align: center;
        }

        .about-stat-number {
            font-size: 1.5em;
            font-weight: bold;
        }

        .about-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 200px;
            border: 3px solid rgba(23, 27, 90, 0.56);
            box-shadow: 0 0 10px rgba(36, 18, 197, 0.282);
            margin-top: 20px;
        }

        .box {
            padding: 20px;
            margin-bottom: 20px;
            background-color: #D9D9D9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        
        /* Reset default styles and apply custom styling */
.contact-box {
    all: unset;
    display: block;
    padding: 20px;
    background-color: #D9D9D9; /* Same background as in your image */
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 20px auto;
}

/* Style for the name */
.contact-box .name {
    font-size: 1.5rem;
    font-weight: bold;
    color: black;
    margin-bottom: 10px;
}

/* Style for paragraphs */
.contact-box p {
    font-size: 1rem;
    color: black;
    margin: 5px 0;
}

/* Style for email and phone links */
.contact-box a {
    color: black; /* Set text color to black */
    text-decoration: none; /* Remove underline */
    font-weight: bold;
}

/* Optional hover effect */
.contact-box a:hover {
    text-decoration: underline;
    color: #555; /* Slightly darker on hover */
}
/* Animation Styles */
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease-out;
}

.fade-in.show {
    opacity: 1;
    transform: translateY(0);
}


        @media (max-width: 768px) {
            .team-member {
                width: 90%;
                margin: 10px auto;
                display: block;
            }

            .about-content {
                margin-right: 0;
                margin-left: -20px;
            }

            .about-container {
                margin-right: 0;
                flex-direction: column;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .about-image {
                margin-top: 20px;
                margin-right: 0;
            }
            .about-title{
                margin: 0 auto;
            }

            /* For smaller screens, stack the contact details */
            .contact-row {
                flex-direction: column;
            }

            .contact-box {
                width: 100%; /* Take full width on smaller screens */
                margin-bottom: 10px;
            }

        }

        /* Style for the contact box */
        .contact-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .contact-box {
            background-color: #D9D9D9; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1;
            min-width: 200px;
            text-align: center;
        }

        .contact-box h3 {
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        .contact-box p {
            margin: 5px 0;
            
        }
    </style>
</head>
<body>

    <?php include('../header2.php') ?>

    <header>
        <section class="about-container">
            <div class="about-content">
                <h1 class="about-title">About Us</h1>
            </div>
            <img class="about-image" src="../assets/profile.jpg" alt="About Us Image">
        </section>
    </header>

    <section id="mission">
        <div class="container">
            <div class="box">
                <h3>Our Mission</h3>
                <p>Our mission is to empower patients and healthcare providers with transparent, accurate, and accessible medicine price information. By providing real-time data, price comparisons, and cost-saving alternatives, we help users make informed decisions and promote affordable healthcare. Our commitment to transparency and innovation ensures a seamless experience for everyone seeking reliable medication pricing.</p>
            </div>
        </div>
    </section>

    <section id="story">
        <div class="container">
            <div class="box">
                <h3>Our Story</h3>
                <p>The idea for Medicine Price Info was born out of our personal experience. We witnessed firsthand the challenges of navigating the complex landscape of medicine pricing. We realized there was a critical need for a reliable and accessible source of information, and we set out to create it.</p>
            </div>
        </div>
    </section>

    <section id="what-we-do">
        <div class="container">
            <div class="box">
                <h3>What We Do</h3>
                <p>We gather and compile medicine price data from various sources, including pharmacies, databases, and government organizations. Our platform allows users to easily search for specific medications, compare prices across different providers, and find potential savings. We also provide professional directories and information on common diseases.</p>
            </div>
        </div>
    </section>

    <section id="values">
        <div class="container">
            <div class="box">
                <h3>Our Values</h3>
                <ul>
                    <li><strong>Accuracy:</strong> Providing reliable and up-to-date price information.</li>
                    <li><strong>Transparency:</strong> Clearly disclosing our data sources and methodologies.</li>
                    <li><strong>Accessibility:</strong> Ensuring our platform is easy to use and accessible to everyone.</li>
                    <li><strong>Objectivity:</strong> Presenting information in a neutral and unbiased manner.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Updated Contact Us Section -->
    <section id="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <div class="contact-row">
                <div class="contact-box">
                    <h3 class="name">Atul Patle</h3>
                    <p><strong>Email:</strong> <a class="email" onclick="sendEmail()">atulpatle006@gmail.com</a>
                    <p><strong>Phone:</strong> <a href="tel:+919322115602">9322115602</a></p>
                </div>
                <div class="contact-box">
                    <h3 class="name">Ritik Bhure</h3>
                    <p><strong>Email:</strong><a class="email" onclick="sendEmail()">bhureritik55@gmail.com</a>
                    <p><strong>Phone:</strong><a href="tel:+917038242172">7038242172</a></p>
                </div>
                <div class="contact-box">
                    <h3 class="name">Nilesh Pardhi</h3>
                    <p><strong>Email:</strong><a class="email" onclick="sendEmail()">npardhi83@gmail.com</a>
                    <p><strong>Phone:</strong><a href="tel:+919370971691">9370971691</a></p>
                </div>
                <div class="contact-box">
                    <h3 class="name">Thaneshwar Meshram</h3>
                    <p><strong>Email:</strong><a class="email" onclick="sendEmail()">meshramthaneshwar@gmail.com</a>
                    <p><strong>Phone:</strong><a href="tel:+919322383804">9322383804</a></p>
                </div>
            </div>
        </div>
    </section>

     
     <?php include('../Footer2.php') ?>

<script>
    // for sub menu
function showmenu() {
    const show = document.querySelector(".sidebar");
    show.style.display = 'flex';
}

function closemenu() {
    const show = document.querySelector(".sidebar");
    show.style.display = 'none';
}
// Scroll Animation
document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("section");

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        },
        { threshold: 0.2 } // Trigger when 20% of the element is visible
    );

    sections.forEach((section) => {
        section.classList.add("fade-in"); // Initial hidden state
        observer.observe(section);
    });
});

</script>

<script>
        function addPost() {
            let postText = document.getElementById('postContent').value;
            if (postText.trim() === '') return;
            
            let postDiv = document.createElement('div');
            postDiv.classList.add('post');
            postDiv.innerHTML = `<p class='username'>New User</p><p class='content'>${postText}</p><button class='delete-btn' onclick='deletePost(this)'>Delete</button>`;
            
            document.getElementById('posts').appendChild(postDiv);
            document.getElementById('postContent').value = '';
        }
        
        function deletePost(button) {
            button.parentElement.remove();
        }

        function sendEmail() {
            window.location.href = "mailto:medicinfo01@gmail.com";
        }
    </script>
</body>
</html>