<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Data</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/login.css">
    <style>
    
        .containers{
        display: flex;
        border-radius: 20px;
        background-color: #f4f4f4;
        margin: 10px;
        padding: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        justify-content: center;
        align-items: center;
        height: 100vh;

      }
      h1
      {
        text-align: center;
        margin: 20px;
        font-size: 30px;
      }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 15px;
            font-size: 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
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




    <h1>Contact Form Data</h1>
    <div class="containers">

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection parameters
            
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $database = 'tourism';

            // Create a database connection
            $conn = new mysqli($host, $user, $password, $database);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from the contact_form table
            $sql = "SELECT * FROM contact_form";
            $result = $conn->query($sql);

            // Display data in the table
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['number']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['subject']}</td>";
                    echo "<td>{$row['timestamp']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No data available</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>
