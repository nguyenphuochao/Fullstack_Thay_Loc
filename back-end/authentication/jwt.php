<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;

$key = "example_key";
$payload = array(
    "email" => "abc@gmail.com"
);
$token = JWT::encode($payload, $key, 'HS256');
echo $token;
// eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFiY0BnbWFpbC5jb20ifQ.Kov91WXH8LQp07YNnxGAs5dZVXYDjwND25akWZG_yTQ