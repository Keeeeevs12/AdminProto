<?php
    session_start();
    include 'includes/unauth.php';
    include 'includes/dbconnection.php';
    auth_sec();
    $sec_name = $_SESSION['full_name'];
    $sec_id = $_SESSION['sec_id'];
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header( "Location: index.php");
    }
    if (isset($_POST['add_doc'])) {
        $full_name = $_POST['doc_name'];
        if ($query = mysqli_query($con, "INSERT INTO doc_accnts (full_name, sec_id) VALUES ('$full_name', '$sec_id')")) {
            $transac_mes = $sec_name . ' has added Dr. '.$full_name.' to clinic ' .$_SESSION['clinic']. '.';
            $query = mysqli_query($con, "INSERT INTO transacs (transac_datetime, transac_mes, transac_user) VALUES (current_timestamp(), '$transac_mes', '$sec_name')");
        }
    }
    if (isset($_POST['del_doc'])) {
        $del_id = $_POST['del_ids'];
        $result = mysqli_query($con, "SELECT * FROM doc_accnts WHERE doc_accnts.doc_id = '$del_id'");
        $rows = mysqli_fetch_assoc($result);
        $full_name = $rows['full_name'];
        if ($query = mysqli_query($con, "DELETE FROM doc_accnts WHERE doc_accnts.doc_id = '$del_id'")){
            $transac_mes = $sec_name . ' has removed Dr. '.$full_name.' from ' .$_SESSION['clinic']. ' clinic.';
            $query = mysqli_query($con, "INSERT INTO transacs (transac_datetime, transac_mes, transac_user) VALUES (current_timestamp(), '$transac_mes', '$sec_name')");
        }
    }
    if (isset($_POST['edit_doc'])) {
        $edit_id = $_POST['edit_ids'];
        $n_full_name = $_POST['n_full_name'];
        if ($query = mysqli_query($con, "UPDATE doc_accnts SET full_name = '$n_full_name' WHERE doc_accnts.doc_id = '$edit_id'")){
            $transac_mes = $sec_name . ' has edit Dr. '.$n_full_name.' informations.';
            $query = mysqli_query($con, "INSERT INTO transacs (transac_datetime, transac_mes, transac_user) VALUES (current_timestamp(), '$transac_mes', '$sec_name')");
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>CLDH Clinic Reservation</title>
    <!-- Favicon -->
    <link href="./assets/img/brand/logocldh.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">
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
        <a class="navbar-brand pt-0" style="padding-bottom: 0px;" href="./index-sec.php">
            <!-- <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
            <p class="text-primary" style="font-weight: bold; font-size: 38px;">SECRETARY</p>
        </a>
        <p class="text-center" style="font-weight: bold; font-size: 15px;"><?php echo $_SESSION['clinic'];?></p>
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
                    <a href="secretary/profile.php" class="dropdown-item">
                        <i class="ni ni-circle-08"></i>
                        <span>User Profile</span>
                    </a>
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
                        <a href="./index-sec.php">
                            <p class="text-primary" style="font-weight: bold; font-size: 35px;">SECRETARY</p>
                        </a>
                        <p class="text-center" style="font-weight: bold; font-size: 15px;"><?php echo $_SESSION['clinic'];?></p>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index-sec.php">
                        <i class="ni ni-calendar-grid-58 text-primary"></i> Clinic Schedule
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-expanded="false" aria-controls="navbar-examples">
                        <i class="fas fa-calendar-check text-yellow"></i>
                        <span class="nav-link-text">Appointments</span>
                    </a>

                    <div class="dropdown-menu" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="./secretary/pending-appointments.php">
                                    <i class="ni ni-bullet-list-67 text-red"></i>Pending Appointments
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./secretary/accepted-appointments.php">
                                    <i class="ni ni-bullet-list-67 text-success"></i>Accepted Appointments
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="secretary/profile.php">
                        <i class="ni ni-single-02 text-danger"></i> Profile
                    </a>
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
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index-sec.php">Clinic Schedule</a>
            <!-- User -->
            <form action="" method="post">
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
                            <a href="secretary/profile.php" class="dropdown-item">
                                <i class="ni ni-circle-08"></i>
                                <span>User Profile</span>
                            </a>
                            <button name="logout" type="submit" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </button>
                        </div>
                    </li>
                </ul>
            </form>
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
                                <h3 class="text-white mb-0">Clinic Schedules</h3>
                            </div>
                            <div class="col text-right" >
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-addSched">Add Schedule</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Doctor's Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Room</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    Calvin Khen Lacson
                                </td>
                                <td>
                                    Monday
                                </td>
                                <td>
                                    1:00 PM
                                </td>
                                <td>
                                    4:00 PM
                                </td>
                                <td>
                                    222
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-editSched">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="text-white mb-0">List of Doctors</h3>
                        </div>
                        <div class="col text-right" >
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-addDoc">Add Doctor</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Doctor's ID</th>
                            <th scope="col">Doctor's Name</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = mysqli_query($con,"SELECT * FROM doc_accnts WHERE doc_accnts.sec_id = '$sec_id'");
                            while ($rows = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><?php echo $rows['doc_id']; ?></td>
                            <td><?php echo $rows['full_name']; ?></td>
                            <td>
                                <button type="button" onclick="test(this.id)" id="<?php echo $rows['doc_id']; ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-editDoc">Edit</button>
                                <button type="button" onclick="test(this.id)" id="<?php echo $rows['doc_id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-deleteDoc">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
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

<!--add doctor modal-->
<div class="row">
    <div class="col-md-4">
        <div class="modal fade" id="modal-addDoc" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h2 class="modal-title" id="modal-title-default">Add Doctor:</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="" autocomplete="off">

                            <div class="pl-lg-4">
                                <h3>Doctor's Name</h3>
                                <div class="form-group">
                                    <label class="form-control-label" for="">Full Name:</label>
                                    <input type="text" name="doc_name" id="" class="form-control form-control-alternative"  required autofocus>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="add_doc" class="btn btn-success mt-4">Add Doctor</button>
                                <button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--end add doctor modal-->

<!--edit doctor modal-->
<div class="row">
    <div class="col-md-4">
        <div class="modal fade" id="modal-editDoc" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h2 class="modal-title" id="modal-title-default">Edit Doctor:</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="" autocomplete="off">

                            <div class="pl-lg-4">
                                <h3>Doctor's Name</h3>
                                <div class="form-group">
                                    <label class="form-control-label" for="">Full Name:</label>
                                    <input type="text" name="n_full_name" id="" class="form-control form-control-alternative"  required autofocus>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <input type="hidden" id="edit_id" name="edit_ids" value=""/>
                                <button type="submit" name="edit_doc" class="btn btn-success mt-4">Save Changes</button>
                                <button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--end edit doctor modal-->

<!-- delete doctor account modal -->
<div class="modal fade" id="modal-deleteDoc" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Delete Doctor</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <p>Are you sure you want to <span class="text-danger" style="font-weight: bold;">DELETE</span> this Doctor?</p>

            </div>

            <form method="post" action="">
                <div class="modal-footer">
                    <input type="hidden" id="del_id" name="del_ids" value=""/>
                    <button type="submit" name="del_doc" class="btn btn-primary">Confirm</button>
                    <button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- end delete doctor modal -->

<!--add schedule modal-->
<div class="row">
    <div class="col-md-4">
        <div class="modal fade" id="modal-addSched" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h2 class="modal-title" id="modal-title-default">Add Schedule:</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="" autocomplete="off">

                            <div class="pl-lg-4">
                                <h3>Doctor's Name</h3>
                                <div class="form-group">
                                    <select class="form-control form-control-alternative" name="" id="" required autofocus>
                                        <option value="">Select Doctor</option>
                                        <option value="Dr. Calvin Khen Lacson">Dr. Calvin Khen Lacson</option>
                                        <option value="Dr. Erandy Magandaleno">Dr. Erandy Magdaleno</option>
                                    </select>
                                </div>

                                <hr class="my-3">
                                <h3>Schedule</h3>
                                <div class="form-group">
                                    <label class="form-control-label">Date:</label>
                                    <select class="form-control form-control-alternative" name="" id="" required autofocus>
                                        <option value="">Select Date</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="">From:</label>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="text-nowrap">HH:MM AM/PM</span>
                                    </p>
                                    <input type="time" name="" id="" class="form-control form-control-alternative"  required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="">To:</label>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="text-nowrap">HH:MM AM/PM</span>
                                    </p>
                                    <input type="time" name="" id="" class="form-control form-control-alternative"  required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="">Room:</label>
                                    <input type="text" name="" id="" class="form-control form-control-alternative"  required autofocus>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success mt-4">Add Schedule</button>
                                <button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--end add schedule modal-->

<!--edit schedule modal-->
<div class="row">
    <div class="col-md-4">
        <div class="modal fade" id="modal-editSched" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h2 class="modal-title" id="modal-title-default">Edit Schedule:</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="" autocomplete="off">

                            <div class="pl-lg-4">
                                <h3>Doctor's Name</h3>
                                <div class="form-group">
                                    <select class="form-control form-control-alternative" name="" id="" required autofocus>
                                        <option value="">Select Doctor</option>
                                        <option value="Dr. Calvin Khen Lacson">Dr. Calvin Khen Lacson</option>
                                        <option value="Dr. Erandy Magandaleno">Dr. Erandy Magdaleno</option>
                                    </select>
                                </div>

                                <hr class="my-3">
                                <h3>Schedule</h3>
                                <div class="form-group">
                                    <label class="form-control-label">Date:</label>
                                    <select class="form-control form-control-alternative" name="" id="" required autofocus>
                                        <option value="">Select Date</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="">From:</label>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="text-nowrap">HH:MM AM/PM</span>
                                    </p>
                                    <input type="time" name="" id="" class="form-control form-control-alternative" value="1:00 PM" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="">To:</label>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="text-nowrap">HH:MM AM/PM</span>
                                    </p>
                                    <input type="time" name="" id="" class="form-control form-control-alternative" value="4:00 PM" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="">Room:</label>
                                    <input type="text" name="" id="" class="form-control form-control-alternative" value="222" required autofocus>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success mt-4">Save Changes</button>
                                <button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--end edit schedule modal-->

<!-- delete secretary account modal -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Delete Schedule</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <p>Are you sure you want to <span class="text-danger" style="font-weight: bold;">DELETE</span> this schedule?</p>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirm</button>
                <button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Close</button>
            </div>

        </div>

        <!-- end delete schedule modal -->

    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function test(clickedID){
        document.getElementById("edit_id").value = clickedID;
        document.getElementById("del_id").value = clickedID;
    }
</script>
<!-- Optional JS -->
<script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="./assets/js/argon.js?v=1.0.0"></script>

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