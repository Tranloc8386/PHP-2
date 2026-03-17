<?php
require 'connectDB.php';
//lay du lieu  theo id
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $conn->prepare("SELECT *from books where id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();

    if (!$book) {
        echo "<p>Khong tim thay sach</p>";
        exit();
    }
}

// 2. Xử lý update khi submit form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = (int)$_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = (float)$_POST['price'];
    $stock = (int)$_POST['stock'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE books SET title=?, author=?, price=?, stock=?, description=? WHERE id=?");
    $stmt->bind_param("ssdisi", $title, $author, $price, $stock, $description, $id);

    if ($stmt->execute()) {
        echo "<p>Cập nhật thành công</p>";
    } else {
        echo "<p>Lỗi: " . $stmt->error . "</p>";
    }
}
?>

<h3>Sửa sách</h3>

<form method="post">
    <input type="hidden" name="id" value="<?= $book['id'] ?>">

    Title: <input type="text" name="title" value="<?= $book['title'] ?>" required><br><br>

    Author: <input type="text" name="author" value="<?= $book['author'] ?>"><br><br>

    Price: <input type="number" name="price" value="<?= $book['price'] ?>"><br><br>

    Stock: <input type="number" name="stock" value="<?= $book['stock'] ?>"><br><br>

    Description: <input type="text" name="description" value="<?= $book['description'] ?>"><br><br>

    <button type="submit">Cập nhật</button>
</form>