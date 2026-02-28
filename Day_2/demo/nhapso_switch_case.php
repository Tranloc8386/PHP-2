<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhap 2 so</title>
</head>

<body>
    <form method="post">
        <h2>Nhap 2 so</h2>
        <label>So a</label><br>
        <input type="text" name="s1" require><br><br>
        <label>So b</label><br>
        <input type="text" name="s2" require><br><br>


        <p>1. Cong 2 so</p>
        <p>2. Tru 2 so</p>
        <p>3. Nhan 2 so</p>
        <p>4. Chia 2 so</p>

        <label>Moi chon</label><br>
        <input type="number" name="chon"><br><br>
        <button type="submit">Ket qua</button>

    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $choice = is_numeric(value: $_POST["chon"]) ? $_POST["chon"] : "khong hop le";
        $a = is_numeric(value: $_POST["s1"]) ? $_POST["s1"] : "khong hop le";
        $b = is_numeric(value: $_POST["s2"]) ? $_POST["s2"] : "khong hop le";

        switch ($choice) {
            case 1:
                $ketqua = $a + $b;
                echo "Ket qua: " . $ketqua;
                break;
            case 2:
                $ketqua = $a - $b;
                echo "Ket qua: " . $ketqua;
                break;
            case 3:
                $ketqua = $a * $b;
                echo "Ket qua: " . $ketqua;
                break;
            case 4:
                $ketqua = $a / $b;
                echo "Ket qua: " . $ketqua;
                break;
            default:
                echo "khong hop le";
                break;
        }
    }
    ?>
</body>

</html>