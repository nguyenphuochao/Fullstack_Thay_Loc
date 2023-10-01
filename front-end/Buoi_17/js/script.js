// Khai báo hàm tính tổng
function tong(a, b) {
    var c = a + b;
    return c; // trả về kết quả c và kết thúc hàm
}
// Gọi hàm call function

// Gọi ở chỗ thứ 1
var x = 10;
var y = 10;
console.log(tong(x, y));

// Gọi ở chỗ thứ 2
var m = 11;
var n = 11;
console.log(tong(m, n));

// Viết hàm tính tổng array
function tongArray(arr) {
    var s = 0;
    for (var i = 0; i <= arr.length - 1; i++) {
        s += arr[i];
    }
    return s;
}

// use 1
arr1 = [3, 5, 1];
console.log(tongArray(arr1)); //9

// use 2
arr2 = [2, 4, 7, 5];
console.log(tongArray(arr2)); //18

// Nâng cao sum đặt ngoài
function tongArray(arr) {
    // var sum = 0 bên trong sẽ nhìn thấy biến bên ngoài nếu ta không khai báo
    // bên trong
    for (var i = 0; i <= arr.length - 1; i++) {
        s += arr[i];
    }
    return s;
}
var s = 0; // bên trong sẽ nhìn thấy biến bên ngoài
// use 1
arr1 = [3, 5, 1];
console.log(tongArray(arr1)); //9
// use 2
arr2 = [2, 4, 7, 5];
console.log(tongArray(arr2)); //18