<?php

namespace App;

/**
 * Пользователь.
 *
 * Class User
 */
class User
{
    public $fio;
    public $country;
    protected $balance;
    protected $isPro;


    /**
     * User constructor.
     *
     * @param $fio
     * @param $country
     */
    public function __construct($fio, $country)
    {
        $this->fio = $fio;
        $this->country = $country;
        $this->isPro = false;
    }

    /**
     * @return false
     */
    public function getIsPro()
    {
        return $this->isPro;
    }

    /**
     * @param false $isPro
     */
    public function setIsPro($isPro)
    {
        $this->isPro = $isPro;
    }
    /**
     * @return int
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param int $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }




// сделать две функции set и get получить баланс изменить баланс

}
