$(".delete").click(function (e) {  // sử dụng jquery thực hiện click xóa
	e.preventDefault(); // ngăn chặn sự kiện click đứng 1 chỗ
	var dataUrl = $(this).attr("data-url"); // lấy giá trị thuộc tính data-url
	$("#confirmModal a").attr("href", dataUrl); // cập nhật giá trị data-url vào confimModel thẻ <a>
	$("#confirmModal").modal("show"); // hiện popup ra
});