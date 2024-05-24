<?php
session_start();
require 'config.php';
require 'connectDB.php';
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
// check tồn tại $_SESSION['email'] không có quay về login
if (empty($_SESSION["email"])) {
    // check $_COOKIE
    if (!empty($_COOKIE["token"])) {
        // decode token by JWT
        $key =  JWT_KEY;
        $token = $_COOKIE["token"];
        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $_SESSION["email"] =  $decoded->email;
        } catch (\Throwable $th) {
            echo 'You try hack';
            exit;
        }
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