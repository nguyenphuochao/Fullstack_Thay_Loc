<?php
$x = null;
echo !empty($x) ? $x : 100; // sử dụng toán tử 3 ngôi
echo "<br>";
echo $x ?? 100; // sử dụng toán tử thay thế dấu ?? 