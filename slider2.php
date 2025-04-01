<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sites Slider</title>
        <!-- Bootstrap CSS Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Bootstrap JS Link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"             
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
        <style>
            *{
                
                font-family: 'Times New Roman', Times, serif;
            }
            h3{
            color: rgb(78, 48, 48);
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            font-weight: bold;
            font-size: 170%;
            margin-top: 1%;
            margin-bottom: 1%;
            }
            .marquee {
                display: inline-block;
                white-space: nowrap;
                animation: slide 15s linear infinite;
            }
            .slideshow img{
                width: 15%;
                height: 15%;
                padding: 1%;
                border-radius: 10%;
            }
            .bar-line{
                width: 3%;
                height: 1%;
                background-color:rgb(87, 52, 52) ;
                border-radius: 15%; 
                margin-top: 2%;
                margin-bottom: none;
                margin-left: 50%;
                margin-right: 50%;
            }

            /* Make images resize on smaller screens */
            @media (max-width: 768px) {

                h3 {
                    font-size: 140%; /* Adjust header size */
                }
                .slideshow img {
                    width: 20%; /* Increase image size for smaller screens */
                }
            }
            /* Further adjustments for very small screens */
            @media (max-width: 480px) {
                .slideshow img {
                    width: 40%; /* Larger images on small screens */
                }
            }
        </style>
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="main">

                    <div class="bar-line"> 
                    </div>
                    <h3>Sites Related To Health And Medicine</h3>

                    <marquee class="marq" direction="left" direction="right" loop="continuous">
                        <div class="slideshow">
                            <a href="https://cioms.ch/" target="_blank">
                            <img src="./assets/sites/cioms.jpg"> 
                            </a> 
                            <a href="https://drugdatabase.info/resources-for-finding-drug-prices/" target="_blank"> 
                            <img src="./assets/sites/drugs.jpg">
                            </a>
                            <a href="https://www.ima-india.org/ima/free-way-page.php?pid=2" target="_blank">
                            <img src="./assets/sites/ima.jpg">   
                            </a>
                            <a href="https://www.local.gov.uk/topics/social-care-health-and-integration/what-good-health" target="_blank">
                            <img src="./assets/sites/lgs.jpg">
                            </a>
                            <a href="https://medlineplus.gov/organizations/all_organizations.html" target="_blank">
                            <img src="./assets/sites/medicineplus.jpg">
                            </a>
                            <a href="https://www.medicalnewstoday.com/articles/150999" target="_blank">   
                            <img src="./assets/sites/mnt.jpg">
                            </a>
                            <a href="https://www.nih.gov/health-information" target="_blank">
                            <img src="./assets/sites/nih.jpg">   
                            </a>
                            <a href="https:https://www.who.int/" target="_blank">
                            <img src="./assets/sites/who.jpg"> 
                            </a>
                            <a href="https://www.wma.net/who-we-are/about-us/" target="_blank">
                            <img src="./assets/sites/wma.jpg">
                            </a>
                            <a href="https://www.wolterskluwer.com/en/solutions/medi-span/price-rx" target="_blank">
                            <img src="./assets/sites/wolters.jpg"> 
                            </a>  
                        </div>
                    </marquee>

                </div>
            </div>
        </div>
        
    </body>

</html>