<?php 
	  
	include 'DBManager.php';
	 
	$dbManager = DBManager::getInstance();

	$dbManager->listNabavkaJSON();

?>
