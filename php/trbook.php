<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Train Bookings</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="../css/login.css">
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
    }
    .containers {
        max-width: 1000px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
        text-align: center;
        color: #4CAF50;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        font-size: 18px;
    }
    th {
        background-color: #4caf50;
            color: #fff;
    }
</style>
</head>
<body>
<section class="header">

<a href="../index.html" class="logo"> <img src="../image/logo.jpeg" class="logo" width="70" height="60"> </a>

   <nav class="navbar">
      <a href="adminpanel.php">Home</a>
      <a href="adminpanel.php">Previous</a>
      <a href="adminlogout.php">Logout</a>
      
   </nav>
</section>
<div class="containers">
    <h1>Train Bookings</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>PNR No</th>
            <th>Train Name</th>
            <th>Booked Seats</th>
            <th>Total Cost</th>
            <th>Booking Date</th>
        </tr>
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

        // Fetch train bookings data
        $sql = "SELECT * FROM train_bookings";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['pnr_no']}</td>
                        <td>{$row['train_name']}</td>
                        <td>{$row['booked_seats']}</td>
                        <td>{$row['total_cost']}</td>
                        <td>{$row['booking_date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No train bookings available</td></tr>";
        }

        // Close connection
        $conn->close();
        ?>
    </table>
</div>
</body>
</html>
