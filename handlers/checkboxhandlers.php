<?php

include_once __DIR__ . '/../vendor/autoload.php';

session_start();

if(isset($_POST['startCheck']))
{
    parse_str($_POST['startCheck'], $input);

    $user = $_SESSION['user'];

    if($user instanceof \classes\user\User)
    {
        $user->startCheck = array();
        $user->startCheck = saveCheckedInArr($input, $user->startCheck);
    }
    try
    {
        $user->saveValueStartCheck();
        $_SESSION["user"] = $user;

    }catch(\classes\exceptions\user\UserException $ex)
    {
        \classes\log\Log::writeLog($ex->getMessage());
    }
}

if (isset($_POST['tehnCheck']))
{
    parse_str($_POST['tehnCheck'], $input);

    $user = $_SESSION['user'];
    if($user instanceof \classes\user\User)
    {
        $user->tehnCheck = array();
        $user->tehnCheck = saveCheckedInArr($input,$user->tehnCheck);
    }
    try
    {
        $user->saveValueTehnCheck();
        $_SESSION['user'] = $user;

    }catch(\classes\exceptions\user\UserException $ex)
    {
        \classes\log\Log::writeLog($ex->getMessage());
    }
}

function saveCheckedInArr($arr1, $arr2): array
{
    foreach ($arr1 as $key1=>$value1)
    {
        foreach ($value1 as $key2=>$value2)
        {
            $arr2[$key1][$key2] = 'checked';
        }
    }

    return $arr2;
}
