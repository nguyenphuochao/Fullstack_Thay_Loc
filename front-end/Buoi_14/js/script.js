// Tính tổng từ 1 đến 5
var sum = 0;
for (var i = 1; i <= 5; i++) {
    sum += i;
}
console.log(sum);
// Tính tổng các phần tử trong array
var sum_arr = 0;
var arr = [1, 2, 3, 4, 1];
for (var i = 0; i < arr.length; i++) {
    sum_arr += arr[i];
}
console.log(sum_arr);