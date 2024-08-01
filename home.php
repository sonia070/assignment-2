<?php
include 'config.php';

$sql = "SELECT * FROM blossoms_booking";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonia's Blossom - Booking Management</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <h1>Booking Management</h1>
    <a href="create.php">Create New Booking</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Flower Selection</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['event_name']}</td>
                    <td>{$row['event_date']}</td>
                    <td>{$row['flower_selection']}</td>
                    <td>
                        <a href='read.php?id={$row['id']}'>View</a> |
                        <a href='update.php?id={$row['id']}'>Edit</a> |
                        <a href='delete.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
