<?php
require "connectDB.php";
$result = $conn->query("SELECT *FROM events");
$error = "";
$message = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $status = $_POST['status'] ?? "SCHEDULE";

    if (empty($name) || strlen($name) > 255) {
        $error = "Event name is required or Event name must not exceed 255 characters";
    }
    elseif (strtotime($date) <= strtotime(date("Y-m-d"))) {
        $error = "Event date must be a valid date in the future.";
    }
    elseif (empty($location) || strlen($location) > 255) {
        $error = "Location must not be empty and must not exceed 255 characters";
    }
    else {
        $stmt = $conn->prepare("INSERT INTO events (event_name, event_date, location, status) values(?,?,?,?)");
        $stmt->bind_param("ssss", $name, $date, $location, $status);
        if ($stmt->execute()) {
            $message = "Successful";
        } else {
            $error = " Loi . $stmt->error";
        }
        var_dump($status);
    }
}

if (isset($_GET['delete_id'])) {
    $id = (int) $_GET['delete_id'];

    $stmt = $conn->prepare("DELETE FROM events WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Xoa thanh cong";
    } else {
        echo "Loi: " . $stmt->error;
    }

    $stmt->close();

    // reload lại trang tránh xóa lại khi F5
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit();
}
?>

<?php
if (!empty($message)) {
    echo "<p style='color:green;'>$message</p>";
}
?>
<?php
if (!empty($error)) {
    echo "<p style='color:red;'>$error</p>";
}
?>
<h2><strong>Add Event</strong></h2>
<form method="post">
    Name: <input type="text" required name="name"><br><br>
    Event Date: <input type="date" name="date" required> <br><br>
    Location: <input type="text" name="location" required><br><br>
    Status: <select name="status">
        <option value="SCHEDULED">SCHEDULED</option>
        <option value="CANCELLED">CANCELLED</option>
        <option value="COMPLETED">COMPLETED</option>
    </select><br><br>
    <button type="submit">Add Event</button>
</form>


<table border="1">
    <tr>
        <th>ID</th>
        <th>EVENT NAME</th>
        <th>EVENT DATE</th>
        <th>LOCATION</th>
        <th>STATUS</th>
        <th>ACTIONS</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['ID']) ?></td>
            <td><?php echo htmlspecialchars($row['EVENT_NAME']) ?></td>
            <td><?php echo htmlspecialchars($row['EVENT_DATE']) ?></td>
            <td><?php echo htmlspecialchars($row['LOCATION']) ?></td>
            <td><?php echo htmlspecialchars($row['STATUS']) ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['ID'] ?>">Update</a>
                <a href="?delete_id=<?php echo $row['ID'] ?>" onclick="return confirm ('Are you sure want to delete this event?')">Delete</a>
            </td>
        </tr>

    <?php } ?>
    
</table>