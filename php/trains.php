<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Train Details</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="../css/login.css">
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.containers {
    max-width: 1000px;
    margin: 20px auto;
    padding: 20px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 2px solid black;
    box-shadow: aqua 0px 0px 1px 2px;
    padding: 8px;
    text-align: left;
    font-size:20px;
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
    <h1>Train Availablity Details</h1>
    <table>
        <thead>
            <tr>
                <th>PNR No</th>
                <th>Train Name</th>
                <th>Total Seats</th>
                <th>Available Seats</th>
                <th>Cost</th>
                <th>Departure</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tourism";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from trains table
            $sql = "SELECT * FROM trains";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['pnr_no']}</td>
                            <td>{$row['train_name']}</td>
                            <td>{$row['total_seats']}</td>
                            <td>{$row['available_seats']}</td>
                            <td>{$row['cost']}</td>
                            <td>{$row['depature']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No trains available</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
