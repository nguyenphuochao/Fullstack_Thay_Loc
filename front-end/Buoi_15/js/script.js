// Dùng queryselector để lấy phần tử button
var buttonTinhTong = document.querySelector("#tinhTong");
// Bắt sự kiện click cho nút button
buttonTinhTong.onclick = function () {
    var number1 = document.getElementById("number1").value;
    var number2 = document.getElementById("number2").value;
    // Thực hiện phép cộng
    var tong = Number(number1) + Number(number2);
    // Cập nhật kết quả vào Kết quả: => hiển thị giao diện
    document.getElementById("kq").innerHTML = tong;
}