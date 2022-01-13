<?php

namespace classes\auth;

class Fabric
{
    const VK_PROVIDER = 'vk';
    /**
     * @param $provider
     * @return VK|null - Экземпляр класса Authorization
     */
    public static function getAuthClass($provider): ?Authorization
    {
        switch ($provider)
        {
            case self::VK_PROVIDER:
                $result = new VK();
                break;
            default:
                $result = null;
                break;
        }

        return $result;
    }
}