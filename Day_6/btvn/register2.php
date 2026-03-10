<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST["email"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {
        echo "<p>Mat khau khong khop!</p>";
        exit();
    }

    if (!empty($name) && !empty($password) && !empty($email)) {
        $user = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)

        ];
        setcookie('user', json_encode($user), time() + (86400 * 7), "/");
        echo   "<p>Dang ki thanh cong</p>";
        echo "<a href='login2.php'>Quay lai dang nhap</a>";
    } else {
        echo   "<p>Vui long cap nhat day du thong tin!</p>";
    }
}
?>
<h2><strong>Dang ky</strong></h2>
<form method="post">
    <label>User name:</label>
    <input type="text" name="name" required>
    <br>
    <label>Email: </label>
    <input type="email" name="email" required>
    <br>
    <label>Password: </label>
    <input type="text" name="password" required>
    <br>
    <label> Confirm Password: </label>
    <input type="text" name="confirm_password" required>
    <br>
    <button type="submit">Dang ky</button>
</form>