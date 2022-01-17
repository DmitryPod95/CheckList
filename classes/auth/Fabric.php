<?php

namespace classes\auth;

class Fabric
{
    const VK_PROVIDER = 'yandex';
    const MAIL_PROVIDER = 'mail';
    /**
     * @param $provider
     * @return Yandex|Mail|null - Экземпляр класса Authorization
     */
    public static function getAuthClass($provider): ?Authorization
    {
        switch ($provider)
        {
            case self::VK_PROVIDER:
                $result = new Yandex();
                break;
            case self::MAIL_PROVIDER:
                $result = new Mail();
                break;
            default:
                $result = null;
                break;
        }

        return $result;
    }
}