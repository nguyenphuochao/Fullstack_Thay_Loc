<?php
// Bài 1. Tính tổng từ 1 -> 9
$s = 0;
for ($i = 1; $i <= 9; $i++) {
    $s += $i;
}
echo $s;
echo "<br>";
// bài 2. Nối Họ, tên lót, tên
$ho = "Nguyễn";
$chuDem = "Văn";
$ten = "Nam";
echo "$ho $chuDem $ten";
echo "<br>";
// bài 3. Đổi tên trong mảng
$arr = ["Tivi", "Tủ lạnh", "Điện thoại", "Máy giặt", "Bàn ủi"];
var_dump($arr);
$arr[2] = "Ipad";
$arr[3] = "Máy rửa chén";
var_dump($arr);
echo "<br>";
// Bài 4. Phép chia lấy dư
echo 7 % 3;
echo "<br>";
// Bài 5. Tính tổng các phẩn tử mảng
$arrayAll = array(3, 5, 10, 2, 7, 9, 3);
$tongMang = 0;
for ($i = 0; $i < count($arrayAll); $i++) {
    $tongMang += $arrayAll[$i];
}
echo $tongMang;
