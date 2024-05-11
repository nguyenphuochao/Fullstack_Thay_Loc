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

// code here
$sql = "INSERT INTO student (last_name,first_name,email)
VALUES ('aa','bb','aa@gmail.com')";
if ($conn->query($sql) === TRUE) { // query = thực thi
    // trả về id vừa thêm vào, chỉ cho auto increment
    $last_id = $conn->insert_id;
    echo "New record created sucessfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); // thực hiện đóng kết nối sau khi thực hiện CRUD