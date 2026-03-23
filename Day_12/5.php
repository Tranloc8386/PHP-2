<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    if (strlen($name) < 5) {
        echo "Ten phai >= 5 ky tu";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo  "Email khong hop le";
    }

    if (!isset($_FILES['image']) || $_FILES['image']['error'] != 0) {
        die("Chua upload file hoac file loi");
    }

    $targetDir = "uploads/";
    $fileName = time() . "_" . basename($_FILES['image']['name']);
    $targetFilePath = $targetDir . $fileName;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // kiem tra anh that
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        echo "Khong phai hinh anh";
        $uploadOk = 0;
    }

    // size<2M
    if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
        echo "File qua lon";
        $uploadOk = 0;
    }

    //dinh dang
    $allowType = ['jpg', 'png', 'gif', 'jpeg'];
    if (!in_array($imageFileType, $allowType)) {
        echo "Sai dinh dang";
        $uploadOk = 0;
    }
    //up load
    if ($uploadOk == 1) {

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            echo "file" . htmlspecialchars($fileName) . "da duoc upload thanh cong <br>";
            echo "<br><img src='$targetFilePath' width='200'>";
        }
    }
}


?>
<form method="post" enctype="multipart/form-data">
    <label>Name: </label>
    <input type="text" name="name" required><br><br>

    <label>Email: </label>
    <input type="email" name="email" required><br><br>

    <label>Profile Picture: </label>
    <input type="file" name="image" required><br><br>
    <button type="submit">GUI</button>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] == "POST") { ?>
    <h3>Thong tin ban vua nhap:</h3>
    <p><b>Name:</b> <?php echo htmlspecialchars($name); ?></p>
    <p><b>Email:</b> <?php echo htmlspecialchars($email); ?></p>

    <?php if ($targetFilePath != "") { ?>
        <img src="<?php echo $targetFilePath; ?>" width="200">
    <?php } ?>
<?php } ?>