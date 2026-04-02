<?php
require "Product.php";
session_start();

$message = "";

if (!isset($_SESSION['products'])) {
    $_SESSION['products']=[];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $products= new Product($code, $name, $price, $stock);
    $_SESSION['products'][]= $products;
    $message ="Them san pham thanh cong";

}
?>
<h2><strong>Them san pham</strong></h2>
<form method="post">
    Code: <input type="text" name="code" required ><br>
    Name: <input type="text" name="name" required><br>
    Price: <input type="number" name="price" required><br>
    Stock: <input type="number" name="stock" required><br><br>
    <button type="submit">Add</button>

</form>

<table border="1">
    <tr>
        
        <th>Code</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php if(!empty($_SESSION['products'])) {?>
    <?php foreach($_SESSION['products']  as $index=>$p) {?>
    <tr>

        <td><?php echo htmlspecialchars($p->getCode()) ?></td>
        <td><?php echo htmlspecialchars($p->getName()) ?></td>
        <td><?php echo htmlspecialchars($p->getPrice()) ?></td>
        <td><?php echo htmlspecialchars($p->getStock()) ?></td>
        <td>
            <?php echo $p->isInstock() ? "In stock" : "Out of stock" ?>
        </td>

    </tr>

    <?php  }?>
</table>
<?php } ?>
