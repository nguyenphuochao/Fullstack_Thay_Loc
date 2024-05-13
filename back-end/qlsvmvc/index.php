<?php
// Router
$c = $_GET['c'] ?? 'student';
$a = $_GET['a'] ?? 'list';
$controllerName = ucfirst($c) . 'Controller'; // StudentController
require_once 'controller/' . $controllerName . '.php'; // import file StudentController.php
$controller = new $controllerName(); // new StudentController();
$controller->$a(); // $controller->list();
