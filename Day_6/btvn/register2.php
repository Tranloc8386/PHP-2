<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($password)) {
        $user = [
            'name' => $name,
            'password' => password_hash($password, PASSWORD_DEFAULT)

        ];
        setcookie('user', json_encode($user), time()+(86400*7), "/");
        echo $loginMessage ="<p>Dang ki thanh cong</p>";
    }
    else{
        echo $loginMessage ="<p>Vui long cap nhat day du thong tin!</p>";
    }
}
?>
<h2><strong>Dang ky</strong></h2>
<form method="post">
<label>User name:</label>
<input type="text" name="name" required>
<br>
<label>Password: </label>
<input type="text" name="password" required>
<br>
<button type="submit">Dang ky</button>
</form>