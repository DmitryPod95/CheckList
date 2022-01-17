<?php

include_once __DIR__ . '/vendor/autoload.php';

include 'config/mail/config.php';
include 'config/yandex/config.php';

session_start();


if(isset($_GET['provider']))
{
    if(\classes\user\SessionUsers::saveDataToSession($_GET['provider']))
  {
     \classes\auth\Authorization::redirect('/');
  }
}

//
//if(\classes\user\SessionUsers::getDataFromSession())
//{
//    \classes\auth\Authorization::redirect('main');
//}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
<?php
    echo $link_mail = '<a href="' . URL_AUTHORIZED_MAIL . '?' . urldecode(http_build_query(\classes\auth\Mail::START_MAIL)) . '">Вход через mail</a><br>';
    echo $link_yandex = '<a href="' . URL_AUTHORIZED_YANDEX . '?' . urldecode(http_build_query(\classes\auth\Yandex::START_YANDEX)) . '">Вход через Яндекс</a>';
?>
</body>
</html>
