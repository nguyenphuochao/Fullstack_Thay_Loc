<?php 
session_start();
// hủy tất cả các phần tử trong array $_SESSION
session_destroy();
header("Location: login.html");
?>