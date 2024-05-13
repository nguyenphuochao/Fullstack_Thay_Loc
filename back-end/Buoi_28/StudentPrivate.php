<?php
class Student // lớp - khuông bánh
{
    // khai báo các thuộc tính chứa dữ liệu
    public $id;
    public $name;
    public $birthday;
    protected $gender; // protected chỉ cho phép truy cập bên trong hoặc lớp kế thừa từ nó
    private $oweFee; // private chỉ cho phép truy cập bên trong lớp đó
    function __construct($id, $name, $birthday, $gender) // hàm auto load hỗ trợ khởi tạo object
    {
        $this->id = $id; // truy xuất thuộc tính
        $this->name = $name;
        $this->birthday = $birthday;
        $this->gender = $gender;
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
class SinhVienChatLuongCao extends Student
{
    public $discount = 10; // khai báo thêm thuộc tính

    function f1() // khai báo thêm phương thức
    {
        return "haha";
    }
    function f2(){
        return $this->gender;
    }
    function f3(){
        return $this->oweFee;
    }
    // ghi đè - thêm __contruct
    function __construct($id, $name, $birthday, $gender, $discount = null)
    {
        parent::__construct($id, $name, $birthday, $gender); // gọi lại hàm __construct của lớp cha
        if ($discount) {
            $this->discount = $discount;
        }
    }
}

// tạo 1 đối tượng - cái bánh
// gọi hàm __construct của class SinhVienChatLuongCao
// new SinhVienChatLuongCao trả về 1 đối tượng dc sinh ra từ lớp SinhVienChatLuongCao
$sv1 = new SinhVienChatLuongCao("001", "Hao", "1999-04-30", "Nam" , 30);
var_dump($sv1);
echo $sv1->f2();
echo "<br>";
echo $sv1->f3();

