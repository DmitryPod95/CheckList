<?php

include_once __DIR__ . '/vendor/autoload.php';

include 'config/vk/config.php';
include 'config/mail/config.php';

session_start();


if(isset($_GET['provider']))
{
    if(!\classes\user\SessionUsers::saveDataToSession($_GET['provider']))
  {
     echo ("Error");
  }
}

//
//if(\classes\user\SessionUsers::getDataFromSession())
//{
//    \classes\auth\Authorization::redirect('main');
//}
//?>
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
    echo $link_mail = '<a href="' . URL_AUTHORIZED_MAIL . '?' . urldecode(http_build_query(\classes\auth\Mail::START_MAIL)) . '">Вход через mail</a>';
    echo $link_vk = '<a href="' . URL_AUTHORIZED_VK . '?' . urldecode(http_build_query(\classes\auth\VK::START_VK)) . '">Вход через ВК</a>';
?>
</body>
</html>
