<?php
include_once __DIR__ . '/vendor/autoload.php';


session_start();
?>
<?php

$user = \classes\user\SessionUsers::getDatafromSession();

if(!$user)
{
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
</head>
<body>

<div class="block_info">
    <div class="user_info">
        <?php
            if($user instanceof \classes\user\User)
            {
                echo implode(' ', [$user->getFirstName()],$user->getLastName() );
            }
        ?>
    </div>

</div>
</body>
</html>
