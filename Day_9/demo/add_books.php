<?php
require "connectDB.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    $sql = "INSERT INTO books (title,author,price,stock,description)
    values ('$title', '$author', '$price', '$stock', '$description')";
    mysqli_query($conn, $sql);
    echo "<p>Them sach thanh cong </p>";
}
?>
<h3>Them sach moi </h3>
<form method="post">
    <label>Title: </label>
    <input type="text" name="title" required><br><br>
    
    Author: <input type="text" name="author"><br><br>

    Price: <input type="number" name="price"><br><br>

    Stock: <input type="number" name="stock"><br><br>

    Description: <input type="text" name="description"><br><br>

    <button type="submit">Thêm sách</button>
</form>