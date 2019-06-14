<?php include '../includes/dbconnection.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>CLDH Clinic Reservation System</title>
  <!-- Favicon -->
  <link href="../assets/img/brand/logocldh.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
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
      <a class="navbar-brand pt-0" style="padding-bottom: 0px;" href="../index.php">
        <p class="text-primary" style="font-weight: bold; font-size: 40px;">ADMIN</p>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="mb-0 text-sm  font-weight-bold">Admin</span>
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
              <a href="../index.php">
                <p class="text-primary" style="font-weight: bold; font-size: 40px;">ADMIN</p>
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
                <a class="nav-link" href="../index.php">
                  <i class="ni ni-tv-2 text-primary"></i> Generate Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="client-accounts.php">
                  <i class="ni ni-single-02 text-blue"></i> Client/Patient Accounts
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sec-accounts.php">
                  <i class="ni ni-single-02 text-yellow"></i> Secretary Accounts
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="sec-accounts.php">Secretary Accounts</a>
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
                        <span class="mb-0 text-sm  font-weight-bold">Admin</span>
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
      <!-- Dark table -->
      <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <div class="row align-items-center">
                  <div class="col-8">
                      <h3 class="text-white mb-0">Secretary Accounts Table</h3>
                  </div>
                  <div class="col-4 text-right" >
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-addSec">Add Secretary</button>
                  </div>
              </div>
          </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Secretary ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Clinic</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                      <?php
                          $query = mysqli_query($con,"SELECT * FROM sec_accnts");
                          while ($rows = mysqli_fetch_assoc($query)) {
                              echo "<tr>";
                              echo "<td>" . $rows['sec_id'] . "</td>";
                              echo "<td>" . $rows['full_name'] . "</td>";
                              echo "<td>" . $rows['contact_num'] . "</td>";
                              echo "<td>" . $rows['email_add'] . "</td>";
                              echo "<td>" . $rows['clinic'] . "</td>";
                      ?>
                    <td>
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-editSec">Edit</button>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">Delete</button>
                    </td>
                    <?php
                            echo "</tr>";
                          }
                    ?>
                </tbody>
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

<!--add secretary account modal-->
<div class="row">
    <div class="col-md-4">
        <div class="modal fade" id="modal-addSec" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">
  
              <div class="modal-header">
                  <h2 class="modal-title" id="modal-title-default">Add Secretary Account:</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
  
              <div class="modal-body">
                          <form method="post" action="" autocomplete="off">

                              <div class="pl-lg-4">
                                  <div class="form-group">
                                      <label class="form-control-label" for="">First Name:</label>
                                      <input type="text" name="efname" id="" class="form-control form-control-alternative"  required autofocus>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="form-control-label" for="">Middle Name:</label>
                                      <input type="text" name="emname" id="" class="form-control form-control-alternative"  required autofocus>
                                  </div>

                                  <div class="form-group">
                                      <label class="form-control-label" for="">Last Name:</label>
                                      <input type="text" name="elname" id="" class="form-control form-control-alternative"  required autofocus>
                                  </div>

                                  <div class="form-group">
                                      <label class="form-control-label" for="">Contact Number:</label>
                                      <input type="number" name="contact_num" id="" class="form-control form-control-alternative"  required autofocus>
                                  </div>

                                  <div class="form-group">
                                        <label class="form-control-label" for="">Email:</label>
                                        <input type="email" name="email_add" id="" class="form-control form-control-alternative"  required autofocus>
                                  </div>

                                  <div class="form-group">
                                        <label class="form-control-label" for="">Clinic:</label>
                                        <input type="text" name="clinic" id="" class="form-control form-control-alternative"  required autofocus>
                                  </div>
                                </div>                             
                                          
                                  <div class="modal-footer">
                                      <button type="submit" name="signup" class="btn btn-success mt-4">Add Secretary</button>
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
    <!--end add secretary account modal-->

    <?php
    if(isset($_POST['signup'])){
            $full_name = $_POST['efname'].' '.$_POST['emname'].' '.$_POST['elname'];
            $email_add = $_POST['email_add'];
            $contact_num = $_POST['contact_num'];
            $password = md5('secret');
            $clinic = $_POST['clinic'];

            if ($query = mysqli_query($con, "INSERT INTO sec_accnts (full_name, email_add, contact_num, password, clinic) VALUES ('$full_name', '$email_add', '$contact_num', '$password', '$clinic')")){
                $transac_mes = 'Admin added secretary '.$full_name.' and assigned to '.$clinic.' clinic.';
                $query = mysqli_query($con, "INSERT INTO transacs (transac_datetime, transac_mes, transac_user) VALUES (current_timestamp(), '$transac_mes', 'Administrator')");
            }
     }
    ?>
<!--edit secretary account modal-->
<div class="row">
        <div class="col-md-4">
            <div class="modal fade" id="modal-editSec" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
              <div class="modal-content">
      
                  <div class="modal-header">
                      <h2 class="modal-title" id="modal-title-default">Edit Secretary Account:</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
      
                  <div class="modal-body">
                              <form method="post" action="" autocomplete="off">
    
                                  <div class="pl-lg-4">
                                      <div class="form-group">
                                          <label class="form-control-label" for="">Secretary ID:</label>
                                          <input type="text" name="" id="" class="form-control form-control-alternative" value="1" disabled autofocus>
                                      </div>

                                      <div class="form-group">
                                          <label class="form-control-label" for="">First Name:</label>
                                          <input type="text" name="" id="" class="form-control form-control-alternative" value="Ivan Dale" required autofocus>
                                      </div>
                                      
                                      <div class="form-group">
                                          <label class="form-control-label" for="">Middle Name:</label>
                                          <input type="text" name="" id="" class="form-control form-control-alternative" value="D." required autofocus>
                                      </div>
    
                                      <div class="form-group">
                                          <label class="form-control-label" for="">Last Name:</label>
                                          <input type="text" name="" id="" class="form-control form-control-alternative" value="Badbaden" required autofocus>
                                      </div>
    
                                      <div class="form-group">
                                          <label class="form-control-label" for="">Contact Number:</label>
                                          <input type="number" name="" id="" class="form-control form-control-alternative" value="09667629830" required autofocus>
                                      </div>
    
                                      <div class="form-group">
                                            <label class="form-control-label" for="">Email:</label>
                                            <input type="email" name="" id="" class="form-control form-control-alternative" value="ivanbadbaden@gmail.com" required autofocus>
                                      </div>

                                      <div class="form-group">
                                            <label class="form-control-label" for="">Clinic:</label>
                                            <input type="email" name="" id="" class="form-control form-control-alternative"  value="Pediatrics" required autofocus>
                                      </div>

                                    </div>                             
                                              
                                      <div class="modal-footer">
                                          <button type="submit" class="btn btn-success mt-4">Save changes</button>
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
        <!--end edit secretary account modal-->

        <!-- delete secretary account modal -->
        <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">Delete account</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            
                            <p>Are you sure you want to <span class="text-danger" style="font-weight: bold;">DELETE</span> this account?</p>
                            
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Confirm</button>
                            <button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Close</button> 
                        </div>
                        
                    </div>

        <!-- end delete secretary account modal -->

    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.0"></script>
</body>

</html>