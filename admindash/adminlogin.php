<?php
session_start();
session_destroy();

$conn = mysqli_connect("localhost","root","","e-project");
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $email = $_POST["admin_email"];
    $pass = $_POST["admin_password"];
    $query = "SELECT * FROM admin_login WHERE admin_email='$email'";

    $res = mysqli_query($conn,$query);

    if (mysqli_num_rows($res)) {
       $row = mysqli_fetch_assoc($res);

    //    if (password_verify($pass,$row["admin_password"])) {
    //     session_start();
    //     $_SESSION["user"]=$row;
    //     header('Location:index.php');
    //    }
    //    else {
    //     echo 'Wrong Password';
    //    }
        
        if($pass == $row["admin_password"]){
            session_start();
       $_SESSION["user"]=$row;
        header('Location:index.php');
        }
        else{
            echo '<h1 style="color:white;font-family:serif;">Wrong Password</h1>';
        }
    }
    else {
        echo '<h1 style="color:white;font-family:serif;">Wrong Email</h1>';
    
       }
//     $pass2 = password_hash($pass,PASSWORD_DEFAULT);
//  $query = "INSERT INTO user Values (Null,'$name','$email','$pass')";
//  mysqli_query($conn,$query);
// header('Location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body  style="background-color: orangered;" class="">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div><img src="logo.png" alt="" width="100%" style=" margin:3em;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back! <br> ADMIN</h1>
                                    </div>
                                    <hr>
                                    <!-- <form method="post" class="user">
                                        <div class="form-group">
                                            <input type="email" required  name="admin_email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required  name="admin_password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div> 
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input required type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div><hr>
                                        </div>  <hr>
                                        <input class="btn btn-primary mt-3 w-100" type="submit" value="Login">

                                       
                                       
                                    </form> -->
                                    <form action="" method="post"> 
            <input class="form-control mt-3" type="email" placeholder="Enter Email Address..."  name="admin_email" >
            <input class="form-control mt-3" type="text" placeholder="Enter Password..." name="admin_password" >
             <hr>
            <input  style="background-color: orangered;color:white;" class="btn btn mt-3 w-100" type="submit" value="Login">
        </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>