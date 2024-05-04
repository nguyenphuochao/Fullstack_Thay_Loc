<?php
// Lambda function còn dc gọi là closure hay anonymus function
$f1 = function ($a, $b) {
    $c = $a + $b;
    return $c;
};
echo $f1(1, 2);
echo "<br>";
// còn đây là cách truyền thống
function tong($a, $b)
{
    $c = $a + $b;
    return $c;
}
echo tong(1, 2);
echo "<br>";
// Dùng biến bên ngoài hàm thì sài use
$delta = 100;
$f2 = function ($a, $b) use ($delta) {
    $c = $a + $b + $delta;
    return $c;
};
echo $f2(1, 1);
echo "<br>";
// Dùng global để bên trong dc phép truy cập biến bên ngoài
$d = 100;
function f3($a, $b)
{
    global $d;
    return $a + $b + $d;
}
echo f3(1, 1);
// map, filter, reduce của php giống js tham khảo w3school
