<?php include 'header.php' ?>
<?php include 'seach.php' ?>
<?php require 'data_products.php' ?>
<body  >
    
    
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
<?php include 'footer.php' ?>