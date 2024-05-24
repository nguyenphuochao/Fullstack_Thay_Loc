<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = "example_key";
$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFiY0BnbWFpbC5jb20ifQ.Kov91WXH8LQp07YNnxGAs5dZVXYDjwND25akWZG_yTQ";
try {
    $decoded = JWT::decode($token, new Key($key, 'HS256'));
    echo $decoded->email;
} catch (\Throwable $th) {
    echo 'You try hack';
}
