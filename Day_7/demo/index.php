<?php
require 'Person.php';
$person = null;

$message = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        //lay du lieu tu form
        $name = htmlspecialchars($_POST["name"]);
        $age = intval($_POST['age']);
        $email = htmlspecialchars($_POST['email']);

        //kiem tra du lieu dau vao
        if (empty($name) || empty($email) || $age <= 0) {
            throw new Exception("Vui long nhap day du va chinh xac thong tin!");
        }

        //tao doi tuong Person
        $person = new Person($name, $age, $email);
        $message = "Thong tin da duoc luu thanh cong";
    } catch (Exception $e) {
        $message = "Loi " . $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan ly thong tin ca nhan</title>
</head>

<body>
    <h1><strong>Nhap thong tin ca nhan</strong></h1>
    <form method="post" action="">
        <label for="name">Ho va ten</label><br>
        <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
        <br>
        <label for="age">Tuoi</label><br>
        <input type="number" id="age" name="age" value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : '' ?>">
        <br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
        <br>
        <button type="submit">Luu thong tin</button>

    </form>

    <hr>
    <p style="color: <?php echo strpos($message, 'loi') !== false ? "red" : 'green'; ?>;">
        <?php echo htmlspecialchars($message) ?>
    </p>

    <!-- hien thi thong tin nguoi dung tu object Person-->
    <?php if ($person) { ?>
        <h2>Thong tin da nhap</h2>
        <p><strong>Ho va ten: </strong> <?php echo  htmlspecialchars($person->getName()) ?></p>
        <p><strong>Tuoi: </strong> <?php echo htmlspecialchars($person->getAge()) ?></p>
        <p><strong>Email: </strong> <?php echo htmlspecialchars($person->getEmail()) ?></p>
    <?php } ?>
</body>

</html>