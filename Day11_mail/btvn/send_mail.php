<?php
require 'connectDB.php';
$customer = null;
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $conn->prepare("SELECT *from customer where id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $customer = $result->fetch_assoc();
}
//nap thu vien
include 'PHPMailer-master/src/Exception.php';
include 'PHPMailer-master/src/PHPMailer.php';
include 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //lay du lieu tu form
    $to = htmlspecialchars(trim($_POST['to']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $content = htmlspecialchars($_POST['content']);

    //kiem tra email hop le
    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
        die("Dia chi email khong hop le!");
    }

    //tao doi tuong PHPmailer
    $mail = new PHPMailer(true);

    try {
        //cau hinh SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // may chu STMP cua Gmail
        $mail->SMTPAuth = true;
        $mail->Username = "loc.th.2808@aptechlearning.edu.vn";
        $mail->Password = 'wqbu auyu nhgf ythh'; // mk ung dung mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // ma hoa TLS
        $mail->Port = 587;
        $mail->addAddress($to);
        $mail->isHTML(true);

        //cau hinh nguoi gui va nguoi nha
        $mail->setFrom('loc.th.2808@aptechlearning.edu.vn', "Tran huu loc");
        $mail->Subject = $subject;
        $mail->Body = nl2br($content); // chuyen doi xuong dong thanh <br>
        $mail->AltBody = strip_tags($content); //phien ban khong co HTML

        //gui email
        $mail->send();
        echo "Email da duoc gui thanh cong den $to";
    } catch (Exception $e) {
        echo "Gui email that bai. Loi: {$mail->ErrorInfo}";
    }
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
    <form method="post" enctype="multipart/form-data">
        <h2><strong>Form Gui Mail</strong></h2>
        <label>Gui toi: </label>
        <input type="email" name="to"
            value="<?php echo $customer['email'] ?? '' ?>" required><br><br>
        <label>Chu de: </label>
        <input type="text" name="subject" required><br><br>

        <label>File dinh kem: </label><br>
        <input type="file" name="choose_file">
        <br><br>
        <label>Noi dung</label>
        <textarea name="content" required></textarea>
        <br>
        <button type="submit">Gui</button>

    </form>
</body>

</html>