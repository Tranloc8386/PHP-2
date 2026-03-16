<?php

use Dom\Mysql;

session_start();
require "connectDB.php";

//lay danh sach
$result = $conn->query("SELECT *from books where stock>0");
//xu ly form
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['book_id'])) {

    $book_id = $_POST['book_id'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    //lay thong tin sach
    $stmt = $conn->prepare("SELECT id, title, price, stock from books where id = ? and stock >= ? ");
    $stmt->bind_param('ii', $book_id, $quantity);
    $stmt->execute();
    $book = $stmt->get_result()->fetch_assoc();

    if ($book) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$book_id])) {
            $_SESSION['cart'][$book_id]['quantity'] += $quantity;
        } else {
            //them moi vao gio
            $_SESSION['cart'][$book_id] = [
                'title' => $book['title'],
                'price' => $book['price'],
                'quantity' => $quantity
            ];
        }
        echo "<div>Da them vao gio hang</div>";
    } else {
        echo "<div>Sach khong ton tai hoac khong du hang!</div>";
    }
}
?>
<table border="2">
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>AUTHOR</th>
        <th>PRICE</th>
        <th>STOCK</th>
        <th>DESCRIPTION</th>
        <th>THEM VAO GIO</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td> <?php echo  $row['id'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['author'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['stock'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="book_id" value="<?php echo $row['id'] ?>">
                    <div>
                        <input type="number" name="quantity" value="1" min="1" max="<?php echo $row['stock'] ?>">
                        <button type="submit" style="color: chartreuse;">Them vao gio hang</button>
                    </div>
                </form>
            </td>

        </tr>

    <?php } ?>
</table>
<div><a href="cart.php">Xem gio hang</a></div>