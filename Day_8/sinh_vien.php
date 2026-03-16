<?php
require 'connectDB.php';

$query = "SELECT *from sinh_vien";

$result = mysqli_query($conn, $query);
?>

<h2>Danh sách sinh viên</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Họ tên</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Lớp</th>
    <th>Trạng thái</th>
    <th>Hành động</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) : ?>
<tr>

<td><?= $row['ID'] ?></td>
<td><?= $row['NAME'] ?></td>
<td><?= $row['EMAIL'] ?></td>
<td><?= $row['PHONE'] ?></td>
<td><?= $row['LOP_HOC_ID'] ?></td>

<td><?= $row['STATUS'] ? "Hoạt động" : "Không hoạt động" ?></td>

<td>
<a href="edit_sv.php?id=<?= $row['ID'] ?>">Sửa</a> |
<a href="delete_sv.php?id=<?= $row['ID'] ?>" onclick="return confirm('Xóa sinh viên này?')">
Xóa
</a>
</td>

</tr>
<?php endwhile; ?>

</table>

<?php include 'footer.php'; ?>