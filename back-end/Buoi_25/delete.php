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
// sql thực thi xóa 1 dòng với where
$sql = "DELETE FROM student WHERE id = 1";
if ($conn->query($sql) === TRUE) { // query
    echo "Delete success";
} else {
    echo "Error: " . $conn->error;
}

$conn->close(); // thực hiện đóng kết nối sau khi thực hiện CRUD

// lưu ý ko dc cập nhật lại cái ID giống với của dữ liệu trước đã xóa, vì ID là duy nhất rồi