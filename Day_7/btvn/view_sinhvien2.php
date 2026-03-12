<?php
require "sinhvien2.php";

$dssinhvien = [
    new Sinhvien2("Nguyễn Văn An", 20, "an.nguyen@example.com", "CNTT K65", 8.5, "SV001", "Đang học"),
    new Sinhvien2("Trần Thị Bình", 19, "binh.tran@example.com", "Kinh tế K66", 7.2, "SV002", "Đang học"),
    new Sinhvien2("Lê Văn Cường", 21, "cuong.le@example.com", "Cơ khí K64", 9.1, "SV003", "Tốt nghiệp"),
    new Sinhvien2("Phạm Thị Dung", 20, "dung.pham@example.com", "CNTT K65", 6.8, "SV004", "Đang học"),
    new Sinhvien2("Đoàn Văn Em", 22, "em.doan@example.com", "Xây dựng K63", 6.6, "SV005", "Bảo lưu"),
];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maSV = $_POST['maSV'];
    $name = $_POST['name'];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $lop = $_POST["lop"];
    $diemTB = $_POST["diemTB"];
    $trangThai = $_POST["trangThai"];
    $sv = new Sinhvien2(
        
        $name,
        $maSV,
        $age,
        $email,

        $lop,
        $diemTB,

        $trangThai
    );
    $dssinhvien[] = $sv;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2><strong>Danh dach sinh vien</strong></h2>
    <?php if (empty($dssinhvien)) { ?>
        <div>Hien chua co thong tin sinh vien</div>
    <?php } ?>
    <table>
        <tr>
            <th>Ho Va Ten</th>
            <th>Ma SV</th>
            <th>Tuoi</th>
            <th>Email</th>
            <th>Lop</th>
            <th>Diem TB</th>
            <th>Hoc luc</th>
            <th>Trang Thai</th>
        </tr>
        <?php foreach ($dssinhvien as $index => $sv) { ?>
            <tr>
                <td><?= htmlspecialchars($sv->getName()) ?></td>
                <td><?= htmlspecialchars($sv->getMaSV()) ?></td>

                <td><?= $sv->getAge() ?></td>
                <td><?= htmlspecialchars($sv->getEmail()) ?></td>
                <td><?= htmlspecialchars($sv->getLop()) ?></td>
                <td><?= number_format($sv->getDiemTB(), 1) ?></td>
                <td><?= $sv->getHocLuc() ?></td>
                <td class="<?php
                            if ($sv->getTrangThai() == 'Đang học') echo 'status-danghoc';
                            elseif ($sv->getTrangThai() == 'Tốt nghiệp') echo 'status-totnghiep';
                            else echo 'status-baoluu';
                            ?>">
                    <?= htmlspecialchars($sv->getTrangThai()) ?>
                </td>

            </tr>
        <?php } ?>
    </table>
    <hr>
    <h3><strong>Them sinh vien moi</strong></h3>
    <form method="post" action="">

        <label>Ten SV:</label>
        <input type="text" name="name" required><br>
        <label>Ma SV:</label>
        <input type="number" name="maSV" required><br>
        <label>Tuoi: </label>
        <input type="number" name="age" required><br>
        <label>Email: </label>
        <input type="email" name="email" required><br>

        <label>Lớp:</label>
        <input type="text" name="lop" required><br>
        <label>Điểm TB:</label>
        <input type="number" step="0.1" name="diemTB" required><br>

        <label>Trạng thái:</label>
        <select name="trangThai">
            <option value="Đang học">Đang học</option>
            <option value="Tốt nghiệp">Tốt nghiệp</option>
            <option value="Bảo lưu">Bảo lưu</option>
        </select><br><br>
        <button type="submit">Them sinh vien</button>



    </form>

</body>



</html>