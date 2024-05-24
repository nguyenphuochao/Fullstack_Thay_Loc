<?php
session_start();
// hủy tất cả các phần tử trong array $_SESSION
session_destroy();
// xóa lun cookie
setcookie("token", null, time() - 3600);
header("Location: login.html");
