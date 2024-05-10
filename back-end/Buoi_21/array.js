// Hàm concat để nối 2 array lại với nhau
var array1 = [2, 5, 7];
var array2 = [6, 8, 10];
var array3 = array1.concat(array2);
// console.log(array3);

// Hàm join nối các phần tử lại vs nhau bằng kí tự nào đó hoặc khoảng trắng do mình quyết định
var array1 = ["xin", "chào", "hảo"];
var seperator = "-";
var array2 = array1.join(seperator);
//console.log(array2);

// Hàm push thêm 1 phần tử cuối array
var arr1 = ["hảo", "toàn"];
arr1.push("thảo");
// console.log(arr1);

// Hàm pop xóa phần tử trả về phần tử bị xóa 
var arr1 = ["hảo", "toàn", "mon"];
var arr2 = arr1.pop()
// console.log(arr2);
// console.log(arr1);

// Unshif giống push mà thêm 1 phần tử đầu array
var arr1 = ["toàn", "hảo", "mon"];
arr1.unshift("tùng");
// console.log(arr1);

// Hàm shift lấy 1 phần tử đầu array
var arr1 = ["toàn", "hảo", "mon"];
arr1.shift();
// console.log(arr1);

// Hàm splice thêm/xóa bất kì vị trí phần tử trong mảng(đa nhiệm thêm/xóa)
// Nó sẽ nhận 3 tham số:
//      + Vị trí bắt đầu lấy ra
//      + Số lượng phần tử
//      + Tham số array chứa phần tử cần thêm 
var arr1 = ["toàn", "hảo", "mon"];
var start = 0;
var length = 3;
var arr2 = arr1.splice(start, length, "đô");
// console.log(arr1);

// sort sắp xếp tăng dần chỉ áp dụng 1 chữ số theo alphabet
var arr1 = [2, 1, 6, 8];
arr1.sort();
// console.log(arr1);

// sort sắp xếp tăng dần theo các con số
var arr1 = [100, 60, 10, 50];
arr1.sort(function (a, b) {
    return a - b; // a - b tăng dần
});
// console.log(arr1);

// sắp xếp giảm dần của các con số và chuỗi
var arr1 = [1, 100, 10, 2.1, 2.9, "9", 101];
arr1.sort(function (a, b) {
    return Number(b) - Number(a)
});
console.log(arr1);

// Hàm reverse đảo ngược lại thứ tự
var arr1 = [1, 9, 3, 8];
arr1.reverse();
// console.log(arr1);

// Hàm includes tìm kiếm phẩn tử trong mảng
var arr1 = [1, 5, 3];
var rs = arr1.includes(1);
// console.log(rs);

// Hàm slice bỏ phần tử giữa start và end
var arr1 = [1, 5, 6, 19, 20];
var start = 1;
var end = 4; // bỏ end ra ko tính
var arr2 = arr1.slice(start, end);
// ko ảnh hưởng đến array thao tác
// console.log(arr1);

// Hàm indexOf() trả về index phần tử đầu tiên dc tìm thấy
// Không tìm thấy trả về -1
var arr1 = ["hảo", "toàn", "mon", "hảo"];
//console.log(arr1.indexOf("hảo")); // 0

// Hàm trả về lastIndexOf() trả về index phần tử cuối dc tìm thấy
var arr1 = ["hảo", "toàn", "mon", "hảo"];
// console.log(arr1.lastIndexOf("hảo")); // 3

// Hàm toString cũng như chuyển mảng về chuỗi có dấu phải các từ (giống join)
var arr1 = ["hảo", "hoàng", "đô", "mon"];
var arr2 = arr1.toString();
//console.log(arr2);

// Hàm forEach()
var arr1 = [1, 2, 3, 4, 5, 6];
arr1.forEach(callBackForeach, 2);
function callBackForeach(value, index, arr) {
    // console.log(index + ":" + (value + this));
}

// Hàm map để tạo arr mới từ arr cũ
var arr1 = [1, 2, 3, 4, 5, 6, 10];
var arr2 = arr1.map(callBackMap, 3);
function callBackMap(value, index, arr) {
    return value + this;
}
// console.log(arr2);

// Hàm filter() tạo 1 mảng mới từ các pt của mảng cũ dựa vào điều kiện
var arr1 = [1, 2, 3, 4, 5, 6, 7, 100];
var arr2 = arr1.filter(callBackFilter, 5);
function callBackFilter(value, index, arr) {
    return value >= this;
}
// console.log(arr2);

// Hàm reduce() trả về giá trị đơn
var arr1 = [1, 2, 3, 4, 5];
var init_sum = 0;
var arr2 = arr1.reduce(callBackReduce, init_sum);
function callBackReduce(sum, value, index, arr) {
    return sum + value;
}
// console.log(arr2);

// Hàm every trả về true nếu tất cả các pt thõa điều kiện
var arr1 = [2, 4, 6, 8, 10];
var arr2 = arr1.every(callBackEvery, 5);
function callBackEvery(value, index, arr) {
    return value >= this;
}
// console.log(arr2);

// Hàm some() trả về true nếu 1 cái true
var arr1 = [1, 2, 3, 4, 5];
var arr2 = arr1.some(callBackSome, 5);
function callBackSome(value, index, arr) {
    return value >= this;
}
// console.log(arr2);