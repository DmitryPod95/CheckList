<?php
include_once __DIR__ . "/vendor/autoload.php";

include ($_SERVER['DOCUMENT_ROOT'].'/lang/checklist/startCheck.php');
session_start();

$user = \classes\user\SessionUsers::getDataFromSession();

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
    <script src="js/script.js"></script>
    <script src = "js/start_check.js" ></script>
    <link rel="stylesheet" href="css/checklist.css">
    <title>Чек-лист запуска сайта</title>
</head>
<body>
    <div class="block-info">
        <div class="user-info">
            <?php
                if($user instanceof \classes\user\User)
                {
                    echo implode(' ',[$user->getFirstName(), $user->getLastName()]);
                }
            ?>
        </div>
        <div class="link-info">
            <a href="main.php">Главная</a>
            <a class="exit-link">Выход</a>
        </div>
    </div>
    <div class="wrap">
        <div class="title-page">
            <h1>
                <?=$MESS['TITLE_PAGE'];?>
            </h1>
        </div>
        <div class="container">
            <form action="main.php" method="post">
                <ul>
                   <li class="check-list">
                       <div class="check-top">
                           <input type="checkbox" name="check1[0]" <?= $user->startCheck['check1'][0]?>><span>  <?= $MESS['CHECK_1'];?></span>
                           <div class="show-more">+</div>
                       </div>
                       <div class="check-bottom">
                           <div class="dop-info"><?= $MESS['DOP_INFO_1'];?></div>
                           <ul>
                               <li class="check-two">
                                   <input type="checkbox" name="check1[1]" <?= $user->startCheck['check1'][1];?>><span>   <?= $MESS['CHECK_1_1'];?></span>
                               </li>
                               <li class="check-two">
                                   <input type="checkbox" name="check1[2]" <?= $user->startCheck['check1'][2];?>><span>  <?= $MESS['CHECK_1_2'];?></span>
                               </li>
                               <li class="check-two">
                                   <input type="checkbox" name="check1[3]" <?= $user->startCheck['check1'][3];?>><span>  <?= $MESS['CHECK_1_3'];?></span>
                               </li>
                               <li class="check-two">
                                   <input type="checkbox" name="check1[4]" <?= $user->startCheck['check1'][4];?>><span>  <?= $MESS['CHECK_1_4'];?></span>
                               </li>
                           </ul>
                       </div>
                   </li>
                    <li class="check-list">
                        <div class="check-top">
                            <input type="checkbox" name="check2[0]" <?= $user->startCheck['check2'][0]?>><span>  <?= $MESS['CHECK_2'];?></span>
                            <div class="show-more">+</div>
                        </div>
                        <div class="check-bottom">
                            <div class="dop-info"><?= $MESS['DOP_INFO_2'];?></div>
                            <ul>
                                <li class="check-two">
                                    <input type="checkbox" name="check2[1]" <?= $user->startCheck['check2'][1];?>><span>  <?= $MESS['CHECK_2_1'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check2[2]" <?= $user->startCheck['check2'][2];?>><span>  <?= $MESS['CHECK_2_2'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check2[3]" <?= $user->startCheck['check2'][3];?>><span>  <?= $MESS['CHECK_2_3'];?></span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="check-list">
                        <div class="check-top">
                            <input type="checkbox" name="check3[0]" <?= $user->startCheck['check3'][0]?>><span>  <?= $MESS['CHECK_3'];?></span>
                            <div class="show-more">+</div>
                        </div>
                        <div class="check-bottom">
                            <div class="dop-info"><?= $MESS['DOP_INFO_3'];?></div>
                            <ul>
                                <li class="check-two">
                                    <input type="checkbox" name="check3[1]" <?= $user->startCheck['check3'][1];?>><span>  <?= $MESS['CHECK_3_1'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check3[2]" <?= $user->startCheck['check3'][2];?>><span>  <?= $MESS['CHECK_3_2'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check3[3]" <?= $user->startCheck['check3'][3];?>><span>  <?= $MESS['CHECK_3_3'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check3[4]" <?= $user->startCheck['check3'][4];?>><span>  <?= $MESS['CHECK_3_4'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check3[5]" <?= $user->startCheck['check3'][5];?>><span>  <?= $MESS['CHECK_3_5'];?></span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="check-list">
                        <div class="check-top">
                            <input type="checkbox" name="check4[0]" <?= $user->startCheck['check4'][0]?>><span>  <?= $MESS['CHECK_4'];?></span>
                            <div class="show-more">+</div>
                        </div>
                        <div class="check-bottom">
                            <div class="dop-info"><?= $MESS['DOP_INFO_4'];?></div>
                            <ul>
                                <li class="check-two">
                                    <input type="checkbox" name="check4[1]" <?= $user->startCheck['check4'][1];?>><span>  <?= $MESS['CHECK_4_1'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check4[2]" <?= $user->startCheck['check4'][2];?>><span>  <?= $MESS['CHECK_4_2'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check4[3]" <?= $user->startCheck['check4'][3];?>><span>  <?= $MESS['CHECK_4_3'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check4[4]" <?= $user->startCheck['check4'][4];?>><span>  <?= $MESS['CHECK_4_4'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check4[5]" <?= $user->startCheck['check4'][5];?>><span>  <?= $MESS['CHECK_4_5'];?></span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="check-list">
                        <div class="check-top">
                            <input type="checkbox" name="check5[0]" <?= $user->startCheck['check5'][0]?>><span>  <?= $MESS['CHECK_5'];?></span>
                            <div class="show-more">+</div>
                        </div>
                        <div class="check-bottom">
                            <div class="dop-info"><?= $MESS['DOP_INFO_5'];?></div>
                            <ul>
                                <li class="check-two">
                                    <input type="checkbox" name="check5[1]" <?= $user->startCheck['check5'][1];?>><span>  <?= $MESS['CHECK_5_1'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check5[2]" <?= $user->startCheck['check5'][2];?>><span>  <?= $MESS['CHECK_5_2'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check5[3]" <?= $user->startCheck['check5'][3];?>><span>  <?= $MESS['CHECK_5_3'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check5[4]" <?= $user->startCheck['check5'][4];?>><span>  <?= $MESS['CHECK_5_4'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check5[4]" <?= $user->startCheck['check5'][5];?>><span>  <?= $MESS['CHECK_5_5'];?></span>
                                </li>
                                <li class="check-two">
                                    <input type="checkbox" name="check5[4]" <?= $user->startCheck['check5'][6];?>><span>  <?= $MESS['CHECK_5_6'];?></span>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</body>
</html>
