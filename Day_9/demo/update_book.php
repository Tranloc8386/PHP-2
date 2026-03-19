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
    $imagePath = $book['image'];



    if (isset($_FILES['book_image']) && $_FILES['book_image']['error'] == 0) {
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
            }
        }
    }


    $stmt = $conn->prepare("UPDATE books SET title=?, author=?, price=?, stock=?, description=?, image =? WHERE id=?");
    $stmt->bind_param("ssdissi", $title, $author, $price, $stock, $description, $imagePath, $id);

    if ($stmt->execute()) {
        echo "<p>Cập nhật thành công</p>";
    } else {
        echo "<p>Lỗi: " . $stmt->error . "</p>";
    }
}
?>

<h3>Sửa sách</h3>

<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $book['id'] ?>">

    Title: <input type="text" name="title" value="<?= $book['title'] ?>" required><br><br>

    Author: <input type="text" name="author" value="<?= $book['author'] ?>"><br><br>

    Price: <input type="number" name="price" value="<?= $book['price'] ?>"><br><br>

    Stock: <input type="number" name="stock" value="<?= $book['stock'] ?>"><br><br>

    Description: <input type="text" name="description" value="<?= $book['description'] ?>"><br><br>

    <h2><strong>Upload anh bia sach</strong></h2>

    <input type="file" name="book_image">

    <button type="submit">Cập nhật</button>
</form>