<?php
session_start();
class Product
{
    private $code;
    private $name;
    private $price;
    private $stock;

    public function __construct($code, $name, $price, $stock)
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getCode()
    {
        return $this->code;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getStock()
    {
        return $this->stock;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setCode($code)
    {
        $this->code = $code;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function isInStock()
    {
        return $this->stock > 0;
    }
    public function getInfo()
    {
        return "Code: {$this->code} - Name: {$this->name} - Price: {$this->price} VND - Stock: {$this->stock}";
    }
}

//khoi tao session neu chua co
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}
//xu ly khi submit form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $code = $_POST['code'];
    $name =  $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // tao object
    $product = new Product($code, $name, $price, $stock);

    //luu vao session
    $_SESSION['products'][] = $product;
    $message = "Them san pham thanh cong";
}

if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    //xoa phan tu
    unset($_SESSION['products'][$index]);
    //sap xep lai index
    $_SESSION['products'] = array_values($_SESSION['products']);
}

?>

<?php if (isset($message)) {
    echo "<p>$message</p>";
} ?>

<form method="post">
    <label>Product Code: </label>
    <input type="text" name="code" required><br>
    <label>Product Name: </label>
    <input type="text" name="name" required><br>
    <label>Product Price: </label>
    <input type="number" name="price" required> <br>
    <label>Stock Quantity: </label>
    <input type="number" name="stock" required><br><br>
    <button type="submit ">Add Product</button>
</form>




<table border="1">
    <tr>
        <th>CODE</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>STOCK</th>
        <th>STATUS</th>
        <th>ACTION</th>

    </tr>
    <?php if (!empty($_SESSION['products'])) { ?>

        <h3>Danh sach san pham</h3>
        <?php foreach ($_SESSION['products'] as $index=> $p) { ?>
            <tr>
                <td><?php echo $p->getCode(); ?></td>
                <td><?php echo $p->getName(); ?></td>
                <td><?php echo $p->getPrice(); ?></td>
                <td><?php echo $p->getStock(); ?></td>
                <td>
                    <?php echo $p->isInStock() ? "In stock" : "Out stock"; ?>

                </td>
                <td>
                    <a href="?delete=<?php echo $index; ?>" onclick="return confirm('Ban co chac chan muon xoa khong?')">Xoa</a>
                </td>

            </tr>

        <?php } ?>

    <?php } ?>
</table>