<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM blossoms_booking WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Booking</title>
    <link rel="stylesheet" href="csscode.css">
</head>
<body>
    <h1>View Booking</h1>
    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
    <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
    <p><strong>Event Name:</strong> <?php echo $row['event_name']; ?></p>
    <p><strong>Event Date:</strong> <?php echo $row['event_date']; ?></p>
    <p><strong>Flower Selection:</strong> <?php echo $row['flower_selection']; ?></p>
    <a href="index.php">Back to Home</a>
</body>
</html>
