<?php
// 1. Viết hàm listSortStudents($studentList), hàm này trả về danh sách sinh viên
// đã dc sắp xếp theo thứ tự alphabet
$studentList = ["hao", "tuan", "hoang", "zed", "thao", "an"];
function listSortStudents($studentList)
{
    sort($studentList);
    return $studentList;
}
var_dump(listSortStudents($studentList));
echo "<br>";
// 2. Viết hàm payPost($post). Hàm này trả về số tiền cần trả cho bài viết theo  tiêu chí sau:
// chiều dài từ <=4 thì giá là 50đ
// chiều dài >4 thì giá là 100đ
function payPost($post)
{
    if (strlen($post) > 4) {
        return 100;
    } else {
        return 50;
    }
}
echo payPost("hello");
// 3. Tạo form đăng nhập gồm các thành phần sau:
// Username, Password, Button login
// Hiện thực method POST và hiển thị thông tin người dùng đăng nhập trên server
// => Giống bài login_form.php đã làm

// 4. Tạo hình sản phẩm, khi click vào sản phẩm sẽ link đến trang sanpham.php?id=10 và hiển thị giá trị id này trên server(lấy thông tin GET)
// => Giống bài link trong login_form.php đã làm
