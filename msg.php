<?php
include 'haed.php';

$conn = mysqli_connect("localhost","root","","e-project");
if(isset($_SESSION["user"])){
    $sms_user_id = $_SESSION["user"]["u_id"];
    $query2 = "SELECT * FROM sndsms WHERE sms_user_id='$sms_user_id'";

    $res2 = mysqli_query($conn,$query2);
    }

?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>courier box</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');body{background-color: #eeeeee;font-family: 'Open Sans',serif}.container{margin-top:50px;margin-bottom: 50px}.card{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 0.10rem}.card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}.card-header{padding: 0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}.track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px}.track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}.track .step.active:before{background: #FF5722}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #ee5435;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #ee5435;border-color: #ee5435;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #ff2b00;border-color: #ff2b00;border-radius: 1px}
    </style>
  </head>
  <body>



  <main class="main" id="top">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/gallery/logo.png" height="45" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="courier.php">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#msg">Delivery Message</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="bill.php">Bills</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="contact.php">Contact Us</a></li>
              <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <?php echo $_SESSION["user"]["u_name"]?>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item"  href="login.php">Logout</a></li>
    
  </ul>
</div>
          </ul>
            <!-- <div class="dropdown d-none d-lg-block">
              <button class="btn bg-soft-warning ms-2" id="dropdownMenuButton1" type="submit" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-search text-warning"></i></button>
              <div class="dropdown-menu dropdown-menu-lg-end p-0 rounded" aria-labelledby="dropdownMenuButton1" style="top:55px">
                <form>
                  <input class="form-control border-200" type="search" placeholder="Search" aria-label="Search" style="background:#FDF1DF;" />
                </form>
              </div> -->
            <!-- </div><a class="btn btn-primary order-1 order-lg-0 ms-lg-3" href="login.php">Logout</a>
            <form class="d-flex my-3 d-block d-lg-none">
              <input class="form-control me-2 border-200 bg-light" type="search" placeholder="Search" aria-label="Search" />
              
            </form>
          </div> -->
        </div>
      </nav>
      <section class="py-xxl-10 pb-0" id="home">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-header-bg.png);background-position:top center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100" src="assets/img/illustrations/hero.png" alt="hero-header" /></div>
            <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-8">
              <h1 class="fw-normal fs-6 fs-xxl-7">A trusted provider of </h1>
              <h1 class="fw-bolder fs-6 fs-xxl-7 mb-2">courier services.</h1>
              <p class="fs-1 mb-5">We deliver your products safely to <br />your home in a reasonable time. </p><a class="btn btn-primary me-2" href="#!" role="button">Get started<i class="fas fa-arrow-right ms-2"></i></a>
            </div>
          </div>
        </div>
      </section>


      <?php 
    //   if(isset($res2)){

   
      while($row = mysqli_fetch_assoc($res2)){
      echo'

      <div class="card m-6 " style=" text-align: center;width:500px; border-radius: 20px;display: inline-block;"  id="msg">
  <div class="card-header  ">
       <h1 style="color: black;font-family: serif;">Delivery SMS</h1>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">User ID:</li>
    <li class="list-group-item">'.$row["sms_user_id"].'</li>
    <li class="list-group-item">Courier ID:</li>
    <li class="list-group-item">'.$row["sms_cor_id"].'</li>
    <li class="list-group-item">Tracking ID:</li>
    <li class="list-group-item">'.$row["sms_track_id"].'</li>
    <li class="list-group-item">Courier Delivery Message:</li>
    <li class="list-group-item">'.$row["sms_msg"].'</li>
  </ul>
</div>
';
      }
    // }
?>



<section class="bg-900 pb-0 pt-5">

<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12 col-lg-6 mb-4 order-0 order-sm-0"><a class="text-decoration-none" href="#"><img src="assets/img/gallery/footer-logo.png" height="51" alt="" /></a>
      <p class="text-500 my-4">The most trusted Courier<br />company in your area.</p>
    </div>
    <div class="col-6 col-sm-4 col-lg-2 mb-3 order-2 order-sm-1">
      <h5 class="lh-lg fw-bold mb-4 text-light font-sans-serif">Other links </h5>
      <ul class="list-unstyled mb-md-4 mb-lg-0">
        <li class="lh-lg"><a class="text-500" href="#!">Blogs</a></li>
        <li class="lh-lg"><a class="text-500" href="#!">Movers website</a></li>
        <li class="lh-lg"><a class="text-500" href="#!">Traffic Update</a></li>
      </ul>
    </div>
    <div class="col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2">
      <h5 class="lh-lg fw-bold text-light mb-4 font-sans-serif">Services</h5>
      <ul class="list-unstyled mb-md-4 mb-lg-0">
        <li class="lh-lg"><a class="text-500" href="#!">Corporate goods</a></li>
        <li class="lh-lg"><a class="text-500" href="#!">Artworks</a></li>
        <li class="lh-lg"><a class="text-500" href="#!">Documents</a></li>
      </ul>
    </div>
    <div class="col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2">
      <h5 class="lh-lg fw-bold text-light mb-4 font-sans-serif"> Customer Care</h5>
      <ul class="list-unstyled mb-md-4 mb-lg-0">
        <li class="lh-lg"><a class="text-500" href="#!">Our Service</a></li>
        <li class="lh-lg"><a class="text-500" href="#contact">Contact US</a></li>
        <li class="lh-lg"><a class="text-500" href="#!">Find Us</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- end of .container-->

</section>

</main>
  </body>
  </html>