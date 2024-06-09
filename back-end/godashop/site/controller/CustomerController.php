<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class CustomerController
{

    function info()
    {
        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->findEmail($_SESSION["email"]);
        require "view/customer/info.php";
    }

    function updateInfo()
    {
        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->findEmail($_SESSION["email"]);
        $customer->setName($_POST["fullname"]);
        $customer->setMobile($_POST["mobile"]);
        $currentPassword = $_POST["current_password"];
        $dbPassword = $customer->getPassword();
        $newPassword = $_POST["password"];
        if ($currentPassword && $newPassword) {
            //verify
            if (password_verify($currentPassword, $dbPassword)) {
                $encodePassword = password_hash($newPassword, PASSWORD_BCRYPT);
                $customer->setPassword($encodePassword);
            } else {
                $_SESSION["error"] = "Mật khẩu hiện tại không đúng.";
                header("location: index.php?c=customer&a=info");
                exit;
            }
        }
        if ($customerRepository->update($customer)) {
            $_SESSION["fullname"] = $customer->getName();
            $_SESSION["success"] = "Đã cập nhật thông tin tài khoản thành công";
        } else {
            $_SESSION["error"] = $customerRepository->getError();
        }
        header("location: index.php?c=customer&a=info");
    }

    function shipping()
    {
        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->findEmail($_SESSION["email"]);
        require "layout/variable_address.php";
        require "view/customer/shipping.php";
    }
    function updateShipping()
    {
        /* 
        * khởi tạo đối tượng
        * tìm đối tượng theo email cần gán giá trị
        * gán các giá trị cho các thuộc tính
        * gọi hàm update
        */
        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->findEmail($_SESSION["email"]);
        $customer->setShippingName($_POST["fullname"]);
        $customer->setShippingMobile($_POST["mobile"]);
        $customer->setWardId($_POST["ward"]);
        $customer->setHousenumberStreet($_POST["address"]);
        if ($customerRepository->update($customer)) {
            $_SESSION["fullname"] = $customer->getName();
            $_SESSION["success"] = "Đã cập nhật địa chỉ giao hàng thành công";
        } else {
            $_SESSION["error"] = $customerRepository->getError();
        }
        header("location: index.php?c=customer&a=shipping");
    }

    // quên mật khẩu
    function forgotPassword()
    {

        $email = $_POST["email"];
        $customerRepository = new CustomerRepository();
        // check tồn tại email trong hệ thống
        $customer = $customerRepository->findEmail($email);
        if (!$customer) {
            $_SESSION["error"] = "Email $email không tồn tại";
            header("Location: index.php");
            exit;
        }
        // Gửi mail reset password
        $mailerServer = new MailService();
        // Use JWT
        $key = JWT_KEY;
        $payload = [
            "email" => $email,
        ];

        $code = JWT::encode($payload, $key, 'HS256');

        $activeUrl = get_domain_site() . "/index.php?c=customer&a=resetPassword&code=$code";
        $content = "
                  Chào $email <br>
                  Vui lòng click vào link bên dưới khôi phục tài khoản <br>
                  <a href='$activeUrl'>Reset Password</a>
              ";
        $mailerServer->send($email, "Active account", $content);
        $_SESSION["success"] = "Vui lòng kiểm tra email để khôi phục mật khẩu";
        header("Location: index.php");
    }
    // form resetPassword
    function resetPassword()
    {
        $code = $_GET["code"];
        try {
            $decoded = JWT::decode($code, new Key(JWT_KEY, 'HS256'));
            $email = $decoded->email;
            $customerRepository = new CustomerRepository();
            $customer = $customerRepository->findEmail($email);
            if (!$customer) {
                $_SESSION["error"] = "Email $email không tồn tại";
                header("Location: /");
            }
            require "view/customer/resetPassword.php";
        } catch (Exception $e) {
            echo "You try hack";
        }
    }
    // update password
    function updatePassword()
    {
        $code = $_POST["code"];
        try {
            $decoded = JWT::decode($code, new Key(JWT_KEY, 'HS256'));
            $email = $decoded->email;
            $customerRepository = new CustomerRepository();
            $customer = $customerRepository->findEmail($email);
            $newPassword = $_POST["password"];
            $hashNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $customer->setPassword($hashNewPassword);
            $customerRepository->update($customer);
            $_SESSION["success"] = "Password reset successfully";
            header("Location: index.php");
        } catch (Exception $e) {
            echo "You try hack";
        }
    }
}
