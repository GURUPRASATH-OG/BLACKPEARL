
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ACKNOWLEDGEMENT</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="../css/login.css">
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <style>
       body {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 0;
         background-color: #f7f7f7;
      }
   .containers {
         max-width: 1200px;
         margin: 50px auto;
         padding: 30px;
         box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
         background-color: #fff;
         border-radius: 10px;
      }
      .heading {
         background: url("image/Success Animation.gif") center/cover no-repeat;
         text-align: center;
         padding: 40px 0;
      }

      .heading h1 {
         font-size: 36px;
         color: #333;
         margin-bottom: 20px;
      }

      /* Form Styles */
      form {
         max-width: 800px;
         margin: 0 auto;
      }

      .form-group {
         font-size: 20px;
         margin-bottom: 20px;
      }

      label {
         font-weight: bold;
         display: block;
         margin-bottom: 5px;
      }

      input[type="text"] {
         width: 100%;
         padding: 10px;
         border-radius: 5px;
         border: 1px solid #ccc;
         box-sizing: border-box;
         font-size: 16px;
      }

      input[type="submit"] {
         background-color: #3f51b5;
         color: #fff;
         border: none;
         border-radius: 5px;
         padding: 12px 20px;
         font-size: 16px;
         cursor: pointer;
         align-self: center;
         transition: background-color 0.3s ease;
      }

      input[type="submit"]:hover {
         background-color: #2c387e;
      }
   </style>
</head>
<body>

   <section class="header">

      <a href="index.html" class="logo"> <img src="../image/logo.jpeg" class="logo" width="40" height="40"> </a>
      
         <nav class="navbar">
            <a href="index.html">home</a>
            <a href="about.html">about</a>
            <a href="index.html">package</a>
            <a href="userkill.php">logout</a>
            
            
         </nav>
   </section>
   <br>
   <br>
   <br>

   <div class="containers">
      <h2 style="text-align: center;" >Enter Your ID to Check Your Details</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         <div class="form-group">
            
            <input type="text" id="user_id" placeholder="enter id" name="user_id" required>
         </div>
         <input style="text-align: center;" type="submit" value="CHECK">
      </form>

      <!-- Display user details here -->
      <?php include 'fetch_user.php'; ?>
   </div>


<br>
<br>
<br>
<!-- footer section starts -->
<section class="footer">

   <div class="box-container" style="overflow: visible;">

      <div class="box">
         <h3>quick links</h3>
         <a href="index.html"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.html"> <i class="fas fa-angle-right"></i> about</a>
         <a href="index.html"> <i class="fas fa-angle-right"></i> package</a>
         <a href="login.php"><i class="fas fa-angle-right"></i>Login</a>
      </div>

      

   </div>

   <div class="credit"> crafted by <span>PEARLTOURISM</span> | all rights reserved! </div>
   <script>
    swal({

       title: "CONGRATS!",
       text: "your trip is booked!, we will contact you soon!",
       icon: "success",
       if(confirm){
         window.location.href = "index.html";
      },
       button: "CONFIRM",
 
     });
 </script>

</section>
<!-- footer section ends -->

</body>
</html>
