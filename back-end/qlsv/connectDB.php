<?php
// create connection
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME); // khởi tạo đối tượng kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại:" . $conn->connect_error); // kết nối thất bại dừng hẳn chương trình luôn
}
mysqli_set_charset($conn, "utf8");
