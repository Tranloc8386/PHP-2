<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="2.css">
</head>

<body>
    <?php
    $product = [
        [
            'id' => '1',
            'image' => 'sfdsf',
            'name' => 'Rau cu sach 1',
            'price' => 150,
            'quantity' => 2,
            'subtotal' => 300,

        ],
        [
            'id' => '2',
            'image' => 'sfdsf',
            'name' => 'Rau cu sach 2',
            'price' => 180,
            'quantity' => 3,
            'subtotal' => 540,

        ],
        [
            'id' => '3',
            'image' => 'sfdsf',
            'name' => 'Rau cu sach 3',
            'price' => 100,
            'quantity' => 5,
            'subtotal' => 500,

        ],
        [
            'id' => '4',
            'image' => 'sfdsf',
            'name' => 'Rau cu sach 4',
            'price' => 120,
            'quantity' => 9,
            'subtotal' => 1080,

        ],

    ]
    ?>
    <table class="container-btn">
        <tr>
            <td>ID</td>
            <td>Image</td>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Sub Total</td>

        </tr>
        <?php
        $total_quantity = 0;
        $subtotal = 0;
        ?>
        <?php foreach ($product as $i) {
            $total_quantity += $i['quantity'];
            $subtotal += $i['subtotal'];
        ?>

            <tr>
                <td><?php echo $i['id'] ?></td>
                <td><?php echo $i['image'] ?></td>
                <td><?php echo $i['name'] ?></td>
                <td><?php echo $i['price'] ?></td>
                <td><?php echo $i['quantity'] ?></td>
                <td><?php echo $i['subtotal'] ?></td>


            </tr>


        <?php } ?>
        <tr>
            <td>Total quantity: <?php echo $total_quantity; ?> vnd </td>

        </tr>
        <tr>
            <td>Total price: <?php echo $subtotal; ?> vnd</td>
        </tr>


    </table>
</body>

</html>