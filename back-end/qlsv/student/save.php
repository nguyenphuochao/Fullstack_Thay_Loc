<?php
session_start();
require "../config.php"; // gắn cái kết nối ở đây
require "../connectDB.php";
$name = $_POST["name"];
$birthday = $_POST["birthday"];
$gender = $_POST["gender"];
$sql = "INSERT INTO student (name,birthday,gender) 
VALUES('$name','$birthday','$gender')";
if ($conn->query($sql) === TRUE) {
    $_SESSION["success"] = "Đã tạo sinh viên thành công"; // sử dụng session để thông báo thêm mới thành công
} else {
    $_SESSION["error"] = "Error " . $sql . "<br>" . $conn->error;
}

$conn->close();  // đóng kết nối mysql
header("location: list.php"); // quay về list
