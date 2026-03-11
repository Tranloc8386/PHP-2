<?php
//them class Person.php de ke thua
require_once "Person.php";

//tao class sinhvien de ke thua tu Person

class Sinhvien extends Person
{
    private $maSV;
    private $lop;
    private $diemTB;
    private $trangThai;

    //constructor- goi constructor cua lop cha+ them thuoc tinh moi
    public function __construct($name, $age, $email, $maSV, $lop, $diemTB, $trangThai ="Dang hoc")
    {
         parent::__construct($name, $age, $email);
        $this->maSV = $maSV;
        $this->lop = $lop;
        $this->diemTB = $diemTB;
        $this->trangThai = $trangThai;
    }
    //getters cho thuoc tinh moi
    public function getMaSV()
    {
        return $this->maSV;
    }
    public function getLop()
    {
        return $this->lop;
    }

    public function getDiemTB()
    {
        return $this->diemTB;
    }

    public function getTrangThai()
    {
        return $this->trangThai;
    }

    //serters
    public function setMaSV($maSV)
    {
        $this->maSV = $maSV;
    }
    public function setLop($lop)
    {
        $this->lop = $lop;
    }
    public function setDiemTB($diemTB)
    {
        $this->diemTB = $diemTB;
    }
    public function setTrangThai($trangThai)
    {
        $this->trangThai = $trangThai;
    }

    //Phuong thuc hien thi toan bo thong tin sinh vien
    public function getSinhVienInfo(){

        return "Ma SV: {$this -> maSV} | " . 
        parent ::getInfo() . "|". 
        "Lop: {$this-> lop} |" . 
        "Diem TB: {$this-> diemTB} | " .
        "Trang Thai: {$this-> trangThai}";
    }
//phuong thuc kiem tra hoc luc
public function getHocLuc(){
    if($this-> diemTB >=8.0) return "Gioi";
    if($this-> diemTB >=6.5) return "Kha";
    if($this-> diemTB >=4.0) return "TB";

    return "Yeu";
}

}
