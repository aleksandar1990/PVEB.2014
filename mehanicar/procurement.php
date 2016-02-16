<?php
session_start();
if(!isset($_SESSION['id'])) {
	header('Location: sessionexpirederror.html');
	
	die();
}

if(!isset($_SESSION['identity']) || $_SESSION['identity'] != 'meh') {
	header('Location: permissionerror.php');
	
	die();
}
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Procurement</title>
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
    <link rel="stylesheet" type="text/css" href="stylesheets/forme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">
</head>
<body class=" theme-5">

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
    <script language="javascript" type="text/javascript">
       // window.setInterval("loadajax()", 5100);  
  
	  function loadajax(){
              $("#rez").html("");
		$('#rez').show(1050).delay(3000).hide(1050);
		$.ajax({  
		  type: "GET",
		  url: '../DBManager/listNabavkaJSON.php',    		        
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
			row.append($("<td>" + rowData.ID_nabavke + "</td>"));
			row.append($("<td>" + rowData.Ime + "</td>"));
			row.append($("<td>" + rowData.Prezime + "</td>"));
			row.append($("<td>" + rowData.nabavka + "</td>"));
			row.append($("<td>" + rowData.datum_nabavke + "</td>"));
		}

	  setTimeout(loadajax, 1000);
	  
	  
	  
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
            <li ><a href="return.php"><span class="fa fa-caret-right"></span>Returning the car</a></li>
         
    </ul></li>

       <li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Cars<i class="fa fa-collapse"></i></a></li>
        <li><ul class="legal-menu nav nav-list collapse">
            <li ><a href="malfunction.php"><span class="fa fa-caret-right"></span> Malfunction Report</a></li>            
            <li ><a href="repear.php"><span class="fa fa-caret-right"></span>Car repair</a></li>
            
            <li ><a href="oil.php"><span class="fa fa-caret-right"></span> Oil change</a></li>
            <li class="active"><a href="procurement.php"><span class="fa fa-caret-right"></span> Procurement</a></li>
    </ul></li>

        <li onclick="myFunction()"><a href="#" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Print</a></li>
            <li><a href="statistic.php" class="nav-header"><i class="fa fa-fw fa-comment"></i> Statistics</a></li>

    </div>

    <div class="content">
      <div class="main-content">
	  
<?php
			
			$dbManager = DBManager::getInstance();
			
			
			   if(isset($_POST['submit']))
			   {
				  $dbManager->listNabavkaInsert();
                                 echo(' <div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									New procurenment is in database!
								 </div>');
					
			   }
  
	?>
   <div class="panel panel-default">
        <a href="#page-stats" class="panel-heading" data-toggle="collapse">Procurement</a>
        <div id="page-stats" class="panel-collapse panel-body collapse in">
      <div id="form-main">
  <div id="form-div">
    <form class="form" id="form1" method="post" >
      
      
      <!-- input ID_prijavio korisnika iz baze koji je ulogovan-->
      <p class="text" >
        <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>" readonly="readonly">
      </p>
      <p class="text">
        <textarea name="nabavka" type="text" class="validate[required,length[6,500]] feedback-input" id="name" placeholder="Need to buy" required></textarea>
      </p>
      
     
     
      
      <div class="submit">
        <input type="submit" name="submit" value="Sent procurement required" id="button-blue"/>
        <div class="ease"></div>
      </div>
    </form>
  </div>
 
          
      </div>
        </div>
    </div>

<div class="row">
   <div class="tabela1" style="width: 100; padding-left: 15px; padding-right: 15px">
        <div class="panel panel-default">
            <div class="panel-heading no-collapse">Need to buy</div>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Last name</th>
				  <th>procurement</th>
				  <th>date</th>
				  
                </tr>
              </thead>
             <tbody id="rez">
              </tbody>
            </table>
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
