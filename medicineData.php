<?php
// Get the email from the URL
$email = $_GET['email'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medicine Data Entry</title>
        <style>
                *{
                    font-family: 'Times New Roman', Times, serif;
                }

                body {
                    font-family: 'Times New Roman', Times, serif;
                    padding: 20px;
                    font-weight: bold;
                }

                /* Back button styles */
                .back-button {
                    position: absolute;
                    top: 10px; 
                    left: 10px;
                    padding: 10px 15px;
                    font-weight: bold;
                    color: brown;
                    border: none;
                    cursor: pointer;
                    font-size: 16px;
                    text-decoration: none;
                    display: inline-block;
                }

                .back-button:hover {
                    text-decoration: underline;
                }

                .back-button::before {
                    content: '\2190'; 
                margin-right: 5px;
                }

                h2 {
                    color: #633636;
                    text-align: center;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                table, th, td {
                    border: 1px solid black;
                }

                th, td {
                    padding: 10px;
                    text-align: left;
                }

                th {
                    background-color: #f2f2f2;
                }

                button {
                    padding: 10px 20px;
                    background-color:rgb(94, 91, 91);
                    color: white;
                    border: none;
                    cursor: pointer;
                    margin-top: 10px;
                }

                button:hover {
                    background-color:rgb(87, 80, 80);
                }

                
                

                /* Responsive styles */
                @media (max-width: 768px) {
                    body {
                        padding: 10px;
                    }

                    table {
                        font-size: 14px;
                    }

                    th, td {
                        padding: 8px;
                    }

                    button, .back-button {
                        padding: 8px 16px;
                        font-size: 14px;
                    }
                }

                @media (max-width: 480px) {
                    body {
                        padding: 5px;
                    }

                    table {
                        font-size: 12px;
                    }

                    th, td {
                        padding: 6px;
                    }

                    button, .back-button {
                        padding: 6px 12px;
                        font-size: 12px;
                    }
                }
        </style>
    </head>
    <body>
        <a href="Index.php" class="back-button">Back</a>
        <h2>Medicine Data</h2>
        <form id="medicineForm" action="inser_data.php?email=<?php echo $email; ?>" method="POST">
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Medicine Name</th>
                        <th>Brand Name</th>
                        <th>Strength</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td contenteditable="false">1</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" onclick="submitForm()">Submit</button>
        </form>
        <script>

                document.addEventListener('DOMContentLoaded', () => {
                    const tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
                    let rowCounter = 2; // Start from 2 because the first row is already there

                    // Function to add a new row
                    function addRow() {
                        const newRow = tableBody.insertRow();

                        // Insert cells into the row
                        const cellSrNo = newRow.insertCell(0);
                        const cell1 = newRow.insertCell(1);
                        const cell2 = newRow.insertCell(2);
                        const cell3 = newRow.insertCell(3);
                        const cell4 = newRow.insertCell(4);

                        // Make cells editable
                        cell1.setAttribute('contenteditable', 'true');
                        cell2.setAttribute('contenteditable', 'true');
                        cell3.setAttribute('contenteditable', 'true');
                        cell4.setAttribute('contenteditable', 'true');

                        // Set the Sr. No. cell content
                        cellSrNo.textContent = rowCounter;
                        rowCounter++;

                        // Focus on the first cell of the new row
                        cell1.focus();
                    }

                    // Add event listener for the Tab key
                    tableBody.addEventListener('keydown', (event) => {
                        if (event.key === 'Tab') {
                            const activeCell = document.activeElement;
                            const activeRow = activeCell.closest('tr');
                            const cells = activeRow.cells;
                            const activeIndex = Array.from(cells).indexOf(activeCell);

                            // Check if the cursor is in the last column
                            if (activeIndex === cells.length - 1) {
                                event.preventDefault(); // Prevent default Tab behavior
                                addRow(); // Add a new row
                            }
                        }
                    });
                });


            function submitForm() {
                const table = document.getElementById('dataTable');
                const rows = table.getElementsByTagName('tbody')[0].rows;
                const form = document.getElementById('medicineForm');

                // Loop through each row and create hidden inputs for medicine data
                for (let i = 0; i < rows.length; i++) {
                    const cells = rows[i].cells;

                    // Create hidden inputs for each cell
                    const medicineNameInput = document.createElement('input');
                    medicineNameInput.type = 'hidden';
                    medicineNameInput.name = 'medicineName[]';
                    medicineNameInput.value = cells[1].innerText;

                    const brandNameInput = document.createElement('input');
                    brandNameInput.type = 'hidden';
                    brandNameInput.name = 'brandName[]';
                    brandNameInput.value = cells[2].innerText;

                    const strengthInput = document.createElement('input');
                    strengthInput.type = 'hidden';
                    strengthInput.name = 'strength[]';
                    strengthInput.value = cells[3].innerText;

                    const priceInput = document.createElement('input');
                    priceInput.type = 'hidden';
                    priceInput.name = 'price[]';
                    priceInput.value = cells[4].innerText;

                    // Append inputs to the form
                    form.appendChild(medicineNameInput);
                    form.appendChild(brandNameInput);
                    form.appendChild(strengthInput);
                    form.appendChild(priceInput);
                }

               // Submit the form via AJAX
               fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => response.text())
                .then(data => {
                    if (data === "Medicine data submitted successfully!") {
                        alert('Medicine data inserted successfully!'); // Show success pop-up
                        clearTable(); // Clear the table data
                    } else {
                        alert('Error submitting medicine data. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
            }

            // Function to clear the table data
            function clearTable() {
                const tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
                tableBody.innerHTML = `
                    <tr>
                        <td contenteditable="false">1</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                `;
            }
        </script>
    </body>
</html>