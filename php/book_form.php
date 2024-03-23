<?php
include 'book.php';
$connection = mysqli_connect('localhost', 'root', '', 'tourism') or die('Connection Failed!' . mysqli_connect_error());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['location']) || empty($_POST['guests']) || empty($_POST['arrivals']) || empty($_POST['leaving']) || empty($_POST['package_name'])) {
        echo 'All fields are required!';
    } else {
        $name = mysqli_real_escape_string($connection, trim($_POST['name']));
        $email = mysqli_real_escape_string($connection, trim($_POST['email']));
        $phone = mysqli_real_escape_string($connection, trim($_POST['phone']));
        $address = mysqli_real_escape_string($connection, trim($_POST['address']));
        $location = mysqli_real_escape_string($connection, trim($_POST['location']));
        $guests = mysqli_real_escape_string($connection, trim($_POST['guests']));
        $arrivals = mysqli_real_escape_string($connection, trim($_POST['arrivals']));
        $leaving = mysqli_real_escape_string($connection, trim($_POST['leaving']));
        $package_name = mysqli_real_escape_string($connection, trim($_POST['package_name']));

        $request = "INSERT INTO book_form(name, email, phone, address, location, guests, arrivals, leaving, package_name) VALUES ('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving','$package_name')";
        mysqli_query($connection, $request);
        mysqli_close($connection);

        echo '<script>window.location.href = "trainticket.php";</script>';
        exit(); // Ensure that no more code is executed after redirection
    }
}
?>
