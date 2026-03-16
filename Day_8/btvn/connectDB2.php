<?php 
$host = "localhost";
$user = "root";
$password ="";
$database="QUAN_LY_SINH_VIEN";
$conn = mysqli_connect($host, $user, $password, $database,3307);
mysqli_set_charset($conn, 'utf8');

if(!$conn){
    die("ket noi that bai"). mysqli_connect_error();
}
else{
    echo "Ket noi thanh cong database " . $database;
}

?>