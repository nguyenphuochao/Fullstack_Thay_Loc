<?php
var_dump($_POST);
var_dump($_FILES);
$filename = $_FILES["avatar"]["name"]; // NguyenPhuocHao.jpg
$destination = "images/" . $filename; // images/NguyenPhuocHao.jpg
move_uploaded_file($_FILES["avatar"]["tmp_name"], $destination); // from -> to
// move_uploaded_file("C:\xampp\tmp\php91B9.tmp","images/NguyenPhuocHao.jpg");