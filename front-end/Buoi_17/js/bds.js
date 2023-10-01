
// 5 button sẽ được lấy ra và gán sự kiện click cho từng button
$("button").click(function () {
    // Kiểm tra click rồi thì ko click dc nữa
    if ($(this).hasClass("active")) {
        return;
    }
    // Remove class active
    $("button.active").removeClass("active")

    // Add class active
    $(this).addClass("active");

    // lấy data tronng button
    // this là đói tượng dược click vào
    // attr() là hàm của jquery,dùng để lấy giá trị hoặc cập nhật giá trị cho thuộc tính
    var data = $(this).attr("data");
    // template literal: ` ` và ${}
    // ${} là của js thuần
    var imgPath = `img/${data}.png`;

    // Cập nhật vào hình trên html bằng src
    $("img").attr("src", imgPath);
});