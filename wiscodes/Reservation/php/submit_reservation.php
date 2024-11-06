
<?php
include 'db.php';  // Correct path to db.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];

    // Prepare SQL query to insert data into the reservations table
    $sql = "INSERT INTO reservations (name, email, phone, date, time, guests) 
            VALUES ('$name', '$email', '$phone', '$date', '$time', '$guests')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successfully made!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
