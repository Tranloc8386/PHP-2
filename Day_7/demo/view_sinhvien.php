<?php
//them file cua class sinhvien
require_once "sinhvien.php";
//tao mang object sinh vien mau 
$dssinhvien = [
    new Sinhvien("SV001", "Nguyễn Văn An", 20, "an.nguyen@example.com", "CNTT K65", 8.5, "Đang học"),
    new Sinhvien("SV002", "Trần Thị Bình", 19, "binh.tran@example.com", "Kinh tế K66", 7.2, "Đang học"),
    new Sinhvien("SV003", "Lê Văn Cường", 21, "cuong.le@example.com", "Cơ khí K64", 9.1, "Tốt nghiệp"),
    new Sinhvien("SV004", "Phạm Thị Dung", 20, "dung.pham@example.com", "CNTT K65", 6.8, "Đang học"),
    new Sinhvien("SV005", "Đoàn Văn Em", 22, "em.doan@example.com", "Xây dựng K63", 6.6, "Bảo lưu"),
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Danh sach sinh vien</h2>
        <?php if (empty($dssinhvien)) { ?>
            <div>
                Hien chua co thong tin sinh vien nao
            </div>
        <?php } ?>
        <div class="table">
            <table>
                <tr>
                    <th>MA SV</th>
                    <th>Ho va ten</th>
                    <th>Tuoi</th>
                    <th>Email</th>
                    <th>Lop</th>
                    <th>Diem TB</th>
                    <th>Hoc luc</th>
                    <th>Trang Thai</th>
                </tr>
                <?php foreach ($dssinhvien as $index => $sv) { ?>
                    <tr>
                        <td><?= htmlspecialchars($sv->getMaSV()) ?></td>
                        <td><?= htmlspecialchars($sv->getName()) ?></td>
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
        </div>
</body>

</html>