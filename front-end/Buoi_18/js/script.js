$("form").submit(function () {
    // Remove tất cả các lỗi
    $(".invalid-feedback").empty();
    // Đặt cờ lỗi là false
    var isError = false;
    // Họ tên
    var fullname = $("[name=fullname]").val();
    var fullnameError = $("[name=fullname]").parent().next();
    if (!fullname) {
        fullnameError.html("Vui lòng nhập họ tên");
        isError = true;
    }
    if (fullname && fullname.length > 50) {
        fullnameError.html("Vui lòng nhập họ tên dưới 50 kí tự");
        isError = true;
    }
    var pattern = /^[a-zA￾ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i;
    if (fullname && fullname.length <= 50 && !pattern.test(fullname)) {
        fullnameError.html("Phải thỏa mãn mẫu ký tự thông thường, không có số, ký tự đặc biệt");
        isError = true;
    }
    // Phone
    var phone = $("[name=phone]").val();
    var phoneError = $("[name=phone]").parent().next();
    if (!phone) {
        phoneError.html("Vui lòng nhập phone");
        isError = true;
    }
    var pattern = /^0([0-9]{9,9})$/;
    if (phone && !pattern.test(phone)) {
        phoneError.html("Thỏa mãn mẫu bắt đầu là số 0, sau đó là 9 số ");
        isError = true;
    }
    // Email
    var email = $("[name=email]").val();
    var emailError = $("[name=email]").parent().next();
    if (!email) {
        emailError.html("Vui lòng nhập email");
        isError = true;
    }
    var pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email && !pattern.test(email)) {
        emailError.html("Phải là dạng email");
        isError = true;
    }
    // Password
    var password = $("[name=password]").val();
    var passwordError = $("[name=password]").parent().next();
    if (!password) {
        passwordError.html("Vui lòng nhập password");
        isError = true;
    }
    var pattern = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
    if (password && !pattern.test(password)) {
        passwordError.html("Phải thỏa mãn mẫu đã học bao gồm số, ký tự, đặc biệt, chữ hoa, chữ thường");
        isError = true;
    }
    // // Repassword
    var repassword = $("[name=repassword]").val();
    var repasswordError = $("[name=repassword]").parent().next();
    if (!repassword) {
        repasswordError.html("Vui lòng nhập repassword");
        isError = true;
    }
    if (repassword != password) {
        repasswordError.html("Repassm chưa khớp");
        isError = true;
    }
    // Recaptcha
    if (!grecaptcha.getResponse()) {
        $(".error-recaptcha").html("Vui lòng xác nhận không phải robot");
        isError = true;
    }
    if (isError) {
        return false;
    }
    return true;
});