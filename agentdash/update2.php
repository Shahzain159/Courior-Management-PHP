
<?php

$conn = mysqli_connect("localhost","root","","login2");
if (isset($_GET["uid"])) {
    $id = $_GET["uid"];
    $query = "SELECT * from user2 WHERE id='$id' ";
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($res);
}
print_r($row);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $uid = $_GET["uid"];
    $query = "UPDATE user2 SET u_name='$name', u_email='$email', u_password='$pass', WHERE id='$uid'";
   
    mysqli_query($conn,$query);
    header('location:tables2.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="w-50 m-3">
    <form action="" method="post"><br>
    <!-- <input class="form-control mt-3" value="" type="number" name="number" id="" placeholder="Id"><br> -->
    <input class="form-control mt-3" value="<?php  echo $row["name"] ?>" type="text" name="name" id="" placeholder="Name"><br>
    <select class="form-control mt-3" value="<?php ?>"  name="country" id="" placeholder="Country">
    <option value="pakistan">pakistan</option>
    <option value="india">india</option>
    <option value="china">china</option>
    </select><br>   
    <input class="form-control mt-3" value="<?php echo $row["email"]  ?>"  type="email" name="email" id="" placeholder="Email"><br>

    <input class="btn btn-dark mt-3 w-100" width="100% !important" type="submit" value="Update">
    </form>
</div>
</body>
</html>