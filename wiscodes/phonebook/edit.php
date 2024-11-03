<?php
include "db.php";

$name = '';
$phone = '';
$id = null;

// Check if an ID is set in the query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is an integer

    // Prepare a statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->bind_param("i", $id); // Bind the parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $phone = $row['phone'];
    } else {
        echo "No contact found with that ID.";
        exit(); // Stop execution if no contact found
    }

    $stmt->close(); // Close the statement
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $id = intval($_POST['id']); // Ensure ID is an integer

    if (!empty($name) && !empty($phone)) {
        // Prepare a statement for the update
        $stmt = $conn->prepare("UPDATE contacts SET name = ?, phone = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $phone, $id); // Bind parameters (ssi means string, string, integer)

        if ($stmt->execute()) {
            echo "Contact successfully updated. ";
            header("Location: index.php"); // Redirect to the main page after update
            exit(); // Stop further script execution
        } else {
            echo "Error editing record: " . $stmt->error; // Show error
        }

        $stmt->close(); // Close the statement
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact</title>
</head>
<body>
<h2>Edit Contact</h2>
    <form method="post" action="edit.php?id=<?php echo $id; ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"><br><br>
        Phone: <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>"><br><br>
        <input type="submit" value="Update Contact">
    </form>
    <a href="index.php">Back to Phonebook</a>
</body>
</html>
