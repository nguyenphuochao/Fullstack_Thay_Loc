<?php
// Trong js thì var a = 1;
$a = 1;
echo $a;
echo "<br>";
// Cập nhật giá trị a = 2;
$a = 2;
echo $a;
echo "<br>";
// Khai báo hằng trong js thì const PI=3.14
define("PI", 3.14);
echo PI;
echo "<br>";
// Phân biệt nháy đơn và nháy đôi
$time = "6:30pm";
$tr1 = "Hôm nay tôi đi học $time";
echo $tr1;
echo "<br>";
$tr2 = 'Hôm nay tôi đi học $time';
echo $tr2;
echo "<br>";
$arr = [1, 2, 8, 5];
var_dump($arr);
echo "<br>";
// Tính tổng các PT trong mảng
$sum = 0;
for ($i = 0; $i <= count($arr) - 1; $i++) {
    $sum += $arr[$i];
}
echo $sum;
echo "<br>";
// Tính tổng các PT lẻ trong mảng viết cách 1
$sum = 0;
for ($i = 0; $i <= count($arr) - 1; $i++) {
    if ($arr[$i] % 2 != 0)
        $sum += $arr[$i];
}
echo $sum;
echo "<br>";
// Tính tổng các phần tử lẻ viết cách 2
$arr = [1, 2, 3, 4, 5];
$sum = 0;
for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] % 2 != 0) {
        $sum += $arr[$i];
    }
}
echo $sum;
