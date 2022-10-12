<?php
namespace design\Observer;
class Mailer implements Observer{

    public function update(Account $account)
    {
        $email = "test@gmail.com";
        $state = $account->getState();
        $data = $account->getData();
        if ($state == Account::EXPIRED) {
            // Gửi email thông tin tài khoản đã hết hạn
            Email::send($email, "Account hết hạn rồi bạn ei");
            echo $data['email'];
        }
    }
}