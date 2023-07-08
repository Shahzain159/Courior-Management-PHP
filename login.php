
<?php
session_start();
session_destroy();

$conn = mysqli_connect("localhost","root","","e-project");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["u_email"];
    $pass = $_POST["u_password"];
    $query = "SELECT * FROM user2 WHERE u_email='$email'";

    $res = mysqli_query($conn,$query);

    if (mysqli_num_rows($res)) {
       $row = mysqli_fetch_assoc($res);

       if (password_verify($pass,$row["u_password"])) {
        session_start();
        $_SESSION["user"]=$row;
        header('Location:courier.php');
       }
       else {
        echo 'Wrong Password';
       }
    }
    else {
        echo 'Wrong Email';
       }
    // $pass2 = password_hash($pass,PASSWORD_DEFAULT);
//  $query = "INSERT INTO user Values (Null,'$name','$email','$pass')";
//  mysqli_query($conn,$query);
// header('Location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />
</head>
<body>
<main class="main" id="top">
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/gallery/logo.png" height="45" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <!-- <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="index.html">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#services">Our Services</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#findUs">Find Us</a></li>
            </ul> -->
            <div class="dropdown d-none d-lg-block">
              <!-- <button class="btn bg-soft-warning ms-2" id="dropdownMenuButton1" type="submit" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-search text-warning"></i></button> -->
              <!-- <div class="dropdown-menu dropdown-menu-lg-end p-0 rounded" aria-labelledby="dropdownMenuButton1" style="top:55px">
                <form>
                  <input class="form-control border-200" type="search" placeholder="Search" aria-label="Search" style="background:#FDF1DF;" />
                </form>
              </div> -->
            </div><a class="btn btn-primary order-1 order-lg-0 ms-lg-3" style="justify-self: right;" href="register.php">SIGN UP</a>
            <!-- <form class="d-flex my-3 d-block d-lg-none">
              <input class="form-control me-2 border-200 bg-light" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form> -->
          </div>
        </div>
      </nav>
      <br>
      <br>
      <br>
      <br>
    <div class="w-50 m-3" style="border:1px solid black;padding:3em;background-color:white;opacity:75%;border-radius:10%;" >
        <h1 style=" font-family:serif;color:#FE7A15;">LOGIN</h1>
        <hr>
        <form action="" method="post"> 
            <input class="form-control mt-3" placeholder="Email" type="email" name="u_email" id="">
            <input class="form-control mt-3" type="text" placeholder="Password" name="u_password" id="">
             <hr>
            <input class="btn btn-primary mt-3 w-100" type="submit" value="Login">
        </form>
       
   
    </div>
</body>
</html>