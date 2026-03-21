<?php
$host ="localhost";
$user="root";
$password= "";
$databse ="customerdb";
$conn = mysqli_connect($host, $user, $password, $databse, 3307);
mysqli_set_charset($conn, 'utf8');

if(!$conn){
    die("Ket noi that bai " .mysqli_connect_error());

}else{
    echo "Ket noi thanh cong csdl: " . $databse;
}
?>