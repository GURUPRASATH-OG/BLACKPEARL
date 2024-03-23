<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Payment failed</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    
   <section class="header">

<a href="index.html" class="logo"> <img src="image/logo.jpeg" class="logo" width="40" height="40"> </a>

   <nav class="navbar">
      <a href="index.html">home</a>
      <a href="about.html">about</a>
      <a href="index.html">package</a>
      <a href="../BLACKPEARL/php/userkill.php">logout</a>
      
      
   </nav>
</section>
    
    <script>
Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "SEAT FULL !",
  footer: '<a href="trainticket.php">Try Another train</a>'
});
</script>

</body>
</html>