<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>
    <link rel="stylesheet" href="../public/vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/vendor/fontawesome-free-5.15.1-web/css/all.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <div class="container" style="margin-top:20px;">
        <a href="../student/list.php" class="active btn btn-info">Students</a>
        <a href="../subject/list.php" class=" btn btn-info">Subject</a>
        <a href="../register/list.php" class=" btn btn-info">Register</a>
        <?php
        session_start();
        $message = ""; // tạo biến $message để check
        if (!empty($_SESSION["success"])) {
            $message = $_SESSION["success"];
            $messageClass = "alert-success";
            // Xóa phần tử dựa vào key
            unset($_SESSION["success"]); // sài xong xóa lun session
        } else if (!empty($_SESSION["error"])) {
            $message = $_SESSION["error"];
            $messageClass = "alert-danger";
            // Xóa phần tử dựa vào key
            unset($_SESSION["error"]); // sài xong xóa lun session
        }
        ?>
        <?php if ($message) { ?>
            <div class="alert <?= $messageClass ?> mt-4">
                <?= $message ?>
            </div>
        <?php } ?>