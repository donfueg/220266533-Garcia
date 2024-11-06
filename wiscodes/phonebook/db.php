<?php
// Database connection settings
$servername = "localhost:3306";   // Use localhost instead of localhost:3306
$username = "root";
$password = "";  // Add your password here if necessary
$dbname = "phonebook";

// Correct socket path
$socket = "/data/data/com.termux/files/usr/var/run/mysqld/mysqld.sock";

// Create connection with port number included
$conn = new mysqli($servername, $username, $password, $dbname, 3306, $socket);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


