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
	<style>
	input[type='text'], input[type='email'], textarea {
		border-width: 1px;
		border-style: solid;
		border-color: #777777;
		border-radius: 2px;
		font-size: 13px;
	}
	form label {
		font-size: 13px;
	}
	
	</style>
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
                <!--<li><a href="./">My account</a></li>-->
                <li><a tabindex="-1" href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
    </div>
	
	<!-- Pocetak sadrzaja -->
    
    <div class="content">
      <div class="main-content">
	  
	  <!-- Tabela od dve kolone u koju se smastaju informacije o dostupnim automobilima (Iznajmljen=0) iz baze -->
      <table border="0">
 
    
      
    
    <tr>
       
    

      <td style="width:40%">
      <div class="row" style="height: 100%; overflow:auto;">
        <div class="col-sm-6 col-md-6">
        <div class="panel panel-default">
            <a href="#" class="panel-heading no-collapse">YOUR PERSONAL INFORMATION</a>
            <div id="widget2container" class="panel-body collapse in">
<div class="registration" id="registration">
				
		<div class="form">
			<form action="update_korisnik_data.php" id="contactform" method="POST">
				<p class="contact">
					<label for="name">First name</label>
					<br />
					<input id="name" name="fname" placeholder="First name" required="" tabindex="1" type="text" value="<?php echo $korisnik['ime'] ?>"/>
				</p>

				<p class="contact">
					<label for="last_name">Last name</label>
					<br />
					<input id="last_name" name="lname" placeholder="Last name" required="" tabindex="1" type="text" value="<?php echo $korisnik['prezime'] ?>"/>
				</p> 

				<p class="contact">
					<label for="address">Address</label>
					<br />
					<input id="address" name="address" placeholder="Your address" required="" tabindex="1" type="text" value="<?php echo $korisnik['Adresa'] ?>"/>
				</p> 
				
				<p class="contact">
					<label for="phone">Phone</label>
					<br />
					<input id="phone" name="phone" placeholder="Your phone number" required="" tabindex="1" type="text" value="<?php echo $korisnik['Telefon'] ?>"/>
				</p> 

				<p class="contact">
					<label for="licna">Identification number of the personal ID card</label>
					<br />
					<input id="licna" name="card_id" placeholder="Your ID of the id card" required="" tabindex="1" type="text" value="<?php echo $korisnik['BR_licne'] ?>"/>
				</p> 

				<p class="contact">
					<label for="pasos">Passport ID</label>
					<br />
					<input id="pasos" name="passport_id" placeholder="Your ID of the passport" required="" tabindex="1" type="text" value="<?php echo $korisnik['Br_pasosa'] ?>"/>
				</p> 

				<p class="contact">
					<label for="email">Email</label>
					<br />
					<input id="email" name="email" placeholder="example@domain.com" required="" type="email" value="<?php echo $korisnik['email'] ?>"/>
				</p>

				<p class="contact">
					<label for="ssn">Social security number</label>
					<br />
					<input type="text" id="ssn" name="ssn" required="" value="<?php echo $korisnik['Mat_broj'] ?>"> 
				</p>
				
				<p class="contact">
					<label for="info">Information</label>
					<br />
					<textarea id='info' NAME="comments" COLS=30 ROWS=4 ><?php echo $korisnik['Informacije'] ?></textarea>
				</p>
			</form> 
		</div>
		<a class="btn btn-primary"
		   onclick="document.getElementById('contactform').submit(); return false;">Save</a>
</div>
            </div>
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
