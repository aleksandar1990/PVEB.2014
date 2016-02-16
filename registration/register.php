<?php
while (! file_exists('DBManager') )
    chdir('..');

include_once getcwd().'/DBManager/DBManager.php';
include_once getcwd().'/Util/Crypter.php';


/*
 * ($firstname, $lastname, $address, $phone, $id_card_number,
                        $passport_id, $username, $email, $password, $ssid, $info )
 */
function fetchNewUser()
{
    $md5_password = Crypter::encryptStringToMD5($_POST["password"]);

    $user = new User(
        $_POST["fname"],
        $_POST["lname"],
        $_POST["address"],
        $_POST["phone"],
        $_POST["card_id"],
        $_POST["passport_id"],
        $_POST["username"],
        $_POST["email"],
        $md5_password,
        $_POST["ssn"],
        $_POST["comments"]
    );

    return $user;
}

$user = fetchNewUser();
$dbManager = DBManager::getInstance();

if($dbManager->checkIfUserExists($user) == true) {
    echo "USER EXISTS"."<br/>";
}
else {
    $dbManager->saveNewUser($user);
}
