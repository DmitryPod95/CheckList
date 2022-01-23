<?php
include_once __DIR__ . '/vendor/autoload.php';

include ($_SERVER['DOCUMENT_ROOT'].'/lang/main/main.php');

session_start();

?>
<?php

$user = \classes\user\SessionUsers::getDatafromSession();

if(!$user)
{
   \classes\auth\Authorization::redirect("/");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jQuery.php"></script>
    <script src = "js/script.js" ></script>
    <link rel="stylesheet" href="css/main.css">
    <title>Главная</title>
</head>
<body>

    <div class="block-info">
        <div class="user-info">
            <?php
                if($user instanceof \classes\user\User)
                {
                    echo implode(' ', [$user->getFirstName(),$user->getLastName()] );
                }
            ?>
        </div>
        <div class="link-info">
            <a class="exit-link">Выход</a>
        </div>
    </div>

    <div class="wrap">
        <div class="title-page">
            <h1>
                <?= $MESS['TITLE_PAGE'];?>
            </h1>
        </div>

        <div class="container">
            <div class="check-list">
                <a href="startCheck.php"><?= $MESS['TITLE_START_PAGE'];?></a>
                <p><?= $MESS['CHECK_START_INFO'];?></p>
            </div>
            <div class="check-list">
                <a href="tehnCheck.php"><?= $MESS['TITLE_TEHN_PAGE'];?></a>
                <p><?= $MESS['CHECK_TEHN_INFO'];?></p>
            </div>
        </div>
    </div>
</body>
</html>
