<?php

namespace classes\auth;


use classes\exceptions\auth\AuthorizeException;


abstract class Authorization
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

    public static function redirect($url)
    {
        @header("Location: $url");
        exit();
    }

    protected function getUserInfo($code)
    {
        if(!$code)
        {
            throw new AuthorizeException('Не передан код в запрос');
        }

        $token = $this->getToken($code);

        if(!isset($token['access_token']))
        {
            throw new AuthorizeException('Отсутствует токен');
        }

        return $this->getUserInformation($token);
    }

    public abstract function isAuthorized();
    protected abstract function getToken($code);
    protected abstract function getUserInformation($token);
}