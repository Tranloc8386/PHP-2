<?php
$soluong = 5;
$time = 2;
$tongtien = 0;
if ($time < 10) {
    $tongtien = $soluong * 5.5;
    echo "Tong tien la $tongtien";
} else if ($time >= 10 && $time <= 20) {
    $tongtien = $soluong * 4;
    echo " Tong tien la:  ". $tongtien;
} else if ($time >= 20 && $time <= 30) {
    $tongtien = $soluong * 2.5;
    echo " Tong tien la $tongtien";
} else {
    echo "Khong phai tra tien";
}
?>