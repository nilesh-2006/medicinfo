<?php
// Generate the alphabet list (A-Z)
$alphabets = range('A', 'Z');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alphabet Animations</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .alphabet-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-size: 50px;
            gap: 15px;
        }

        .alphabet {
            margin: 5px;
            padding: 10px;
            transition: transform 2s, opacity 2s;
        }

        .btn-container {
            margin-bottom: 20px;
        }

        .button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 5px;
            cursor: pointer;
            background: linear-gradient(to right,rgb(87, 170, 225),rgb(66, 224, 174));
            color: black;
            border: none;
            border-radius: 5px;
        }

        .button:hover {
            background: linear-gradient(to right, #ff6a00, #ee0979);
        }

        /* Animations for each animation button */
        /* Bounce In */
        @keyframes bounceIn {
            0% {
                transform: translateY(-2000px);
            }
            60% {
                transform: translateY(30px);
            }
            75% {
                transform: translateY(-10px);
            }
            90% {
                transform: translateY(5px);
            }
            100% {
                transform: translateY(0);
            }
        }

        /* Fade In */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Rotate */
        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        /* Pulse */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.5);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Shake */
        @keyframes shake {
            0% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-10px);
            }
            50% {
                transform: translateX(10px);
            }
            75% {
                transform: translateX(-10px);
            }
            100% {
                transform: translateX(0);
            }
        }

        /* Slide In From Left */
        @keyframes slideInFromLeft {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(0);
            }
        }

        /* Zoom In */
        @keyframes zoomIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Flip */
        @keyframes flip {
            0% {
                transform: rotateY(0deg);
            }
            100% {
                transform: rotateY(180deg);
            }
        }

        /* Wobble */
        @keyframes wobble {
            0% {
                transform: rotate(0deg);
            }
            15% {
                transform: rotate(-15deg);
            }
            30% {
                transform: rotate(15deg);
            }
            45% {
                transform: rotate(-15deg);
            }
            60% {
                transform: rotate(15deg);
            }
            100% {
                transform: rotate(0deg);
            }
        }

        /* Slide Up */
        @keyframes slideUp {
            0% {
                transform: translateY(100%);
            }
            100% {
                transform: translateY(0);
            }
        }

        /* Animation classes */
        .bounceIn {
            animation: bounceIn 2s ease-out infinite;
        }

        .fadeIn {
            animation: fadeIn 2s ease-out infinite;
        }

        .rotate {
            animation: rotate 2s linear infinite;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        .shake {
            animation: shake 2s ease infinite;
        }

        .slideInFromLeft {
            animation: slideInFromLeft 2s ease-out infinite;
        }

        .zoomIn {
            animation: zoomIn 2s ease-out infinite;
        }

        .flip {
            animation: flip 2s infinite;
        }

        .wobble {
            animation: wobble 2s ease infinite;
        }

        .slideUp {
            animation: slideUp 2s ease-out infinite;
        }
    </style>
</head>
<body>

    <div class="btn-container">
        <!-- 10 Buttons for each animation -->
        <button class="button" onclick="applyAnimation('bounceIn')">Bounce In</button>
        <button class="button" onclick="applyAnimation('fadeIn')">Fade In</button>
        <button class="button" onclick="applyAnimation('rotate')">Rotate</button>
        <button class="button" onclick="applyAnimation('pulse')">Pulse</button>
        <button class="button" onclick="applyAnimation('shake')">Shake</button>
        <button class="button" onclick="applyAnimation('slideInFromLeft')">Slide In Left</button>
        <button class="button" onclick="applyAnimation('zoomIn')">Zoom In</button>
        <button class="button" onclick="applyAnimation('flip')">Flip</button>
        <button class="button" onclick="applyAnimation('wobble')">Wobble</button>
        <button class="button" onclick="applyAnimation('slideUp')">Slide Up</button>
    </div>

    <div class="alphabet-container">
        <?php
        // Loop through the alphabet array and display each letter
        foreach ($alphabets as $letter) {
            echo "<div class='alphabet'>$letter</div>";
        }
        ?>
    </div>

    <script>
        // Function to apply animation class dynamically
        function applyAnimation(animationClass) {
            // Get all alphabet elements
            const alphabets = document.querySelectorAll('.alphabet');
            
            // Remove any existing animation classes
            alphabets.forEach(function (letter) {
                letter.classList.remove('bounceIn', 'fadeIn', 'rotate', 'pulse', 'shake', 'slideInFromLeft', 'zoomIn', 'flip', 'wobble', 'slideUp');
            });
            
            // Add the selected animation class to all alphabet elements
            alphabets.forEach(function (letter) {
                letter.classList.add(animationClass);
            });
        }
    </script>

</body>
</html>