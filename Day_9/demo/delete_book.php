<?php
require 'connectDB.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: books.php");
        exit();
    } else {
        die("Lỗi: " . $stmt->error);
    }
} else {
    die("Không có ID!");
}
?>