<?php
// Bài 1. Tính tổng từ 3 đến 15
$s = 0;
for ($i = 3; $i <= 15; $i++) {
    $s += $i;
}
echo $s;
echo "<br>";
// Bài 2. Tính tổng mảng
$arr1 = [3, 5, 4, 9, 17, 20];
$s1 = 0;
for ($i = 0; $i < count($arr1); $i++) {
    $s1 += $arr1[$i];
}
echo $s1;
echo "<br>";
// Bài 3. Tính tổng các phần tử chẵn
$arr2 = [3, 5, 4, 9, 17, 20];
$s2 = 0;
for ($i = 0; $i < count($arr2); $i++) {
    if ($arr2[$i] % 2 == 0) {
        $s2 += $arr2[$i];
    }
}
echo $s2;
echo "<br>";
// Bài 4. Tổng a + b là chẳn thì trả về true
function isTongChan($a, $b)
{
    // cách 1
    if (($a + $b) % 2 == 0) {
        return true;
    }
    return false;
    // cách 2
    return ($a + $b) % 2 == 0;
}
// Gọi hàm isTongChan
echo isTongChan(2, 4);
echo "<br>";
// Bài 5. Tính tổng 3 môn theo công thức trên 24 thì true, ngược lại false
$arr3 = ["toan" => 7, "ly" => 4, "hoa" => 8.5];
function isPassed($arr3)
{
    if (($arr3["toan"] + $arr3["ly"]) * 2 + $arr3["hoa"] > 24)
        return true;
    return false;
}
// gọi hàm isPassed
echo isPassed($arr3); // trong php echo true ra 1, echo false ko ra gì
echo "<br>";
// Bài 6. Viết hàm trả về danh sách sinh viên đậu > 24 điểm
$arr4 = array(
    "nga" => array("toan" => 7, "ly" => 4, "hoa" => 8.5),
    "nam" => array("toan" => 4, "ly" => 9, "hoa" => 3.5),
    "nhan" => array("toan" => 7, "ly" => 5, "hoa" => 9.5)
);
function passedList($danh_sach_diem_sv)
{
    // cách 1
    // $ds = [];
    // foreach ($danh_sach_diem_sv as $ten => $diem) {
    //     if (($diem["toan"] + $diem["ly"]) * 2 + $diem["hoa"] > 24) {
    //         $ds[] = $ten;
    //         // dùng array_push($ds, $ten);
    //     }
    // }
    // return $ds;
    // cách 2: dùng lại hàm isPassed()
    $ds = [];
    foreach ($danh_sach_diem_sv as $ten => $diem) {
        if (isPassed($diem)) {
            $ds[] = $ten;
        }
    }
    return $ds;
}
// Gọi hàm
var_dump(passedList($arr4)); // gọi hàm hiển thị danh sách, dùng var_dump nha