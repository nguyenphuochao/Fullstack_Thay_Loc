<?php
require "config.php";
require "connectDB.php";
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
// mã hóa password -> 61 kí tự
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$sql = "INSERT INTO user(name,mobile,email,password) VALUES ('$name','$mobile','$email','$password')";
if ($conn->query($sql)) {
    header("Location: login.html");
    exit;
}
echo "Error: $sql " . $conn->error;
