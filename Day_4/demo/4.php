<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $number = [12, 3, 4, 644, 23, 645, 23, 22];
    $sorteAsc = $number;
    sort($sorteAsc); //sap xep tang dan

    $sorteDesc = $number;
    rsort($sorteDesc); //sap sap giam dan

    echo "<p><strong>Mang tan dan: </strong>" . implode(",", $sorteAsc) . "</p>";
    echo "<p><strong>Mang giam dan: </strong>" . implode(",", $sorteDesc) . "</p>";
    // ham implope la ghep cac phan tu thanh 1 chuoi: implode("ký_tự_ngăn_cách", $mang);
    
    ?>
</body>

</html>