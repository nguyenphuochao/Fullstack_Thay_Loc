<?php
session_start();
// hủy tất cả các phần tử trong array $_SESSION
session_destroy();
// xóa lun cookie
setcookie("email", null, time() - 3600);
header("Location: login.html");
