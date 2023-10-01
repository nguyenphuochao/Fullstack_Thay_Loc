$(document).ready(function () {
    // PORTFOLIO
    $("#portfolio button").click(function () {
        // Nếu click vào active thì ko làm gì cả
        if ($(this).hasClass("active")) {
            return;
        }
        // Remove tất cả active
        $(this).siblings("button.active").removeClass("active");
        // Lấy giá trị data được click
        var data = $(this).attr("data");
        // Add class active
        $(this).addClass("active");
        //Hiện tất cả các item
        var allDiv = $(`#portfolio .row > div`); // var allDiv=$(this).nextAll(".row").children();
        if (data == 'all') {
            allDiv.show();
        } else {
            // Hiện item nếu data item = data truyền vào
            var showDiv = $(`#portfolio .row > div[data=${data}]`); // var showDiv=$(this).nextAll('.row').chilren(`[data=${data}]`);
            showDiv.show();
            // Ẩn item nếu data item != data truyền vào
            allDiv.not(showDiv).hide();
        }
    });
    // CONTACT FORM
    $("form").submit(function () {
        var error = false;
        var name = $("[name=name]").val();
        var nameError = $("[name=name]").next();
        if (!name) {
            nameError.html("Vui lòng nhập họ tên");
            error = true;
        }
        var email = $("[name=email]").val();
        var emailError = $("[name=email]").next();
        if (!email) {
            emailError.html("Vui lòng nhập email");
            error = true;
        }
        var message = $("[name=message]").val();
        var messageError = $("[name=message]").next();
        if (!message) {
            messageError.html("Vui lòng nhập tin nhắn");
            error = true;
        }
        if (error) {
            return false;
        }
        return true;
    });
    // Sự kiện scroll window
    $(window).scroll(function () {
        // this là window
        // top của window so với top của document
        // console.log($(this).scrollTop());

        // Khoảng cách của top portfolio vs top document
        // $("#portfolio").offset().top();
        if ($(this).scrollTop() >= $("#portfolio").offset().top) {
            $(".navbar").addClass("fixed-top");
            $("header").addClass("dummy-padding");
        } else {
            $(".navbar").removeClass("fixed-top");
            $("header").removeClass("dummy-padding");
        }
        backToTop();
    });
    backToTop();

});
// Hàm Ẩn hiện nút back to top
function backToTop() {
    if ($(window).scrollTop() == 0) {
        $(".btn-up").fadeOut(); //ẩn
    } else {
        $(".btn-up").fadeIn(); //hiện
    }
}