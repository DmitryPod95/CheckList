<?php
namespace classes\user;

use classes\auth\Authorization;
use classes\auth\Fabric;
use classes\auth\Mail;
use classes\exceptions\auth\AuthorizeException;
use classes\exceptions\user\UserException;
use classes\log\Log;
use Exception;

class SessionUsers
{
    const SESSION_KEY = 'user';

    /**
     *Сохранение данных о пользователе в сессию
     *@param string $provider
     *@return bool - true, если успешно, false - если нет
     */
    public static function saveDataToSession(string $provider): bool
    {
        $userAuth = Fabric::getAuthClass($provider);

        try
        {
            if(!$userAuth instanceof Authorization)
            {
                throw new AuthorizeException('Не удалось найти обработчик');
            }
            if(!$userAuth->isAuthorized())
            {
                throw new UserException('Не удается найти id пользователя');
            }

            $user = new User($userAuth->getId(), $userAuth->getFirstName(), $userAuth->getLastName());
            $_SESSION[self::SESSION_KEY] = $user;
            return true;

        }catch (Exception $ex)
        {
            unset($_SESSION[self::SESSION_KEY]);
            Log::writeLog($ex->getMessage());
            return false;
        }
    }

    /**
     * Получение данных о пользователе из сессии
     * @return User|null
     */
    public static function getDataFromSession(): ? User
    {
        $user = $_SESSION['user'];

        try
        {
            if(!$user instanceof User)
            {
                throw new UserException('Не удается получить обьект пользователя из сессии');
            }

        }catch (Exception $ex)
        {
            Log::writeLog($ex->getMessage());
            return null;
        }


        return $user;
    }
}
