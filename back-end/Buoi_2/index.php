<?php
// cho cái array
$arr1 = [
    "toàn" => ["toán" => 9, "lý" => 10],
    "hảo" => ["toán=>5", "lý" => 1]
];
var_dump($arr1);
// Truy xuât phần tử mảng đa chiều
echo $arr1["toàn"]["toán"];
