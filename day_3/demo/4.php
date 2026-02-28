<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="4.css">
</head>

<body>
    <?php
    $mang = [
        [
            'image' => 'https://img1.kienthucvui.vn/uploads/2019/10/30/hinh-anh-cac-loai-rau-cu_112151407.jpg',
            'name' => 'Rau cu sach',
            'Old' => null,
            'Price' => '150.000'
        ],
        [
            'image' => 'https://img1.kienthucvui.vn/uploads/2019/10/30/hinh-anh-cac-loai-rau-cu_112151407.jpg',
            'name' => 'Rau cu sach',
            'Old' => null,
            'Price' => '180.000'
        ],
        [
            'image' => 'https://img1.kienthucvui.vn/uploads/2019/10/30/hinh-anh-cac-loai-rau-cu_112151407.jpg',
            'name' => 'Rau cu sach',
            'Old' => '100.000',
            'Price' => '150.000'
        ],
        [
            'image' => 'https://img1.kienthucvui.vn/uploads/2019/10/30/hinh-anh-cac-loai-rau-cu_112151407.jpg',
            'name' => 'Rau cu sach',
            'Old' => '120.000',
            'Price' => '120.000'
        ]

    ]

    

    ?>

    <div class="product-list">
        <?php foreach ($mang as $sp) { ?>
            <div class="product-items">
                <img src="<?php echo $sp['image']; ?>" width="150">
                <h3><?php echo $sp['name']; ?></h3>
                <?php if ($sp['Old']) { ?>
                    <p>Old: <?php echo number_format ($sp['Old']);  ?> vnd</p>

                <?php } ?>

                <h4><?php echo number_format($sp['Price']);  ?> vnd</h4>
                <button>View</button>
                <button>Add cart</button>
            </div>


        <?php } ?>
    </div>

</body>

</html>