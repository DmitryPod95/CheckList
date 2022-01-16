<?php
namespace classes\auth;

use classes\exceptions\auth\AuthorizeException;
use classes\log\Log;

include "config/mail/config.php";

class Mail extends Authorization
{
    const START_MAIL = array(
        'client_id'     => MAIL_ID,
        'redirect_url'  => URL_REDIRECT_MAIL,
        'response_type' => 'code',
    );


    public function isAuthorized(): bool
    {
        try
        {
            $userInfo = $this->getUserInfo($_GET['provider']);

            if(!isset($userInfo['id']))
            {
                throw new AuthorizeException("Не удается найти ID пользователя");
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
            'client_id'    => MAIL_ID,
            'secret_key'   => SECRET_KEY_MAIL,
            'redirect_url' => URL_REDIRECT_MAIL,
            'grant_type'   => 'authorization_code',
            'code'         => $code,
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, URL_TOKEN_MAIL);
        curl_setopt($curl,CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,urldecode(http_build_query($params)));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($curl);

        return json_decode($result, true);
    }

    protected function getUserInformation($token)
    {

        $client_id = MAIL_ID;
        $secret_key = SECRET_KEY_MAIL;
        $sign = md5("app_id={$client_id}method=user.getInsecure=1session_key={$token['access_token']}{$secret_key}");

        $params = array(
            'method'=> 'users.getInfo',
            'secure' =>1,
            'app_id' =>$client_id,
            'session_key' =>$token['access_token'],
            'sig' => $sign,
        );

        $userInfo = json_decode(file_get_contents(URL_ABOUT_USER_MAIL . '?' . urldecode(http_build_query($params))),true);

        if(isset($userInfo[0]['id']))
        {
            $userInfo = array_shift($userInfo);
        }

        return $userInfo;
    }
}