<?php
session_start();
require "config.php";
require "connectDB.php";
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row) {
    $endcodePassword = $row["password"];
    if (password_verify($password, $endcodePassword)) {
        // login thành công
        $_SESSION["email"] = $email;
        if (!empty($_POST["remember_me"])) { // lưu đăng nhập remember_me
            // store email in cookie
            // tham số thứ 1 là tên cookie
            // tham số thứ 2 là giá trị cookie
            // tham số thứ 3 là đơn vị giây
            setcookie("email", $email, time() + 3600);
        }
        header("Location: profile.php");
        exit;
    }
}
// login thất bại
header("Location: login.html");
