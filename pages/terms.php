<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms</title>
    <style>
       /* General Styles */
       body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-color: #f4f4f4;
        }

        /* Content Box */
        

        .content, h1 {
            color: white;
            text-align: center;
            align-items: center;
            background-color: #008CBA;
            padding: 10px ;
            margin: 0;
            margin-bottom: 30px;
            margin-top: 5px;
            font-size: 28px;
        }
        /* Section Boxes */
        .content-box {
            max-width: 85%;
            margin: 20px auto;
            padding: 20px;
            background: #D9D9D9;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        /* Terms Section */
        .terms-section h2 {
            color: #2980b9;
            padding-bottom: 5px;
            border-bottom: 2px solid #ddd;
        }

        .terms-section h3 {
            color: #16a085;
            margin-top: 20px;
        }

        /* Example Box */
        .example {
            background-color:rgb(240, 236, 236);
            border-left: 4px solid #3498db;
            padding: 15px;
            margin: 15px 0;
            font-style: italic;
            border-radius: 0 4px 4px 0;
        }

        /* Disclaimer Box */
        .disclaimer {
            background-color: #fff3f3;
            border-left: 4px solid #ff6b6b;
            padding: 15px;
            margin: 15px 0;
            border-radius: 0 4px 4px 0;
        }

        /* Job Listings */
        .job-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            padding: 10px 0;
        }

        .job-item {
            background: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #3498db;
            border-radius: 5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .job-item strong {
            color: #2c3e50;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .job-list {
                grid-template-columns: 1fr;
            }
            .content-box {
                padding: 15px;
                margin: 15px;
            }
        }
    </style>
</head>
<body>
<?php include('../header2.php') ?>
<header>
<div class="content">
       <h1>Terms Of Use</h1>
    </div>
</header>
    
    
    <div class="content-box">
        <section class="terms-section">
            <h2>Terms of Use Section</h2>
        </section>
    </div>
    
    <div class="content-box">
        <section class="terms-section">
            <h3>Disclaimer of Liability</h3>
            <p>Clearly state that the price information is for informational purposes only and should not be considered medical advice. Emphasize that users should consult with a healthcare professional before making any decisions based on the information provided.</p>
            
            <div class="disclaimer">
                "The price information provided is for general knowledge and informational purposes only, and does not constitute medical advice. Always consult with a qualified healthcare professional for any health concerns or before making any decisions related to your health or treatment."
            </div>
            
            <p>State that the project is not responsible for any inacuracies.</p>
            
            <div class="disclaimer">
                "We do not guarantee the accuracy, completeness, or timeliness of the information provided. We are not liable for any errors or omissions in the content."
            </div>
        </section>
    </div>
    
    <div class="content-box">
        <section class="terms-section">
            <h3>User Responsibility</h3>
            <p>Explain that users are responsible for verifying the price information with their local pharmacies or healthcare providers. State that prices may vary depending on location, pharmacy, and insurance coverage.</p>
            
            <div class="example">
                "Users are responsible for verifying the current price information with their local pharmacies or healthcare providers. Prices may vary based on location, pharmacy, and individual insurance coverage."
            </div>
        </section>
    </div>
    
    <div class="content-box">
        <section class="terms-section">
            <h3>Data Usage and Privacy</h3>
            <p>Outline how user data is collected, stored, and used. Comply with relevant privacy laws and regulations (e.g., GDPR, HIPAA). Address the use of cookies and other tracking technologies.</p>
            
            <div class="example">
                "We collect and use user data in accordance with our Privacy Policy. We do not share personal information with third parties without your consent."
            </div>
        </section>
    </div>
    
    <div class="content-box">
        <section class="terms-section">
            <h3>Changes to Terms</h3>
            <p>Reserve the right to modify the Terms of Use at any time. Explain how users will be notified of changes.</p>
            
            <div class="example">
                "We reserve the right to modify these Terms of Use at any time. Changes will be posted on this page, and users are encouraged to review the Terms periodically."
            </div>
        </section>
    </div>
    
    <div class="content-box">
        <section class="terms-section">
            <h3>Prohibited Uses</h3>
            <p>Detail any prohibited uses of the site, such as scraping data, or using the site for illegal activities.</p>
        </section>
    </div>
    
    <?php include('../Footer2.php') ?>
</body>
</html>