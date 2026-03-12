<?php
require_once "Person2.php";
class Sinhvien2 extends Person2
{

    private $maSV;
    private $lop;
    private $diemTB;
    private $trangThai;

    public function __construct($name, $age, $email, $lop, $diemTB, $maSV, $trangThai)
    {
        parent::__construct($name, $age, $email);
        $this->lop = $lop;
        $this->diemTB = $diemTB;
        $this->trangThai = $trangThai;
        $this->maSV = $maSV;
    }

    public function getMaSV()
    {
        return $this->maSV;
    }
    public function getTrangThai()
    {
        return $this->trangThai;
    }
    public function getDiemTB()
    {
        return $this->diemTB;
    }
    public function getLop()
    {
        return $this->lop;
    }

    public function setDiemTB($diemTB)
    {
        $this->diemTB = $diemTB;
    }
    public function setMaSV($maSV)
    {
        $this->maSV = $maSV;
    }
    public function setTrangThai($trangThai)
    {
        $this->trangThai = $trangThai;
    }
    public function setLop($lop)
    {
        $this->lop = $lop;
    }

    public function getSinhVienInfor()
    {
        return "Ma SV: {$this->maSV} |"  .
            parent::getInfor() . "|" .
            "Diem TB: {$this->diemTB} | "  .
            "Lop: {$this->lop} |" .
            "Trang Thai: {$this->trangThai}";
    }


    public function getHocLuc()
    {
        if ($this->diemTB >= 8.0) return "Gioi";
        if ($this->diemTB >= 6.5) return "Kha";
        if ($this->diemTB >= 4.0) return "Trung Binh";
        return "Yeu";
    }
}
?>