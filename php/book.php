
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>book</title>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" /> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="../css/login.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <style>
      .inputBox {
    margin-bottom: 15px;
}

.inputBox span {
    display: block;
      font-size: 16px;
    margin-bottom: 5px;
}

.inputBox select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

.inputBox select:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

      
   </style>

</head>
<body>
   


<section class="header">

   <a href="../index.html" class="logo" ><img src="../image/logo.jpeg" alt="" height="80" width="80"></a>

   <nav class="navbar">
      <a href="../index.html">home</a>
      <a href="../about.html">about</a>
      <a href="../index.html">package</a>
      <a href="logout.php">logout</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>



<div class="heading" style="background:url(../image/Epic\ -\ Intro.gif) no-repeat">
   <h1>book now</h1>
</div>



<section class="booking">


   <section class="booking">
   <h1 class="heading-title">Book your trip!</h1>
   <form action="book_form.php" method="post" class="book-form" id="bookingForm">
      <div class="flex">
         <div class="inputBox">
            <span>Name:</span>
            <input type="text" placeholder="Enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>Email:</span>
            <input type="email" placeholder="Enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>Phone:</span>
            <input type="text" placeholder="Enter your number" name="phone" required>
         </div>
         <div class="inputBox">
            <span>Address:</span>
            <input type="text" placeholder="Enter your address" name="address" required>
         </div>
         <div class="inputBox">
            <span>from to:</span>
            <input type="text" placeholder="Where are from" name="location" required>
         </div>
         <div class="inputBox">
            <span>How many:</span>
            <input type="number" placeholder="Number of guests" name="guests" required>
         </div>
         <div class="inputBox">
            <span>Arrivals:</span>
            <input type="date" name="arrivals" required>
         </div>
         <div class="inputBox">
            <span>Leaving:</span>
            <input type="date" name="leaving" required>
         </div>
      </div>
      <div class="inputBox">
            <span>Package Name:</span>
            <br>
            <select name="package_name" id="packageName" aria-placeholder="select your package" required>
    <option value="Ooty">Ooty</option>
    <option value="Mahabhallipuram">Mahabhallipuram</option>
    <option value="Kanyakumari">Kanyakumari</option>
    <option value="Hogenakkal Falls">Hogenakkal Falls</option>
    <option value="Thanjavur">Thanjavur</option>
    <option value="Thanuskodi">Thanuskodi</option>
    <option value="Madurai">Madurai</option>
    <option value="Bodimetu Top Station">Bodimetu Top Station</option>
    <option value="Jatayu">Jatayu</option>
    <option value="Varkala">Varkala</option>
    <option value="Taj Mahal">Taj Mahal</option>
    <option value="Munnar">Munnar</option>
    <option value="Ladakh">Ladakh</option>
    <option value="Goa">Goa</option>
    <option value="Kovalam">Kovalam</option>
    <option value="Alleppey">Alleppey</option>
    <option value="Coorg">Coorg</option>
    <option value="Manali">Manali</option>
</select> 
         </div>
      <a href="trainticket.php"><input type="submit" value="BOOK" class="btn" name="send"></a>
   </form>
</section>






<!-- footer section starts -->
<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="index.html"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.html"> <i class="fas fa-angle-right"></i> about</a>
         <a href="index.html"> <i class="fas fa-angle-right"></i> package</a>
         <a href="login.php"><i class="fas fa-angle-right"></i>Login</a>
      </div>

      

   </div>

   <div class="credit"> crafted by <span>PEARLTOURISM</span> | all rights reserved! </div>

</section>
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
<!-- footer section ends -->

</body>
</html>
