<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: adminpanel.php");
}
?>
<!DOCTYPE html>
<html lang="en">
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

</head>
<body>
<section class="header">

<a href="../index.html" class="logo"> <img src="../image/logo.jpeg" class="logo" width="70" height="60"> </a>

   <nav class="navbar">
      <a href="../index.html">Home</a>
      <a href="../about.html">About</a>
      
   </nav>

</section>
   
<div class="heading" style=  " background:url(../image/Shapes\ Challenge.gif)  no-repeat">
   <h1 style="color:black;">ADMIN LOGIN</h1></div>
    <br>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location:adminpanel.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
         <form action="adminlogin.php" method="post">
      <h1><label for="email">Enter Login credentials:</label></h1>
        <div class="form-group">
            <br>
            <br>
            <h1>Enter Admin Email:</h1>
            <br>
            <br>
            <input type="email" id="email"  placeholder="Enter Email" name="email">
            <br>
            <br>
        </div>
        <div class="form-group">
            <br>
            <br>
            <h1><label for="pass">Enter Admin Password:</label></h1>
            <br>
            <br>
            <input type="password" id="pass" placeholder="Enter Password" name="password" class="form-control" autocapitalize="none" >
            <br>
            <br>
            
        </div>
        <div class="form-btn">
            <br>
            <br>
            <input type="submit" value="Login" name="login" class="btn" style="padding: 15px 20px; border-radius: 20px;">
            <br>
            <br>
        </div>
      </form>
      <br>
      <br>

        
    </div>

    </section>



<!--script-->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="/js/script.js"></script>
<!--script ends-->

</body>
</html>
