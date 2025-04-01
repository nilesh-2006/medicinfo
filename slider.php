<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Show Banner</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .slideshow-container {
            position: relative;
            width: 100%;
            max-width: 100%;
            margin: auto;
            overflow: hidden;
        }

       .slideshow-container img {
            width: 100%;
            height: 400px;
            /* object-fit: cover; */
            display: none;
        }

        .text {
            display: none;
            text-align: center;
            font-size: 24px;
            /* margin: 20px 0; */
            color: white;
            font-weight: bold;
            position: absolute;
            /* bottom: 20px; */
            width: 100%;
            background: rgba(46, 41, 41, 0.5);
            /* padding: 10px; */
        }

        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            border-radius: 50%;
            background-color: #bbb;
            display: inline-block;
            cursor: pointer;
        }

        .active {
            background-color:rgb(41, 37, 37);
        }

        .prev, .next {
            position: absolute;
            top: 50%;
            padding: 16px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            cursor: pointer;
            user-select: none;
            z-index: 100;
        }

        .prev {
            left: 0;
            border-radius: 0 3px 3px 0;
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        @media (max-width: 768px) {
            .slideshow-container img {
            width: 100%;
            height: 200px;
            /* object-fit: cover; */
            display: none;
        }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="slideshow-container">
           <!-- Image 1 -->
           <img src="assets/slider/image1.jpeg" alt="Flipkart">
            <!-- Image 2 -->
            <img src="assets/slider/image2.jpeg" alt="Amazon">
            <!-- Image 3 -->
            <img src="assets/slider/image3.jpeg" alt="MSBTE">
            <!-- Image 4 -->
            <img src="assets/slider/image4.jpeg" alt="MSBTE">
            <!-- Image 4 -->
            <img src="assets/slider/image5.jpeg" alt="MSBTE">
            
            
            <!-- Navigation arrows -->
            <a class="prev" onclick="plusslides(-1)">&#10094;</a>
            <a class="next" onclick="plusslides(1)">&#10095;</a>
        </div>

        <div class="text-center mt-3">
            <span class="dot" onclick="currentslide(1)"></span>
            <span class="dot" onclick="currentslide(2)"></span>
            <span class="dot" onclick="currentslide(3)"></span>
            <span class="dot" onclick="currentslide(4)"></span>
            <span class="dot" onclick="currentslide(5)"></span>
        </div>
    </div>

    <script>
        let slideindex = 1;
        showslides(slideindex);

        // Next/previous controls
        function plusslides(n) {
            showslides(slideindex += n);
        }

        // Thumbnail image controls
        function currentslide(n) {
            showslides(slideindex = n);
        }

        // Show slides
        function showslides(n) {
            let i;
            let slides = document.querySelectorAll('.slideshow-container img'); // Directly target images
            let dots = document.getElementsByClassName('dot');

            if (n > slides.length) { slideindex = 1; }
            if (n < 1) { slideindex = slides.length; }

            // Hide all images
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none"; 
            }

            // Reset active dot style
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }

            // Show the current image
            slides[slideindex - 1].style.display = "block";
            dots[slideindex - 1].className += " active"; // Add active class to current dot
        }

        // Automatically change slides every 3 seconds
        setInterval(() => {
            plusslides(1);
        }, 3000);
    </script>
    
</body>
</html>