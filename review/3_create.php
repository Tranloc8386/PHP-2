<?php
require "3_connect.php";
$result = $conn->query("SELECT *from studens");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $grade = $_POST['grade'];

    $stmt = $conn->prepare("INSERT INTO studens (name, email, grade)
    values (?,?,?) ");
    $stmt->bind_param('ssi', $name, $email, $grade);
    if ($stmt->execute()) {
        echo "Them Thanh Cong";
    } else {
        echo " Loi $stmt->error";
    }

    $stmt->close();
}
if (isset($_GET['3_delete_id'])) {
    $id = (int) $_GET['3_delete_id'];

    $stmt = $conn->prepare("DELETE FROM studens WHERE id=?");
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
<h2><strong>Them Student</strong></h2>
<form method="post">
    <label>Name: </label>
    <input type="text" name="name" required><br>
    <label>Email: </label>
    <input type="email" name="email" required><br>
    <label>Grade :</label>
    <input type="number" name="grade" required><br><br>
    <button type="submit">Add</button>
</form>
<hr>
<br>
<h2><strong>Danh sach student</strong></h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Grade</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']) ?></td>
            <td><?php echo htmlspecialchars($row['name']) ?></td>
            <td><?php echo htmlspecialchars($row['email']) ?></td>
            <td><?php echo htmlspecialchars($row['grade']) ?></td>
            <td>
                <a href="3_update.php?id=<?php echo  $row['id'] ?>"> Update</a><br>
                <a href="?3_delete_id=<?php echo  $row['id'] ?>" onclick="return confirm('Ban co chac chan muon xoa khong?')"> Delete</a>

            </td>


        </tr>

    <?php } ?>
</table>