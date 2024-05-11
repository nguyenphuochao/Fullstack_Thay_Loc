<?php
require "../config.php"; // gắn cái kết nối ở đây
require "../connectDB.php";
$name = $_POST["name"];
$birthday = $_POST["birthday"];
$gender = $_POST["gender"];
$sql = "INSERT INTO student (name,birthday,gender) 
 VALUES('$name','$birthday','$gender')";
if ($conn->query($sql) === TRUE) {
    header("location: list.php");
} else {
    echo "Error " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>