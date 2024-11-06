<?php
$servername = "localhost:3306";
$username = "root";
$password = "";  // Set your password if you have one
$dbname = "reservation";

// Path to MySQL/MariaDB socket
$socket = "/data/data/com.termux/files/usr/var/run/mysqld/mysqld.sock";  // Correct socket path

// Create connection using the socket
$conn = new mysqli($servername, $username, $password, $dbname, 3306, $socket);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
