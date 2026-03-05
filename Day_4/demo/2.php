<?php
function kiem_tra_chan_le($a)
{
    if ($a % 2 == 0) {
        return true;
    }
    return false;
}
function in_kq($a)
{
    if (kiem_tra_chan_le($a)) {
        echo $a . ' la so chan';
    } else {
        echo $a . ' la so le';
    }
}
in_kq(20);
?>
