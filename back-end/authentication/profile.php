<?php
session_start();
// check tồn tại $_SESSION['email'] không có quay về login
if (empty($_SESSION["email"])) {
    // check $_COOKIE
    if (!empty($_COOKIE["email"])) {
        $_SESSION["email"] = $_COOKIE["email"];
    } else {
        header("Location: login.html");
        die;
    }
}
?>
Xin chào : <?= $_SESSION["email"] ?>
<p>
    <a href="logout.php">Logout</a>
</p>