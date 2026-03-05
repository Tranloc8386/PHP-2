<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
     <form method="post">
        <label>So a: </label>
        <input type="number" name="soa" required>

        <label>So b: </label>
        <input type="number" name="sob" required>

        <input type="reset" value="Xoa">
       <button type="submit">Tinhh</button>
    </form>

    <?php
    function cong_hai_so($a, $b)
    {
        return $a + $b;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $a = is_numeric($_POST["soa"]) ? $_POST["soa"] : 0;
        $b = is_numeric($_POST["sob"]) ? $_POST["sob"] : 0;

        $ketqua = cong_hai_so($a, $b);

        echo "<h3>Ket qua: $ketqua</h3>";
        
    }
    ?>

</body>

</html>