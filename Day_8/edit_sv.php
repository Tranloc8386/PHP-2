<?php
require_once 'connectDB.php';
$id = $_GET['id'];
//lay thong tin sinh vien tu DB
$result = mysqli_query($conn, "SELECT * FROM sinh_vien WHERE id=$id");
//chuyen su lieuj SQL thanh mang
$student = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$lop_hoc_id = $_POST['lop_hoc_id'];

//update du lieu trong DB
mysqli_query($conn,
"UPDATE sinh_vien
SET name='$name', email='$email', phone='$phone', lop_hoc_id='$lop_hoc_id'
WHERE id=$id"
);
//quay lai trang danh sach sinh vien
header("Location: sinh_vien.php");
}

//lay danh sach lop hocj
$result = mysqli_query($conn, "SELECT * FROM lop_hoc");
?>

<h2>Sửa sinh viên</h2>

<form method="post">

Tên  
<input type="text" name="name" value="<?= $student['NAME'] ?>" required>
<br><br>

Email  
<input type="email" name="email" value="<?= $student['EMAIL'] ?>" required>
<br><br>

SĐT  
<input type="text" name="phone" value="<?= $student['PHONE'] ?>" required>
<br><br>

Lớp học

<select name="lop_hoc_id">

<?php while ($row = mysqli_fetch_assoc($result)) : ?>

<option value="<?= $row['ID'] ?>"
<?= ($row['ID'] == $student['LOP_HOC_ID']) ? 'selected' : '' ?>>

<?= $row['NAME'] ?>

</option>

<?php endwhile; ?>

</select>

<br><br>

<button type="submit">Cập nhật</button>

</form>