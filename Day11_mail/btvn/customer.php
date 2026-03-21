<?php
require "connectDB.php";
$query = "SELECT *from customer";
$result = mysqli_query($conn, $query);


?>
<h2><strong>Danh sach sinh vien</strong></h2>
<table border="2">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <Th>PHONE</Th>
        <th>ADDRESS</th>
        <th>CREATE AT</th>
        <th>HANH DONG</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td> <?php echo $row['id'] ?></td>
            <td> <?php echo $row['name'] ?></td>
            <td> <?php echo $row['email'] ?></td>
            <td> <?php echo $row['phone'] ?></td>
            <td> <?php echo $row['address'] ?></td>
            <td> <?php echo $row['created_at'] ?></td>
            <td> <a href="send_mail.php?id=<?php echo $row['id'] ?>">Gui mail</a></td>

        </tr>

    <?php } ?>
</table>