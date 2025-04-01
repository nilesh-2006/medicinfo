<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Tech - Medicine Price Info</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
       
            padding: 30px;
           
            border-radius: 8px;
            margin-top: -25px;

        }
        .tech-header h1{
             
            display: flex;
            padding: 10px;
            background-color: #008CBA;
            color: white;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 5px;
        
        }
        h1 {
            text-align: center;
            color:rgb(53, 61, 87);
        }
        .tech-section {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #D9D9D9;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .tech-section h2 {
            color: #003a70 !important;
        }
        .tech-section p {
            line-height: 1.6;
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
            .container {
                width: 90%;
                margin: 20px auto;
                padding: 15px;
            }
            .tech-section {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<?php include('../header2.php') ?>
    <header>
        <div class="tech-header">
               <h1>Our Technology</h1>
        </div>
    </header>
    <div class="container">
        
        <div class="tech-section">
            <h2>Data Collection & Processing</h2>
            <p> Our platform aggregates medicine price data from trusted sources, including government bodies, manufacturers, wholesalers, and online pharmacies, ensuring accuracy and real-time updates. We integrate information from health insurance providers, PBMs, and global healthcare organizations like WHO and IQVIA to analyze price trends and ensure transparency. Our system processes and standardizes this data, enabling users to make informed purchasing decisions with reliable and comprehensive pricing information.</p>
        </div>
        <div class="tech-section">
            <h2>Secure & Scalable Infrastructure</h2>
            <p>Our cloud-based system ensures high availability, security, and seamless service by implementing advanced encryption, secure access controls, and regular security audits. Designed for scalability, it efficiently handles growing user demands with automated load balancing, redundant storage, and disaster recovery. Compliance with GDPR, HIPAA, and ISO standards reinforces data privacy, while cutting-edge cloud technologies provide a reliable, efficient, and secure environment for users.</p>
        </div>
        <div class="tech-section">
            <h2>User-Friendly Interface</h2>
            <p>Our intuitive and easy-to-use platform ensures a seamless experience for users searching for medicine prices. With a clean design, smart search, and real-time filters, users can quickly find accurate pricing details. Optimized for both desktop and mobile, the platform offers smooth navigation, personalized recommendations, and multi-language support, making medicine price comparison effortless and efficient.</p>
        </div>
        <div class="tech-section">
            <h2>Real-Time Updates</h2>
            <p>Our system continuously updates medicine price information, ensuring users always access the most recent and accurate data. By integrating with multiple trusted sources, including pharmacies, manufacturers, and regulatory bodies, we provide real-time pricing fluctuations and availability. Automated data synchronization and AI-driven analytics enhance accuracy, keeping users informed with up-to-date and reliable information.</p>
        </div>
        <div class="tech-section">
            <h2>Global Reach</h2>
            <p>Our platform enables medicine price comparisons across multiple regions, providing users with accurate and region-specific pricing data. By integrating data from international regulatory bodies, pharmacies, and healthcare organizations, we ensure transparency and accessibility. Multi-currency support, localized search options, and language adaptability enhance the user experience, helping individuals make informed purchasing decisions worldwide.</p>
        </div>
        <div class="tech-section">
            <h2>Personalized Recommendations</h2>
            <p>We use AI-driven analytics to provide personalized medicine price recommendations based on user preferences, search history, and purchase patterns. Our system suggests cost-effective alternatives, price drop alerts, and nearby pharmacy deals to help users make informed decisions. By analyzing real-time data, we enhance the user experience with tailored suggestions, ensuring convenience and savings.</p>
        </div>
        <div class="tech-section">
            <h2>Multi-Device Accessibility</h2>
            <p>Our platform is designed for seamless access across mobile, tablet, and desktop devices, ensuring a consistent user experience. With a responsive interface, optimized performance, and cross-platform compatibility, users can easily search, compare, and track medicine prices anytime, anywhere. Cloud synchronization allows data to be updated in real-time across devices, enhancing convenience and accessibility.</p>
        </div>
        <div class="tech-section">
            <h2>Advanced Search & Filters</h2>
            <p>Our platform offers advanced search and filtering options, allowing users to refine searches based on price, manufacturer, availability, and medicine type. Smart sorting features help users find the best deals quickly, while real-time updates ensure accurate information. With an intuitive interface, users can easily navigate and compare medicines, enhancing their overall experience.</p>
        </div>
    </div>
    <?php include('../Footer2.php') ?>
</body>
</html>