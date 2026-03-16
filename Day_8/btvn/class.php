<?php
require "connectDB2.php";
$query = "select *from class";
$result = mysqli_query($conn, $query);

?>
<h2><strong>Danh sach lop hoc</strong></h2>
<table border="5">
    <tr>
        <th>ID</th>
        <th>TEN LOP</th>
        <th>TRANG THAI</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['status'] ? "Hoat dong" : "khong hoat dong" ?></td>
        </tr>

    <?php } ?>
</table>
<?php mysqli_close($conn) ?>