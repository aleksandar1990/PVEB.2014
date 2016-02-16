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
    <title>Enter new vehicle</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>
	
	<!-- skriptovi za validaciju -->
	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>

	<script>
	$(document).ready(function(){
		
		// avoids form submit
		jQuery.validator.setDefaults({
		debug: true,
		success: "valid"
		});
					
	 $("#update_form").click(function(){  
	
	 if ($("#form2").valid() && $("#infoslika").length)  {
		 
		  	  
		data=$('#form2').serialize() + '&picture=' + $("#infoslika").text();  // dodajem putanju slike
		//$.post("../DBManager/DBManager.php?function=enterNewVehicle", 
		
			$.post("../DBManager/enterNewVehicle.php",
			data,
			function(data,status){
			  alert(data,status);
			
			});
		//});
	 }
	 else{
		 $("#form2").validate();
		 $("#r10").trigger('click');
	 }
	  });
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
	
	<!-- Skript za stampanje stranice -->
    <script>
	function myFunction() {
		window.print();
	}
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
            
            <li ><a href="calendar.html"><span class="fa fa-caret-right"></span> Calendar</a></li>
			<li><a href="buycar.php"><span class="fa fa-caret-right"></span> Cars reserved for sale</a></li>
         
    </ul></li>



	<li><a href="users.php" class="nav-header"><i class="fa fa-fw fa-briefcase"></i> User accounts</a></li>

        <li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Database<i class="fa fa-collapse"></i></a></li>
        <li><ul class="legal-menu nav nav-list collapse">
            <li><a href="updateprice.php"><span class="fa fa-caret-right"></span> Update pricelist</a></li>
            
            <li class="active"><a href="newvehicle.php"><span class="fa fa-caret-right"></span> Enter new vehicle</a></li>
            <li ><a href="transakcije.php"><span class="fa fa-caret-right"></span> Transactions</a></li>
    </ul></li>

        <li onclick="myFunction()"><a href="#" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Print</a></li>
            <li><a href="statistic.php" class="nav-header"><i class="fa fa-fw fa-comment"></i> Statistics</a></li>

    </div>
    
    <div class="content">
        <div class="header">
            
            <h1 class="page-title">Enter new vehicle</h1>
                    <ul class="breadcrumb">
            <li><a href="index.html">Home</a> </li>
            <li class="active">Enter new vehicle</li>
        </ul>

        </div>
        <div class="main-content">
		
		<div class="informacija"> </div>
		
		
					<form id="form1" method="post" enctype="multipart/form-data">
						<label for="file">Filename:</label>
						<input type="hidden" name="MAX_FILE_SIZE" value="350000">
						<input type="file" name="picture" id="picture" required><br>
						<input class="btn btn-default" id="r9" type="submit" name="upload" value="Upload Car Image">
					</form>
					
					<?php 
					if(isset($_POST['upload'])) 
					{ 

					// define the posted file into variables 
					$name = $_FILES['picture']['name']; 
					$tmp_name = $_FILES['picture']['tmp_name']; 
					$type = $_FILES['picture']['type']; 
					$size = $_FILES['picture']['size']; 

					// if server has magic quotes turned off, add slashes manually 
					if(!get_magic_quotes_gpc()){ $name = addslashes($name); } 

					// open up the file and extract the data/content from it 
					$extract = fopen($tmp_name, 'r'); 
					$content = fread($extract, $size); 
					$content = addslashes($content); 
					fclose($extract);  

						 if(!empty($_FILES)) 
						{ 
							$target = "./images/"; 
							$target = $target . basename( $_FILES['picture']['name']) ; 
							$ok=1; 
							$picture_size = $_FILES['picture']['size']; 
							$picture_type=$_FILES['picture']['type']; 
							//This is our size condition 
							if ($picture_size > 5000000) 
							   { 
							   echo(' <div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											Your file is too large.
									  </div>'); 
							   $ok=0; 
							   } 

							//This is our limit file type condition 
							if ($picture_type =="text/php") 
							{ 
								echo "No PHP files<br>"; 
								$ok=0; 
							} 

							//Here we check that $ok was not set to 0 by an error 
							if ($ok==0) 
							{ 
								echo(' <div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											Sorry your file was not uploaded
										</div>');
							} 

							//If everything is ok we try to upload it 
							else 
							{ 
								if(move_uploaded_file($_FILES['picture']['tmp_name'], $target)) 
								{ 
									//echo "The file ". basename( $_FILES['picture']['name']). " has been uploaded <br/>"; 
								} 
											else 
											{ 
												echo(' <div class="alert alert-error">
															<button type="button" class="close" data-dismiss="alert">×</button>
															Sorry, there was a problem uploading your file!
														</div>'); 
											} 
										} 
									} 
						
						$_POST['picture'] = $target;
						
						// u skriveni div prosledjujem informaciju o putanji slike koja ce se upisivati u bazu
						echo '<div id="infoslika" style="display: none;">'.$_POST['picture'].'</div>';
						
						
						echo('  <div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									Successfully uploaded your picture to server!
								</div>');
				
		  
					}
					else{
						echo('  <div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert">×</button>
									Please upload car image first!
								</div>');
					}   

					?>
		
		<div class="search-well">
				<!--<table 	style=" width: 65%;" cellpadding="10">
					<tr>
					<th>-->

					
                <form id="form2" style="width: 50%; padding-left: 20px; padding-right: 20px" method="post">
				
                    <input class="input-xlarge form-control" placeholder="Chassis number" id="chassis" type="text" pattern="(\w|\d){15}" title="Please enter chassis number e.g. 58x7K68k44629pD" name="chassis_number" required> <br/>
					<input class="input-xlarge form-control" placeholder="Manufracturer" id="buy" type="text" name="manufracturer" required> <br/>
					<input class="input-xlarge form-control" placeholder="Model" id="rent" type="text" name="model" required> <br/>
					<input class="input-xlarge form-control" placeholder="Category" id="rent" type="text" name="category" required> <br/>
					<input class="input-xlarge form-control" placeholder="Door number" id="rent" type="text" pattern="\d+" title="Please enter door number! Examle 5" name="door_num" required> <br/>
					<input class="input-xlarge form-control" placeholder="Fuel type" id="rent" type="text"  name="fuel_type" required> <br/>
					<input class="input-xlarge form-control" placeholder="Gear type" id="rent" type="text"  name="gear_type" required> <br/>
					<input class="input-xlarge form-control" placeholder="Year built" id="rent" type="text" pattern="\d{4}" title="Please enter year! Examle 2014" name="year_built" required> <br/>
					<input class="input-xlarge form-control" placeholder="Engine number" id="rent" type="text" pattern="(\w|\d){15}" title="Please enter engine number e.g. 589us049235n596" name="engine_number" required> <br/>
					<!--</th>
					<th> -->
					<input class="input-xlarge form-control" placeholder="Color" id="rent" type="text" pattern="\w+" title="Please enter car color e.g. black" name="color" required> <br/>
					<input class="input-xlarge form-control" placeholder="Rent price" id="rent" type="text" pattern="\d+" title="Please enter price! Examle 33" name="rent_price" required> <br/>
					<input class="input-xlarge form-control" placeholder="Buy price" id="rent" type="text" pattern="\d+" title="Please enter price! Examle 8500" name="buy_price" required> <br/>
					<input class="input-xlarge form-control" placeholder="Capacity" id="rent" type="text" pattern="\d{4} ccm" title="Please enter price! Examle 1900 ccm" name="capacity" required> <br/>
					<input class="input-xlarge form-control" placeholder="Registration plate" id="rent" type="text" pattern="[A-Z]{2}-\d{3}-[A-Z]{2}" title="Please enter registration plate! Examle BG-123-XY" name="registration_plate" required>  <br/>
					<input class="input-xlarge form-control" placeholder="First registration date yyyy-mm-dd" id="rent" type="text" pattern="^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])" title="Please enter first registration date. format yyyy-mm-dd" name="first_registration" required> <br/>
					<input class="input-xlarge form-control" placeholder="Milage" id="rent" type="text" pattern="\d+" title="Please enter Milage. e.g. 500" name="milage" required> <br/>
					<input class="input-xlarge form-control" placeholder="Accessories" id="rent" type="text" name="accessories"> <br/>
					<button class="btn btn-default" id="r10" type="submit" style="visibility: hidden;" name="submit"> Enter new vehicle </button>
					<!--<br/><br/>
					</th>
					</tr>
				</table>-->
                    
					<br/><br/><br/>
                </form>
				<button class="btn btn-default" id="update_form" type="submit" name="submit_forma2"> Enter new vehicle</button>
				<br/>
            </div>
			
			<?php
			
			if(isset($_POST['submit']))
			   echo '<div id="dalije" style="visibility: hidden; display: none;">jeste</div>';

			?>
			
			<div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel">Delete Confirmation</h3>
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
						<button class="btn btn-danger" data-dismiss="modal">Delete</button>
					</div>
				  </div>
				</div>
			</div>


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
	
	
	<script src="../js/jquery.h5validate.js"></script>
	
	<script>
	$(document).ready(function () {
		$('form').h5Validate();
		});
	</script> 
    
  
</body></html>
