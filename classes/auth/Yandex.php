<?php
namespace classes\auth;


use classes\exceptions\auth\AuthorizeException;
use classes\log\Log;

include 'config/yandex/config.php';

class Yandex extends Authorization
{
    const START_YANDEX = array(
        'client_id'=>YANDEX_ID,
        'response_type' => 'code',
        'display' => 'popup',
    );

    public function isAuthorized(): bool
    {
        try
        {
            $userInfo = $this->getUserInfo($_GET['code']);
            if(!isset($userInfo['id']))
            {
                throw new AuthorizeException("Не найдет id пользователя");
            }

            $this->id = $userInfo['id'];
            $this->firstName = $userInfo['first_name'];
            $this->lastName = $userInfo['last_name'];
            return true;

        }catch (\Exception $ex)
        {
            Log::writeLog($ex->getMessage());
            return false;
        }
    }

    protected function getToken($code)
    {
        $params = array(
            'client_id' => YANDEX_ID,
            'client_secret' => SECRET_KEY_YANDEX,
            'code' => $code,
            'grant_type' => 'authorization_code'
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, URL_TOKEN_YANDEX);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);

        return json_decode($result, true);
    }

    protected function getUserInformation($token)
    {

        $curl = curl_init(URL_ABOUT_USER_YANDEX);
        curl_setopt($curl,CURLOPT_POST, 1);
        curl_setopt($curl,CURLOPT_POSTFIELDS, array('format' => 'json'));
        curl_setopt($curl,CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token['access_token']));
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl,CURLOPT_HEADER, false);
        $result = curl_exec($curl);

        $userInformation = json_decode($result,true);

        if(isset($userInformation['id']))
        {
            $userInfo = $userInformation;
        }
        return $userInfo;
    }
}