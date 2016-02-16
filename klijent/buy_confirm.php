<?php
session_start();
if(!isset($_SESSION['id'])) {
	header('Location: sessionexpirederror.html');
	
	die();
}

if(!isset($_SESSION['identity']) || $_SESSION['identity'] != 'klijent') {
	header('Location: permissionerror.php');
	
	die();
}

if(!isset($_POST['br_sasije'])) {
	die('Error!');
}

require_once '../DBManager/DBManager.php';

$db = DBManager::getInstance();

$result = $db->carIsRented($_POST['br_sasije']);
if(!$result) {
	header('Location: error.html');
}

$result = $result->fetch_row();
if($result[0] == 1) {
	header('Location: error.html');
	
	die();
}

$result = $db->takeAReservationOnCar($_SESSION['id'], $_POST['br_sasije']);
if(!$result) {
	die('Error!');
}

header('Location: thanks_for_buying_a_car.php?br_sasije='.$_POST['br_sasije']);
?>
