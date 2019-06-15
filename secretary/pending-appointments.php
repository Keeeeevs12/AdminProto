<?php include '../includes/dbconnection.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>CLDH Clinic Reservation</title>
  <!-- Favicon -->
  <link href="../assets/img/brand/logocldh.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <!-- Datatables CSS -->
  <!-- <link type="text/css" href="./assets/css/datatables/jquery.dataTables.min.css">
  <link type="text/css" href="./assets/css/datatables/buttons.dataTables.min.css">
  <link type="text/css" href="./assets/vendor/datatables/buttons.bootstrap4.css"> -->
</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" style="padding-bottom: 0px;" href="../index-sec.php">
        <!-- <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
        <p class="text-primary" style="font-weight: bold; font-size: 38px;">SECRETARY</p>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
                <span class="mb-0 text-sm  font-weight-bold">SECRETARY</span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <div class="dropdown"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="../index-sec.php">
                <p class="text-primary" style="font-weight: bold; font-size: 35px;">SECRETARY</p>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../index-sec.php">
              <i class="ni ni-calendar-grid-58 text-primary"></i> Clinic Schedule
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="./examples/sec-accounts.html">
              <i class="fas fa-calendar-check text-yellow"></i> Appointments
            </a>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link" href="" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-expanded="false" aria-controls="navbar-examples">
                <i class="fas fa-calendar-check text-yellow"></i>
                <span class="nav-link-text">Appointments</span>
            </a>

            <div class="dropdown-menu" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="pending-appointments.php">
                          <i class="ni ni-bullet-list-67 text-red"></i>Pending Appointments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="accepted-appointments.php">
                          <i class="ni ni-bullet-list-67 text-success"></i>Accepted Appointments
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="pending-appointments.php">Pending Appointments</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Secretary</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <div class="dropdown"></div>
              <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="text-white mb-0">Pending Appointments</h3>
                    </div>
                </div>
          </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Client Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time Schedule</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Room</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $query = mysqli_query($con,"SELECT * FROM appointments WHERE appointments.status = '0'");
                while ($rows = mysqli_fetch_assoc($query)) {
                $p_id = $rows['patients_id'];
                $s_id = $rows['sec_id'];
                $query1 = mysqli_query($con,"SELECT * FROM users WHERE users.patients_id = '$p_id'");
                $query2 = mysqli_query($con,"SELECT * FROM sec_accnts WHERE sec_accnts.sec_id = '$s_id'");
                while ($rows1 = mysqli_fetch_assoc($query1)) {
                while ($rows2 = mysqli_fetch_assoc($query2)) {
                ?>
                <tr>
                    <td> <?php echo $rows1['full_name']; ?> </td>
                    <td> <?php echo $rows['day'] ?> </td>
                    <td> <?php echo $rows['time_start'].' - '.$rows['time_end']; ?> </td>
                    <td> <?php echo $rows2['full_name']; ?> </td>
                    <td> <?php echo $rows['room']; ?> </td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-confirm">Confirm</button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-decline">Decline</button>
                    </td>
                </tr>
                <?php } } }?>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 <a href="" class="font-weight-bold ml-1" target="_blank">Central Luzon Doctor's Hospital Clinic Reservation System</a>
            </div>
          </div>
        </div>
      </footer>

       <!-- confirm sched modal -->
       <div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
              <div class="modal-content">
                  
                  <div class="modal-header"> 
                      <h6 class="modal-title" id="modal-title-default">Confirm Appointment</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  
                  <div class="modal-body">
                      
                      <p>Are you sure you want to <span class="text-success" style="font-weight: bold;">CONFIRM</span> this appointment?</p>
                      
                  </div>
                  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-primary">Confirm</button>
                      <button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Close</button> 
                  </div>
              </div>
              </div>
       </div>
  <!-- end confirm sched modal -->

        <!-- confirm sched modal -->
        <div class="modal fade" id="modal-decline" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Decline Appointment</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        
                        <p>Are you sure you want to <span class="text-danger" style="font-weight: bold;">DECLINE</span> this appointment?</p>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Confirm</button>
                        <button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Close</button> 
                    </div>
                </div>
            </div>
        </div>
            
    <!-- end confirm sched modal -->

    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.0"></script>
  <!-- Datatables JS -->
  <!-- <script src="./assets/js/datatables/jquery-3.3.1.js"></script>
  <script src="./assets/js/datatables/jquery.dataTables.min.js"></script>
  <script src="./assets/js/datatables/dataTables.buttons.min.js"></script>
  <script src="./assets/js/datatables/buttons.print.min.js"></script>
  <script src="./assets/vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="./assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#genReport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
  </script> -->
</body>

</html>