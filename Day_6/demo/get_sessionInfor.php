<?php
session_start();
///kiem tra xem da dang nhap chua
if (!isset($_SESSION['user']) || ! $_SESSION['user']['logged_in']) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Thong tin session</title>
</head>

<body>

    <h2>Thong tin user tu Session</h2>
    <div>
        <h3>Chao mung ban quay lai!</h3>
        <table>
            <tr>
                <th>Truong</th>
                <th>Gia tri</th>
            </tr>
            <tr>
                <td>Ten dang nhap</td>
                <td><?php echo htmlspecialchars($user['username']) ?></td>
            </tr>
            <tr>
                <td>Thoi gian dang nhap</td>
            </tr>
        </table>
    </div>
</body>

</html>