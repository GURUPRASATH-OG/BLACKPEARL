<?php
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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Dashboard</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 0;
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

   <div class="container">
      <h1>Admin Dashboard</h1>
      <div class="stats">
         <div class="stat-box total-ids">
            <h2> Packages sold</h2>
            <p><?php echo $total_ids; ?></p>
         </div>
         <div class="stat-box total-cost">
            <h2>Total Cost</h2>
            <p><?php echo number_format($total_cost, 2); ?></p>
         </div>
      </div>
   </div>

</body>
</html>