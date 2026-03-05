<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $sinhvien = [
        ["ten" => "Nguyen Van A", "diem" => 85],
        ["ten" => "Tran Thi B", "diem" => 75],
        ["ten" => "Le Van C", "diem" => 92],
        ["ten" => "Pham Thi D", "diem" => 68],
        ["ten" => "Doan Van E", "diem" => 58]
    ];

    //ham xep loai
    function xep_loai($diem)
    {
        if ($diem >= 85) {
            return "Giỏi";
        } elseif ($diem >= 70) {
            return "Khá";
        } elseif ($diem >= 50) {
            return "Trung bình";
        } else {
            return "Yếu";
        }
    }

    //ham tim ten sv
    function searchStudent($sinhvien, $keyword)
    {
        $result = [];
        $keyword = strtolower(trim(($keyword)));

        if ($keyword === '') {
            return $sinhvien; /// khong nhap gi khong hien
        }
        foreach ($sinhvien as $sv) {
            if (strpos(strtolower($sv['ten']), $keyword) !== false) {
                $result[] = $sv;
            }
        }
        return $result;
    }
    $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
    $sinhvien = searchStudent($sinhvien, $keyword);

    ?>
    
    <form method="POST">
        <input type="text" name="keyword" placeholder="Nhap ten can tim">
        <button type="submit">Tim</button>
    </form>
    <table>
        <tr>
            <th>Ten sinh vien</th>
            <th>Diem so</th>
            <th>Xep Loai</th>
        </tr>
        <?php foreach ($sinhvien as $sv) { ?>
            <tr>
                <td><?php echo $sv["ten"] ?></td>
                <td><?php echo $sv["diem"] ?></td>
                <td><?php echo xep_loai($sv["diem"]) ?></td>

            </tr>
        <?php } ?>
    </table>

</body>

</html>