<?php
// Connect to MySQL
$mysqli = new mysqli("localhost", "root", "", "tourism");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to check available seats
function checkAvailableSeats($pnr_no) {
    global $mysqli;
    $query = "SELECT total_seats, available_seats FROM trains WHERE pnr_no = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $pnr_no);
    $stmt->execute();
    $stmt->bind_result($total_seats, $available_seats);
    $stmt->fetch();
    $stmt->close();
    return array('total_seats' => $total_seats, 'available_seats' => $available_seats);
}

// Function to book seats
function bookSeats($pnr_no, $train_name, $num_seats) {
    global $mysqli;
    // Check available seats
    $available_seats = checkAvailableSeats($pnr_no)['available_seats'];
    if ($available_seats >= $num_seats) {
        // Update available seats
        $query = "UPDATE trains SET available_seats = available_seats - ? WHERE pnr_no = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ii", $num_seats, $pnr_no);
        $stmt->execute();
        $stmt->close();
        
        // Calculate cost based on number of seats booked
        $cost_per_seat = 500; // Assuming $50 per seat
        $total_cost = $cost_per_seat * $num_seats;
        
        // Record booking with cost
        $query = "INSERT INTO train_bookings (pnr_no, train_name, booked_seats, total_cost, booking_date) VALUES (?, ?, ?, ?, current_timestamp())";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("isis", $pnr_no, $train_name, $num_seats, $total_cost);
        $stmt->execute();
        $stmt->close();
        return $total_cost;
    } else {
        return false;
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pnr_no = $_POST["pnr_no"];
    $train_name = $_POST["train_name"];
    $num_seats_to_book = $_POST["num_seats"];
    
    $total_cost = bookSeats($pnr_no, $train_name, $num_seats_to_book);
    if ($total_cost !== false) {
        header("Location: acknowledgement.php?pnr_no=$pnr_no&train_name=$train_name&num_seats=$num_seats_to_book&total_cost=$total_cost");
        exit();
    } else {
        header("Location: failuretr.php?booking_status=failure");
        exit();
    }
}

// Close MySQL connection
$mysqli->close();
?>
