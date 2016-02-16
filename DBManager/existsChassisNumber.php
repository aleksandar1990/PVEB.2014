<?php 
	  
	include 'DBManager.php';
	 
	$dbManager = DBManager::getInstance();
	
	$chassis = $_POST['chassis1'];

	$dbManager->existsChassisNumber($chassis);

?>
