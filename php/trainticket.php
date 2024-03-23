<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Train Booking</title>
<style>
    h1 ,h2
    {
        text-align: center;
        color: #4CAF50;
    }
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .booking-form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f9f9f9;
        box-shadow:10px solid blue;
    }
    .booking-form label {
        display: block;
        margin-bottom: 10px;
    }
    .booking-form input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
        box-sizing: border-box; /* To include padding and border in element's total width and height */
    }
    .booking-form button {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
    .booking-form button:hover {
        background-color: #45a049;
    }
    .booking-message {
        padding: 10px;
        border-radius: 5px;
        background-color: #f2f2f2;
    }
    .booking-form select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
    box-sizing: border-box;
    appearance: none; /* Removes default arrow */
    background: url('data:image/svg+xml;utf8,<svg fill="black" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>') no-repeat; /* Custom arrow */
    background-position: calc(100% - 10px) center; /* Positioning the arrow */
    background-color: #fff; /* Background color */
    cursor: pointer;
}


</style>
</head>
<body>
<div class="container">
    <h1>AVAILABLE TRAINS</h1>
    <table>
        <tr>
            <th>Train Pnr</th>
            <th>Train Name</th>
            <th>Total Seats</th>
            <th>Available Seats</th>
            <th>Cost</th>
            <th>Depature</th>
        </tr>
        <?php
        // Connect to MySQL
        $mysqli = new mysqli("localhost", "root", "", "tourism");

        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Fetch trains data
        $sql = "SELECT pnr_no, train_name, total_seats, available_seats , cost ,depature FROM trains";
        $result = $mysqli->query($sql);

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
            echo "<tr><td colspan='4'>No trains available</td></tr>";
        }

        // Close MySQL connection
        $mysqli->close();
        ?>
    </table>
    <h1>Book your Train Tickets</h1>
    <form class="booking-form" action="bookticket.php" method="post">
        <label for="train_id">Train pnr:</label>
        <input type="number" id="train_id" name="pnr_no" required placeholder="pnr_no" >
        <label for="train_name">Train Name:</label>
        <input type="text" id="train_name" name="train_name" required placeholder="train name" > 
        <label for="num_seats">No of seats</label>

        <input type="number" id="num_seats" name="num_seats" required>
        <button type="submit">Book Seats</button>

    </form>
    <?php
    // Display booking message
    if ($_GET['booking_status'] == 'success') {
        echo "<p class='booking-message'>Seats booked successfully!</p>";
    } elseif ($_GET['booking_status'] == 'failure') {
        echo "<p class='booking-message'>Sorry, not enough seats available.</p>";
    }
    ?>
</div>
</body>
</html>
