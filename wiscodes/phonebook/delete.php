<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM contacts WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit(); // Always use exit after header to stop further script execution
    } else {
        header('Location: index.php?error=1');
        exit();
    }
}

// If there's no valid id, redirect back
header('Location: index.php');
exit();
?>

