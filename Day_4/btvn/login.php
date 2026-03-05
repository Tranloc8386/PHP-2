<?php
$employee = [
    ["name" => "nguyen van an", "password" => "an@123"],
    ["name" => "tran thi bich", "password" => "bich@123"],
    ["name" => "le van cuong", "password" => "cuong@123"],
    ["name" => "pham thi dung", "password" => "dung@123"],
    ["name" => "doan van em", "password" => "em@123"],

];
function login($name, $pass)
{
    global $employee;

    if (isset($employee[$name]) && $employee[$name] == $pass) {
        return true;
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];
    if (login($name, $password)) {
      echo "thanh cong";
    } else {
         echo "that bai";
    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>

<body>
    <form method="POST">
        <h2>Login Form</h2>
        <label>User Name</label>
        <input type="text" name="name" placeholder="Nhap ten.." required>
        <br><br>
        <label>Password</label>
        <input type="text" name="password" placeholder="Nhap password..." required>
        <button type="submit" name> Log in</button>
    </form>
</body>

</html>