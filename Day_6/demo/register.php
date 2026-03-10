<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $user = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        setcookie('user', json_encode($user), time() + (86400 * 7), "/");
        $loginMessage =  "<p> Dang ki thanh cong</p>";
    } else {
        $loginMessage = "<p>Vui long cap nhat day du thong tin</p>";
    }
}
?>
<h2>Dang ky</h2>
<form method="post">
    <label>Ten dang nhap: </label>
    <input type="text" name="username" required>
    <br>
    <label>Mat khau</label>
    <input type="text" name="password" required>
    <br>
    <button type="submit">Dang ky</button>
</form>