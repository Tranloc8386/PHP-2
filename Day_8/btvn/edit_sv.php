<?php
require "connectDB2.php";
$id = $_GET['id'];

$result = mysqli_query($conn, "select *from student  where id = $id");
$student = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id_class = $_POST['id_class'];

    mysqli_query($conn, "update student
    set name='$name', email='$email', phone='$phone', id_class='$id_class'
    where id='$id'");
    header("Location: student.php");
}

$result = mysqli_query($conn, "select *from class");
?>
<h2><strong>Updat Student</strong></h2>
<form method="post" action="">
    <input type="text" name="name" value="<?php echo $student['name'] ?>" required>
    <br><br>
    <input type="email" name="email" value="<?php echo  $student['email'] ?>" required>
    <br><br>
    <input type="number" name="phone" value="<?php echo $student['phone'] ?>" required>
    <br><br>
    <select name="id_class">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <option value="<?php echo $row['id'] ?>"
                <?= ($row['id'] == $student['id_class']) ? 'selected' : '' ?>>

                <?= $row['name'] ?>

            </option>

        <?php } ?>
    </select>
    <button type="submit">Update</button>
</form>