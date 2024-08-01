<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $flower_selection = $_POST['flower_selection'];
    $action = "view,edit,delete";
    $sql = "INSERT INTO blossoms_booking (name, address, event_name, event_date, flower_selection) 
        VALUES ('$name', '$address', '$event_name', '$event_date', '$flower_selection')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Booking</title>
    <link rel="stylesheet" href="csscode.css">
</head>
<body>
    <h1>Create Booking</h1>
    <form action="create.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        <label for="event_name">Event Name:</label>
        <input type="text" id="event_name" name="event_name" required><br><br>
        <label for="event_date">Event Date:</label>
        <input type="date" id="event_date" name="event_date" required><br><br>
        <label for="flower_selection">Flower Selection:</label>
        <input type="text" id="flower_selection" name="flower_selection" required><br><br>
        <input type="submit" value="Create">
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>