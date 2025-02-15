<?php
require_once 'config.php';

// Create connection
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["count" => 0])); // Return 0 if connection fails
}

// Query to count employees with an anniversary today
$query = "SELECT COUNT(*) as count FROM emp_record 
          WHERE MONTH(date_started) = MONTH(CURDATE()) 
          AND DAY(date_started) = DAY(CURDATE())";

$result = $conn->query($query);
$row = $result->fetch_assoc();

// Return JSON response
echo json_encode(["count" => $row['count']]);
?>