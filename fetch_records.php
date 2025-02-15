<?php
require_once 'config.php';

// Create connection
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get filter values
$monthStart = isset($_POST['monthStart']) ? intval($_POST['monthStart']) : null;
$monthEnd = isset($_POST['monthEnd']) ? intval($_POST['monthEnd']) : null;
$yearFilter = isset($_POST['yearFilter']) ? intval($_POST['yearFilter']) : date('Y');
$yearsOfService = isset($_POST['yearsOfService']) ? $_POST['yearsOfService'] : [];

// Base query
$query = "SELECT *, 
          YEAR('$yearFilter-12-31') - YEAR(date_started) - 
          (DATE_FORMAT('$yearFilter-12-31', '%m%d') < DATE_FORMAT(date_started, '%m%d')) as calculated_years 
          FROM emp_record WHERE 1=1";

// Add month range filter if both start and end are selected
if ($monthStart && $monthEnd) {
    $query .= " AND MONTH(date_started) BETWEEN $monthStart AND $monthEnd";
}

// Add years of service filter
if (!empty($yearsOfService)) {
    $yearsConditions = [];
    foreach ($yearsOfService as $years) {
        $yearsConditions[] = "YEAR('$yearFilter-12-31') - YEAR(date_started) - 
                            (DATE_FORMAT('$yearFilter-12-31', '%m%d') < DATE_FORMAT(date_started, '%m%d')) = $years";
    }
    $query .= " AND (" . implode(" OR ", $yearsConditions) . ")";
}

$result = $conn->query($query);

// Return results as JSON
$data = [];
while ($row = $result->fetch_assoc()) {
    $formatted_date = date("F j, Y", strtotime($row['date_started']));
    $amount = $row['salary'];
    $formatted_amount = number_format($amount, 2);

    $data[] = [
        'id' => $row['id'],
        'emp_number' => $row['emp_number'],
        'name' => $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'],
        'position' => $row['position'],
        'deptname' => $row['deptname'],
        'date_started' => $formatted_date,
        'calculated_years' => $row['calculated_years'],
        'salary' => $formatted_amount
    ];
}

echo json_encode(['data' => $data]);
?>