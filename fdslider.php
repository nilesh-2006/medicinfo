<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Slider</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 90%;
            margin: 0 auto;
            padding: 15px;
        }
        
        .container h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
            margin-top: 20px;
            font-size: 1.5rem;
        }
        
        /* Slider Styles */
        .slider-container {
            position: relative;
            margin: 20px auto;
            width: 100%;
            overflow: hidden;
        }
        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease;
        }
        .feedback-card {
            flex: 0 0 calc(100% - 30px);
            min-width: calc(100% - 30px);
            margin: 0 15px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        /* Tablet Styles */
        @media (min-width: 600px) {
            .feedback-card {
                flex: 0 0 calc(50% - 30px);
                min-width: calc(50% - 30px);
            }
            .container h2 {
                font-size: 1.8rem;
                margin-bottom: 25px;
                margin-top: 25px;
            }
        }
        
        /* Larger Tablet Styles */
        @media (min-width: 900px) {
            .feedback-card {
                flex: 0 0 calc(33.333% - 30px);
                min-width: calc(33.333% - 30px);
            }
        }
        
        .stars {
            color: #f1c40f;
            font-size: 20px;
            margin-bottom: 12px;
        }
        .feedback-text {
            font-size: 0.9rem;
            line-height: 1.5;
            color: #555;
            font-style: italic;
            margin-bottom: 15px;
        }
        .author {
            font-weight: bold;
            color: #2c3e50;
            font-size: 0.9rem;
        }
        .slider-nav {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .slider-nav button {
            background: #3498db;
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin: 0 10px;
            cursor: pointer;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .slider-nav button:hover {
            background: #2980b9;
        }
        .slider-nav button:disabled {
            background: #bdc3c7;
            cursor: not-allowed;
        }
        .slider-dots {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .dot {
            width: 10px;
            height: 10px;
            background: #bdc3c7;
            border-radius: 50%;
            margin: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .dot.active {
            background: #3498db;
            transform: scale(1.2);
        }
        .submit-link {
            text-align: center;
            margin-top: 30px;
        }
        .submit-link a {
            display: inline-block;
            padding: 10px 25px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        .submit-link a:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Customer Feedback</h2>
        
        <div class="slider-container">
            <div class="slider-wrapper" id="sliderWrapper">
                <!-- Feedback cards will be loaded here by JavaScript -->
            </div>
            
            <div class="slider-nav">
                <button id="prevBtn" disabled>❮</button>
                <button id="nextBtn">❯</button>
            </div>
            
            <div class="slider-dots" id="sliderDots">
                <!-- Dots will be added by JavaScript -->
            </div>
        </div>
        
        <div class="submit-link">
            <a href="feedback.php">Share Your Feedback</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sliderWrapper = document.getElementById('sliderWrapper');
            const sliderDots = document.getElementById('sliderDots');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            
            let feedbacks = [];
            let currentIndex = 0;
            let cardsPerView = calculateCardsPerView();
            let cardWidth = 0;
            let autoSlideInterval;
            
            function calculateCardsPerView() {
                if (window.innerWidth < 600) return 1;   // Mobile - 1 card
                if (window.innerWidth < 900) return 2;  // Tablet - 2 cards
                return 3;                               // Larger tablet - 3 cards
            }
            
            // Debounce function to prevent excessive resize events
            function debounce(func, wait) {
                let timeout;
                return function() {
                    const context = this, args = arguments;
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        func.apply(context, args);
                    }, wait);
                };
            }
            
            // Fetch feedbacks from server
            fetch('get_feedbacks.php')
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                        return;
                    }
                    
                    feedbacks = data;
                    renderSlider();
                    startAutoSlide();
                    updateNavButtons();
                    
                    window.addEventListener('resize', debounce(function() {
                        const newCardsPerView = calculateCardsPerView();
                        if (newCardsPerView !== cardsPerView) {
                            cardsPerView = newCardsPerView;
                            renderSlider();
                        }
                    }, 250));
                })
                .catch(error => console.error('Error:', error));
            
            function renderSlider() {
                sliderWrapper.innerHTML = '';
                sliderDots.innerHTML = '';
                
                if (feedbacks.length === 0) {
                    sliderWrapper.innerHTML = `
                        <div class="feedback-card" style="flex: 0 0 100%">
                            <div class="feedback-text">
                                No feedbacks yet. Be the first to share your experience!
                            </div>
                        </div>
                    `;
                    return;
                }
                
                // Create cards for each feedback
                feedbacks.forEach(feedback => {
                    const card = document.createElement('div');
                    card.className = 'feedback-card';
                    
                    // Create stars based on rating
                    let stars = '';
                    for (let i = 0; i < 5; i++) {
                        stars += i < feedback.rating ? '★' : '☆';
                    }
                    
                    card.innerHTML = `
                        <div class="stars">${stars}</div>
                        <div class="feedback-text">"${feedback.message}"</div>
                        <div class="author">— ${feedback.name}</div>
                    `;
                    
                    sliderWrapper.appendChild(card);
                });
                
                // Calculate card width after rendering
                if (sliderWrapper.firstChild) {
                    const cardStyle = window.getComputedStyle(sliderWrapper.firstChild);
                    cardWidth = sliderWrapper.firstChild.offsetWidth + 
                               parseInt(cardStyle.marginLeft) + 
                               parseInt(cardStyle.marginRight);
                }
                
                // Create dots - one per possible position
                const totalSlides = Math.max(0, feedbacks.length - cardsPerView);
                for (let i = 0; i <= totalSlides; i++) {
                    const dot = document.createElement('div');
                    dot.className = `dot ${i === 0 ? 'active' : ''}`;
                    dot.dataset.index = i;
                    dot.addEventListener('click', () => goToSlide(i));
                    sliderDots.appendChild(dot);
                }
                
                updateSliderPosition();
            }
            
            function updateSliderPosition() {
                sliderWrapper.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
                
                // Update dots
                const dots = document.querySelectorAll('.dot');
                dots.forEach(dot => {
                    dot.classList.toggle('active', parseInt(dot.dataset.index) === currentIndex);
                });
            }
            
            function goToSlide(index) {
                const maxIndex = Math.max(0, feedbacks.length - cardsPerView);
                currentIndex = Math.min(Math.max(index, 0), maxIndex);
                updateSliderPosition();
                updateNavButtons();
                resetAutoSlide();
            }
            
            function nextSlide() {
                const maxIndex = Math.max(0, feedbacks.length - cardsPerView);
                if (currentIndex < maxIndex) {
                    goToSlide(currentIndex + 1);
                } else {
                    goToSlide(0); // Loop back to start
                }
            }
            
            function prevSlide() {
                const maxIndex = Math.max(0, feedbacks.length - cardsPerView);
                if (currentIndex > 0) {
                    goToSlide(currentIndex - 1);
                } else {
                    goToSlide(maxIndex); // Loop to end
                }
            }
            
            function updateNavButtons() {
                const maxIndex = Math.max(0, feedbacks.length - cardsPerView);
                prevBtn.disabled = currentIndex === 0 && maxIndex > 0;
                nextBtn.disabled = currentIndex >= maxIndex && maxIndex > 0;
            }
            
            function startAutoSlide() {
                if (feedbacks.length > cardsPerView) {
                    autoSlideInterval = setInterval(() => {
                        nextSlide();
                    }, 4000);
                }
            }
            
            function resetAutoSlide() {
                clearInterval(autoSlideInterval);
                startAutoSlide();
            }
            
            // Event listeners
            nextBtn.addEventListener('click', () => {
                nextSlide();
                resetAutoSlide();
            });
            
            prevBtn.addEventListener('click', () => {
                prevSlide();
                resetAutoSlide();
            });
            
            // Pause auto-slide when hovering over slider
            sliderWrapper.addEventListener('mouseenter', () => {
                clearInterval(autoSlideInterval);
            });
            
            sliderWrapper.addEventListener('mouseleave', () => {
                startAutoSlide();
            });
        });
    </script>
</body>
</html>