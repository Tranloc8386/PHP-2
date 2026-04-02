<?php
require 'connectDB.php';
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $conn->prepare("SELECT  *from events where id=? ");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $event = $result->fetch_assoc();
    if (!$event) {
        echo "Khong tim thay event nao!";
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $status = $_POST['status'] ?? "SCHEDULE";
    $stmt = $conn->prepare("UPDATE events set event_name= ?, event_date=?, location=?, status=?
    where id =?");
    $stmt->bind_param("ssssi", $name, $date, $location, $status, $id);
    $stmt->execute();
}
?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $event['ID'] ?>">
    Name: <input type="text"  name="name" value="<?php echo ($event['EVENT_NAME']) ?>"><br><br>
    Event Date: <input type="date" name="date"  value="<?php echo htmlspecialchars($event['EVENT_DATE']) ?>"> <br><br>
    Location: <input type="text" name="location" value="<?php echo htmlspecialchars($event['LOCATION']) ?>"><br>
    Status: <select name="status" value="<?php echo htmlspecialchars($event['STATUS'])?>">
        <option value="SCHEDULED">SCHEDULED</option>
        <option value="CANCELLED">CANCELLED</option>
        <option value="COMPLETED">COMPLETED</option>
    </select><br><br>
    <button type="submit">Update Event</button>
</form>