<?php
require "vendor/autoload.php";

$user = new \App\User('Васильев Василий Васильевич', 'Россия');

$user->setBalance(150);

$template = $user->getBalance();

$payment = new \App\Payment(4000, $user);

print_r("Баланс пользователя: " . $user->getBalance().'</br>');

print_r("Получение суммы оплаты: ".$payment->getPaySumm().'</br>');

print_r('</br>'."Покупка пользователем PRO: ".$payment->buyPro().'</br>'."Status: ".$user->getIsPro().'</br>');

print_r("Баланс пользователя: " . $user->getBalance().'</br>');