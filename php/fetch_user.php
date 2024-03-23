<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 20px;
            font-size: 24px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            font-size: 20px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>


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

    // Fetch user ID from the form
    $user_id = $_POST['user_id'];

    // Fetch train bookings
    $train_bookings_query = "SELECT * FROM train_bookings WHERE id = '$user_id'";
    $train_bookings_result = $conn->query($train_bookings_query);

    // Fetch booking details
    $booking_details_query = "SELECT * FROM book_form WHERE Id = '$user_id'";
    $booking_details_result = $conn->query($booking_details_query);

    // Fetch payment details
    $payment_details_query = "SELECT * FROM payment_data WHERE id = '$user_id'";
    $payment_details_result = $conn->query($payment_details_query);

    // Display booking details
    echo "<h2>Booking Details:</h2>";
    if ($booking_details_result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Location</th><th>Guests</th><th>Arrivals</th><th>Leaving</th><th>Package Name</th></tr> ";
        while ($row = $booking_details_result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["address"] . "</td><td>" . $row["location"] . "</td><td>" . $row["guests"] . "</td><td>" . $row["arrivals"] . "</td><td>" . $row["leaving"] . "</td><td>".$row["package_name"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='error'>No booking details found.</p>";
    }
    // Display train bookings
    echo "<h2>Train Bookings:</h2>";
    if ($train_bookings_result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>PNR No</th><th>Train Name</th><th>Booked Seats</th><th>Total Cost</th><th>Booking Date</th></tr>";
        while ($row = $train_bookings_result->fetch_assoc()) {
            echo "<tr><td>" . $row["pnr_no"] . "</td><td>" . $row["train_name"] . "</td><td>" . $row["booked_seats"] . "</td><td>" . $row["total_cost"] . "</td><td>" . $row["booking_date"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='error'>No train bookings found.</p>";
    }
    

    // Display payment details
    echo "<h2>Payment Details:</h2>";
    if ($payment_details_result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Card Number</th><th>Card Name</th><th>Expiry Date</th><th>CVV</th><th>Created At</th></tr>";
        while ($row = $payment_details_result->fetch_assoc()) {
            echo "<tr><td>" . $row["card_number"] . "</td><td>" . $row["card_name"] . "</td><td>" . $row["expiry_date"] . "</td><td>" . $row["cvv"] . "</td><td>" . $row["created_at"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='error'>No payment details found.</p>";
    }

    // Close connection
    $conn->close();
    ?>


</body>
</html>
