<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>
<style>
  
  .ml1 {
  font-weight: 900;
  font-size: 3.5em;
  background-image: linear-gradient(
        to right,
rgb(219, 189, 255),
rgb(225, 199, 242),
        #e9e8f3,
        #eaeaf4
    );
  padding: 20px;
  font-size: 18px;
  border-radius: 35px;
}

.ml1 .letter {
  display: inline-block;
  line-height: 1em;
  color: white;
  

}

.ml1 .text-wrapper {
  position: relative;
  display: inline-block;
  /* padding-top: 0.1em;
  padding-right: 0.05em;
  padding-bottom: 0.15em; */
}

.ml1 .line {
  opacity: 0;
  position: absolute;
  left: 0;
  height: 3px;
  width: 100%;
  background-color: white;
  transform-origin: 0 0;
}

.ml1 .line1 { top: 0; }
.ml1 .line2 { bottom: 0; }

        .imagedisplay {
            transition: opacity 1s ease-in-out;
            border-radius: 50px;
            background-color:rgb(153, 149, 236);
            width: 100%; /* Adjust as needed */
            height: 70px;
            justify-content: center;
            vertical-align: ;
            text-align: center;
            color: white;
            font-size: 35px;
            line-height: -80px;
        }
        .imagedisplay h2{
           
            
            color: white;
        }
        .fade-out {
            opacity: 0;
            visibility: hidden;
        }
        .records{
            border:1px solid #6c63ff;
            border-radius: 15px;
        }
        #records{
            border-radius:25px !important;
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
            <a href="admin_dashboard.php" class="list-group-item list-group-item-action bg-transparent text-secondary fw-bold active">
                <i class="fa-solid fa-gauge me-3"></i>Dashboard
            </a>
            <a href="admin_records.php" class="list-group-item list-group-item-action bg-transparent text-secondary ">
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
                <h2 class="fs-4 m-0">Dashboard</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-secondary fw-bold" id="navbarDropdown" role="button" 
                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-placement="bottom-end"
                        > 
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
                <!-- <div class="imagedisplay w-4">
                    Welcome to Milestone!
            </div> -->

            <div class="display-anniv">
            <div class="records table-responsive mt-3 col-md-4">
                <table id="records" class="table text-center" >
                <thead>
            <tr>
                <th style="font-size: 32px; background-color:#6c63ff; color: white;">HAPPY ANNIVERSARY</th>
            </tr>
        </thead>
        <tbody>
            
                    <?php

                 
            // Fetch data from the database
            require_once 'config.php';

            // Create connection using defined constants
            $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $query = " SELECT * FROM emp_record 
                    WHERE MONTH(date_started) = MONTH(CURDATE()) 
                    AND DAY(date_started) = DAY(CURDATE());";
            $result = $conn->query($query);

            
            while ($row = $result->fetch_assoc()) {
                $formatted_date = date("F j, Y", strtotime($row['date_started']));

                $amount = $row['salary'];
                $formatted_amount = number_format($amount, 2);
              
                echo "<tr>
                      
                      
                        <td>{$row['lname']}, {$row['fname']} {$row['mname']} </td>
                     
                       
                    </tr>";
            }
          
            ?>
        </tbody>
                </table>
            </div>
            </div>
    </div>
</div>

<script>
    window.onload = function() {
        setTimeout(() => {
            document.querySelector(".imagedisplay").classList.add("fade-out");
        }, 4000); // Image starts fading after 4 seconds
    };
</script>

<script>
    var el = document.getElementById("wrapper")
    var toggleButton = document.getElementById("menu-toggle")
    toggleButton.onclick = function() {
        el.classList.toggle("toggled")
    }
</script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="textanime.js"></script>


    
</body>                                                                                                                                                             
</html>