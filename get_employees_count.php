<?php 
require_once 'config.php';

// Create connection
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["count" => 0])); // Return 0 if connection fails
}

// Query to count employees
$query = "SELECT COUNT(*) as empcount FROM emp_record";

$result = $conn->query($query);
$row = $result->fetch_assoc();

// Close connection
$conn->close();

// Return JSON response
echo json_encode(["count" => $row['empcount']]);
?>
