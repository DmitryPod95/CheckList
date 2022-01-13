<?php
include_once __DIR__ . '/vendor/autoload.php';

include 'config/vk/config.php';


session_start();


if(isset($_GET['provider']))
{
    if(!\classes\user\SessionUsers::saveDataToSession($_GET['provider']))
    {
        \classes\auth\Authorization::redirect('/');
    }
}

if(\classes\user\SessionUsers::getDatafromSession())
{
    \classes\auth\Authorization::redirect('main');
}
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
    echo $link_vk = '<a href="' . URL_AUTHIRIZED_VK . '?' . urldecode(http_build_query(\classes\auth\VK::START_VK)) . '">Вход через ВК</a>';
?>
</body>
</html>
