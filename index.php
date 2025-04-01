<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Price Information Source</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .result-box {
            position: absolute;
            width: 100%;
            max-width: 600px;
            background: white;
            border: 1px solid #ddd;
            z-index: 1000;
            display: none;
        }

        .result-box ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .result-box ul li {
            padding: 8px 12px;
            cursor: pointer;
        }

        .result-box ul li:hover {
            background-color: #f5f5f5;
        }

        .distance-badge {
            font-size: 12px;
            color: #666;
            margin-top: 3px;
        }

        .location-cell {
            display: flex;
            flex-direction: column;
        }
        /* scroll-up-btn.css */
        .scroll-up-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            padding: 0;
        }

        .scroll-up-btn.show {
            opacity: 1;
            visibility: visible;
        }

        .scroll-up-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #a777e3, #6e8efb);
        }

        .scroll-up-btn i {
            transition: transform 0.3s ease;
        }

        .scroll-up-btn:hover i {
            transform: scale(1.2);
        }

        /* Tablet styles */
        @media (max-width: 768px) {
            .scroll-up-btn {
                width: 45px;
                height: 45px;
                font-size: 20px;
                bottom: 25px;
                right: 25px;
            }
        }

        /* Mobile styles */
        @media (max-width: 480px) {
            .scroll-up-btn {
                width: 40px;
                height: 40px;
                font-size: 18px;
                bottom: 20px;
                right: 15px;
            }
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <div id="medicineTable" style="display:none;">
        <h3>Medicine Details</h3>
        <table class="table table-bordered">
            <thead class="table1">
                <tr>
                    <th>Sr. No.</th>
                    <th>Medicine</th>
                    <th>Brand Name</th>
                    <th>Strength</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <div id="medicineDetailsTable" style="display:none; margin-top: 20px;">
        <h3>Medical Store Details</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Medical Name</th>
                    <th>Medical Address</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <div id="medicalDetailsTable" style="display:none; margin-top: 20px;">
        <h3>Medical Store Details</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Medical Name</th>
                    <th>Medical Address</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <div class="main-content">
        <?php include 'Slider.php'; ?>
        <?php include 'imgcontent.php'; ?>
        <?php include 'Slider2.php'; ?>
        <?php include 'fdslider.php'; ?>
    </div>


        <!-- Scroll Up Button -->
    <button class="scroll-up-btn" title="Go to top">
        <i class="fas fa-arrow-up"></i>
    </button>


    <script>
        // scroll-up-btn.js
        document.addEventListener('DOMContentLoaded', function() {
            // Create button element
            const scrollUpBtn = document.createElement('button');
            scrollUpBtn.className = 'scroll-up-btn';
            scrollUpBtn.title = 'Go to top';
            scrollUpBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
            
            // Add button to body
            document.body.appendChild(scrollUpBtn);
            
            // Show/hide based on scroll position
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    scrollUpBtn.classList.add('show');
                } else {
                    scrollUpBtn.classList.remove('show');
                }
            });
            
            // Smooth scroll to top
            scrollUpBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>

    <script>
        // List of available medicines for search suggestions (will be populated from DB)
        let availableKeyword = [];

        // Get DOM elements
        const medicineTable = document.getElementById('medicineTable');
        const detailsTable = document.getElementById('medicineDetailsTable');
        const medicalDetailsTable = document.getElementById('medicalDetailsTable');
        const tableBody = medicineTable.querySelector('tbody');
        const detailsTableBody = detailsTable.querySelector('tbody');
        const medicalDetailsTableBody = medicalDetailsTable.querySelector('tbody');
        const resultbox = document.querySelector(".result-box");
        const inputbox = document.getElementById("input-box");
        const mainContent = document.querySelector('.main-content');

        // Fetch initial suggestions on page load
        document.addEventListener('DOMContentLoaded', function() {
            fetchMedicineSuggestions('');
        });

        // Function to fetch medicine suggestions from database
        function fetchMedicineSuggestions(searchTerm) {
            fetch(`search_medicines.php?term=${encodeURIComponent(searchTerm)}`)
                .then(response => response.json())
                .then(data => {
                    availableKeyword = data.map(med => med.medicine_name);
                })
                .catch(error => console.error('Error fetching suggestions:', error));
        }

        // Function to fetch medicine details from database
        function fetchMedicineData(medicineName) {
            return fetch(`fetch_medicine.php?medicine=${encodeURIComponent(medicineName)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        return data.data;
                    }
                    return [];
                });
        }

        // Function to fetch medical store details from database
        function fetchMedicalStoreData(searchTerm) {
            return fetch(`fetch_stores.php?term=${encodeURIComponent(searchTerm)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        return data.data;
                    }
                    return [];
                });
        }

        // Search functionality
        inputbox.onkeyup = async function() {
            let input = inputbox.value;

            if (input.length >= 2) {
                try {
                    const response = await fetch(`search_medicines.php?term=${encodeURIComponent(input)}`);
                    const data = await response.json();
                    availableKeyword = data.map(med => med.medicine_name);

                    display(availableKeyword);
                    resultbox.style.display = availableKeyword.length ? "block" : "none";
                } catch (error) {
                    console.error('Error fetching suggestions:', error);
                    resultbox.style.display = "none";
                }
            } else {
                resultbox.style.display = "none";
            }
        }

        function display(result) {
            const content = result.map((list) => {
                return "<li onclick='selectInput(this)'>" + list + "</li>";
            });
            resultbox.innerHTML = "<ul>" + content.join("") + "</ul>";
        }

        function selectInput(list) {
            inputbox.value = list.innerHTML;
            resultbox.innerHTML = "";
            resultbox.style.display = "none";
            handleSearch();
        }

        // Handle search button click
        async function handleSearch() {
            const input = inputbox.value.trim();
            console.log("Searching for:", input);
            
            try {
                // Medicine search
                const medUrl = `fetch_medicine.php?medicine=${encodeURIComponent(input)}&debug=1`;
                console.log("Fetching:", medUrl);
                
                const medResponse = await fetch(medUrl);
                const medData = await medResponse.json();
                console.log("Medicine API Response:", medData);
                
                if (medData.status === 'success' && medData.data.length) {
                    console.log("Found medicines:", medData.data);
                    displayMedicineResults(medData.data);
                    return;
                }

                // Store search
                const storeUrl =` fetch_stores.php?term=${encodeURIComponent(input)}&debug=1`;
                console.log("Fetching:", storeUrl);
                
                const storeResponse = await fetch(storeUrl);
                const storeData = await storeResponse.json();
                console.log("Store API Response:", storeData);
                
                if (storeData.status === 'success' && storeData.data.length) {
                    console.log("Found stores:", storeData.data);
                    displayMedicalStoreResults(storeData.data);
                    return;
                }

                console.warn("No results found in either search");
                showNoResults();
            } catch (error) {
                console.error("Search error:", error);
                showNoResults();
            }
        }

        function showNoResults() {
            medicineTable.style.display = 'none';
            detailsTable.style.display = 'none';
            medicalDetailsTable.style.display = 'none';
            mainContent.style.display = 'block';
            alert('No results found for your search');
        }

        function displayMedicineResults(medicines) {
            tableBody.innerHTML = '';
            detailsTableBody.innerHTML = '';
            medicalDetailsTableBody.innerHTML = '';

            medicines.forEach((medicine, index) => {
                const row = tableBody.insertRow();
                row.style.cursor = 'pointer';
                row.insertCell().textContent = index + 1;
                row.insertCell().textContent = medicine.medicine_name;
                row.insertCell().textContent = medicine.brand_name;
                row.insertCell().textContent = medicine.strength;
                row.insertCell().textContent = medicine.price;

                row.onclick = async function() {
                    // Fetch medical stores that have this medicine
                    try {
                        const response = await fetch(`fetch_stores.php?medicine=${encodeURIComponent(medicine.medicine_name)}`);
                        const data = await response.json();
                        
                        if (data.status === 'success' && data.data.length) {
                            displayMedicalStoreResults(data.data);
                        } else {
                            alert('No medical stores found with this medicine');
                        }
                    } catch (error) {
                        console.error('Error fetching medical stores:', error);
                        alert('Error fetching medical store details');
                    }
                };
            });

            medicineTable.style.display = 'block';
            detailsTable.style.display = 'none';
            medicalDetailsTable.style.display = 'none';
            mainContent.style.display = 'none';
        }


        function displayMedicalStoreResults(stores) {
            medicalDetailsTableBody.innerHTML = '';

            stores.forEach(store => {
                const row = medicalDetailsTableBody.insertRow();
                row.insertCell().textContent = store.store_name;
                row.insertCell().textContent = store.address;
                row.insertCell().textContent = store.contact;

                const locationCell = row.insertCell();
                locationCell.innerHTML = `
                    <div class="location-cell">
                        <a href="Showlocation.php?name=${encodeURIComponent(store.store_name)}&address=${encodeURIComponent(store.address)}&contact=${encodeURIComponent(store.contact)}&location=${encodeURIComponent(store.address)}" 
                           class="text-decoration-none">
                            <i class="bi bi-geo-alt-fill text-danger"></i> ${store.address}
                        </a>
                        <div class="distance-badge"></div>
                    </div>
                `;

                calculateDistance(store.address, locationCell.querySelector('.distance-badge'));
            });

            medicineTable.style.display = 'none';
            detailsTable.style.display = 'none';
            medicalDetailsTable.style.display = 'block';
            mainContent.style.display = 'none';
        }

        function calculateDistance(destination, element) {
            if (!navigator.geolocation) {
                return;
            }

            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const userPos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    const geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        address: destination
                    }, (results, status) => {
                        if (status === 'OK' && results[0]) {
                            const destPos = results[0].geometry.location;
                            const service = new google.maps.DistanceMatrixService();

                            service.getDistanceMatrix({
                                origins: [userPos],
                                destinations: [destPos],
                                travelMode: 'DRIVING',
                                unitSystem: google.maps.UnitSystem.METRIC
                            }, (response, status) => {
                                if (status === 'OK' && response.rows[0].elements[0].status === 'OK') {
                                    const distance = response.rows[0].elements[0].distance.text;
                                    element.textContent = `~${distance} away`;
                                }
                            });
                        }
                    });
                },
                (error) => {
                    console.error("Error getting user location:", error);
                }
            );
        }

        // Load Google Maps API only when needed
        function loadGoogleMapsAPI() {
            if (typeof google === 'object' && typeof google.maps === 'object') {
                return;
            }

            const script = document.createElement('script');
            script.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyCbj0nU7h3Rz75-F_5sSw3DiEaQX9WBWoQlibraries=places,geocoding,distanceMatrix`;
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
        }

        // Load API when location elements are clicked
        document.addEventListener('click', (e) => {
            if (e.target.closest('.bi-geo-alt-fill')) {
                loadGoogleMapsAPI();
            }
        });

        // for sub menu
        function showmenu() {
            const show = document.querySelector(".sidebar");
            show.style.display = 'flex';
        }

        function closemenu() {
            const show = document.querySelector(".sidebar");
            show.style.display = 'none';
        }
    </script>
 <?php include('./Footer.php') ?>
</body>

</html>