<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - MedicInfo</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .faq-container {
            max-width: 800px;
            margin: auto;
            background: white;
            color:rgb(37, 47, 29);
            padding: 20px;
            border-radius: 10px;
            
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .content{
            background-color: #008CBA;
            align-items: center;
            text-align: center;
            font-size: 1.2em;
            padding: 10px;
            margin-top: 5px;
        }
        .faq-item {
            margin-bottom: 10px;
        }
        .question {
            background: #D9D9D9;
            color: black;
            padding: 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1.1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }
        .answer {
            display: none;
            padding: 15px;
            background: #e9ecef;
            border-left: 4px solid #007BFF;
            margin-bottom: 30px;
            margin-top: 5px;
            border-radius: 5px;
            transition: max-height 0.3s ease-out;
        }
        .question:after {
            content: '\25BC';
            font-size: 1em;
        }
        .question.active:after {
            content: '\25B2';
        }
        @media (max-width: 600px) {
            .faq-container {
                width: 90%;
                padding: 15px;
            }
            .question {
                font-size: 1em;
                padding: 10px;
            }
            .answer {
                font-size: 0.9em;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<?php include('../header2.php'); ?>

<div class="content">
<h1>Frequently Asked Questions - MedicInfo</h1>
</div>
    <div class="faq-container">
        
        <div class="faq-item">
            <div class="question">What is MedicInfo?</div>
            <div class="answer">MedicInfo is an online platform that provides accurate and up-to-date information on medicine prices and availability.</div>
        </div>
        <div class="faq-item">
            <div class="question">How do you update medicine prices?</div>
            <div class="answer">We source our data from verified pharmacies and suppliers, updating prices regularly to ensure accuracy.</div>
        </div>
        <div class="faq-item">
            <div class="question">Is the information on MedicInfo free?</div>
            <div class="answer">Yes, all the information provided on MedicInfo is completely free for users.</div>
        </div>
        <div class="faq-item">
            <div class="question">Do you provide information on generic alternatives?</div>
            <div class="answer">Yes, MedicInfo includes details about generic alternatives to help users find cost-effective medicine options.</div>
        </div>
        <div class="faq-item">
            <div class="question">How can I contact customer support?</div>
            <div class="answer">You can contact our support team via email at medicinfo01@gmail.com or through our contact form on the website.</div>
        </div>
        <div class="faq-item">
            <div class="question">How do I report incorrect information?</div>
            <div class="answer">If you find incorrect information, please use the "Report an Issue" button on our website to contact us.</div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.question').forEach(item => {
            item.addEventListener('click', () => {
                item.classList.toggle('active');
                let answer = item.nextElementSibling;
                answer.style.display = (answer.style.display === 'block') ? 'none' : 'block';
            });
        });
    </script>
<?php include('../Footer2.php'); ?>
</body>
</html>