<?php
session_start();
require "../config.php"; // gắn cái kết nối ở đây
require "../connectDB.php";
$name = $_POST["name"];
$number_of_credit = $_POST["number_of_credit"];
$sql = "INSERT INTO subject (name,number_of_credit) 
VALUES('$name',$number_of_credit)";
if ($conn->query($sql) === TRUE) {
    $_SESSION["success"] = "Đã tạo môn học thành công"; // sử dụng session để thông báo thêm mới thành công
} else {
    $_SESSION["error"] = "Error " . $sql . "<br>" . $conn->error;
}

$conn->close();  // đóng kết nối mysql
header("location: list.php"); // quay về list
