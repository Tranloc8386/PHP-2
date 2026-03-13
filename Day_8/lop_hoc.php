<?php
require 'connectDB.php';

$query = "SELECT * FROM lop_hoc";
$result = mysqli_query($conn, $query);
?>

<h2>Danh sách lớp học</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Tên lớp</th>
    <th>Trạng thái</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) : ?>
<tr>
    <td><?= $row['ID'] ?></td>
    <td><?= $row['NAME'] ?></td>
    <td><?= $row['STATUS'] ? "Hoạt động" : "Không hoạt động" ?></td>
</tr>
<?php endwhile; ?>

</table>

<?php mysqli_close($conn); ?>