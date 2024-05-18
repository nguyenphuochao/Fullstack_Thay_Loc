// Form register
$(".form-register").validate({ // gọi form validate
    // các qui tắc validate
    rules: {
        // simple rule, converted to {required:true}
        name: {
            required: true,
            maxlength: 50,
            regex: /^[a-zA￾ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i,
        },
        mobile: {
            required: true,
            regex: /^0([0-9]{9,9})$/,
        },
        email: {
            required: true,
            email: true,
            maxlength: 50,
            remote: "checkEmail.php"
        },
        password: {
            required: true,
            regex: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/
        },
        password_confirmation: {
            required: true,
            equalTo: "[name=password]"
        },
        hiddenRecaptcha: {
            //true: lỗi
            //false: passed
            required: function () {
                if (grecaptcha.getResponse() == '') {
                    return true;
                } else {
                    return false;
                }
            }
        }

    },
    // custom message
    messages: {
        name: {
            required: "Vui lòng nhập họ tên",
            maxlength: "Vui lòng nhập không quá 50 kí tự",
            regex: "Vui lòng nhập đúng định dạng họ và tên tiếng việt"
        },
        mobile: {
            required: "Vui lòng nhập số điện thoại",
            regex: "Vui lòng nhập 10 con số bắt đầu từ 0"
        },
        email: {
            required: "Vui lòng nhập email",
            maxlength: "Vui lòng nhập không quá 5 kí tự",
            email: "Vui lòng nhập đúng định dạng email. vd:a@gmail.com",
            remote: "Email đã tồn tại"
        },
        password: {
            required: "Vui lòng nhập mật khẩu",
            regex: "Mật khẩu ít nhất 8 kí tự, bao gồm số, ký tự, đặc biệt, chữ hoa, chữ thường"
        },
        password_confirmation: {
            required: "Vui lòng nhập lại mật khẩu",
            equaTo: "Mật khẩu nghập lại chưa khớp"
        },
        hiddenRecaptcha: {
            required: "Vui lòng xác nhận Google reCAPTCHA"
        }
    },
    // custom error
    errorClass: "invalid-feedback d-block",
    // custom input
    highlight: function (element) {
        $(element).addClass("is-invalid");
    },
    unhighlight: function (element) {
        $(element).removeClass("is-invalid");
    },
});


// hàm này có sẵn để check cái regex
$.validator.addMethod(
    "regex",
    function (value, element, regexp) {
        if (regexp.constructor != RegExp) regexp = new RegExp(regexp);
        else if (regexp.global) regexp.lastIndex = 0;
        return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
);

// Form login
$(".form-login").validate({
    rules: {

        email: {
            required: true,
            email: true,
        },

        password: {
            required: true,
        },
    },

    messages: {
        email: {
            required: "Vui lòng nhập email",
            email: "Vui lòng nhập đúng định dạng email. vd: a@gmail.com",
        },
        password: {
            required: "Vui lòng nhập mật khẩu",
        },

    },
    errorClass: "invalid-feedback d-block",
    highlight: function (element) {
        $(element).addClass("is-invalid");
    },
    unhighlight: function (element) {
        $(element).removeClass("is-invalid");
    },
});