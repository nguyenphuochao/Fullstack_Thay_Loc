$(document).ready(function () {
    $("button").click(function () {
        var num1 = $("#number1").val(); // val() lấy giá trị input
        var num2 = $("#number2").val();
        var kq = Number(num1) + Number(num2);
        // html() cập nhật vào html kq
        $("#rs").html(kq);
    })
});