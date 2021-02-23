<?php

namespace App;

/**
 * Платеж.
 *
 * Class Payment
 */
class Payment
{
    const PRO_PRICE = 200;
    protected $summ;

    /**
     * Payment constructor.
     *
     * @param $summ
     * @param User $user
     */
    public function __construct($summ, User $user)
    {
        $this->summ = $summ;
        $this->user = $user;
    }
    /**
     * Получение суммы оплаты.
     *
     * @return float
     */
    public function getPaySumm()
    {
        $tax = (new Tax())->getTaxByUserAndSumm($this->user, $this->summ);
        if ($this->summ >= 5000) {
            return  $this->summ;
        } else {
            return  $this->summ + $tax;
        }
    }
    /**
     * Покупка пользователем PRO.
     */
    public function buyPro()
    {
        $proPayment = new Payment(Payment::PRO_PRICE, $this->user);
        if (($this->user->getBalance() - $proPayment->getPaySumm()) < 0) {
            return 'Недостаточно средств на счету';
        }
        $this->user->setBalance($this->user->getBalance() - $proPayment->getPaySumm());
        $this->user->setIsPro(true);

        $request = array($this->user->fio);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://test.tester.ru',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($request)
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        echo "Ответ на Ваш запрос: " . $response;

        return $proPayment->getPaySumm();


    }

}