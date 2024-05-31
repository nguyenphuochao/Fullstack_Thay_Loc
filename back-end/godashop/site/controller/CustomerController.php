<?php
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
}
