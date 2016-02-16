<?php
session_start();
if(!isset($_SESSION['id'])) {
	header('Location: sessionexpirederror.html');
	
	die();
}

if(!isset($_SESSION['identity']) || $_SESSION['identity'] != 'vlasnik') {
	header('Location: permissionerror.php');
	
	die();
}
?>
<!doctype html>
<head>
   <meta http-equiv="Content-type" content="text/html; charset=utf-8">
   <title>Mini calendar in the scheduler header</title>
   
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="stylesheets/theme1.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">
   
</head>
   <script src="../codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
   <link rel="stylesheet" href="../codebase/dhtmlxscheduler.css" type="text/css" media="screen" title="no title" charset="utf-8">

   <script src="../codebase/ext/dhtmlxscheduler_minical.js" type="text/javascript" charset="utf-8"></script>
   
<style type="text/css" media="screen">
   
	  
	  #scheduler_here{ 
	  position: absolute;
	  right: 15px;
	  padding: 10;
	  z-index: 1000;
	  }
	  
	#footer {
    position: absolute;
    bottom: 0;
	width: 100%;
	height: 25%;
}
    
</style>

<script type="text/javascript" charset="utf-8">

	function init() {
		scheduler.config.multi_day = true;
		
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		scheduler.init('scheduler_here',new Date(),"month");
		
		// metod koji uzima url fajla koji ce procesirati CRUD operacije na serveru
		scheduler.load("connector.php");
		
		// cuvanje podataka u bazi
		var dp = new dataProcessor("connector.php");
		dp.init(scheduler_here);
	}
	
	function show_minical(){
		if (scheduler.isCalendarVisible())
			scheduler.destroyCalendar();
		else
			scheduler.renderCalendar({
				position:"dhx_minical_icon",
				date:scheduler._date,
				navigation:true,
				handler:function(date,calendar){
					scheduler.setCurrentView(date);
					scheduler.destroyCalendar()
				}
			});
	}
	
</script>

<body onload="init();" class="theme-blue">
   
   
    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>
	
	 <!-- Skript za stampanje stranice -->
    <script>
	function myFunction() {
		window.print();
	}
	</script>
	
	<link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
	
	
	<div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

	<div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php					
						require_once '../DBManager/DBManager.php';
						
						$db = DBManager::getInstance();
						
						$korisnik_id = $_SESSION['id'];

						$result = $db->ImePrezimeByKorisnikId($korisnik_id);
						if(!$result) {
							die('$db->ImePrezimeByKorisnikId($korisnik_id)');
						}
						
						$korisnik = $result->fetch_assoc();
						
						echo $korisnik['ime'] . ' ' . $korisnik['prezime'];
					?>
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
                <li><a href="myaccount.php" target="_blank">My account</a></li>
                <li><a tabindex="-1" href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
	  
	  
	  <div class="sidebar-nav">
    <ul>
    <li><a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-dashboard"></i> Dashboard<i class="fa fa-collapse"></i></a></li>
    <li><ul class="dashboard-menu nav nav-list collapse in">
            <li><a href="index.php"><span class="fa fa-caret-right"></span> Home</a></li>
            
            <li class="active"><a href="calendar.php"><span class="fa fa-caret-right"></span> Calendar</a></li>
			
			<li><a href="buycar.php"><span class="fa fa-caret-right"></span> Cars reserved for sale</a></li>
         
    </ul></li>



<li><a href="users.php" class="nav-header"><i class="fa fa-fw fa-briefcase"></i> User accounts</a></li>

        <li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Database<i class="fa fa-collapse"></i></a></li>
        <li><ul class="legal-menu nav nav-list collapse">
            <li ><a href="updateprice.php"><span class="fa fa-caret-right"></span> Update pricelist</a></li>
            
            <li ><a href="newvehicle.php"><span class="fa fa-caret-right"></span> Enter new vehicle</a></li>
            <li ><a href="transakcije.php"><span class="fa fa-caret-right"></span> Transactions</a></li>
    </ul></li>

        <li onclick="myFunction()"><a href="#" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Print</a></li>
            <li><a href="statistic.php" class="nav-header"><i class="fa fa-fw fa-comment"></i> Statistics</a></li>

    </div>
	

   <div id="scheduler_here" class="dhx_cal_container" style='width:65%; height:65%;'>
      <div class="dhx_cal_navline">
         <div class="dhx_cal_prev_button">&nbsp;</div>
         <div class="dhx_cal_next_button">&nbsp;</div>
         <div class="dhx_cal_today_button"></div>
         <div class="dhx_cal_date"></div>
         <div class="dhx_minical_icon" id="dhx_minical_icon" onclick="show_minical()">&nbsp;</div>
         <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
         <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
         <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
      </div>
      <div class="dhx_cal_header">
      </div>
      <div class="dhx_cal_data">
      </div>
   </div>
   
   <div class="content">
			<div class="header">
			  <h1 class="page-title">Calendar</h1>
						<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Calendar</li>
			</ul>
			</div>
			
			
        <div class="main-content">

		<!-- footer -->
		
		<footer id="footer">
                <hr>
                <p class="pull-right">Projekat iz programiranja za veb</p>
                <p>© 2015 <a href="http://www.math.rs" target="_blank">Matematički fakultet</a></p>
        </footer>
		
		</div>
    </div>
   
   
	<script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
		
   
   
   
</body>