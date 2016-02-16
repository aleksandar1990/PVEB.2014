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
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Statistics</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>
	
	<!-- za potrbe AJAX-a -->
	<script language="javascript" type="text/javascript">

	  function loadajax(){
		
		$.ajax({  
		  type: "GET",
		  url: '../DBManager/opisDostupnihAutomobilaJSON.php',    		        
		  data: "",   											
		  dataType: 'json', 		  
		  
		success: function(data) {
			drawTable(data);
		}
		
		});  // Ajax Call		
	  }
	  
	  function drawTable(data) {
			for (var i = 0; i < data.length; i++) {
				drawRow(data[i]);
			}
		}

		function drawRow(rowData) {
			var row = $("<tr />")
			$("#rez").append(row); 
			row.append($("<td>" + rowData.Proizvodjac + "</td>"));
			row.append($("<td>" + rowData.Model + "</td>"));
			row.append($("<td>" + rowData.Kategorija + "</td>"));
			row.append($("<td>" + rowData.Vrsta_goriva + "</td>"));
			row.append($("<td>" + rowData.Menjac + "</td>"));
			row.append($("<td>" + rowData.Kubikaza + "</td>"));
			row.append($("<td>" + rowData.Kilometraza + "</td>"));
			row.append($("<td>" + rowData.Cena_kupovine + "</td>"));
		}

	  setTimeout(loadajax, 1000);

	  </script>

    <script src="lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>


    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    
    <!-- Skript za stampanje stranice -->
    <script>
	function myFunction() {
		window.print();
	}
	</script>
    
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->

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
    </div>
    

    <div class="sidebar-nav">
    <ul>
    <li><a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-dashboard"></i> Dashboard<i class="fa fa-collapse"></i></a></li>
    <li><ul class="dashboard-menu nav nav-list collapse in">
            <li><a href="index.php"><span class="fa fa-caret-right"></span> Home</a></li>
            
            <li ><a href="calendar.php"><span class="fa fa-caret-right"></span> Calendar</a></li>
            <li><a href="buycar.php"><span class="fa fa-caret-right"></span> Cars reserved for sale</a></li>
    </ul>
	</li>



<li><a href="users.php" class="nav-header"><i class="fa fa-fw fa-briefcase"></i> User accounts</a></li>

        <li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Database<i class="fa fa-collapse"></i></a></li>
        <li><ul class="legal-menu nav nav-list collapse">
            <li ><a href="updateprice.php"><span class="fa fa-caret-right"></span> Update pricelist</a></li>
            
            <li ><a href="newvehicle.php"><span class="fa fa-caret-right"></span> Enter new vehicle</a></li>
            <li ><a href="transakcije.php"><span class="fa fa-caret-right"></span> Transactions</a></li>
    </ul></li>

        <li onclick="myFunction()"><a href="#" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Print</a></li>
            <li class="active"><a href="statistic.php" class="nav-header"><i class="fa fa-fw fa-comment"></i> Statistics</a></li>

    </div>

    <div class="content">
      <div class="main-content">
	  
	 <?php 
	 
	 $dbManager = DBManager::getInstance();
	 
	 
	 ?> 
            

    <div class="panel panel-default">
        <a href="#page-stats" class="panel-heading" data-toggle="collapse"> Statistics</a>
        <div id="page-stats" class="panel-collapse panel-body collapse in">

                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="<?php echo $dbManager->numTotalRentAplication(); ?>" data-displayPrevious="true" value="<?php echo $dbManager->numTotalRentAplication(); ?>" data-fgColor="#32A3C2" data-readOnly=true;>
                                <h3 class="text-muted text-center">Total Rent Aplication</h3>    
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="<?php echo $dbManager->numAvailableCars(); ?>" data-displayPrevious="true" value="<?php echo $dbManager->numAvailableCars(); ?>" data-fgColor="#009933" data-readOnly=true;>
                                <h3 class="text-muted text-center">Available Cars</h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="<?php echo $dbManager->numClients(); ?>" data-displayPrevious="true" value="<?php echo $dbManager->numClients(); ?>" data-fgColor="#006666" data-readOnly=true;>
                                <h3 class="text-muted text-center">Total Clients</h3>
                            </div>
                        </div>
						
					</div>
					
					<div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="<?php echo $dbManager->numSellCars(); ?>" data-displayPrevious="true" value="<?php echo $dbManager->numSellCars(); ?>" data-fgColor="#1A661A" data-readOnly=true;>
                                <h3 class="text-muted text-center">Number of Sell Cars</h3>
                            </div>
                        </div>
                    
					
					
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="<?php echo $dbManager->avgBuyCarPrice(); ?>" data-displayPrevious="true" value="<?php echo $dbManager->avgBuyCarPrice(); ?>" data-fgColor="#ee8000" data-readOnly=true;>
                                <h3 class="text-muted text-center">Avarage buy car price</h3>    
                            </div>
                        </div>
						
						<div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="<?php echo $dbManager->avgRentCarPrice(); ?>" data-displayPrevious="true" value="<?php echo $dbManager->avgRentCarPrice(); ?>" data-fgColor="#618a77" data-readOnly=true;>
                                <h3 class="text-muted text-center">Avarage rent car price</h3>    
                            </div>
                        </div>
						
					</div>

					<div class="row">
						
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="<?php echo $dbManager->maxMilage(); ?>" data-displayPrevious="true" value="<?php echo $dbManager->avgMilage(); ?>" data-fgColor="#b03638" data-readOnly=true;>
                                <h3 class="text-muted text-center">Avarage milage/Biggest milage</h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="<?php echo $dbManager->numTransactions(); ?>" data-displayPrevious="true" value="<?php echo $dbManager->numTransactions(); ?>" data-fgColor="#f63752" data-readOnly=true;>
                                <h3 class="text-muted text-center">Number of transactions</h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="<?php echo $dbManager->numFailures(); ?>" data-displayPrevious="true" value="<?php echo $dbManager->numFailures(); ?>" data-fgColor="#00ced6" data-readOnly=true;>
                                <h3 class="text-muted text-center">Number of car failures</h3>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

		<div class="row">
    

            <footer>
                <hr>

                <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
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
    
  
</body></html>
