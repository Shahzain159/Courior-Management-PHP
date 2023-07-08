<?php
include 'header.php';
$conn = mysqli_connect("localhost","root","","e-project");


// if(isset($_GET["did"])){
//     $id = $_GET["did"];
//     $path = $_GET["path"];
//     echo $id;
//     echo $path;

//     unlink($path);

//     mysqli_query($conn,"DELETE FROM curior_details WHERE admin_courid = $id");

//     header('Location:newcourier.php');
// }
// $r = mysqli_query($conn,"SELECT * FROM user2");
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $cname = $_POST["c_name"];
//     $cweight = $_POST["c_weight"];
//     $cuserid = $_POST["c_user_id"];

//     $query = "INSERT INTO curior_details VALUES(NULL,'$cname','$cweight','$cuserid')";
//     mysqli_query($conn,$query);
// }
$res = mysqli_query($conn,"SELECT * FROM curior_details");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $c_status_c_id = $_POST["c_status_c_id"];
    $trac_id = $_POST["trac_id"];
    $c_status = $_POST["c_status"];
    $c_expected_date = $_POST["c_expected_date"];
    $c_recieve_info	 = $_POST["c_recieve_info"];

    $query2 = "INSERT INTO c_status VALUES(NULL,'$c_status_c_id','$trac_id','$c_status','$c_expected_date','$c_recieve_info	')";
    mysqli_query($conn,$query2);
}
$query = "SELECT * FROM contact ";
$res2 = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-new courier</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul  style="background-color: orangered;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Agent-Qurior Box</div>
</a>


<hr class="sidebar-divider my-0">

<li class="nav-item">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<hr class="sidebar-divider">


<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Courier Bills</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Create Bills:</h6>
                        <a class="collapse-item" href="createbills.php">Create Bills</a>
                        <a class="collapse-item" href="managebills.php">Manage Bills</a>
                    </div>
                </div>
            </li>


<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Couriers</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Couriers Information:</h6>
                        <a class="collapse-item" href="newcourier.php">New Couriers</a>
                        <a class="collapse-item" href="courierdetail.php">View Couriers Detail</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Couriers Status Info:</h6>
                        <a class="collapse-item" href="newcourierstatus.php">Send Couriers</a>
                        <a class="collapse-item" href="courierstatus.php">View Couriers Status</a>
                    </div>
                </div>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="sndsms.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Send Delivery SMS</span></a>
            </li>



<li class="nav-item active">
    <a class="nav-link" href="user.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Customers Details</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn" style="background-color: orangered;color:white;"type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


           
                      
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header" style="background-color: orangered;">
                                    Message Center
                                </h6>   
                             
                                    
                                        <?php
                                        while($row2 = mysqli_fetch_assoc($res2)){
                                            echo '
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">'.$row2["con_msg"].'</div>
                                        <div class="small text-gray-500">'.$row2["con_name"].'</div>
                                         </div>
                                         </a>
                                        ';
                                    }
                                        ?>
                                   
                                 
                           
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["user"]["agent_name"]?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Send Courier Status</h1>

                    <div class="card shadow mb-4">
                       
                      
                           <form class="w-50 m-3" action="" method="post" enctype="multipart/form-data">
    <!-- <input class="form-control mt-3" type="number" name="id" id="" placeholder="ID"> -->

    <!-- <input class="form-control mt-3" required type="text" name="agent_name" placeholder="Name"> -->
        <select class="form-select mt-3 w-100" placeholder="Enter Courier Name" required name="c_status_c_id" >
        <option selected>SELECT Courier</option>
             <?php 
            while($row = mysqli_fetch_assoc($res)){
                echo'
                <option value="'.$row["c_id"].'">'.$row["c_id"].'</option>
                ';  
            }
            ?>
             </select>
             <input class="form-control mt-3" value="<?php echo 'ODR'.(rand());?>" placeholder="Enter Tracking ID" required type="text" name="trac_id" id="">
             <input class="form-control mt-3" placeholder="Enter Courier Status" required type="text" name="c_status" id="">
             <input class="form-control mt-3" placeholder="Enter Courier Expected Date" required type="datetime-local" name="c_expected_date" id="">
             <input class="form-control mt-3" placeholder="Enter Courier Recieve Information" required type="text" name="c_recieve_info" id="">
          
                     <!-- <label name="c_user_id" >Search User
              <input type="search" class="form-control form-control-sm" placeholder="'.$row["u_id"].'" value aria-controls="dataTable">
              <option value="'.$row["u_id"].'">'.$row["u_id"].'</option>
              </label> -->
            <!-- <input class="form-control mt-3" min="8" type="text"required name="password" placeholder="Confirm Password"> -->
             <hr>
            <input style="background-color: orangered;color:white;"  class="btn btn mt-3 w-100" type="submit" value="Send Courier Details">

</form>     
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
       
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="agentlogin.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>