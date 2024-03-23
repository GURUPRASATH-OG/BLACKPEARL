<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header("Location: adminlogin.php");
    exit();
}

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch admin's name and email from the admin_info table
$sql = "SELECT * FROM admin_info WHERE id = 1";
$query = $conn->query($sql);
if ($query->num_rows > 0) {
    $row = $query->fetch_assoc();
    $admin_name = $row['name'];
    $admin_email = $row['email'];
} else {
    $errors[] = "Admin not found";
}
// Get total number of IDs
$sql = "SELECT COUNT(id) AS total_ids FROM train_bookings";
$result = $conn->query($sql);
$total_ids = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_ids = $row["total_ids"];
}

// Get total cost of all bookings
$sql = "SELECT SUM(total_cost) AS total_cost FROM train_bookings";
$result = $conn->query($sql);
$total_cost = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_cost = $row["total_cost"];
}







// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Page</title>
<link rel="stylesheet" href="../css/login.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .containers{
        width: 600px;
        margin: 0px 10px ;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        text-align: center;
        font-size: x-large;
    }
    .container {
         max-width: 600px;
         margin: 50px auto;
         padding: 20px;
         background-color: #f5f5f5;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      h1 {
         text-align: center;
         color: #333;
      }

      .stats {
         display: flex;
         justify-content: space-around;
         margin-top: 30px;
      }

      .stat-box {
         text-align: center;
         padding: 20px;
         background-color: #fff;
         border-radius: 8px;
         box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      }

      .stat-box h2 {
         margin-bottom: 10px;
         font-size: 24px;
         color: #333;
      }

      .stat-box p {
         font-size: 18px;
         color: #666;
      }

      .total-ids {
         background-color: #4CAF50;
         color: #fff;
      }

      .total-cost {
         background-color: #2196F3;
         color: #fff;
      }
</style>
</head>
<body>


<section class="header">

<a href="../index.html" class="logo"> <img src="../image/logo.jpeg" class="logo" width="70" height="60"> </a>

   <nav class="navbar">
      <a href="../index.html">Home</a>
      <a href="../about.html">About</a>
      <a href="message.php">Messages</a>
      <a href="trbook.php">Train Bookings</a>
        <a href="trains.php">Train</a>
        <a href="cards.php">Cards</a>
      <a href="adminlogout.php">Logout</a>
      
   </nav>
</section>
<div class="container">
      <h1>Admin Dashboard</h1>
      <h1>Welcome, <?php echo $admin_name;?></h1>
    <br>

    <h1><p>Email: <?php echo $admin_email; ?></p></h1>
      <div class="stats">
         <div class="stat-box total-ids">
            <h2> PACKAGES SOLD</h2>
            <p><?php echo $total_ids; ?></p>
         </div>
         <div class="stat-box total-cost">
            <h2>NET PROFIT</h2>
            <p>₹<?php echo number_format($total_cost, 2); ?></p>
         </div>
      </div>
   </div>

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
  title: "Welcome ADMIN"
});
</script>
    
</body>
</html>
