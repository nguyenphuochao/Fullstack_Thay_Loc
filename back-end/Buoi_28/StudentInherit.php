<?php
class Student // lớp - khuông bánh
{
    // khai báo các thuộc tính chứa dữ liệu
    public $id;
    public $name;
    public $birthday;
    protected $gender; // protected chỉ cho phép truy cập bên trong hoặc lớp kế thừa từ nó

    function __construct($id1, $name1, $birthday1, $gender1) // hàm auto load hỗ trợ khởi tạo object
    {
        $this->id = $id1; // truy xuất thuộc tính
        $this->name = $name1;
        $this->birthday = $birthday1;
        $this->gender = $gender1;
    }
    // Khai báo phương thức - hàm
    function getAge()
    {
        $curentYear = date("Y"); // 2024
        $timestamp = strtotime($this->birthday);
        $bornYear = date("Y", $timestamp);
        $age = $curentYear - $bornYear;
        return $age;
    }
}
// Tính kế thừa extends - Inherit
// Kết thừa mọi thuộc tính và hàm
class SinhVienChatLuongCao extends Student{

}

// tạo 1 đối tượng - cái bánh
// gọi hàm __construct của class SinhVienChatLuongCao
// new SinhVienChatLuongCao trả về 1 đối tượng dc sinh ra từ lớp SinhVienChatLuongCao
$sv1 = new SinhVienChatLuongCao("001", "Hao", "1999-04-30", "Nam"); 
var_dump($sv1);

