$("form").validate({
    // Validate đầu vào
    rules: {
        fullname: {
            required: true,
            maxlength: 50,
            regex: /^[a-zA￾ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i
        },
        phone: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        password: {
            required: true
        },
        repassword: {
            required: true,
            equalTo: "[name=password]"
        },
        // Recaptcha
        hiddenRecaptcha: {
            required: function () {
                if (grecaptcha.getResponse()) {
                    return false;
                }
                return true;
            }
        }

    },
    // Thông báo lỗi chi tiết ở đây
    messages: {
        fullname: {
            required: "Vui lòng nhập fullname",
            maxlength: "Vui lòng nhập dưới 50 kí tự",
            regex: "Phải thỏa mãn mẫu ký tự thông thường, không có số, ký tự đặc biệt"
        },
        // Tương tự các trường khác...
        repassword: {
            required: "Vui lòng nhập repassword",
            equalTo: "Mật khẩu nhập lại chưa khớp"
        },
        // Recaptcha
        hiddenRecaptcha: {
            required: "Vui lòng chọn tôi không phải là robot"
        }

    },
    // Đổi tên class mặc định
    errorClass: "invalid-feedback d-block"
});

// Validator regex phải có
$.validator.addMethod(
    "regex",
    function (value, element, regexp) {
        if (regexp.constructor != RegExp)
            regexp = new RegExp(regexp);
        else if (regexp.global)
            regexp.lastIndex = 0;
        return this.optional(element) || regexp.test(value);
    },
    "Please check your input. It is not matched regex"
);