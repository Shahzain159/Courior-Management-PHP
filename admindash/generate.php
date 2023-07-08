<?php

// include 'header.php';



include 'vendor2/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$conn = mysqli_connect("localhost","root","","e-project");
$res =  mysqli_query($conn,"SELECT * FROM c_status");


if(isset($_POST["file_content"]))
{
 $temporary_html_file =   time() . '.html';

 file_put_contents($temporary_html_file, $_POST["file_content"]);

 $reader = IOFactory::createReader('Html');

 $spreadsheet = $reader->load($temporary_html_file);

 $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

 $filename = time() . '.xlsx';

 $writer->save($filename);

 header('Content-Type: application/x-www-form-urlencoded');

 header('Content-Transfer-Encoding: Binary');

 header("Content-disposition: attachment; filename=\"".$filename."\"");

 readfile($filename);

 unlink($temporary_html_file);

 unlink($filename);

 exit;
}



$query3 = "SELECT * FROM contact ";
$res2 = mysqli_query($conn,$query3);

?>



<!DOCTYPE html>
<html>
   <head>
     <title>Convert HTML Table to Excel using PHPSpreadsheet</title>
      <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
   </head>
   <body id="page-top">
   <div id="wrapper">
   <ul  style="background-color: orangered;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin-Qurior Box</div>
</a>


<hr class="sidebar-divider my-0">

<li class="nav-item">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<hr class="sidebar-divider">

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Agents</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Agents Information:</h6>
            <a class="collapse-item" href="createagent.php">Create Agent</a>
            <a class="collapse-item" href="agent.php">Manage Agent</a>
        </div>
    </div>
</li>


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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
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

     <div class="container">
      <br />
    
      <br />
      <div class="table-responsive">
       <form method="POST" id="convert_form" action="">
            <table class="table table-striped table-bordered" id="table_content">
              <tr>
              <th>ID</th>
                                  <th>Courier ID</th>
                                  <th>Courier Tracking ID</th>
                                  <th>Courier Status</th>
                                  <th>Courier Expected Date</th>
                                  <th>Courier Recieve Info</th>
              </tr>
              <?php
              while($row = mysqli_fetch_assoc($res))
              {
                echo '
                <tr>
                <th scope="row">'.$row["c_status_id"].'</th>
                <td>'.$row["c_status_c_id"].'</td>
                <td>'.$row["trac_id"].'</td>
                <td>'.$row["c_status"].'</td> 
                <td>'.$row["c_expected_date"].'</td> 
                <td>'.$row["c_recieve_info"].'</td> 
                </tr>
                ';
              }
              ?>
            </table>
            <input type="hidden" name="file_content" id="file_content" />
            <button  style="background-color: orangered;color:white;" type="button" name="convert" id="convert" class="btn btn">Generate</button>
          </form>
          <br />
          <br />
      </div>
     </div>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


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
<script>
$(document).ready(function(){
 $('#convert').click(function(){
    var table_content = '<table>';
    table_content += $('#table_content').html();
    table_content += '</table>';
    $('#file_content').val(table_content);
    $('#convert_form').submit();
  });
});
</script>