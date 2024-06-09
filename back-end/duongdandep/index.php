<?php
require 'vendor/autoload.php';

$router = new AltoRouter();

// map homepage
$router->map('GET', '/', function () {
    echo "Home page";
});

$router->map('GET', '/san-pham', function () {
    global $router;
    $url1 = $router->generate('product-detail', ['slugName' => 'iphone-12', 'id' => 1]);
    $url2 = $router->generate('product-detail', ['slugName' => 'iphone-13', 'id' => 2]);
    echo "<h1>" . 'Danh sách sản phẩm' . "<h1>";
    echo "<br>";
    echo "<a href = ' $url1 '>" . 'Sản phẩm 1' . "<a>";
    echo "<br>";
    echo "<a href = ' $url2 '>" . 'Sản phẩm 2' . "<a>";
});

// chi tiết sản phẩm
$router->map('GET', '/san-pham/[*:slugName]-[i:id]', function ($slugName, $id) {
    echo "Product Detail: $slugName - $id";
}, "product-detail");

// map user details page
$router->map('GET', '/user/[i:id]/', function ($id) {
    require __DIR__ . '/views/user-details.php';
});

// match current request url
$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

// hàm xử lý slugName
function slugify($str)
{
  	$str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}