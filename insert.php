<?php
$conn = new mysqli("localhost", "root", "hrpayroll", "loyaltyms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from AJAX request
$emp_number = $_POST['emp_number'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$position = $_POST['position'];
$deptname = $_POST['deptname'];
$date_started = $_POST['date_started'];
$years_of_service = $_POST['years_of_service'] . " year/s";
$salary = $_POST['salary'];

// Validate inputs
if (empty($emp_number) || empty($lname) || empty($fname) || empty($mname) || empty($position) || empty($deptname) || empty($date_started) || empty($years_of_service) || empty($salary)) {
    echo "All fields are required!";
    exit;
}

// Insert query
$query = "INSERT INTO emp_record (emp_number, lname, fname, mname, position, deptname, date_started, years_of_service, salary) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("sssssssss", $emp_number, $lname, $fname, $mname, $position, $deptname, $date_started, $years_of_service, $salary);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>