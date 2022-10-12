<?php 
namespace design\Observer;
class Logger implements Observer{
    public function update(Account $account)
    {
        $state = $account->getState();
        $data = $account->getData();
        if ($state == Account::LOGIN_SUCCESS) {
            // thực hiện log thời gian user online blahh..
            echo  "User {$data['email']} vừa online";
        }
    }
}