<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Medical Center</title>
    
    <style>
            /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            background-color: #f4f4f4;
        }
        .service1 {
            margin-top: 5px;
        }
        .header,h1{
            
            background-color: #008CBA; /* Or any color you prefer */
            color: white;
            text-align: center;
            padding: 10px ;
            margin-bottom: 20px;
            
            /* Space between header and content */
        }

        .header h1 {
            margin: 0; /* Remove default margin for h1 */
            font-size: 2em; /* Adjust font size as needed */
        }


        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
           
        }

        .services-section {
            background-color: #f4f4f4;
            padding: 50px 0;
        }

        .services-section h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #1e5295;
            background-color: rgb(213, 218, 222);
        }

        .services-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .service {
            background-color: #ecf0f1;
            border-radius: 8px;
            padding: 70px;
            width: calc(50% - 20px); /* Two services per row */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease-in-out; /* Smooth transition for all changes */
        }

        .service h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: #2a5077;
            transition: color 0.3s ease-in-out; /* Smooth transition for text color change */
        }

        .service p {
            font-size: 1rem;
            color: #565a5a;
        }

        /* Hover effect for the service box */
        .service:hover {
            background-color: #d1e7f7; /* Light blue background on hover */
            transform: scale(1.05); /* Slightly scale up the service box */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Deeper shadow for more emphasis */
        }

        /* Hover effect for the heading */
        .service:hover h3 {
            color: #a85a5a; /* Change text color of the heading when hovered */
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .service {
                width: calc(50% - 20px); /* Two services per row on medium devices */
            }
        }

        @media (max-width: 480px) {
            .service {
                width: 100%; /* One item per row on small devices */
            }

            nav ul li {
                display: block;
                margin-bottom: 10px;
            }
        }

    </style>
</head>
<body>
<?php include('../header2.php') ?>
    <header class="service1">
    <h1>Our Services</h1>
    </header>
    <section id="services" class="services-section">
        <div class="container">
            
            <div class="services-list">
                <div class="service">
                    <h3>General Consultation</h3>
                    <p>A meeting with a professional, like a doctor or lawyer, to discuss a specific issue or get advice. </p>
                </div>
                <div class="service">
                    <h3>Emergency Care</h3>
                    <p>The quick medical care for conditions that require immediate attention to prevent death or disability</p>
                </div>
                <!-- New Service Added -->
                <div class="service">
                    <h3>Home Delivery of Medications </h3>
                    <p>We offer the convenience of home delivery for medications and healthcare products, ensuring that you receive your essential items safely at your doorstep.</p>
                </div>
                <div class="service">
                    <h3>Medication Counseling</h3>
                    <p>Expert advice on how to properly take medications, understanding potential side effects, and answering any questions about drug interactions.</p>
                </div>
                <div class="service">
                    <h3>Finding Nearest Medical </h3>
                    <p>If you want the location of a medical store from your real-time location, this feature is also included.</p>
                </div>
                
            </div>
        </div>
    </section>

    <?php include('../Footer2.php') ?>
</body>
</html>