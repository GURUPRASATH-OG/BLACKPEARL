<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: book.php");
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
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>




   <section class="header">

<a href="../index.html" class="logo"> <img src="../image/logo.jpeg" class="logo" width="70" height="60"> </a>

   <nav class="navbar">
      <a href="../index.html">Home</a>
      <a href="../about.html">About</a>
      <a href="../index.html">Package</a>
      <a href="adminlogin.php">Admin</a>
      
   </nav>



</section>
</head>
<body>
   






<div class="heading" style=  " background:url(../image/DEEKAY.gif)  no-repeat">
   <h1 style="color: rgb(243, 243, 243);">LOGIN</h1></div>
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
                    header("Location:book.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
         <form action="login.php" method="post">
      <h1><label for="email">Enter Login credentials:</label></h1>
        <div class="form-group">
            <br>
            <br>
            <h1>Enter Email:</h1>
            <br>
            <br>
            <input type="email" id="email"  placeholder="Enter Email" name="email">
            <br>
            <br>
        </div>
        <div class="form-group">
            <br>
            <br>
            <h1><label for="pass">Enter Password:</label></h1>
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

        <h1>Not registered yet <a href="registration.php">Register Here</a></h1>
    </div>

    </section>
<!--footer section-->
<section class="footer">
   <div class="box-container">
      <div class="box">
         <h3>quick links</h3>
         <a href="../index.html" style="color:#16a085;"> <i class="fas fa-angle-right"></i> Home</a>
         <a href="../about.html" style="color:#16a085;"> <i class="fas fa-angle-right"></i> About</a>
      </div>
   </div>
   <div class="credit"> crafted by <span>PEARL TOURISM</span> | all rights reserved! </div>
</section>
<!-- footer ends-->


<!--script-->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="/js/script.js"></script>

<script>
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "register success"
});
</script>
<!--script ends-->

</body>
</html>