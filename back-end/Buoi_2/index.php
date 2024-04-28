<?php
// Mảng 1 chiều
$arr1 = [1, 2, 3, 4, 5];
// Mảng đa chiều
$arr1 = [
    "toàn" => ["toán" => 9, "lý" => 10],
    "hảo" => ["toán" => 5, "lý" => 1]
];
var_dump($arr1);
// Truy xuât phần tử mảng đa chiều
echo $arr1["toàn"]["toán"];
echo "<br>";

// Tính tổng các phần tử trong mảng, gặp số 2 thì dừng
$sum = 0;
$arr2 = [1, 3, 4, 5, 2, 6];
for ($i = 0; $i < count($arr2); $i++) {
    if ($arr2[$i] == 2) {
        break; // thoát khỏi vòng lặp
    }
    $sum += $arr2[$i];
}
echo $sum;
echo "<br>";

// Tính tổng giá trị của các phần tử từ trái qua phải
// Gặp số lẻ thì không cộng
$arr3 = [1, 2, 3, 4];
$sum = 0;
for ($i = 0; $i < count($arr3); $i++) {
    if ($arr3[$i] % 2 == 1) {
        continue; // tiếp tục chạy vòng lặp không chạy code ở dưới
    }
    $sum += $arr3[$i];
}
echo $sum;
echo "<br>";
// Cách viết và sử dụng hàm function
function tinhTong($a, $b)
{
    return $a + $b;
}
echo tinhTong(1, 2);
echo "<br>";
echo tinhTong(2, 2);
