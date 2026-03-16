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