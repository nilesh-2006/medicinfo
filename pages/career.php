<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers - MedicInfo</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Content Header */
        .content, h1 {
            color: white;
            text-align: center;
            background-color: #008CBA;
            padding: 10px ;
            margin: 0;
            margin-bottom: 30px;
            margin-top: 5px;
            font-size: 28px;
        }

        /* Main Section Container */
        .careers-section {
            max-width: 85%;
            margin: 0 auto 40px;
            padding: 0 20px;
        }

        /* Section Blocks */
        .section-block {
            background: #D9D9D9;
            padding: 30px;
            margin-bottom: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            cursor: pointer;
        }

        /* Headings */
        .careers-section h2 {
            color: #2c3e50;
            font-size: 26px;
            margin-top: 0;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eaeaea;
        }

        .careers-section h3 {
            color: #0056b3;
            font-size: 20px;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        /* Paragraphs */
        .careers-section p {
            margin-bottom: 15px;
            color: #555;
        }

        /* Quote/Example Box */
        .example {
            background-color:rgb(240, 236, 236);
            border-left: 4px solid #3498db;
            padding: 15px;
            margin: 20px 0;
            border-radius: 0 4px 4px 0;
            font-style: italic;
            color: #444;
        }

        /* Job Listings */
        .job-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 20px 0;
        }

        .job-item {
            background: rgb(240, 236, 236);
            padding: 20px;
            border-left: 4px solid #3498db;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .job-item strong {
            color: #2c3e50;
            font-size: 18px;
            display: block;
            margin-bottom: 10px;
        }

        /* Lists */
        .careers-section ul {
            padding-left: 20px;
            margin: 15px 0;
        }

        .careers-section li {
            margin-bottom: 8px;
            color: #555;
        }

               

        /* Responsive Design */
        @media (max-width: 768px) {
            .job-list {
                grid-template-columns: 1fr;
            }
            
            .section-block {
                padding: 20px;
            }
            
            .content h1 {
                font-size: 24px;
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .content h1 {
                font-size: 22px;
                padding: 15px;
            }
            
            .careers-section h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
<?php include('../header2.php') ?>
<header>
        <div class="content">
            <h1>Careers at MedicInfo</h1>
        </div>
</header>
   
    

<div class="careers-section">
    <div class="section-block">
        <h2>About Our Careers</h2>
        
        <h3>Data Sourcing and Updates</h3>
        <p>We gather price data from pharmacies, manufacturers, and public databases, updating it daily for accuracy.</p>
        
        <div class="example">
            "Price data is updated daily from a network of participating pharmacies and is subject to change. We also utilize manufacturer-published data when available."
        </div>
    </div>
    
    <div class="section-block">
        <h3>Editorial Policy</h3>
        <p>Our content is reviewed for accuracy and impartiality, maintaining strict independence from advertisers.</p>
        
        <div class="example">
            "Editorial content is reviewed for accuracy and impartiality. We maintain strict independence from pharmaceutical companies and advertisers."
        </div>
    </div>
    
    <div class="section-block">
        <h2>Career Opportunities</h2>
        
        <h3>Current Openings</h3>
        <p>We are looking for passionate professionals to join our team:</p>
        
        <div class="job-list">
            <div class="job-item">
                <strong>Pharmaceutical Data Analyst</strong>  
                <p>Analyze pharmaceutical pricing trends and ensure data accuracy.</p>
            </div>
            <div class="job-item">
                <strong>Healthcare Content Writer</strong>  
                <p>Write informative articles on medicine and healthcare.</p>
            </div>
            <div class="job-item">
                <strong>Software Developer</strong>  
                <p>Build and maintain our healthcare platform.</p>
            </div>
            <div class="job-item">
                <strong>Marketing Specialist</strong>  
                <p>Promote our services and engage with healthcare professionals.</p>
            </div>
        </div>
    </div>

    <div class="section-block">
        <h3>Why Join Us?</h3>
        <ul>
            <li>Competitive salaries and benefits</li>
            <li>Opportunities for career growth</li>
            <li>Collaborative and innovative work environment</li>
            <li>Flexible work options (remote/hybrid available)</li>
        </ul>
    </div>

    <div class="section-block">
        <h3>How to Apply?</h3>
        <p>Interested? Send your resume to </p>
            <div class="email-address" onclick="sendEmail()">
              <p class="email">medicinfo01@gmail.com</p>  
        </div>
    </div>
</div>

<script>
        function sendEmail() {
            window.location.href = "mailto:medicinfo01@gmail.com";
        }
    </script> 

<?php include('../Footer2.php') ?>
</body>
</html>