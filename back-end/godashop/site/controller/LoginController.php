<?php
class LoginController
{
    // đăng nhập bằng form
    function form()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->findEmail($email);
        if ($customer) {
            $encodePassword = $customer->getPassword();
            // đúng mật khẩu
            if (password_verify($password, $encodePassword)) {
                // account đã active
                if ($customer->getIsActive()) {
                    $_SESSION["success"] = "Login success";
                    $_SESSION["email"] = $email;
                    $_SESSION["fullname"] = $customer->getName();
                } else {
                    $_SESSION["error"] = "Vui lòng kích hoạt tài khoản bằng cách click vào link email đã đăng kí";
                }
                header("Location: index.php"); // return to home
                exit;
            }
        }
        //thất bại
        $_SESSION["error"] = "Sai thông tin đăng nhập";
        header("Location: index.php"); // return to home
    }
    // đăng nhập bằng google
    function google()
    {
    }
    // đăng nhập bằng facebook
    function facebook()
    {
    }
    // đăng xuất khỏi trái dất lun
    function logout()
    {
        session_destroy(); // hủy tất cả session
        header("Location: index.php");
    }
}
