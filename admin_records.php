<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"> 
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.2.1/b-3.2.1/b-html5-3.2.1/b-print-3.2.1/date-1.5.5/r-3.0.3/sl-3.0.0/datatables.min.css" rel="stylesheet">

</head>
<style>
  .btn-outline {
    border: 1px solid #6c63ff; /* Custom border color */
    color: #6c63ff; /* Custom text color */
    background-color: transparent; /* Transparent background */
    padding: 7px 10px; /* Add some padding */
    border-radius: 8px; /* Rounded corners */
    transition: all 0.3s ease; /* Smooth hover effect */
}

/* Hover state */
.btn-outline:hover {
    background-color: #6c63ff; /* Fill with color on hover */
    color: #ffffff; /* White text */
}

/* Active state */
.btn-outline:active {
    background-color: #5a52d0; /* Darker shade */
    border-color: #5a52d0;
    color: #ffffff;
}

/* Focus state */
.btn-outline:focus {
    box-shadow: 0 0 2px rgba(108, 99, 255, 0.5); /* Glow effect */
    outline: none;
}
.records{
    box-shadow: 0 0 2px rgba(108, 99, 255, 0.5); 
    background-image: linear-gradient(
        to right,
        #ffffff,
        #eaeaf4,
        #e9e8f3,
        #eaeaf4
      

    );
    border-radius: 35px;
    padding: 25px;
}
.btn-grp{
    padding: 10px;
}
.custom-btn-1{
    box-shadow: 0 0 2px rgba(108, 99, 255, 0.5); 
    background-image: linear-gradient(
        to right,
        #ffffff,
        #eaeaf4,
        #e9e8f3,
        #eaeaf4
      

    );
color:#5a52d0;
    border: 1px solid  #5a52d0;
}
.custom-btn-1:hover{
    color: black;
}
.nav-link{
    color:   #5a52d0;
}
.round{
    padding: 3px 10px;
    background-color:   #5a52d0;
    color: white;
    border-radius: 70px;
    font-weight: bold;
}
</style>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="sidebarw" id="sidebar-wrapper" >
        <div class="sidebar-heading text-center py-4 text-primary fs-4 fw-bold text-uppercase">
            <img src="assets/img/nv_logo.png" alt="Logo" style="width: 195px;">
        </div>
        <div class="list-group list-group-flush my-3 ">
            <a href="admin_dashboard.php" class="list-group-item list-group-item-action bg-transparent text-secondary ">
                <i class="fa-solid fa-gauge me-3"></i>Dashboard
            </a>
            <a href="admin_records.php" class="list-group-item list-group-item-action bg-transparent text-secondary fw-bold active ">
            <i class="fa-solid fa-folder-open me-3"></i>Records
            </a>
            <a href="admin_notifications.php" class="list-group-item list-group-item-action bg-transparent text-secondary ">
            <i class="fa-solid fa-bell me-3"></i>Notification
            </a>
            <a href="admin_maintenance.php" class="list-group-item list-group-item-action bg-transparent text-secondary ">
            <i class="fa-solid fa-folder-plus me-3"></i>Maintenance
            </a>
            <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-secondary ">
            <i class="fa-solid fa-power-off me-3"></i>Logout
            </a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 mb-3">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-4 m-0">Employees Record</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-secondary fw-bold" id="navbarDropdown" role="button" 
                        data-bs-toggle="dropdown" aria-expanded="false"> 
                            <i class="fas fa-user me-2"></i> James Stephen
                        </a>
                        <ul class="dropdown-menu" aria-labeledby="navbarDropdown">
                            <li><a href="#" class="dropdown-item">Profile</a></li>
                            <li><a href="#" class="dropdown-item">Logout</a></li>


                        </ul>

                    </li>
                </ul>
            </div>
            </nav>
            <div class="container-fluid px-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin_records.php">All Records</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="admin_records@anniversary.php">Today's Anniversary  <span class="round" id="annivcount"></span></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="admin_records2.php">5 Years</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="admin_records10years.php">10 years</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="admin_recordsmt.php">15 years</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="admin_records20.php">20 years</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="admin_records25.php">25 years</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="admin_records30.php">30 years</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="admin_records35.php">35 years</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="admin_records40.php">40 years</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="admin_records45.php">45 years</a>
                </li>
                 -->
                
                <audio id="alarmSound" src="assets/audio/kawaii.mp3"></audio> <!-- Add an alarm sound file -->


                <script>
