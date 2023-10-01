// Lấy thẻ form bằng querySelector
var buttonForm = document.querySelector("form");

// Bắt sự kiện onsubmit
buttonForm.onsubmit = function () {
    // Xóa tất cả các lỗi
    var feedBackTags = document.querySelectorAll(".invalid-feedback");
    for (let index = 0; index < feedBackTags.length; index++) {
        feedBackTags[index].innerHTML = "";
    }

    // Lấy phần tử chỉ định html bằng thuộc tính attribute
    var fullnameTag = document.querySelector("[name=fullname]");
    // Lấy value của nó
    var fullname = fullnameTag.value;

    var phoneTag = document.querySelector("[name=phone]");
    var phone = phoneTag.value;

    var emailTag = document.querySelector("[name=email]");
    var email = emailTag.value;

    var phoneTag = document.querySelector("[name=phone]");
    var phone = phoneTag.value;

    var emailTag = document.querySelector("[name=email]");
    var email = emailTag.value;

    var passwordTag = document.querySelector("[name=password]");
    var password = passwordTag.value;

    var repasswordTag = document.querySelector("[name=repassword]");
    var repassword = repasswordTag.value;
    // Xử lí lỗi
    var errorFullNameTag = fullnameTag.parentElement.nextElementSibling;
    var errorPhoneTag = phoneTag.parentElement.nextElementSibling;
    var errorEmailTag = emailTag.parentElement.nextElementSibling;
    var errorPasswordTag = passwordTag.parentElement.nextElementSibling;
    var errorRepassTag = repasswordTag.parentElement.nextElementSibling;

    // Check đầu vào validate
    // Đặt cờ
    var isError = false; //không có lỗi,
    // Fullname trống
    if (fullname == "") {
        errorFullNameTag.innerHTML = "Vui lòng nhập fullname";
        isError = true; // có lỗi
    }
    if (fullname && fullname.length > 50) {
        errorFullNameTag.innerHTML = "Chiều dài tối đa ko quá 50 kí tự";
        return false;
    }
    // Check dữ liệu chứa kí tự
    var pattern = /^[a-zA￾ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i;
    if (fullname && fullname.length <= 50 && !pattern.test(fullname)) {
        errorFullNameTag.innerHTML = "Không nhập số và kí tự đặc biệt";
        return false;
    }
    // Phone trống
    if (phone == "") {
        errorPhoneTag.innerHTML = "Vui lòng nhập phone";
        isError = true;
    }
    // Check kí tự đầu vào phone
    var patternPhone = /^0([0-9]{9,9})$/;
    if (phone && !patternPhone.test(phone)) {
        errorPhoneTag.innerHTML = "Thỏa mãn mẫu bắt đầu là số 0, sau đó là 9 số";
        return false;
    }
    // Email trống
    if (email == "") {
        errorEmailTag.innerHTML = "Vui lòng nhập email";
        isError = true;
    }
    // Check kí tự đặc biệt email
    var patternEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email && !patternEmail.test(email)) {
        errorEmailTag.innerHTML = "Phải là dạng email";
        return false;
    }
    // Password trống
    if (password == "") {
        errorPasswordTag.innerHTML = "Phải nhập password";
        isError = true;
    }
    // Check kí tự đặc biệt password
    var patternPassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
    if (password && !patternPassword.test(password)) {
        errorPasswordTag.innerHTML = "Phải thỏa mãn mẫu đã học bao gồm số, ký tự, đặc biệt, chữ hoa, chữ thường";
        return false;
    }
    // Repassword trống
    if (repassword == "") {
        errorRepassTag.innerHTML = "Phải nhập repassword";
        isError = true;
    }
    // Check phải khớp password ở trên
    if (repassword != password) {
        errorRepassTag.innerHTML = "Phải nhập repassword khớp với password";
        return false;
    }
    // Recaptcha
    // Biến grecaptcha có sẳn trong script của nó
    if (grecaptcha.getResponse() == "") {
        document.querySelector(".error-recaptcha").innerHTML = "Vui lòng chọn tôi ko phải là robot";
        isError = true;
    }
    if (isError) {
        return false; // ko cho submit vì có lỗi
    }
    return true; // submit lên server
}