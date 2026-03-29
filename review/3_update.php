<?php
require "3_connect.php";
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    $stmt = $conn->prepare("SELECT *FROM studens where id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    if(!$student){
        echo "Khong tim thay student nao!";
        exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $grade = $_POST['grade'];

    $stmt = $conn->prepare("UPDATE studens set name=?, email=?, grade=? where id=? ");
    $stmt->bind_param('ssii', $name, $email, $grade, $id);
    if ($stmt->execute()) {
        echo "Update Thanh Cong";
    } else {
        echo " Loi $stmt->error";
    }

    $stmt->close();
}

?>
<h2><strong>Update Student</strong></h2>
<form method="post">
    Name: <input type="text" name="name" value="<?php echo $student['name'] ?>"><br>
    Email: <input type="email" name="email" value="<?php echo $student['email'] ?>"><br>
    Grade: <input type="number" name="grade" value="<?php echo $student['grade'] ?>"><br><br>
    <button type="submit">Update</button>

</form>