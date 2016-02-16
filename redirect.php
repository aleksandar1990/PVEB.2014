<?php
include_once getcwd()."/DBManager/DBManager.php";
include_once getcwd()."/registration/User.php";
include_once getcwd()."/Util/Crypter.php";
$md5_password = Crypter::encryptStringToMD5($_POST["password"]);
$mail = $_POST["email"];

//echo $mail." ".$md5_password. "\n";

$dbManager = DBManager::getInstance();

$user = new User("firstname", "lastname", "address", "phone", "id_card_number",
    "passport_id", "username" , $mail, $md5_password, "ssid", "info" );

//$role = $dbManager->getRoleForUser($user);
//echo $role."<br/>";

session_start();

$_SESSION["email"] = $user->get_email();

$uname = $dbManager->usernameForUserEmail($user->get_email());
$_SESSION["username"] = $uname;

$id = $dbManager->idForUserEmail($user->get_email());
//echo "ID  {$id} <br/>";
$_SESSION["id"] = $id;

if ($dbManager->isUserMechanic($user))
{
    echo "Mech"."<br/>";
	$_SESSION["identity"] = 'meh';
    header("Location: mehanicar/index.php");
}
else if ($dbManager->isUserOwner($user))
{
    echo "Owner"."<br/>";
	$_SESSION["identity"] = 'vlasnik';
    header("Location: vlasnik/index.php");
}
else if ($dbManager->isUserClient($user))
{
    echo "Client"."<br/>";
	$_SESSION["identity"] = 'klijent';
    header("Location: klijent/index.php");
}
else
{
    //echo "Invalid"."<br/>";
	header('location: klijent/loginfailed.html');
    /**
     * NOTIFY USER SOMETHING IS WRONG
     */
    //header("Location: mehanicar/index.php");
}