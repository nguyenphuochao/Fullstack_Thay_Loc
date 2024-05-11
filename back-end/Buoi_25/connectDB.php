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
echo "Kết nối thành công";
$conn->close(); // thực hiện đóng kết nối sau khi thực hiện CRUD
