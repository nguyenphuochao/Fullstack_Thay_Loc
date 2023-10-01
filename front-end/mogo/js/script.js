$(document).ready(function () {
    // Data number
    var soHienTai = 0;
    var soMuonDen = $(".data-number .number").text();
    console.log(soMuonDen);
    function nhaySo() {
        if (soHienTai < soMuonDen) {
            soHienTai++;
            $(".data-number .number").text(soHienTai);
            setTimeout(nhaySo, 10);
        }
    }
    nhaySo();
    // what we do
    $(".what-we-do .fa-solid").click(function () {
        // Ẩn tất cả các content khác
        $(".what-we-do .content").slideUp();
        // Hiển thị mũi tên lên/xuống
        if ($(this).hasClass("fa-chevron-up")) {
            $(this).removeClass("fa-chevron-up");
            $(this).addClass("fa-chevron-down");
        } else {
            $(this).removeClass("fa-chevron-down");
            $(this).addClass("fa-chevron-up");
        }
        // Hiện cái content hiện tại được click
        $(this).parent().next().slideToggle();
    });
});