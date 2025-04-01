<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy</title>
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
            background-color:#F6EFEF;
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

        ul{
            padding: 20px;
        }
        .about-container {
            display: flex;
            padding: 10px;
            background-color: #008CBA;
            color: white;
            flex-wrap: wrap;
            align-items: center;
            flex-direction: column;
            text-align: center;
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
            align-items: center;
            text-align: center;
            font-weight: bold;
        }

        .about-title h2 {
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

        }   
    </style>
</head>
<body>

    <?php include('../header2.php') ?>

    <header>
        <section class="about-container">
            <div class="about-content">
                <h1 class="about-title">Privacy Policy</h1>
            </div>
            
        </section>
    </header>

    <section id="mission">
        <div class="container">
            <div class="box">
            <h3>Introduction</h3>
            <p>Welcome to Medicine Price Information Source. We are committed to protecting your privacy and ensuring transparency in how we handle your data. This policy outlines the types of information we collect, how we use it to enhance your experience, and the security measures we implement to protect it. By using our platform, you agree to the terms outlined in this policy.</p>
            </div>
        </div>
    </section>

    <section id="story">
        <div class="container">
            <div class="box">
            <h3>Information We Collect</h3>
            <p>We may collect:</p>
            <ul>
                <li><strong>Usage Data:</strong> Information about your interactions with the service.</li>
                <li><strong>Device Information:</strong> Data about your device and browser.</li>
                <li><strong>Location Data (Optional):</strong> If enabled, your approximate location.</li>
                <li><strong>Cookies:</strong> To improve user experience.</li>
            </ul>
            </div>
        </div>
    </section>

    <section id="what-we-do">
        <div class="container">
            <div class="box">
            <h3>How We Use Your Information</h3>
            <p>We use your information to:</p>
            <ul>
                <li>Provide and improve the service.</li>
                <li>Analyze usage and trends.</li>
                <li>Personalize your experience.</li>
                <li>Respond to inquiries.</li>
                <li>Send updates (if consented).</li>
            </ul>
            </div>
        </div>
    </section>

    <section id="values">
        <div class="container">
            <div class="box">
            <h3>Sharing Your Information</h3>
            <p>We may share data with:</p>
            <ul>
                <li>Third-party service providers.</li>
                <li>Legal authorities (if required).</li>
                <li>Business partners (anonymized data).</li>
            </ul>
            </div>
        </div>
    </section>

    <section id="values">
        <div class="container">
            <div class="box">
            <h3>Data Security</h3>
            <p>We implement robust security measures, including encryption, secure access controls, and regular audits, to protect user data. However, no online system is 100% secure, so we continuously monitor and enhance our security protocols to minimize risks. Users are encouraged to follow best practices, such as strong passwords and secure connections, to further safeguard their information.</p>
        </div>
    </section>

     
    <section id="values">
        <div class="container">
            <div class="box">
            <h3>Your Rights</h3>
            <p>You have rights to:</p>
            <ul>
                <li>Access your data.</li>
                <li>Correct inaccuracies.</li>
                <li>Request deletion.</li>
                <li>Opt-out of communications.</li>
            </ul>
            </div>
        </div>
    </section>
    
    <section id="values">
        <div class="container">
            <div class="box">
            <h3>Changes to This Policy</h3>
            <p>We may update this policy periodically to reflect changes in our practices or legal requirements. Any modifications will be posted here, and continued use of our platform after updates implies acceptance of the revised policy. We encourage users to review this section regularly.</p>
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
</body>
</html>