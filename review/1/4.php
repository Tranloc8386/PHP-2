<?php

$name = "";
$email = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);

    if (empty($name) || empty($email)) {
        $error = "Vui lòng nhập đầy đủ Name và Email!";
    } else {
        echo "<h3>Cảm ơn bạn, $name! Bạn đã gửi thành công.</h3>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form đơn giản</title>
</head>

<body>

    <h2>Nhập thông tin</h2>

    <?php
    if (!empty($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>

    <form method="POST" action="">
        Name: <br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <br><br>

        Email: <br>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <br><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>