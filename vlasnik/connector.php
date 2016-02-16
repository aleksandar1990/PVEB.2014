<?php 
require_once("../codebase/connector/scheduler_connector.php");
 
$res=mysql_connect("localhost","root","");
mysql_select_db("rent_a_car_db");
 
$conn = new SchedulerConnector($res);
 
$conn->render_table("events","id","start_date,end_date,text");

?>