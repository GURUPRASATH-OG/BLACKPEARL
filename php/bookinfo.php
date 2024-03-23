<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Information</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            width: 80%;
            margin: 20px;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Location</th>
                <th>Guests</th>
                <th>Arrival Date</th>
                <th>Leaving Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Replace these credentials with your actual database credentials
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $database = 'tourism';

            // Create a connection to the database
            $conn = new mysqli($host, $user, $password, $database);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from the table
            $sql = "SELECT * FROM book_form";
            $result = $conn->query($sql);

            // Display data in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['Id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td>{$row['address']}</td>";
                echo "<td>{$row['location']}</td>";
                echo "<td>{$row['guests']}</td>";
                echo "<td>{$row['arrivals']}</td>";
                echo "<td>{$row['leaving']}</td>";
                echo "</tr>";
            }

            // Close the connection
            $conn->close();
            ?>
        </tbody>
    </table>

</body>
</html>
