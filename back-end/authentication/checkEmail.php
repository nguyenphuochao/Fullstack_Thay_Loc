<?php
// "true" email ko tồn tại, "false" email tồn tại
require "config.php";
require "connectDB.php";
$email = $_GET["email"];
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "false";
} else {
    echo "true";
}
