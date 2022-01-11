<?php

namespace classes\auth;

use classes\exceptions\auth\AuthorizeException;
use classes\log\Log;

include 'config/vk/config.php';
class VK extends Authorization
{
    const START_VK = array(
        'client_id'=>ID_VK,
        'redirect_url'=> URL_VK,
        'response_type'=>'code'
    );


    /**
     * Проверка существования пользователя в сети Вконтакте
     * @return bool - true, если пользователь зарегистрирован, false - если нет
     */

    public function isAuthorized(): bool
    {
        try
        {
               $userInfo = $this->getUserInfo($_GET['code']);

               if(!isset($userInfo['id']))
               {
                   throw new AuthorizeException('не найдет ID пользователя');
               }

              $this->id = $userInfo['id'];
              $this->firstName = $userInfo['first_name'];
              $this->lastName = $userInfo['last_name'];

              return true;

        }catch (AuthorizeException $ex)
        {
            Log::writeLog($ex->getMessage());
            return false;
        }
    }

    protected function getToken($code)
    {
        $params = array(
            'client_id'   => ID_VK,
            'secret_key'  => SECRET_VK,
            'redirect_url'=> URL_VK,
            'code'        => $code
        );

        return json_decode(file_get_contents(URL_TOKEN_VK . '?' . urldecode(http_build_query($params))),true);

    }

    protected function getUserInformation($token)
    {
        $params = array(
          'client_id'=> ID_VK,
          'uids'=> 'uid, first_name, last_name',
          'access_token' => $token['access_token'],
          'v'=> VERSION_VK,
        );

        $userInfo = json_decode(file_get_contents(URL_ABOUT_USER . '?' . urldecode(http_build_query($params))),true);

        if(isset($userInfo['response'][0]['id']))
        {
            $userInfo = $userInfo['response'][0];
        }

        return$userInfo;
    }
}