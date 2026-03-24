<?php
session_start();
class Product
{
    private $id;
    private $name;
    private $price;
    private $quantity;
    private $category;

    public function __construct($id, $name, $price, $quantity, $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->category = $category;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getTotalValue()
    {
        return  $this->price * $this->quantity;
    }
    public function getStatus()
    {
        if ($this->quantity >= 5) return "Available";
        if ($this->quantity < 5) return "Low stock";
        if ($this->quantity = 0) return "Out of stock";
    }
}
?>

<?php
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];

    $products = new Product($id, $name, $price, $quantity, $category);
    $_SESSION['products'][] = $products;
    $message = "Them san pham thanh cong";
}

?>
<?php
if (isset($message)) {

    echo "<p>$message</p>";
}
?>
<form method="post">
    <h2><strong>Add to Product</strong></h2>
    ID: <input type="text" name="id" required><br>
    Name: <input type="text" name="name" required><br>
    Price: <input type="number" name="price" required> <br>
    Quantity: <input type="number" name="quantity" required><br>
    Category: <input type="text" name="category" required><br><br>
    <button type="submit">ADD</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>QUANTITY</th>
        <th>CATEGORY</th>
        <th>TOTAL</th>
        <th>STATUS</th>
    </tr>
    <?php foreach ($_SESSION['products'] as $index => $s) { ?>
        <tr>
            <td> <?php echo $s->getId(); ?></td>
            <td> <?php echo $s->getName(); ?></td>
            <td> <?php echo $s->getPrice(); ?></td>
            <td> <?php echo $s->getQuantity(); ?></td>
            <td> <?php echo $s->getCategory(); ?></td>
            <td> <?php echo $s->getTotalValue(); ?></td>
            <td> <?php echo $s->getStatus(); ?></td>

        </tr>

    <?php } ?>
    </table>