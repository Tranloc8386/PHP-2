<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <h3>
        <?php
        $student = [
            'code' => '232',
            'name' => 'hoang van tam',
            'email' => 'vantam@ggmail.com',
            'phone' => '2343252'
        ];

        foreach ($student as $key => $i) {
            echo $i;
            echo '<br>';
        }
        ?>
    </h3>

</body>

</html>