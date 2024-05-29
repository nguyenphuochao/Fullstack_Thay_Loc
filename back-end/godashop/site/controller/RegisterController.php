<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class RegisterController
{
    // đăng kí tài khoản
    function create()
    {
        // validate recaptcha
        $secret = GOOGLE_RECAPTCHA_SECRET;
        $remoteIp = "172.0.0.1";
        $gRecaptchaResponse = $_POST["g-recaptcha-response"];
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
        $resp = $recaptcha->setExpectedHostname(get_host_name())
            ->verify($gRecaptchaResponse, $remoteIp);
        if (!$resp->isSuccess()) {
            $errors = $resp->getErrorCodes();
            var_dump($errors);
            exit;
        }

        // success
        $customerRepository = new CustomerRepository();
        $data = [
            "name" => $_POST["fullname"],
            "mobile" => $_POST["mobile"],
            "email" => $_POST["email"],
            "login_by" => "form",
            "is_active" => 0,
            "password" => password_hash($_POST["password"], PASSWORD_BCRYPT), // mã hóa password bằng has_password
            "shipping_name" => "",
            "shipping_mobile" => "",
            "ward_id" => null,
            "housenumber_street" => ""
        ];
        if ($customerRepository->save($data)) {
            $_SESSION["success"] = "Đã tạo tài khoản thành công";
            // Gửi mail kích hoạt tài khoản
            $email = $_POST["email"];
            $mailerServer = new MailService();
            // Use JWT
            $key = JWT_KEY;
            $payload = [
                "email" => $email,
            ];
            $code = JWT::encode($payload, $key, 'HS256');

            $activeUrl = get_domain_site() . "/index.php?c=register&a=active&code=$code";
            $content = "
                Chào $email <br>
                Vui lòng click vào link bên dưới kích hoạt tài khoản <br>
                <a href='$activeUrl'>Active Account</a>
            ";
            $mailerServer->send($email, "Active account", $content);
        } else {
            $_SESSION["error"] = $customerRepository->getError();
        }
        header("Location: index.php");
    }
    // kích hoạt tài khoản
    function active()
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
            $customer->setIsActive(1); // = 1 là kích hoạt
            $customerRepository->update($customer);
            $_SESSION["success"] = "Tài khoản của bạn đã được active";
            // cho phép login lun
            $_SESSION["email"] = $email;
            $_SESSION["fullname"] = $customer->getName();
            header("Location: /");
        } catch (Exception $e) {
            echo "You try hack";
        }
    }
    // Kiểm tra tồn tại email
    function notExistingEmail()
    {
        $email = $_GET["email"];
        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->findEmail($email);
        echo $customer ? "false" : "true";
    }
}
