<?php 
// implode
$a0 = ["Nguyen", "Van", "A"];
$str = implode(" ", $a0);
echo $str;
echo "<br>";
// explode
$a1 = "Nguyễn Văn Nam";
$a2 = explode(" ", $a1);//delimiter
var_dump($a2);

// strlen
$a3 = "Nguyen Van Nam";
$a4 = strlen($a3);
echo $a4;
echo "<br>";

// str_word_count
$a5 = "Nguyen Van Nam";
$a6 = str_word_count($a5);
echo $a6;
echo "<br>";

// str_replace
$a7 = "Nguyen Van Nam";
$a8 = str_replace("Nam", "Nu", $a7);
echo $a8;
echo "<br>";

// substr
$a9 = "Nguyen Van Nam";
$a10 = substr($a9, 7, 3);
echo $a10;
echo "<br>";

// strstr
$a11 = "Nguyen Van Nam";
$a12 = strstr($a11, "Van");
echo $a12;
echo "<br>";

// strpos - string position
$a13 = "Nguyen Van Nam";
$a14 = strpos($a13, "Van");
echo $a14;
echo "<br>";

// strtolower
$a15 = "Nguyen Van Nam";
$a16 = strtolower($a15);
echo $a16;
echo "<br>";

// strtoupper
$a17 = "Nguyen Van Nam";
$a18 = strtoupper($a17);
echo $a18;
echo "<br>";

// ucfirst - upper character first
$a19 = "nguyen van nam";
$a20 = ucfirst($a19);
echo $a20;
echo "<br>";

// lcfirst - lower character first
$a21 = "Nguyen Van Nam";
$a22 = lcfirst($a21);
echo $a22;
echo "<br>";

// ucwords - upper character words
$a23 = "nguyen van nam";
$a24 = ucwords($a23);
echo $a24;
echo "<br>";

// trim
$a25 = " Nguyen Van Nam      ";
$a26 = trim($a25);
echo $a26 . " : ". strlen($a25) . ":".strlen($a26);
echo "<br>";

// ltrim
$a27 = " Nguyen Van Nam      ";
$a28 = ltrim($a27);
echo $a28 . " : ". strlen($a28);
echo "<br>";

// rtrim
$a29 = " Nguyen Van Nam      ";
$a30 = rtrim($a29);
echo $a30 . " : ". strlen($a30);
echo "<br>";



// isset
// $a31 = "sfjsfj";
if (isset($a31)) {
	echo "Biến a31 tồn tại";
}
else {
	echo "Biến a31 không tồn tại";
}
echo "<br>";

$a32 = array(2, 4);//0 1
if (isset($a32[2])) {
	echo "Biến a32[2] tồn tại";
}
else {
	echo "Biến a32[2] không tồn tại";
}
echo "<br>";
// empty
//0, "", null, $a32[2], $a32, false => empty
$a32 = array(2, 4);//0 1
if (empty($a32[2])) {
	echo "Biến a32[2] empty";
}
else {
	echo "Biến a32[2] không empty";
}
echo "<br>";

$a33 = 0;
if (empty($a33)) {
	echo "Biến a33 empty";
}
else {
	echo "Biến a33 không empty";
}
echo "<br>";
// is_array
$a34 = array();

if (is_array($a34)) {
	echo "Biến a34 là array";
}
else {
	echo "Biến a34 không là array";
}
echo "<br>";

//Những hàm check kiểu dữ liệu
// is_numeric()
if (is_numeric(5)) {
	echo "<br>Số<br>";
}
else {
	echo "<br>Không phải số<br>";
}
// is_string()
// is_array()
// is_object()
// is_null()
// is_bool()
// is_resource()
// is_null
$a35 = null;
if (is_null($a35)) {
	echo "Biến a35 là null";
}
else {
	echo "Biến a35 không là null";
}
echo "<br>";


$b = 1;
if ($b == 0) {
	$c = 1;
}
else {
	$c =2;
}
echo $c;

echo "<br>";
$c = $b == 0 ? 1 : 2;
echo $c;

echo "<br>";
echo $a = 5;

$a1 = $a2 = $a3 =100;
echo "<br>";
echo $a1;

$a4 = 6;
$a5 = 7;
echo "<br>";
if ($a4 = $a5) {
	echo "bằng nhau";
}
else {
	echo "không bằng nhau";
}

// 0 => false, "" => false, null => false
// echo "<br>";
if (7) {
	echo "haha";
}

// biến chưa khai báo, khi chạy sẽ được xem là false và báo lỗi
if ($a1000) {
	echo "hoho";
}
