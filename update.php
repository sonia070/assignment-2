<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $flower_selection = $_POST['flower_selection'];

    $sql = "UPDATE blossoms_booking SET name='$name', address='$address', event_name='$event_name', event_date='$event_date', flower_selection='$flower_selection' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM blossoms_booking WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Booking</title>
    <link rel="stylesheet" href="csscode.css">
</head>
<body>
    <h1>Update Booking</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required><br><br>
        <label for="event_name">Event Name:</label>
        <input type="text" id="event_name" name="event_name" value="<?php echo $row['event_name']; ?>" required><br><br>
        <label for="event_date">Event Date:</label>
        <input type="date" id="event_date" name="event_date" value="<?php echo $row['event_date']; ?>" required><br><br>
        <label for="flower_selection">Flower Selection:</label>
        <input type="text" id="flower_selection" name="flower_selection" value="<?php echo $row['flower_selection']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>
