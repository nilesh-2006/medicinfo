<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medicine Price Information Source</title>
        <!-- Bootstrap CSS Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Bootstrap JS Link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <style>
            body{
                font-family: 'Times New Roman', Times, serif;
            
            }

            .info{
                padding: 3%;
            }

            .card {
                border-color:rgb(88, 52, 52);
                background-color:rgb(224, 217, 219);
                animation-fill-mode:inherit;
            }
            .card img{
                width: 100%;
                height: auto;
                max-height: 300px; /* Prevent image from getting too large */
                object-fit: cover;
            }
            .card-title{
                text-align: center;
                font-weight: bold;
                color: rgb(105, 53, 53);
            }
            .row{
                margin-bottom: 3%;
                margin-top: 3%;
            }

            /* Responsive adjustments */
            @media (max-width: 767px) {
                
                .info {
                    padding: 2%; /* Reduce padding on smaller screens */
                }
                .info img {
                    max-width: 100%; /* Ensure images are appropriately sized on mobile */
                }
                .card-body {
                    padding: 10px; /* Adjust card padding for small screens */
                }
            }

            @media (min-width: 768px) {
                .info img {
                    max-width: 90%; /* Image width adjustment for tablets and above */
                }
                .card-body {
                    padding: 15px; /* Increase padding for larger screens */
                }
            }
            
        </style>

    </head>

    <body>

        <!-- Price Conformation -->
        <div class="container">
            <div class="row g-0 text-center">
                <h3 style="font-weight:bold;"> Trusted drug pricing data when and how you need it</h3>
                <div class="col-md-3 info">
                    <img src="./assets/person-graph.svg" alt="Trusted Content"><br>
                    Trusted Content<br> <p>Have confidence in our data it’s consistently the choice of prominent healthcare companies in the PBM, retail pharmacy, EMR, health insurance, and financial services industries.</p>
                </div>
                <div class="col-md-3 info">
                    <img src="./assets/person-circle-arrows.svg" alt="Ease of Use, Speed and Efficiency"><br>
                    Ease of Use, Speed and Efficiency<br> <p>Turnkey solution allows you to access pricing data without additional IT setup and that enables you to search by manufacturer, trade and generic name, NDC, UPC, HRI, USC, or the Medi-Span generic product identifier (GPI) therapeutic classification system.</p>
                </div>
                <div class="col-md-3 info">
                    <img src="./assets/graph-up.svg" alt="Quality and Depth of Data"><br>
                    Quality and Depth of Data<br> <p>Drug pricing information that is unbiased and delivered at an unmatched pace ensures you have the relevant information you are seeking.<br>Price Rx provides new and historical pricing data for more than 180,000 active and inactive drug products and pricing for a large list of benchmarks including AWP, ASP, DP, NADAC, WAC, ACA FUL, and Weighted Average AMP.</p>
                </div>
                <div class="col-md-3 info">
                    <img src="./assets/hands-shake.svg" alt="World-class Customer Service"><br>
                    World-class Customer Service<br> <p>Price Rx requires no implementation you can just hop on the internet and log in to your subscription.<br>If you have any questions we’re standing by, ready to offer attentive, personalized assistance.</p>
                </div>
            </div>
        </div>

        <!-- Common Disease and Its Related Medicine or Doctor -->
        <div class="container">
        <div class="cont">
            <div class="row row-cols-1 row-cols-md-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="./assets/fever.jpg" class="card-img-top" alt="Fever (Flu)">
                        <div class="card-body">
                            <h5 class="card-title">Fever (Flu)</h5>
                            <p class="card-text"> <span style="font-weight:bold;">Medicine:</span> Acetaminophen(Tylenol) and Ibuprofen(Advil, Motrin)<br>
                            <span style="font-weight:bold;">Doctor:</span> Dr. K S Walia (Delhi)<br> Dr. Ashwitha R Nayak (Bangalore)
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100">
                        <img src="./assets/smoking.jpg" class="card-img-top" alt="Tobacco (Smoking)">
                        <div class="card-body">
                            <h5 class="card-title">Tobacco (Smoking)</h5>
                            <p class="card-text"><span style="font-weight:bold;">Medicine:</span> Nicotine Replacement Therapies and Pills <br>
                            <span style="font-weight:bold;">Doctor:</span> Dr. Sandeep Budhiraja (Delhi)<br> Dr. Ajit Dandekar (Mumbai)
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100">
                        <img src="./assets/malaria.jpg" class="card-img-top" alt="Malaria (Dengue)">
                        <div class="card-body">
                            <h5 class="card-title">Malaria (Dengue)</h5>
                            <p class="card-text"><span style="font-weight:bold;">Medicine:</span> Chloroquine, Atovaquone-Proguanil and Mefloquine<br>
                            <span style="font-weight:bold;">Doctor:</span> Dr. Abdul Ghafur (Chennai)<br> Dr. Asso Prof Laxman Jessani (Mumbai)
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100">
                        <img src="./assets/skin.jpg" class="card-img-top" alt="Impetigo (Skin Infection)">
                        <div class="card-body">
                            <h5 class="card-title">Impetigo (Skin Infection)</h5>
                            <p class="card-text"><span style="font-weight:bold;">Medicine:</span> Antifungal Creams, Cephalosporins and Telavancin<br>
                            <span style="font-weight:bold;">Doctor:</span> Dr. Ajita Bagai Kakkar (Delhi)<br> Dr. Manmohan Lohra (Delhi)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script>
            // JavaScript to handle hover effect 
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseover', () => {
                    card.style.transform = "scale(1.05)";
                    card.style.transition = "transform 0.3s ease, box-shadow 0.3s ease";
                    card.style.boxShadow = "0px 10px 20px rgba(0, 0, 0, 0.15)";
                    const img = card.querySelector('.card-img-top');
                    if (img) {
                        img.style.transform = "scale(1.05)";
                        img.style.transition = "transform 0.3s ease";
                    }
                });

                card.addEventListener('mouseout', () => {
                    card.style.transform = "scale(1)";
                    card.style.boxShadow = "none";
                    const img = card.querySelector('.card-img-top');
                    if (img) {
                        img.style.transform = "scale(1)";
                    }
                });
            });
        </script>
         
         
    </body>
    
</html>
