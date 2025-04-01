<?php
header('Content-Type: application/json');
error_reporting(0);
ini_set('display_errors', 0);

// Database configuration
$host = 'localhost';
$dbname = 'medicalsystem';
$username = 'root';
$password = '';

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    http_response_code(500);
    die(json_encode([
        'status' => 'error',
        'message' => 'Database connection failed',
        'error' => mysqli_connect_error()
    ]));
}

// Get and sanitize input parameters
$searchTerm = isset($_GET['term']) ? trim(mysqli_real_escape_string($conn, $_GET['term'])) : '';
$medicineId = isset($_GET['medicine_id']) ? intval($_GET['medicine_id']) : 0;
$pincode = isset($_GET['pincode']) ? preg_replace('/[^0-9]/', '', $_GET['pincode']) : '';

// Validate inputs
if (empty($searchTerm) && $medicineId <= 0 && empty($pincode)) {
    http_response_code(400);
    die(json_encode([
        'status' => 'error',
        'message' => 'At least one search parameter is required (term, medicine_id, or pincode)'
    ]));
}

try {
    // Base query - using address for location information
    $sql = "SELECT 
                s.id,
                s.store_name,
                s.address,
                s.contact,
                s.pincode";
    
    // Include latitude/longitude if they exist in your table
    // $sql .= ", s.latitude, s.longitude";
    
    // Add medicine info if searching by medicine_id
    if ($medicineId > 0) {
        $sql .= ", m.medicine_name, m.brand_name, m.strength, m.price";
    }
    
    $sql .= " FROM medical_stores s";
    
    // Add joins if needed
    if ($medicineId > 0) {
        $sql .= " JOIN medicine_availability ma ON s.id = ma.store_id
                 JOIN medicines m ON ma.medicine_id = m.id";
    }
    
    // Build WHERE conditions
    $where = [];
    $params = [];
    $types = '';
    
    if ($medicineId > 0) {
        $where[] = "ma.medicine_id = ?";
        $params[] = $medicineId;
        $types .= 'i';
    }
    
    if (!empty($pincode)) {
        $where[] = "s.pincode = ?";
        $params[] = $pincode;
        $types .= 's';
    }
    
    if (!empty($searchTerm) && $medicineId <= 0) {
        $where[] = "(s.store_name LIKE ? OR s.address LIKE ?)";
        $searchTermLike = "%$searchTerm%";
        $params[] = $searchTermLike;
        $params[] = $searchTermLike;
        $types .= 'ss';
    }
    
    // Combine WHERE clauses
    if (!empty($where)) {
        $sql .= " WHERE " . implode(" AND ", $where);
    }
    
    // Add sorting and limiting
    $sql .= " ORDER BY s.store_name ASC LIMIT 50";
    
    // Prepare and execute statement
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        throw new Exception("Query preparation failed: " . mysqli_error($conn));
    }
    
    // Bind parameters if any
    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Query execution failed: " . mysqli_stmt_error($stmt));
    }
    
    $result = mysqli_stmt_get_result($stmt);
    
    // Process results
    $stores = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $store = [
            'id' => $row['id'],
            'store_name' => $row['store_name'],
            'address' => $row['address'],  // Using address as location
            'contact' => $row['contact'],
            'pincode' => $row['pincode'],
            'location' => $row['address']   // Duplicating address as location in response
        ];
        
        // Add coordinates if available
        if (isset($row['latitude']) && isset($row['longitude'])) {
            $store['coordinates'] = [
                'latitude' => $row['latitude'],
                'longitude' => $row['longitude']
            ];
        }
        
        // Add medicine info if available
        if ($medicineId > 0) {
            $store['medicine'] = [
                'name' => $row['medicine_name'],
                'brand' => $row['brand_name'],
                'strength' => $row['strength'],
                'price' => $row['price']
            ];
        }
        
        $stores[] = $store;
    }
    
    // Return successful response
    echo json_encode([
        'status' => 'success',
        'data' => $stores,
        'meta' => [
            'count' => count($stores),
            'parameters' => [
                'term' => $searchTerm,
                'medicine_id' => $medicineId,
                'pincode' => $pincode
            ]
        ]
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'An error occurred while processing your request',
        'error' => $e->getMessage()
    ]);
} finally {
    // Close connections
    if (isset($stmt)) {
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}