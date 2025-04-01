<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Pharmaceutical Information</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .header {
            background-color: #008CBA;
            text-align: center;
            padding: 10px;
            color: white;
            margin-top: 5px;
            font-size: 28px;
        }
        
        h1, h2, h3, h4 {
            color: #2c3e50;
        }
        
        /* Contact Section */
        .contact-section {
            
            padding: 30px;
            border-radius: 8px;
            margin: 30px auto;
            max-width: 85%;
        }
        
        /* Email Box */
        .email-address {
            font-size: 1.2em;
            font-weight: bold;
            color: #0056b3;
            margin: 25px 0;
            padding: 20px;
            background-color: #f0f7ff;
            border-left: 4px solid #3498db;
            border-radius: 0 4px 4px 0;
            display: inline-block;
            word-break: break-word;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .email-address:hover {
            background-color: #e1f0ff;
            transform: translateY(-2px);
        }
        
        /* Info Boxes */
        .important-info, .suggestion-box {
            background-color: #D9D9D9;
            padding: 25px;
            border-radius: 6px;
            margin: 30px 0;
           
            box-shadow: 0 2px 5px rgba(0,0,0,0.03);
        }
        
       
        
        .disclaimer {
            color: #e74c3c;
            font-weight: bold;
            padding: 10px;
            border-radius: 4px;
            display: inline-block;
        }
        
        .thank-you {
            font-style: italic;
            color: #27ae60;
            margin-top: 25px;
            padding: 15px;
            background-color: #D9D9D9;
            border-radius: 4px;
            text-align: center;
        }
        
        ul {
            padding-left: 20px;
        }
        
        li {
            margin-bottom: 8px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            
            .contact-section {
                padding: 20px;
                margin: 20px auto;
            }
            
            .email-address {
                font-size: 1em;
                display: block;
                padding: 15px;
                margin: 20px 0;
            }
            
            .header h1 {
                padding: 20px;
                font-size: 24px;
            }
            
            .important-info, .suggestion-box {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
<?php include('../header2.php') ?>
    <div class="header">
       <h1>Contact Us</h1>
    </div>
    
    <section class="contact-section">
        <h2>Email Contact</h2>
        
        <div class="email-address" onclick="sendEmail()">
          <p class="email">medicinfo01@gmail.com</p>  
        </div>
        
        <div class="important-info">
            <h3>Important Information</h3>
            <p class="disclaimer">Clear Disclaimers: We do not provide medical advice or price-quote services through this email.</p>
            <p><strong>Data Correction Instructions:</strong> If you find inaccurate information, please include:</p>
            <ul>
                <li>The name of the medication</li>
                <li>The incorrect data you found</li>
                <li>The correct information (if known)</li>
                <li>Source of the correct information (if available)</li>
            </ul>
            <p><strong>Response Time Expectation:</strong> We typically respond within 2-3 business days.</p>
        </div>
        
        <div class="suggestion-box">
            <h4>Suggested Subject Lines:</h4>
            <p>For faster response, consider using these subject lines:</p>
            <ul>
                <li>"Subject: Inaccurate Data Report"</li>
                <li>"Subject: General Inquiry"</li>
                <li>"Subject: Career Opportunity"</li>
            </ul>
        </div>
        
        <p class="thank-you">Thank you for reaching out to us. We value your feedback and will do our best to assist you.</p>
    </section>
    <?php include('../Footer2.php') ?>

    <script>
        function sendEmail() {
            window.location.href = "mailto:medicinfo01@gmail.com";
        }
    </script>
</body>
</html>