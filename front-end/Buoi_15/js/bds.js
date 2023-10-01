// Lấy tất cả danh sách các nút button bằng querySelectorAll
// Khi lấy ra sẽ là danh sách array
var buttonTag = document.querySelectorAll("button");
// Duyệt mảng để lấy từng button
for (let i = 0; i < buttonTag.length; i++) {
    // sự kiện click từng button
    buttonTag[i].onclick = function () {
        // code here

        // Remove active button
        document.querySelector("button.active").classList.remove("active");
        // Active button
        this.classList.add("active");

        // Lấy giá trị data của button
        var dataValue = this.getAttribute("data");
        // Lấy đường dẫn
        var pathImg = "img/" + dataValue + ".png";
        // Cập nhật ảnh vào img giao diện
        document.querySelector("img").src = pathImg;

    }

}