document.addEventListener("DOMContentLoaded", function () {
    function fetchAnniversaryCount() {
        fetch("get_anniversary_count.php")
            .then(response => response.json())
            .then(data => {
                let count = data.count;
                document.getElementById("annivcount").textContent = count;

                // Get the current time in Philippine Time (GMT+8)
                let currentTime = new Date();
                let philippineTime = new Date(currentTime.toLocaleString("en-US", { timeZone: "Asia/Manila" }));
                let currentHour = philippineTime.getHours();
                let currentMinutes = philippineTime.getMinutes(); // Get the minutes

                // Format the time string to show hours and minutes
                let formattedTime = `${currentHour}:${currentMinutes < 10 ? '0' + currentMinutes : currentMinutes}`;

                // Display the current time with minutes (optional for debugging)
                console.log("Current Time (PHT): " + formattedTime);

                // Check if the current time is 8:45 AM, 1:45 PM, or 3:45 PM, and count is greater than 0
                if ((currentHour === 8 && currentMinutes === 00) || 
                    (currentHour === 13 && currentMinutes === 00) || 
                    (currentHour === 15 && currentMinutes === 02) && count > 0) {

                    // Show SweetAlert modal and play alarm when modal opens
                    Swal.fire({
                        title: 'Anniversary Alert!',
                        text: `There are ${count} anniversaries today!`,
                        icon: 'info',
                        confirmButtonText: 'OK',
                        didOpen: () => {
                            // Play the alarm sound when the modal opens
                            let alarm = document.getElementById("alarmSound");
                            alarm.play();
                        },
                        willClose: () => {
                            // Stop the alarm sound when the modal closes (OK clicked)
                            let alarm = document.getElementById("alarmSound");
                            alarm.pause();
                            alarm.currentTime = 0; // Reset sound to the beginning
                        }
                    });
                }
            })
            .catch(error => console.error("Error fetching anniversary count:", error));
    }

    fetchAnniversaryCount(); // Fetch on page load

    // Optional: Refresh count every 10 seconds
    setInterval(fetchAnniversaryCount, 10000);
}); 
</script>
                                    </ul>
                                <div class="btn-grp d-flex" >
                                    <button class="btn btn-md " type="button" style="color: black; background-image: linear-gradient(
                            to right,
                            #ffffff,
                            #eaeaf4,
                            #e9e8f3,
                            #eaeaf4
                        );  " data-bs-toggle="modal" data-bs-target="#addmodal" accesskey="a">+ Add Record</button>

                        <form id="importForm" method="post" enctype="multipart/form-data">
                            <div class="grp d-flex ms-4 ">
                            <input type="file" class="form-control" name="excel_file" accept=".xls,.xlsx" required>
                            <button type="submit" class="btn btn-md btn-success d-flex" name="import"><img src="assets/img/excell.png" style="width: 25px;"></button>
                            </div>
                        </form>
</div>


                                <script>
                             
                                </script>



                                <div class="text" style="text-align: left; ">
                                    <span id="empcount"> Employees</span>
                                <script>
                                    function updateEmployeeCount() {
                                        fetch('employees_count.php')
                                            .then(response => response.json())
                                            .then(data => {
                                                document.getElementById('empcount').innerText = `Employees: ${data.count}`;
                                            })
                                            .catch(error => console.error('Error fetching employee count:', error));
                                    }

                                    // Update count every 10 seconds (optional)
                                    setInterval(updateEmployeeCount, 10000);

                                    // Initial load
                                    updateEmployeeCount();
                                </script> 




            </div>

            <!-- HTML Filter Controls -->
<div class="filter-controls mb-4">
    <div class="row">
        <!-- Month Range Filter -->
        <div class="col-md-3">
            <label>Month Range Start:</label>
            <select class="form-control" id="monthStart">
                <option value="">Select Start Month</option>
                <?php
                for ($m = 1; $m <= 12; $m++) {
                    echo '<option value="' . $m . '">' . date('F', mktime(0, 0, 0, $m, 1)) . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Month Range End:</label>
            <select class="form-control" id="monthEnd">
                <option value="">Select End Month</option>
                <?php
                for ($m = 1; $m <= 12; $m++) {
                    echo '<option value="' . $m . '">' . date('F', mktime(0, 0, 0, $m, 1)) . '</option>';
                }
                ?>
            </select>
        </div>
        
        <!-- Year Filter -->
        <div class="col-md-3">
            <label>Year:</label>
            <select class="form-control" id="yearFilter">
                <?php
                $currentYear = date('Y');
                for ($y = $currentYear; $y >= $currentYear - 50; $y--) {
                    echo '<option value="' . $y . '">' . $y . '</option>';
                }
                ?>
            </select>
        </div>
        
     <!-- Years of Service Filter -->
<div class="col-md-3">
    <label>Years of Service:</label>
    <div class="yos-checkboxes d-flex flex-wrap">
        <?php
        $years = [5, 10, 15, 20, 25, 30, 35, 40, 45];
        foreach ($years as $year) {
            echo '<div class="form-check col-6">
                    <input class="form-check-input yos-filter" type="checkbox" value="' . $year . '" id="yos' . $year . '">
                    <label class="form-check-label" for="yos' . $year . '">' . $year . ' Years</label>
                  </div>';
        }
        ?>
    </div>
</div>

        
    <div class="records">
                <table id="records" class="table table-striped">
                <thead>
            <tr>
                <th>Select</th>
                <th>#</th>
                <th>Employee Number</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>First Day of Service</th>
                <th>Years of Service</th>   
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    
        <?php
     require_once 'config.php';

         // Create connection using defined constants
         $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
         $query = " SELECT * FROM emp_record 
                 WHERE years_of_service = 10";
         $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                $formatted_date = date("F j, Y", strtotime($row['date_started']));

                $amount = $row['salary'];
                $formatted_amount = '₱' .number_format($amount, 2);

                echo "<tr>
                        <td><input type='checkbox'></td>
                        <td>{$row['id']}</td>
                        <td>{$row['emp_number']}</td>
                        <td>{$row['lname']}, {$row['fname']} {$row['mname']} </td>
                        <td>{$row['position']}</td>
                        <td>{$row['deptname']}</td>
                        <td>{$formatted_date}</td>
                        <td>{$row['years_of_service']}</td>
                        <td>{$formatted_amount}</td>

                                    <td>
                                        <button class='btn btn-warning btn-sm' type='button'>EDIT</button>
                                        <button class='btn btn-danger btn-sm' type='button'>DELETE</button>
                                    </td>
                                </tr>";
                        }
            ?>

        </tbody>
        <tfoot>
            <tr>
            <th>Select</th>
                <th>#</th>
                <th>Employee Number</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>First Day of Service</th>
                <th>Years of Service</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </tfoot>
                </table>
            </div>
            </div>
        
    </div>

    
