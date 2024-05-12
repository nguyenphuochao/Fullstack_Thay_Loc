<?php
session_start();
require "../config.php"; // gắn cái kết nối ở đây
require "../connectDB.php";
$id = $_POST["id"];
$name = $_POST["name"];
$number_of_credit = $_POST["number_of_credit"];

$sql = "UPDATE subject SET name = '$name', number_of_credit = $number_of_credit WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    $_SESSION["success"] = "Đã cập nhật môn học thành công"; // sử dụng session để thông báo thêm mới thành công
} else {
    $_SESSION["error"] = "Error " . $sql . "<br>" . $conn->error;
}

$conn->close();  // đóng kết nối mysql
header("location: list.php"); // quay về list 
