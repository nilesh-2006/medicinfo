<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guidance page</title>
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

        .guidance-container {
            display: flex;
            padding: 10px;
            background-color: #008CBA;
            color: white;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 5px;
        }

        .guidance-content {
            flex: 1;
            margin-right: 20px;
            
        }

        .guidance-title {
            font-size: 4rem;
            margin-bottom: 10px;
            align-items: center;
            text-align: center;
            font-weight: bold;
        }

        .guidance-title h2 {
            color: white;
        }

        .guidance-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .guidance-stat {
            text-align: center;
        }

        .guidance-stat-number {
            font-size: 1.5em;
            font-weight: bold;
        }

        .guidance-image {
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

            .guidance-content {
                margin-right: 0;
                margin-left: -20px;
            }

            .guidance-container {
                margin-right: 0;
                flex-direction: column;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .guidance-image {
                margin-top: 20px;
                margin-right: 0;
            }
            .guidance-title{
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
        <section class="guidance-container">
            <div class="guidance-content">
                <h1 class="guidance-title">Guidance</h1>
            </div>
           
        </section>
    </header>

    <section id="mission">
        <div class="container">
            <div class="box">
            <h3>Introduction</h3>
            <p>Welcome to the guidance page for our medicine price information source. This resource aims to provide users with accurate and up-to-date pricing information for various medications. Please read the following guidelines to effectively use this tool.</p>
            </div>
        </div>
    </section>

    <section id="story">
        <div class="container">
            <div class="box">
            <h3>How to Use This Resource</h3>
            <ul>
                <li><strong>Search Functionality:</strong> Use the search bar to enter the name of the medicine you are looking for. Ensure correct spelling for accurate results.</li>
                <li><strong>Filtering Options:</strong> Use available filters (if provided) to refine your search by brand, generic name, dosage, or location.</li>
                <li><strong>Viewing Results:</strong> The search results will display the medicine name, price, available pharmacies, and other relevant information.</li>
                <li><strong>Price Comparison:</strong> Compare prices from different sources to find the best deals.</li>
                <li><strong>Location-Based Information:</strong> If location services are enabled, the results will prioritize pharmacies near you.</li>
            </ul>
            </div>
        </div>
    </section>

    <section id="what-we-do">
        <div class="container">
            <div class="box">
            <h3>Important Considerations</h3>
            <p class="important"><strong>Disclaimer:</strong> The information provided here is for general knowledge and comparison purposes only. It should not be considered medical advice. Always consult with a healthcare professional before making any decisions regarding your medication.</p>
            <ul>
                <li>Prices are subject to change and may vary between pharmacies.</li>
                <li>Availability of medications may also vary.</li>
                <li>Verify the authenticity and reliability of the pharmacy before making a purchase.</li>
                <li>Be aware of potential scams and fraudulent online pharmacies.</li>
            </ul>
            </div>
        </div>
    </section>

    <section id="values">
        <div class="container">
            <div class="box">
            <h3>Data Sources and Accuracy</h3>
            <p>We strive to provide accurate and up-to-date information. Our data is sourced from reputable pharmacies, pharmaceutical companies, and publicly available databases. However, we cannot guarantee 100% accuracy. If you find any discrepancies, please report them to us.</p>
            </div>
        </div>
    </section>

    <section id="values">
        <div class="container">
            <div class="box">
           <h3>Reporting Issues and Feedback</h3>
            <p>If you encounter any issues or have feedback, please Customer Feedback through the provided  information or feedback form. We value your input and are committed to improving this resource.</p>
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