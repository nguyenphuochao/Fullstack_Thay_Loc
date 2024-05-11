<?php
// create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "backend_study";
$conn = new mysqli($servername, $username, $password, $dbname); // khởi tạo đối tượng kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại:" . $conn->connect_error); // kết nối thất bại dừng hẳn chương trình luôn
}
mysqli_set_charset($conn, "utf8");

// mysql sẽ thực thi câu lệnh này
// $sql = "SELECT * FROM student"; // lấy tất cả các cột trong table student, mặc định ko có điều kiện lấy hết các dòng
// $sql = "SELECT first_name FROM student"; // lấy tên cột cần truy vấn
// $sql = "SELECT * FROM student WHERE id IN (1,2,3)"; // giống or, dữ liệu id nằm trong 1,2,3 (id = 1 OR id = 2 OR id = 3)
// $sql = "SELECT * FROM student WHERE id BETWEEN 1 AND 3"; // dữ liệu id nằm trong khoảng từ 1 đến 3 (giống vs id >= 1 AND id <= 3)
// $sql = "SELECT * FROM student ORDER BY id ASC"; // sắp xếp tăng dần, (giảm dần DESC)
// $sql = "SELECT * FROM student LIMIT 0, 3"; // index, number
// Công thức phân trang
// $itemPerPage = 3; // số lượng trên 1 trang
// $page = 1; // trang thứ mấy?
// $index = ($page - 1) * $itemPerPage; // vị trí
// $sql = "SELECT * FROM student LIMIT $index, $itemPerPage"; // index, number
// $search = "Hảo";
// $sql = "SELECT * FROM student WHERE first_name LIKE '%$search%'"; // search tương đối, tìm kiếm kí tự chứa nó
// $sql = "SELECT * FROM employees JOIN departments ON employees.dept_id = departments.dept_id "; // lệnh JOIN lấy dữ liệu 2 table
$sql = "SELECT employees.*,departments.name AS dept_name  FROM employees JOIN departments ON employees.dept_id = departments.dept_id"; // dùng ALIAS đổi tên column


$result = $conn->query($sql); // query = thực thi
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { // lặp từng record và lấy dữ liệu từng record
        var_dump($row);
    }
} else {
    echo "0 result";
}

$conn->close(); // thực hiện đóng kết nối sau khi thực hiện CRUD

/* Cách lấy dữ liệu bằng CMD(Comman Line)
C:\xampp\mysql\bin
mysql.exe -uroot -p
use db_name;
SELECT * FROM  table_name;
*/
