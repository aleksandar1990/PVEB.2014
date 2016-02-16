<?php
session_start();
if(!isset($_SESSION['id'])) {
	header('Location: sessionexpirederror.html');
	
	die();
}

if(!isset($_SESSION['identity']) || $_SESSION['identity'] != 'meh') {
	header('Location: permissionerror.php');
	
	die();
}

require_once '../DBManager/DBManager.php';

$db = DBManager::getInstance();

$result = $db->updateUserData($_POST);
if(!$result) {
	die('Error!');
}

header('Location: myaccount.php');
?>
