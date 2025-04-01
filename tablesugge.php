<!DOCTYPE html>
<html>
<head>
    <title>Medicine Search</title>
    <style>
        .search-container {
    position: relative;
    width: 300px; /* Adjust as needed */
    margin: 20px auto;
}

.suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    border: 1px solid #ccc;
    background-color: #fff;
    z-index: 1;
    display: none; /* Initially hidden */
}

.suggestions div {
    padding: 8px;
    cursor: pointer;
}

.suggestions div:hover {
    background-color: #f0f0f0;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}
    </style>
</head>
<body>
    <div class="search-container">
        <input type="text" id="medicineName" placeholder="Enter medicine name...">
        <div id="suggestions" class="suggestions"></div>
    </div>

    <div id="medicineTable" style="display:none;">
        <table>
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Medicine</th>
                    <th>Brand Name</th>
                    <th>Strength</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                </tbody>
        </table>
    </div>

    <script>
        const medicineNameInput = document.getElementById('medicineName');
const suggestionsDiv = document.getElementById('suggestions');
const medicineTable = document.getElementById('medicineTable');
const tableBody = medicineTable.querySelector('tbody');

const medicineData = {
    "Paracetamol": [
        { brand: "Tylenol", strength: "250mg-1000mg", price: "20 Rs." },
        // Add more brands/strengths/prices as needed
    ],
    // Add more medicines as needed
};

medicineNameInput.addEventListener('input', () => {
    const searchTerm = medicineNameInput.value.trim();
    suggestionsDiv.innerHTML = ''; // Clear previous suggestions

    if (searchTerm.length > 0) {
        const matchingMedicines = Object.keys(medicineData).filter(med =>
            med.toLowerCase().startsWith(searchTerm.toLowerCase())
        );

        if (matchingMedicines.length > 0) {
            matchingMedicines.forEach(medicine => {
                const suggestion = document.createElement('div');
                suggestion.textContent = medicine;
                suggestion.addEventListener('click', () => {
                    medicineNameInput.value = medicine;
                    suggestionsDiv.style.display = 'none';
                    showMedicineTable(medicine);
                });
                suggestionsDiv.appendChild(suggestion);
            });
            suggestionsDiv.style.display = 'block';
        } else {
            suggestionsDiv.style.display = 'none';
        }
    } else {
        suggestionsDiv.style.display = 'none';
        medicineTable.style.display = 'none'; // Hide table if input is empty
    }
});

function showMedicineTable(medicine) {
    tableBody.innerHTML = ''; // Clear previous table data

    const brands = medicineData[medicine];
    if (brands) {
        brands.forEach((brand, index) => {
            const row = tableBody.insertRow();
            row.insertCell().textContent = index + 1;
            row.insertCell().textContent = medicine;
            row.insertCell().textContent = brand.brand;
            row.insertCell().textContent = brand.strength;
            row.insertCell().textContent = brand.price;
        });
        medicineTable.style.display = 'block';
    } else {
        medicineTable.style.display = 'none';
    }
}
    </script>
</body>
</html>