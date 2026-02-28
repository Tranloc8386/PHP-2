<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // =================mang ban dau =================

    $product = [
        ['name' => 'caroto',  'image' => '1', 'price' => 150000, 'sale_price' => 10000],
        ['name' => 'su hao',  'image' => '2', 'price' => 180000, 'sale_price' => 0],
        ['name' => 'bap cai', 'image' => '3', 'price' => 100000, 'sale_price' => 50000],
        ['name' => 'sup lo',  'image' => '4', 'price' => 200000, 'sale_price' => 0],
        ['name' => 'rau muong', 'image' => '5', 'price' => 40000,  'sale_price' => 9000],
        ['name' => 'salach',  'image' => '6', 'price' => 180000, 'sale_price' => 0],
    ];

    //  ============xu ly them san pham======
    $new_product = [
        'name' => trim($_POST['name']),
        'image' => trim($_POST['image']),
        'price' => (int) $_POST['price'],
        'sale_price' => (int) $_POST['sale_price']


    ];
    /// them vao mang bang array_push
    array_push($product, $new_product);

    ?>
    <h2>List products</h2>
    <table>
        <tr>
            <th>Ten</th>
            <th>Hinh Anh</th>
            <th>Gia Goc</th>
            </th>
            <th>Gia sale</th>
        </tr>
        <?php foreach ($product as $sp) { ?>
            <tr>
                <td><?php echo htmlspecialchars($sp['name']) ?></td>
                <td><?php echo htmlspecialchars($sp['image']) ?></td>
                <td><?php echo number_format($sp['price']) ?></td>
                <td><?php echo number_format($sp['sale_price']) ?></td>
            </tr>


        <?php } ?>
    </table>
    <form method="POST">
        <p>Ten san pham:<br>
            <input type="text" name="name" required style="300px">
        </p>
        <p>Hinh anh:<br>
            <input type="text" name="image" required>
        </p>

        <p>Gia goc:<br>
            <input type="number" name="price" required>
        </p>
        <p>Gia sale<br>
            <input type="number" name="sale_price" value="0">
        </p>

        <button type="submit " name="add">Them san pham</button>



    </form>
</body>

</html>