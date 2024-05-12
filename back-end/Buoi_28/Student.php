<?php
class Student // lớp - khuông bánh
{
    // khai báo các thuộc tính chứa dữ liệu
    public $id;
    public $name;
    public $birthday;
    public $gender;

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
// tạo 1 đối tượng - cái bánh
// gọi hàm __construct của class Student
// new Student trả về 1 đối tượng dc sinh ra từ lớp Student
// thực hiện gán các giá trị truyền vào các thuộc tính khởi tạo
$sv1 = new Student("001", "Hao", "1999-04-30", "Nam"); // tất cả dữ liệu sẽ nạp vào hàm __contruct
var_dump($sv1);
// Truy xuất phương thức - hàm
echo $sv1->getAge();
echo "<br>";
// Truy xuất thuộc tính
echo $sv1->name;
