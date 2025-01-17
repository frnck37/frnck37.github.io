<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('coordinates.json'), true);

// Check if the data is an array
if (!is_array($data)) {
    $data = [];
}

// Add new coordinates to the array
$newCoordinates = json_decode(file_get_contents('php://input'), true);
$data[] = $newCoordinates;

// Save the updated array to the file
file_put_contents('coordinates.json', json_encode($data));

echo json_encode(['success' => true, 'message' => 'Coordinates saved successfully']);
?>
