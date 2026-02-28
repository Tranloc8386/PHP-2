<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Danh sach cac tai khoan</h2>
    <?php
    $mang = [
        ['name' => 'Nguyen Duc Binh', 'email' => 'binh@gmail.com', 'phone' => '93233', 'gender' => 'nam'],
        ['name' => 'Nguyen Duc Tuan', 'email' => 'tuan@gmail.com', 'phone' => '93233', 'gender' => 'nam'],
        ['name' => 'Nguyen Duc Dung', 'email' => 'dung@gmail.com', 'phone' => '93233', 'gender' => 'nam'],
        ['name' => 'Nguyen Thanh Long', 'email' => 'long@gmail.com', 'phone' => '93233', 'gender' => 'nam'],
        ['name' => 'Ngo Viet Anh', 'email' => 'anh@gmail.com', 'phone' => '93233', 'gender' => 'nam'],
        ['name' => 'Dinh Thi Van Anh', 'email' => 'binh@gmail.com', 'phone' => '93233', 'gender' => 'nu'],

    ]
    ?>
    <table >
        <tr>
            <td>Ten</td>
            <td>Email</td>
            <td>SDT</td>
            <td>Gioi Tinh</td>
        </tr>
        <?php foreach ($mang as $key => $i) { ?>
            <tr>
                <td><?php echo $i['name']; ?></td>
                <td><?php echo $i['email']; ?></td>
                <td><?php echo $i['phone']; ?></td>
                <td><?php echo $i['gender']; ?></td>

            </tr>
        <?php } ?>

    </table>

    
</body>

</html>