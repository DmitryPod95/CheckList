<?php

namespace classes\auth;


use classes\exceptions\auth\AutharizeException;

abstract class Autharization
{

    public $id;
    public $firstName;
    public $lastName;

    /**
     * @return string - id пользователя в соц. сети
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string - имя пользователя
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string - фамилия пользователя
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    protected function getUserInfo($code)
    {
        if(!$code)
        {
            throw new AutharizeException('Не передан код в запрос');
        }

        $token = $this->getToken($code);

        if(!isset($token['access_token']))
        {
            throw new AutharizeException('Отсуцтвует токен');
        }

        return $this->getUserInformation($token);
    }

    public abstract function isAuthorized();
    protected abstract function getToken($code);
    protected abstract function getUserInformation($token);

}