</div>


<!-- Modal -->
<div class="modal modal-lg fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>+</strong> Add Record </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="post" class="form mt-2 mb-2">
             <!-- <input type="hidden" class="form-control" id="id" name="id"> -->
                <div class="row m-2">
                <div class="col-md-6 fw-bold">
                <label for="emp_number">Employee's Number</label>
                <input type="text" class="form-control" id="emp_number" name="empnumber">
                </div>
                </div>

                <div class="row m-2">
                <div class="col-md-6 fw-bold">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="l_name" placeholder="Please input mployees Last Name">
                </div>
                </div>
                <div class="row m-2">
                <div class="col-md-6 fw-bold">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="f_name" placeholder="Please input employees First Name">
                </div>
                <div class="col-md-6 fw-bold">
                <label for="mname">Middle Name</label>
                <input type="text" class="form-control" id="mname" name="m_name" placeholder="Please input employees Middle Name">
                </div>
                </div>

                <div class="row m-2">
                <div class="col-md-12 fw-bold">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="position" name="pos" placeholder="Please input employees position">
                </div>
                </div>

                <div class="row m-2">
                <div class="col-md-12 fw-bold">
                <label for="deptname">Department</label>
                <input type="text" class="form-control" id="deptname" name="dept" placeholder="Please input employees department">
                </div>
                </div>

                <div class="row d-flex m-2">
                <div class="col-md-6 fw-bold">
                <label for="date_started">Date of Appointment</label>
                <input type="date" class="form-control" id="date_started" name="dstarted">
                </div>
                </div>

                <div class="row input-group d-flex m-2">
                <div class="col-md-6 fw-bold">
                <label for="years_of_service">Years of Service</label>
                <input type="hidden" class="form-control" id="years_of_service" name="yos">
                <input type="text" class="form-control" id="y_o_s" name="yos" readonly>
                </div>

                <div class="col-md-6 fw-bold">
                <label for="salary">Salary</label>
                    <div class="input-group">
                <span class="input-group-text">₱</span>
                <input type="text" class="form-control" id="salary" name="sal" style="text-align: right;" aria-label="Amount (to the nearest dollar)">
                </div>
                </div>
                </div>


            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submit">Save changes</button>
      </div>
    </div>
  </div>
</div>







<script>
document.getElementById("date_started").addEventListener("change", function () {
    let startDate = new Date(this.value);
    let today = new Date();
    
    if (isNaN(startDate)) {
        document.getElementById("years_of_service").value = "";
        return;
    }

    let yearsOfService = today.getFullYear() - startDate.getFullYear();
    
    // Adjust if the appointment date for this year hasn't happened yet
    let hasNotCompletedYear = (today.getMonth() < startDate.getMonth()) || 
                              (today.getMonth() === startDate.getMonth() && today.getDate() < startDate.getDate());

    if (hasNotCompletedYear) {
        yearsOfService--;
    }

    document.getElementById("years_of_service").value = yearsOfService;
    document.getElementById("y_o_s").value = yearsOfService;
});
</script>











<script>
    var el = document.getElementById("wrapper")
    var toggleButton = document.getElementById("menu-toggle")
    toggleButton.onclick = function() {
        el.classList.toggle("toggled")
    }
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.2.1/b-3.2.1/b-html5-3.2.1/b-print-3.2.1/date-1.5.5/r-3.0.3/sl-3.0.0/datatables.min.js"></script>
<script src="records_datatable.js"></script>
<script src="insert.js"></script>
<script src="import_excel.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    
</body>                                                                                                                                                             
</html>