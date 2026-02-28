<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>STT</td>
            <td>Anh</td>
            <td>Ten</td>
        </tr>
        <?php for($i =1; $i<7;$i++){ ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td> <img src="image/<?php echo $i?>.jpg" alt="" width="50"></td>
            <td>Hinh anh <?php echo $i; ?></td>
        </tr>  

    <?php }?>
    </table>
</body>
</html>