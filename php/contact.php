<?php
// Database connection parameters
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'login_register';

// Create a database connection
$conn = new mysqli($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    // Insert the data into the database
    $sql = "INSERT INTO contact_form (name, number, email, subject) 
            VALUES ('$name', '$number', '$email', '$subject')";

    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
        header("Location:../index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>



