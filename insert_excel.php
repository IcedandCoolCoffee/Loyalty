<?php
require 'vendor/autoload.php';
require_once 'config.php'; // Database connection

use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_FILES['excel_file']['name']) {
    $fileType = IOFactory::identify($_FILES['excel_file']['tmp_name']);
    $reader = IOFactory::createReader($fileType);
    $spreadsheet = $reader->load($_FILES['excel_file']['tmp_name']);
    $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if ($conn->connect_error) {
        die("Database connection failed");
    }

    $successCount = 0;
    $errorCount = 0;

    foreach ($sheet as $index => $row) {
        if ($index == 1) continue; // Skip header row

        $emp_number = $conn->real_escape_string($row['A']);
        $lname = $conn->real_escape_string($row['B']);
        $fname = $conn->real_escape_string($row['C']);
        $mname = $conn->real_escape_string($row['D']);
        $position = $conn->real_escape_string($row['E']);
        $deptname = $conn->real_escape_string($row['F']);
        $salary = $conn->real_escape_string($row['H']);

        // 🛠 FIX DATE FORMAT FROM EXCEL TO MYSQL (YYYY-MM-DD)
        $excelDate = $row['G']; // First Day of Service column
        if (!empty($excelDate)) {
            if (is_numeric($excelDate)) {
                // If it's an Excel date (numeric), convert it properly
                $timestamp = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($excelDate);
                $date_started = date('Y-m-d', $timestamp);
            } else {
                // If it's a normal string date, try parsing it
                $date_started = date('Y-m-d', strtotime($excelDate));
            }
        } else {
            $date_started = NULL; // Handle empty dates
        }

        // Compute years of service only if date_started is not NULL
        if ($date_started !== NULL) {
            $years_of_service = date("Y") - date("Y", strtotime($date_started));
        } else {
            $years_of_service = 0; // Set to 0 if no date started
        }

        // SQL to insert data
        $sql = "INSERT INTO emp_record (emp_number, lname, fname, mname, position, deptname, date_started, years_of_service, salary) 
                VALUES ('$emp_number', '$lname', '$fname', '$mname', '$position', '$deptname', '$date_started', '$years_of_service', '$salary')";

        // Execute SQL query
        if ($conn->query($sql)) {
            $successCount++;
        } else {
            $errorCount++;
        }
    }

    // Close the database connection
    $conn->close();

    // Provide feedback on the result
    if ($successCount > 0) {
        echo "success";
    } else {
        echo "Failed to import data.";
    }
} else {
    echo "No file uploaded";
}
?>
