<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>ALL PRODUCTS</h2>

<p>Xin chao <?php echo $_SESSION['user']; ?></p>

<img src="images/1.jpg" width="150">
<img src="images/1.jpg" width="150">
<img src="images/1.jpg" width="150">