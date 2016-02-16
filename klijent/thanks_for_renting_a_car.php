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

require_once '../DBManager/DBManager.php';

$db = DBManager::getInstance();
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Rent A Car</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

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

    <!-- javascript i css -->

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
        
        <!-- Korisnikov nalog gornji desni ugao -->

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
			<li class="dropdown hidden-xs">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Cars
					 <i class="fa fa-caret-down"></i>
				</a>
			  <ul class="dropdown-menu">
			  <li><a href='index.php'>ALL</a></li>
			  <li><hr/></li>
			  <?php
				$result = $db->allManufacturers();
				if(!$result) {
					die('$db->allManufacturers()');
				}
				
				while($man = $result->fetch_assoc()) {
					echo '<li><a href="cars_by_manufacturer.php?proizvodjac='.urlencode($man['proizvodjac']).'">'.strtoupper($man['proizvodjac']).'</a></li>';
				}
			  ?>
			  </ul>				
			</li>		  
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span>
					<?php											
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
	
	<!-- Pocetak sadrzaja -->
    
    <div class="content">
      <div class="main-content">
	  
	<table border="0">
	<tr>
	<td style="width:40%">
	<div class="row" style="height: 100%; overflow:auto;">
	<div class="col-sm-6 col-md-6">
	<div class="panel panel-default">
			<?php

			$br_sasije = '';
			if(isset($_GET['br_sasije'])) {
				$br_sasije = $_GET['br_sasije'];
			} else {
				// redirect to error.html;
			}
			
			$result = $db->carDetails($br_sasije);
			if($result === False) {
				die($db->error());
			}
			
			$details = $result->fetch_assoc();
			if($details == False) {
				die('Error occured: could not fetch result set from database for details.');
			}
			
			echo '<a href="#" class="panel-heading no-collapse">RENT A CAR</a>';
			echo '<div id="widget2container" class="panel-body collapse in">';
				echo 'You have successfully rented '.strtoupper($details['proizvodjac']). ' ' .strtoupper($details['model']) . '. Good luck.';
				echo '<br/><br/>';
				echo 'Click <a href="index.php">here</a> to return to main menu.';
			echo '</div>';
			?>
	</div>
	</div>
	</div>
	</td>
	</tr>
	</table>
</div>

<div class="row"></div>


            <footer>
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
    
  
</body></html>
