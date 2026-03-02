<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="1.css">
</head>

<>
    <?php
    $vegetable = [
        [
            'image' => 'https://tse2.mm.bing.net/th/id/OIP.zDq7nHAtHa1U0wmZdBh9eQHaE8?pid=Api&P=0&h=180',
            'name' => 'Rau cu sach',
            'old' => '180.000',
            'price' => '150.000',

        ],
        [
            'image' => 'https://tse2.mm.bing.net/th/id/OIP.zDq7nHAtHa1U0wmZdBh9eQHaE8?pid=Api&P=0&h=180',
            'name' => 'Rau cu sach',
            'old' => '100.000',
            'price' => '50.000',

        ],
        [
            'image' => 'https://tse2.mm.bing.net/th/id/OIP.zDq7nHAtHa1U0wmZdBh9eQHaE8?pid=Api&P=0&h=180',
            'name' => 'Rau cu sach',
            'old' => null,
            'price' => '150.000',

        ],
        [
            'image' => 'https://tse2.mm.bing.net/th/id/OIP.zDq7nHAtHa1U0wmZdBh9eQHaE8?pid=Api&P=0&h=180',
            'name' => 'Rau cu sach',
            'old' => '180.000',
            'price' => '150.000',

        ]

    ]
    ?>
    <div class="products-list">
        <?php foreach ($vegetable as $product) { ?>
            <div class="product-item">
                <div> <img src="<?php echo $product['image']; ?>"> </div>
                <h4><?php echo $product['name']; ?></h4>

                <?php if ($product['old'] > 0) { ?>
                    <p>Old: <?php echo $product['old'] ?> vnd</p>
                    <p>Price: <?php echo $product['price'] ?> vnd</p>
                <?php } ?>
                <?php if ($product['old'] == null) { ?>

                    <p>Price: <?php echo $product['price'] ?> vnd</p>
                <?php } ?>
                <button type="submit"> View</button>
                <button type="submit"> Add Cart</button>



            </div>
        <?php } ?>
    </div>

    </body>

</html>