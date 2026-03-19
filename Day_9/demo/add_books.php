<?php
require "connectDB.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    $imagePath = "";

    /// upload anh len///


    if (!isset($_FILES['book_image']) || $_FILES['book_image']['error'] != 0) {
        die("Chưa upload file hoặc file lỗi");
    }

    $targetDir = "uploads/";
    $fileName = time() . "_" . basename($_FILES['book_image']['name']);
    $targetFilePath = $targetDir . $fileName;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // kiểm tra ảnh thật
    $check = getimagesize($_FILES['book_image']['tmp_name']);
    if ($check === false) {
        echo "Không phải hình ảnh<br>";
        $uploadOk = 0;
    }

    // size < 2MB
    if ($_FILES['book_image']['size'] > 2 * 1024 * 1024) {
        echo "File quá lớn<br>";
        $uploadOk = 0;
    }

    // định dạng
    $allowedTypes = ['jpg', 'png', 'jpeg', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Sai định dạng<br>";
        $uploadOk = 0;
    }

    // upload
    if ($uploadOk == 1) {
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['book_image']['tmp_name'], $targetFilePath)) {
            $imagePath = $targetFilePath;
            
            echo " file " . htmlspecialchars($fileName) . " da duoc upload thanh cong <br>";
            echo "Duong dan file: <a href ='$targetFilePath' target='_blank'>$targetFilePath</a><br>";
            echo "<img src='$targetFilePath' width='300' height ='400'>";
        } else {
            echo "Upload thất bại";
        }
    }

    $stmt = $conn->prepare("INSERT INTO books (title,author,price,stock,description, image)
    values (?, ?, ?,? , ?,?)");
    $stmt->bind_param('ssdiss', $title, $author, $price, $stock, $description, $imagePath);

    if ($stmt->execute()) {
        echo "<p>Thêm sách thành công</p>";
    } else {
        echo "<p>Lỗi: " . $stmt->error . "</p>";
    }

    $stmt->close();
}


?>
<h3>Them sach moi </h3>
<form method="post" enctype="multipart/form-data">
    <label>Title: </label>
    <input type="text" name="title" required><br><br>
    <label>Author: </label>

    <input type="text" name="author"><br><br>
    <label>Price: </label>

    <input type="number" name="price"><br><br>
    <label>Stock: </label>

    <input type="number" name="stock"><br><br>
    <label>Description: </label>

    <input type="text" name="description"><br><br>


    <h2><strong>Upload anh bia sach</strong></h2>

    <input type="file" name="book_image" required>

    <button type="submit">Thêm sách</button>
</form>