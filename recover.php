<?php

include_once '/DBManager/DBManager.php';
include_once '/registration/User.php';
include_once '/util/Crypter.php';
include_once '/util/RecoveryText.php';

$dbManager = DBManager::getInstance();
$user = new User(
    "null",
    "null",
    "null",
    "null",
    "null",
    "null",
    null,
    $_POST["recoverMail"],
    "null",
    "null",
    "null"
);

function sendRecoveryMail()
{
    $email = $_POST["recoverMail"];
    $subject = RecoveryText::getSubject();
    $new_pwd = RecoveryText::generateRandomString();
    $md5 = Crypter::encryptStringToMD5($new_pwd);
    $body = RecoveryText::getMessage();

    if(mail($email,$subject,$body))
    {
        $dbManager->updatePasswordForEmail($email, $md5);
    }
}

if($dbManager->existsUserEmail($user))
    sendRecoveryMail();
else
    echo "No user";


