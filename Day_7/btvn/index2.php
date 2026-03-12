<?php
require "Person2.php";
$person =null;
$message = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        $name = htmlspecialchars($_POST['name']);
        $age = intval($_POST['age']);
        $email = htmlspecialchars($_POST["email"]);

        if (empty($name) || $age <= 0 || empty($email)) {
            throw new Exception("Vui long nhap lai thong tin!");
        }
        $person = new Person2($name, $age, $email);
        $message = "Thong tin da duoc luu thanh cong";
    } catch (Exception $s) {
        $message = "Loi " . $s->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>

<body>
    <h4><strong>Thong tin dang nhap</strong></h4>
    <form method="post" action="">
        <label>Ten dang nhap:</label>
        <input type="text" name="name" value="<?php isset($_POST["name"]) ? htmlspecialchars($_POST['name']) : "" ?>">
        <br>
        <label>Do tuoi: </label>
        <input type="number" name="age" value="<?php isset($_POST['age']) ? htmlspecialchars($_POST["age"]) : "" ?>">
        <br>
        <label>Email: </label>
        <input type="email" name="email" value="<?php isset($_POST['email']) ? htmlspecialchars($_POST["email"]) : "" ?>">
        <br>
        <button type="submit">Dang nhap</button>

    </form>
    <hr>
    <p style=" color :<?php echo strpos($message, "oi") ? "red" : "green" ?>">
        <?php echo htmlspecialchars($message) ?>
    </p>
    <?php if($person) { ?>
        <h5><strong>Thong tin tai khoan</strong></h5>
        <p>Ho va ten: <?php echo htmlspecialchars($person->getName()) ?></p>
        <p>Age: <?php echo htmlspecialchars($person->getAge()) ?></p>
        <p>Email: <?php echo htmlspecialchars($person->getEmail()) ?></p>

    <?php } ?>
</body>

</html>