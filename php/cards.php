<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Data</title>
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
    box-shadow: aqua 0px 0px 1px 1px;
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
          <a href="../index.html">Home</a>
          <a href="../about.html">About</a>
          <a href="message.php">Messages</a>
          <a href="trbook.php">Train Bookings</a>
            <a href="trains.php">Train</a>
            <a href="adminpanel.php">admin panel</a>
          <a href="adminlogout.php">Logout</a>
          
       </nav>
    </section>
    <div class="containers">
        <h1>Payment Data</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Card Number</th>
                    <th>Card Name</th>
                    <th>Expiry Date</th>
                    <th>CVV</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody id="paymentData">
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

// SQL query to fetch payment data
$sql = "SELECT id, card_number, card_name, expiry_date, cvv, created_at FROM payment_data";
$result = $conn->query($sql);

// Display data in table rows
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["card_number"] . "</td>";
        echo "<td>" . $row["card_name"] . "</td>";
        echo "<td>" . $row["expiry_date"] . "</td>";
        echo "<td>" . $row["cvv"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No payment data available</td></tr>";
}

// Close connection
$conn->close();
?>

            </tbody>
        </table>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
