
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
      h1{
        text-align: center;
        margin: 20px;
        font-size: 30px;
        }
        .containers .h1{
            margin: 20px;
            text-align: center;
            font-size: 30px;
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
    
        <a href="adminpanel.php">previous</a>
      <a href="adminlogout.php">Logout</a>
      
   </nav>



</section>
<h1>Welcome to the Admin Panel</h1>
<br>
<h1>BOOOKING DETAILS</h1>

    <div class="containers">

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
                    echo "<td>{$row['id']}</td>";
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
    

        <!-- Your existing admin panel code goes here -->

    </div>
</body>
</html>
