<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $sql = "DELETE FROM blossoms_booking WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Booking</title>
    <link rel="stylesheet" href="csscode.css">
</head>
<body>
    <h1>Delete Booking</h1>
    <p>Are you sure you want to delete this booking?</p>
    <form action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Delete">
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>
