<?php
session_start();
$loginMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["username"]);
    $password = $_POST["password"];


    if (isset($_COOKIE["user"])) {

        $savedUser = json_decode($_COOKIE['user'], true);
        if ($name === $savedUser["name"] && password_verify($password, $savedUser["password"])) {

            $_SESSION['user'] = [
                'name' => $savedUser['name'],
                'logged_in' => true,
                "login_time" => date("Y-m-d H:i:s")

            ];
            echo $loginMessage = "<p>Chao mung</p>" . htmlspecialchars($name);
            echo "<a href='product.php'>Vao trang san pham</a>";
        } else {
            echo $loginMessage = "<p>Sai ten hoac mat khau!</p>";
        }
    } else {
        echo $loginMessage = "<p>Khong tim thay tai khoan</p>";
    }
}
?>
<h2><strong>Dang nhap</strong></h2>
<form method="post">
    <label>Ten dang nhap: </label>
    <input type="text" name="username" required>
    <br>
    <label>Mat khau:</label>
    <input type="text" name="password" required>
    <br>
    <button type="submit">Dang nhap</button>
    <p>click here to <a href="register2.php">Register</a></p>


</form>