<?php

namespace classes\auth;

class Fabric
{
    /**
     * @param $provider
     * @return VK|null - Экземпляр класса Authorization
     */
    public static function getAuthClass($provider): ?Authorization
    {
        switch ($provider)
        {
            case 'vk':
                $result = new VK();
                break;
            default:
                $result = null;
                break;
        }

        return $result;
    }
}