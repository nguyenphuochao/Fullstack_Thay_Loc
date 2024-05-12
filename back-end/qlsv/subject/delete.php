<?php
session_start();
require "../config.php"; // gắn cái kết nối ở đây
require "../connectDB.php";
$id = $_GET["id"];
$sql = "DELETE FROM subject WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    $_SESSION["success"] = "Đã xóa môn học thành công"; // sử dụng session để thông báo thêm mới thành công
} else {
    $_SESSION["error"] = "Error " . $sql . "<br>" . $conn->error;
}

$conn->close();  // đóng kết nối mysql
header("location: list.php"); // quay về list