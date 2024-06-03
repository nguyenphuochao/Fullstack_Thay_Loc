<?php
class ContactController
{
    // Hiển thị form liên hệ
    function form()
    {
        require "view/contact/form.php";
    }

    // send mail ajax
    function send()
    {
        $mailService = new MailService();
        $to = SHOP_OWNER;
        $subject = "Godashop: Khách hàng liên hệ";
        $site = get_domain();
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $message = $_POST['content'];
        $content = "
        Hi shop owner, <br>
        Customer contact info: <br>
        Name: $name <br>
        Email: $email <br>
        Mobile: $mobile <br>
        Message: $message <br>
        ======xxx======= <br>
        Sent from: $site

        ";

        $mailService->send($to, $subject, $content);
    }
}
