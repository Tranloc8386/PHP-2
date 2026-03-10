<?php
session_start(); //bat buoc phai co dau file de dung session
$loginMessage = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    //kiem tra xem co cookie khong
    if (isset($_COOKIE["user"])) {
        $saveUser = json_decode($_COOKIE["user"], true);

        //kiem tra username va pass
        if ($username === $saveUser['username'] && password_verify($password, $saveUser["password"])) {
            //dang nhap thanh cong, => luu vao session
            $_SESSION['user'] = [
                'username' => $saveUser['username'],
                'logged_in' => true,
                "login_time" => date("Y-m-d H:i:s")
            ];

            echo $loginMessage = "<p>Chao mung</p>" . htmlspecialchars($username);
        } else
            echo $loginMessage = "<p>Sai ten hoac mat khau!</p>";
    } else {
        $loginMessage = "<p>Khong tim thay tai khoan!</p>";
    }
}
?>

<h2>Dang nhap</h2>
<form method="post">
    <label>Ten dang nhap: </label>
    <input type="text" name="username" required>
    <br>
    <label>Mat khau:</label>
    <input type="text" name="password" required>
    <br>
    <button type="submit">Dang nhap</button>
    <br><br>
    


</form>