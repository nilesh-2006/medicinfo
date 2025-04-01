<?php
header('Content-Type: application/json');
error_reporting(0);
ini_set('display_errors', 0);

$host = 'localhost';
$dbname = 'medicalsystem';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $searchTerm = trim($_GET['medicine'] ?? $_GET['term'] ?? '');
    
    if (empty($searchTerm)) {
        throw new Exception("Search term is required");
    }

    // Determine if this is a store search or medicine search
    $searchType = determineSearchType($searchTerm);

    if ($searchType === 'store') {
        // Search for medical stores only
        $stmt = $conn->prepare("
            SELECT 
                id,
                store_name AS name,
                address,
                contact,
                pincode
            FROM Medical_Stores
            WHERE store_name LIKE :searchTerm
            OR address LIKE :searchTerm
            LIMIT 10
        ");
        
        $searchParam = "%$searchTerm%";
        $stmt->bindParam(':searchTerm', $searchParam);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($results)) {
            echo json_encode([
                'status' => 'success',
                'type' => 'stores',
                'data' => [],
                'meta' => [
                    'count' => 0,
                    'search_term' => $searchTerm,
                    'message' => 'No medical stores found matching your search'
                ]
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'type' => 'stores',
                'data' => $results,
                'meta' => [
                    'count' => count($results),
                    'search_term' => $searchTerm
                ]
            ]);
        }
    } else {
        // Search for medicines only
        $stmt = $conn->prepare("
            SELECT 
                m.id,
                m.medicine_name,
                m.brand_name,
                m.strength,
                m.price,
                m.store_id,
                IFNULL(ms.store_name, 'Not Available') AS store_name,
                IFNULL(ms.address, 'Not Available') AS store_address,
                IFNULL(ms.contact, 'Not Available') AS store_contact,
                IFNULL(ms.pincode, '') AS store_pincode
            FROM Medicines m
            LEFT JOIN Medical_Stores ms ON m.store_id = ms.id
            WHERE m.medicine_name LIKE :searchTerm
            OR m.brand_name LIKE :searchTerm
            ORDER BY m.medicine_name
            LIMIT 50
        ");
        
        $searchParam = "%$searchTerm%";
        $stmt->bindParam(':searchTerm', $searchParam);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($results)) {
            echo json_encode([
                'status' => 'success',
                'type' => 'medicines',
                'data' => [],
                'meta' => [
                    'count' => 0,
                    'search_term' => $searchTerm,
                    'message' => 'No medicines found matching your search'
                ]
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'type' => 'medicines',
                'data' => $results,
                'meta' => [
                    'count' => count($results),
                    'search_term' => $searchTerm
                ]
            ]);
        }
    }

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Database error. Please try again.',
        'code' => $e->getCode()
    ]);
    exit;
} catch(Exception $e) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
    exit;
}

function determineSearchType($term) {
    // Simple heuristic to determine search type
    // If search term contains words like "medical", "pharmacy", "store" - assume store search
    $storeKeywords = ['medical', 'pharmacy', 'store', 'clinic', 'hospital'];
    
    foreach ($storeKeywords as $keyword) {
        if (stripos($term, $keyword) !== false) {
            return 'store';
        }
    }
    
    // Otherwise assume medicine search
    return 'medicine';
}
?>