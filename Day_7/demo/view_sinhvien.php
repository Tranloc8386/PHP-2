<?php
//them file cua class sinhvien
require_once "sinhvien.php";
//tao mang object sinh vien mau 
$dssinhvien = [
    new Sinhvien(name: "SV001", age: "Nguyễn Văn An", email: 20, maSV: "an.nguyen@example.com", lop: "CNTT K65", diemTB: 8.5, trangThai: "Đang học"),
    new Sinhvien(name: "SV002", age: "Trần Thị Bình", email: 19, maSV: "binh.tran@example.com", lop: "Kinh tế K66", diemTB: 7.2, trangThai: "Đang học"),
    new Sinhvien(name: "SV003", age: "Lê Văn Cường", email: 21, maSV: "cuong.le@example.com", lop: "Cơ khí K64", diemTB: 9.1, trangThai: "Tốt nghiệp"),
    new Sinhvien(name: "SV004", age: "Phạm Thị Dung", email: 20, maSV: "dung.pham@example.com", lop: "CNTT K65", diemTB: 6.8, trangThai: "Đang học"),
    new Sinhvien(name: "SV005", age: "Đoàn Văn Em", email: 22, maSV: "em.doan@example.com", lop: "Xây dựng K63", diemTB: 6.6, trangThai: "Bảo lưu"),
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