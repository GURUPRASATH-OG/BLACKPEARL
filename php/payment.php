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

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO payment_data (card_number, card_name, expiry_date, cvv) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isii", $cardNumber, $cardName, $expiryDate, $cvv);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Close statement
        $stmt->close();
        // Close connection
        $conn->close();
        // Redirect to acknowledgement page
        header("Location: acknowledgement.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Payment Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
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
    <form id="paymentForm" method="post" action="payment.php">
        <label for="cardNumber">Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber" required><br><br>
        <label for="cardName">Card Name:</label>
        <input type="text" id="cardName" name="cardName" required><br><br>
        <label for="expiryDate">Expiry Date:</label>
        <input type="text" id="expiryDate" name="expiryDate" required><br><br>
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required><br><br>
        <input type="submit" value="Submit Payment" id="submitButton">
    </form>
</body>
</html>