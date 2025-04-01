<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health & Care</title>
    <style>    
        /* General Styles */
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            text-align: center;
        }

        /* Header */
        .header {
            background-color: #008CBA;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 24px;
            margin-top: 5px;
        }

        /* Main Content */
        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .content h2 {
            color: #007bff;
            font-size: 28px;
        }

        .content p {
            font-size: 18px;
            color: #555;
        }

        /* Services Section */
        .services-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .service {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 300px;
            text-align: center;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .service img {
            width: 100%;
            border-radius: 10px;
            height: 180px;
            object-fit: cover;
        }

        .service h3 {
            font-size: 18px;
            margin: 10px 0;
            color: #007bff;
        }

        .service p {
            font-size: 15px;
            color: #555;
        }

        .service:hover {
            background-color: rgb(227, 232, 236);
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(47, 29, 29, 0.2);
        }

        /* Hidden Pricing Info */
        .pricing-info {
            display: none;
            margin-top: 10px;
            text-align: left;
            font-size: 1em;
            color: #333;
        }

        .service:hover .pricing-info {
            display: block;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .services-container {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <?php include('../header2.php') ?>
    
    <div class="header">
        <h1>Health & Care</h1>
    </div>

    <section class="content">
        <h2>Your Health, Our Priority</h2>
        <p>We provide trusted healthcare products and services to ensure your well-being. Explore expert tips, medication guides, and wellness advice to maintain a healthy lifestyle.</p>
    </section>

    <!-- Services Section -->
    <section class="services-container">
        
        <!-- Free Consultation -->
        <div class="service">
            <img src="../assets/HealthCare/consultation.jpg" alt="Consultation">
            <h3>Free Consultation</h3>
            <p>Get advice from healthcare professionals for your medical concerns.</p>
            <div class="pricing-info">
                <h3>Real-Time Availability & Location-Based Pricing:</h3>
                <ul>
                    <li>Check medicine stock availability in local pharmacies.</li>
                    <li>Use geo-location to provide price details based on the user’s area.</li>
                    <li>Offer home delivery options if partnered with pharmacies.</li>
                </ul>
            </div>
        </div>

        <!-- Wellness Tips -->
        <div class="service">
            <img src="../assets/HealthCare/wellness.jpg" alt="Wellness Tips">
            <h3>Wellness Tips</h3>
            <p>Discover healthy lifestyle habits to improve your daily routine.</p>
            <div class="pricing-info">
                <h3>Sleep & Stress Management:</h3>
                <ul>
                    <li>Educate users on how sleep quality affects medicine effectiveness.</li>
                    <li>Provide relaxation techniques like meditation, deep breathing, or stretching.</li>
                    <li>Share stress-reducing habits to prevent lifestyle-related health issues.</li>
                </ul>
            </div>
        </div>

        <!-- Trusted Medicines -->
        <div class="service">
            <img src="../assets/HealthCare/trustedimage.jpg" alt="Trusted Medicines">
            <h3>Trusted Medicines</h3>
            <p>Buy genuine and approved medicines with expert guidance.</p>
            <div class="pricing-info">
                <h3>Compare Prices from Verified Pharmacies:</h3>
                <ul>
                    <li>Allow users to compare medicine prices across trusted pharmacies.</li>
                    <li>Provide real-time price updates to ensure affordability.</li>
                    <li>Highlight discounted or generic alternatives to expensive medicines.</li>
                </ul>
            </div>
        </div>

        <!-- Health Monitoring -->
        <div class="service">
            <img src="../assets/HealthCare/health.jpg" alt="Health Monitoring">
            <h3>Health Monitoring</h3>
            <p>Track your health metrics and stay informed about your well-being.</p>
            <div class="pricing-info">
                <h3>Personalized Health Insights:</h3>
                <ul>
                    <li>Monitor vital signs like heart rate, blood pressure, and oxygen levels.</li>
                    <li>Receive AI-based health recommendations based on your medical history.</li>
                    <li>Integrate with fitness devices for real-time health tracking.</li>
                </ul>
            </div>
        </div>
    </section>

    <?php include('../Footer2.php') ?>
</body>
</html>