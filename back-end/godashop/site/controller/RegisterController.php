<?php
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
        $resp = $recaptcha->setExpectedHostname('godashop.com')
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
            $activeUrl = "godashop.com/site/index.php?c=register&a=active&code=123456";
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
        $customerRepository = new CustomerRepository();
    }
}
