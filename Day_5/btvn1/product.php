<?php include 'header.php';
include 'product-data.php' ?>
<div class="row">
    <?php foreach ($products as $i) { ?>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="thumbnail">
                <img src="images/<?php echo $i['image']; ?>" alt="">

                <div class="caption text-center">
                    <h3>Tiêu đề sản phẩm</h3>

                    <p>
                        <b><?php echo $i['price']; ?> đ</b>
                    </p>

                    <p>
                        <a href="#" class="btn btn-xs btn-primary">View</a>
                        <a href="#" class="btn btn-xs btn-default">Add to Cart</a>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<?php include 'footer.php'; ?>