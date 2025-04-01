<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Professional Directory</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body {
                font-family: 'Times New Roman', Times, serif;
                background-color: rgb(235, 200, 200);
            }

            .container {
                background-color: rgb(197, 192, 192);
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                border-radius: 10px;
            }

            .header h1 {
                color: #7a5858;
                font-weight: bold;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #000;
            }
                        
            
           

            /* Responsive Table */
            .table-responsive {
                overflow-x: auto;
                
            }
        </style>
    </head>
    <body>
        <?php include '../Header2.php'; ?>

        <div class="container mt-4">
            <div class="header text-center">
                <h1>Professional Directory</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>Specialist</th>
                            <th>Contact No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Dr.Dipak Nirwan</td>
                            <td>Bhandara</td>
                            <td>Ear,Nose,Throat</td>
                            <td>7385357197</td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>Dr.Sachin Balbudhe</td>
                            <td>Bhandara</td>
                            <td>General Physician</td>
                            <td>9015559900</td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>Dr.Sachin Patil</td>
                            <td>Nagpur</td>
                            <td>Cardiologist</td>
                            <td>8460265084</td>
                        </tr>
                        <tr>
                            <td>04</td>
                            <td>Dr. Rajashekar Mummadi</td>  
                            <td>Hyderabad</td>
                            <td>Neurologist</td>
                            <td>8069305511</td>  
                        </tr>
                        <tr>
                            <td>05</td>
                            <td>Dr.Dinesh Khullar</td>  
                            <td>Delhi</td>
                            <td>Diabetic Nephropathy</td>
                            <td>9268880303</td>  
                        </tr>
                        <tr>
                            <td>06</td>
                            <td>Dr. Shiv Chadha</td>  
                            <td>New Rajendra Nagar,Delhi </td>
                            <td>Nephrologist</td>
                            <td>7411830626</td>  
                        </tr>
                        <tr>
                            <td>07</td>
                            <td>Dr.Suryashree Pandey</td>  
                            <td>Shankar Nagar,Nagpur</td>
                            <td>Nephrologist</td>
                            <td>08047094782</td>  
                        </tr>
                        <tr>
                            <td>08</td>
                            <td>Dr.Samir R.Shah</td>  
                            <td>Mumbai</td>
                            <td>Liver Cancer & Hepatobiliary Diseases</td>
                            <td>2268360000</td>  
                        </tr>
                        <tr>
                            <td>09</td>
                            <td>Dr.Krishna Meshram</td>  
                            <td>Sakoli</td>
                            <td>General Physician</td>
                            <td>7942687886</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Dr.Swarup P.Verma</td>  
                            <td>Shankar Nagar,Nagpur</td>
                            <td>General Physician</td>
                            <td>08047094782</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Dr.Kadoo Priyanka Vijay</td>  
                            <td>Sitabuldi,Nagpur</td>
                            <td>Gynecologist/Obstetrician</td>
                            <td>02048553876</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Dr.Sourabh Negpal</td>  
                            <td>Vasant Vihar,Delhi</td>
                            <td>Dentist</td>
                            <td>07948220937</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Dr.Amrendra Kumar</td>  
                            <td>Defence Colony,Delhi</td>
                            <td>Dermatologist</td>
                            <td>08046805720</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Dr.Geetanjali Marya</td>  
                            <td>Greater Kailash Part2,Delhi</td>
                            <td>Dentist</td>
                            <td>08069453521</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Dr.Shailaja Desai</td>  
                            <td>Sopan Baug,Pune</td>
                            <td>Cosmetologist</td>
                            <td>02048552428</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Dr.Neha A Agrawal</td>  
                            <td>Wakad,Pune</td>
                            <td>Dentist</td>
                            <td>08069459612</td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>Dr.Anand Palimkar</td>  
                            <td>Viman Nagar,Pune</td>
                            <td>Ophthalmologist</td>
                            <td>07948228325</td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>Dr.Bhavik Saglani</td>  
                            <td>Taardeo,Mumbai</td>
                            <td>General Physician</td>
                            <td>07941057428</td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>Dr.Tushar Rane</td>  
                            <td>Chembur,Mumbai</td>
                            <td>General Physician</td>
                            <td>07941057378</td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>Dr.Shahil Pardhi</td>  
                            <td>Bhandara Road</td>
                            <td>General Physician</td>
                            <td>02071172687</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <?php include '../Footer2.php'; ?>
    </body>
</html>