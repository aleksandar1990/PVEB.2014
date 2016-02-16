
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
    <title>Update pricelist</title>
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
		  url: '../DBManager/listCarPriceJSON.php',    		        
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
			$("tbody").append(row); 
			row.append($("<td>" + rowData.BR_sasije + "</td>"));
			row.append($("<td>" + rowData.Proizvodjac + "</td>"));
			row.append($("<td>" + rowData.Model + "</td>"));
			row.append($("<td>" + rowData.Godiste + "</td>"));
			row.append($("<td>" + rowData.Cena_kupovine + "</td>"));
			row.append($("<td>" + rowData.Cena_iznajmljivanja + "</td>"));
		}

	  setTimeout(loadajax, 1000);
	  
	  
	  
	  </script>
	  

    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">
	<!--<script src="contact_form.js"></script>--> <!-- sredio sam elegantinije koristeci pogodnosti HTML5 -->
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
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span>  <?php					
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
    </ul></li>



	<li><a href="users.php" class="nav-header"><i class="fa fa-fw fa-briefcase"></i> User accounts</a></li>

        <li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Database<i class="fa fa-collapse"></i></a></li>
        <li><ul class="legal-menu nav nav-list collapse">
            <li class="active"><a href="updateprice.php"><span class="fa fa-caret-right"></span> Update pricelist</a></li>
            
            <li ><a href="newvehicle.php"><span class="fa fa-caret-right"></span> Enter new vehicle</a></li>
            <li ><a href="transakcije.php"><span class="fa fa-caret-right"></span> Transactions</a></li>
    </ul></li>

        <li onclick="myFunction()"><a href="#" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Print</a></li>
            <li><a href="statistic.php" class="nav-header"><i class="fa fa-fw fa-comment"></i> Statistics</a></li>

    </div>
    
    <div class="content">
        <div class="header">
            
            <h1 class="page-title">Update pricelist</h1>
                    <ul class="breadcrumb">
            <li><a href="index.html">Home</a> </li>
            <li class="active">Update pricelist</li>
        </ul>

        </div>
        <div class="main-content">
		
		<div class="search-well">
				<p id="returnmessage"></p>
                <form class="form-inline" id="form" style="margin-top:0px;" method="post">
                    <input class="input-xlarge form-control" placeholder="Chassis number" id="chassis" type="text" name="chassis_number" pattern="(\w|\d){15}" title="Please enter chassis number e.g. 58x7K68k44629pD" required>
					<input class="input-xlarge form-control" placeholder="Buy price" id="buy" type="text" name="buy_price" type="text" pattern="\d+" title="Please enter price! Examle 33" required>
					<input class="input-xlarge form-control" placeholder="Rent price per day" id="rent" type="text" name="rent_price" type="text" pattern="\d+" title="Please enter price! Examle 33" required>
                    <button class="btn btn-default" type="submit" id="submit" name="submit"> Update</button>
                </form>
            </div>
			
			<div class="error">  </div>

			<?php
			
			$dbManager = DBManager::getInstance();
			
			
			   if(isset($_POST['submit']))
			   {
				  // proceduralni pristup sam koristio zbog poteskoca...
				  $link = mysqli_connect("localhost", "root", "", "rent_a_car_db");
				  if ($stmt = mysqli_prepare($link, "SELECT * FROM automobili WHERE BR_sasije=?")){
				  mysqli_stmt_bind_param($stmt,"s", $_POST['chassis_number']);
				   /* execute query */
					$stmt->execute();

					$stmt->store_result();

					if ($stmt->num_rows == 0)
					{
						echo(' <div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">×</button>
									Chassis number is not exists in database!
								 </div>');
					}
					else if (is_numeric($_POST['buy_price']) && is_numeric($_POST['rent_price']) )
					{
						echo(' <div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									You successfully update car price.
								 </div>');
								 
						$dbManager->updateCarPrice();
					}

					$stmt->close();
				  }
				  
				  
			   }
			?>
            

   <div class="tabela1" style="width: 100; padding-left: 5px; padding-right: 5px">
        <div class="panel panel-default">
            <div class="panel-heading no-collapse">Available Cars with prices</div>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
				  <th>Chassis number</th>
                  <th>Manufracturer</th>
                  <th>Model</th>
				  <th>Year built</th>
				  <th>Buy price</th>
				  <th>Rent price per day</th>
                </tr>
              </thead>
              <tbody id="rez">
				 
              </tbody>
            </table>
         </div>
    </div>


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
    
  
</body></html>
