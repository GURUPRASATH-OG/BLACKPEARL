<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="../css/login.css">
<style>

</style>
</head>
<body>
   


<section class="header">

<a href="../index.html" class="logo"> <img src="../image/logo.jpeg" class="logo" width="70" height="60"> </a>

   <nav class="navbar">
      <a href="../index.html">Home</a>
      <a href="../about.html">About</a>
      <a href="../index.html">Package</a>
      
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>



<div class="heading" style=  " background:url(../image/shapes.gif)  no-repeat">
   <h1>REGISTER</h1>
</div>

    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully now login.</div>";
		header("Location:login.php");
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <br>
                <h1>Enter full Name</h1>
                <br>
                <div>
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
                <br>
                <br>
                
            </div>
            <div class="form-group">
                <br>
                <h1>Enter Email:</h1>
                <br>
                <input type="email" class="form-control" name="email" placeholder="Email:">
                <br>
                <br>
            </div>
            <div class="form-group">
                <h1>password (min 8characters!)</h1>
                <br>
                <input type="password" class="form-control" name="password" placeholder="Password:">
                <br>
                <br>
                
            </div>
            <div class="form-group">
                <h1>Confirm password</h1>
                <br>
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
                <br>
            </div>
            <div class="form-btn">
                <br>
                <br>
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
                <br>
                <br>
            </div>
        </form>
        <div>
        <div><h1>Already Registered <a href="login.php">Login Here</a></h1></div>
      </div>
    </div>
</div>


<!--footer section-->
<section class="footer">
   <div class="box-container">
      <div class="box">
         <h3>quick links</h3>
         <a href="../index.html" style="color:#16a085;"> <i class="fas fa-angle-right"></i> Home</a>
         <a href="../about.html"style="color:#16a085;" > <i class="fas fa-angle-right"></i> About</a>
      </div>
   </div>
   <div class="credit"> crafted by <span>PEARL TOURISM</span> | all rights reserved! </div>
</section>
<!-- footer ends-->


<!--script-->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="/js/script.js"></script>
<!--script ends-->
</body>
</html>