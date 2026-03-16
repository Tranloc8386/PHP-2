<?php
require "connectDB2.php";
$query = "select *from student";
$result = mysqli_query($conn, $query);

?>
<h2><strong>Danh sach sinh vien</strong></h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Ho Ten</th>
        <th>EMAIL</th>
        <th>SO DIEN THOAI</th>
        <th>LOP</th>
        <th>TRANG THAI</th>
        <th>HANH DONG</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td> <?php echo $row['id'] ?></td>
            <td> <?php echo $row['name'] ?></td>
            <td> <?php echo $row['email'] ?></td>
            <td> <?php echo $row['phone'] ?></td>
            <td> <?php echo $row['id_class'] ?></td>
            <td> <?php echo $row['status'] ? "Hoat Dong" : "Khong Hoat Dong " ?></td>
            <td>
                <a href="edit_sv.php?id=<?php echo $row['id'] ?>">Sua</a>
                <a href="delete_sv.php?id=<?php echo $row['id'] ?>" onclick="return confirm ('Xoa sinh vien nay')">Xoa</a>
            </td>
        </tr>



    <?php } ?>
</table>