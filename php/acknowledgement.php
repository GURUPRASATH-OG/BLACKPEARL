<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Retrieve payment data from the form
    $cardNumber = $_POST['cardNumber'];
    $cardName = $_POST['cardName'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];
    if(strlen($cvv) !== 3) {
        header("Location:failure.php");
        exit();
    }
    else{
        header("Location: sucess.php");
        
    
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO payment_data (card_number, card_name, expiry_date, cvv) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $cardNumber, $cardName, $expiryDate, $cvv);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Close statement
        $stmt->close();
        // Close connection
        $conn->close();
        // Redirect to acknowledgement page
        header("Location:success.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Train Booking</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f0f0f0;
    }

    .container {
        max-width: 1000px;
        width: 100%;
        min-height: 500px;
        display: flex;
        justify-content: space-between;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .booking-details {
        width: calc(50% - 10px); /* Adjust according to your preference */
        margin-right: 10px; /* Adjust spacing between the divs */
        padding: 20px;
        border-right: 1px solid #ccc;
    }

    .booking-details p {
        padding: 10px 0;
        margin: 20px 0;
        font-size: x-large;
        border:aqua 1px solid;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .booking-details span {
        margin: 20px 0;
        font-size: x-large;

    }

    form {
        width: calc(50% - 10px); /* Adjust according to your preference */
        padding: 20px;
    }

    input[type="text"] {
        width: 100%;
        font-size: 16px;
        padding: 10px;
        border-radius: 10px;
        border:aqua 1px solid;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .error {
        border: 1px solid #ff9999;
        background-color: #ffe6e6;
        color: #ff3333;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 10px;
    }
</style>
</head>
<body>
<div class="container">
    <div class="booking-details">
        <h1>Booking Summary</h1>
        <p><strong>PNR No:</strong> <?php echo $_GET['pnr_no']; ?></p>
        <p><strong>Train Name:</strong> <?php echo $_GET['train_name']; ?></p>
        <p><strong>Number of Seats:</strong> <?php echo $_GET['num_seats']; ?></p>
        <p><strong>Total Cost:</strong> ₹<?php echo $_GET['total_cost']; ?></p>
       <span>Thank you for Choosing Black Pearl!</span> 
    </div>
    <form id="paymentForm" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <h1>Complete Your Payment</h1>
        <label for="cardNumber">Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber" required><br><br>
        <label for="cardName">Card Name:</label>
        <input type="text" id="cardName" name="cardName" required><br><br>
        <label for="expiryDate">Expiry Date:</label>
        <input type="text" id="expiryDate" name="expiryDate" required><br><br>
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required><br><br>
        <input type="submit" value="Pay Now" id="submitButton">
    </form>
</div>

<script>
    document.getElementById("paymentForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Perform validation if needed
        // Example: Validate card number, expiry date, CVV

        // If validation passes, submit the form
        this.submit();
    });
</script>

</body>
</html>
