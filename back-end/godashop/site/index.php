<?php
session_start();
require "../config.php";
require "../connectDB.php";
require "../bootstrap.php"; // giống như auto load các model
// Router
$c = $_GET['c'] ?? 'home';
$a = $_GET['a'] ?? 'index';
$controllerName = ucfirst($c) . 'Controller';
require_once 'controller/' . $controllerName . '.php';
$controller = new $controllerName();
$controller->$a();
