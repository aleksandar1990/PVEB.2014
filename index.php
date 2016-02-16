<!DOCTYPE HTML>
<html>
	<head>
		<title>Rent a Car</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Projekat iz Programiranja za web" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.onvisible.min.js"></script>
		<script src="js/skel.min.js"></script>
                <script type="text/javascript" src="highslide/highslide_login.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
                        <link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
                
<link rel="stylesheet" type="text/css" href="highslide/highslide_login.css" />
<link rel="stylesheet" href="css/login.css" />
<link rel="stylesheet" href="css/register.css"/>
<script type="text/javascript">
	hs.showCredits = 0;
    hs.graphicsDir = 'highslide/graphics/';
    //hs.outlineType = 'rounded-white';
	hs.align = 'center';
	hs.dimmingOpacity = .75;
	
</script>
	</head>
	<body class="homepage">

		<!-- Header -->
			<div id="header">
						
				<!-- Inner -->
					<div class="inner">
						<header>
							<h1><a href="index.html" id="logo">Welcome</a></h1>
							<hr />
							<p>Rent a car</p>
						</header>
						<footer>
							<a href="#" class="button circled scrolly" onclick="return hs.htmlExpand(this, { contentId: 'highslide-html' } )"
		>Log in</a>
                                                        <a href="#registration" class="button circled scrolly">Register</a>
						</footer>
					</div>
<div class="highslide-html-content" id="highslide-html">
	<div class="highslide-header">
		<ul>
			<li class="highslide-move">
				<a href="#" onclick="return false">Move</a>
			</li>
			<li class="highslide-close">
				<a href="#" onclick="return hs.close(this)">Close</a>
			</li>
		</ul>
	</div>
	<div class="highslide-body">
          
            <form action="redirect.php" class="login" method="POST">
    <h1>Rent a Car PZW</h1>
    <h1>E-mail</h1>
    <input type="email" name="email" class="login-input" placeholder="Email Address" autofocus>
    <h1>Password</h1>
    <input type="password" name="password" class="login-input" placeholder="Password">
    
    <input type="submit" value="Login" class="login-submit">
    
    <p class="login-help"><a href="RecoverPwd.html">Forgot password?</a></p>
    
  </form>


	</div>


</div> 
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.php" class="menu_gore">Home</a></li>
							<li>
								<a href="">Menu</a>
								<ul>
									<li><a href="#welcome_page">Welcome page</a></li>
									<li><a href="#cars">Cars</a></li>
									<li><a href="#registration">Registration</a></li>
									<li><a href="#contact">Contact</a></li>
								</ul>
							</li>
							
						</ul>
					</nav>

			</div>
			
		<!-- Welcome_page -->
			<section id="welcome_page">
				<header>
					<h2>Welcome to <strong>PZW</strong> rent a car.</h2>
					<p>
                                            Welcome to <strong>PZW</strong> car rentals! <br/>
                                            <strong>PZW</strong> Serbia is one of the leading global vehicle rental and hire agencies and extends the 
                                                first class car rental in<br/> Belgrade Serbia service that customers have come to expect to the Internet, where you can 
                                                rent a car, SUV, minivan, sports car, limousine or whatever kind of vehicle you desire from the comfort of your own 
                                                home.<br/> Whether you need a car or a truck, <strong>PZW</strong> Rent a car Serbia is there to support your mobility needs, whatever <br/>they
                                                may be, on the internet as well as via phone.
                                        </p>
				</header>
			</section>

		<!-- Carousel -->
                <section class="carousel" id="cars">
                    <h1>When you book a vehicle in the <strong>PZW</strong>, expect some of the latest models of global brands of proven performance at the best prices!<br/><br/>Some of the cars are: <br/></h1>

			<div class="reel">
                                    
					<article>
						<a href="#" class="image featured"><img src="images/honda.jpg" alt="" /></a>
						<header>
							<h3><a href="#">HONDA ACCORD AUTOMATIC</a></h3>
						</header>
                                                <p>Vehicle Type: 4-5 door <br/> Fuel: petrol 
                                                    <br/>Capacity: 1997 ccm <br/>
                                                    Drive: automatic</p>							
					</article>
				
					<article>
						<a href="#" class="image featured"><img src="images/accord.jpg" alt="" /></a>
						<header>
							<h3><a href="#">HONDA ACCORD 2.0</a></h3>
						</header>
						<p>Vehicle Type: 4-5 door <br/> Fuel: petrol 
                                                    <br/>Capacity: 2000 ccm <br/>
                                                    Drive: manual 5 speed</p>							
					</article>
				
					<article>
						<a href="#" class="image featured"><img src="images/ibica.jpg" alt="" /></a>
						<header>
							<h3><a href="#">SEAT IBIZA</a></h3>
						</header>
						<p>Vehicle Type: 4-5 door <br/> Fuel: unspecified 
                                                    <br/>Capacity: 1395 ccm <br/>
                                                    Drive: manual 5 speed</p>							
					</article>
				
					<article>
						<a href="#" class="image featured"><img src="images/polo.jpg" alt="" /></a>
						<header>
							<h3><a href="#">VW POLO 1.4 TDI</a></h3>
						</header>
						<p>Vehicle Type: 4-5 door <br/> Fuel: petrol 
                                                    <br/>Capacity: 1396 ccm <br/>
                                                    Drive: automatic</p>							
					</article>
				
					<article>
						<a href="#" class="image featured"><img src="images/cr-v.jpg" alt="" /></a>
						<header>
							<h3><a href="#">HONDA CR-V 2.0 AUTOMATIC</a></h3>
						</header>
						<p>Vhicle Type: SUV <br/> Fuel: petrol 
                                                    <br/>Capacity: 1995 ccm <br/>
                                                    Drive: automatic</p>							
					</article>

					<article>
						<a href="#" class="image featured"><img src="images/landcruiser.jpg" alt="" /></a>
						<header>
							<h3><a href="#">TOYOTA LANDCRUISER</a></h3>
						</header>
						<p>Vhicle Type: SUV <br/> Fuel: petrol 
                                                    <br/>Capacity: 2995 ccm <br/>
                                                    Drive: automatic</p>							
					</article>
				
					

				</div>
			</section>
			
		<!-- Main -->
			<div class="registration" id="registration">
				<article id="main" class="container special">
				    <header>
						<h2><a href="#">Registration form</a></h2>
						<p>
                                                    Please fill in the fields that are listed below.
							</p>
					</header>
                                    <div class="form">
<form action="registration/register.php" id="contactform" method="POST">
    <p class="contact"><label for="name">First name</label></p>
    <input id="name" name="fname" placeholder="First name" required="" tabindex="1" type="text">
    
    <p class="contact"><label for="last_name">Last name</label></p> 
    <input id="last_name" name="lname" placeholder="Last name" required="" tabindex="1" type="text">
    
    <p class="contact"><label for="Adresa">Address</label></p> 
    <input id="last_name" name="address" placeholder="Your address" required="" tabindex="1" type="text">
    
    <p class="contact"><label for="telefon">Phone</label></p> 
    <input id="last_name" name="phone" placeholder="Your phone number" required="" tabindex="1" type="text">
    
    <p class="contact"><label for="licna">Identification number of the personal id card</label></p> 
    <input id="last_name" name="card_id" placeholder="Your ID of the id card" required="" tabindex="1" type="text">
    
    <p class="contact"><label for="pasos">Passport id</label></p> 
    <input id="last_name" name="passport_id" placeholder="Your ID of the passport" required="" tabindex="1" type="text">
    
    <p class="contact"><label for="email">Email</label></p> 
    <input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 
                
    <p class="contact"><label for="username">Create a username</label></p> 
    <input id="username" name="username" placeholder="username" required="" tabindex="2" type="text"> 
    			 
    <p class="contact"><label for="password">Create a password</label></p> 
    <input type="password" id="password" name="password" required=""> 
    
    <p class="contact"><label for="ssn">Social security number</label></p> 
    <input type="text" id="ssn" name="ssn" required=""> 
    
    <p class="contact"><label for="phone">Informations</label></p> 
  <textarea NAME="comments" COLS=20 ROWS=3></textarea>
   <input class="buttom" name="submit" id="submit" tabindex="5" value="Register me!" type="submit"> 	 
   </form> 
                                    </div>
                                   
					</article>

			</div>

		<!-- Features -->
			<div id="contact">
				
				<section id="features" class="container special">
					<header>
						<h2>Contact</h2>
						<p>PZW Rent A Car d.o.o.<br/>
                                                    Aerodrom '' Nikola Tesla", Terminal T2 Medjunarodni dolasci, Beograd, Srbija
                                                    <br/>Radno vreme: 09 - 21 h svakog dana<br/>
                                                    <strong>Telefon/ Fax: +381 11/43636 432<br/></strong>
                                                    <strong> Mobilni Telefon: +381 64 1436 435 </strong>
                                                </p>
					</header>
					<div class="row">
                                            <article>
                                                    <header>
                                                        <p>
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9829.38972748866!2d20.28909707094029!3d44.8192562822782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6893888e874b%3A0xafb8ad8c09b281e1!2sBelgrade+Nikola+Tesla+Airport!5e1!3m2!1sen!2srs!4v1417969217326" width="600" height="450" frameborder="0" style="border:0"></iframe>
                                                        
                                                        <img src="images/mapa.jpg" alt="Smapa" height="450" width="500">
                                                        </p>
                                                    </header>
                                                <header>
                                                    <form method="post"  action="#">
                        
                        <label for="author"><h3>Your Name:</h3></label> <input type="text" id="author" name="author" class="required input_field" />
                        <label for="email"><h3>Your Email:</h3></label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                        <label for="Subject"><h3>Subject:</h3></label> <input type="text" name="subject" id="subject" class="input_field" />
                        <label for="text"><h3>Message:</h3></label> <textarea id="text" name="text" rows="1" cols="1" class="required"></textarea>
                        <div class="cleaner h10"></div>
                        
                        <input type="submit" value="Sent" id="submit" name="submit" />
			<input type="reset" value="Reset" id="reset" name="reset"/>
                        
            	</form>
            </div> 
              
		<?php

 if(isset($_POST['submit'])){
    $receiverMail = "office@domen.rs";
    $name        = stripslashes(strip_tags($_POST['author']));
    $email        = stripslashes(strip_tags($_POST['email']));
    $subject    = stripslashes(strip_tags($_POST['subject']));
    $message       = stripslashes(strip_tags($_POST['text']));
    $ip            = $_SERVER['REMOTE_ADDR'];
    $msgformat    = "From: IP ($ip)\nName:$name\nEmail: $email\nMessage:\n$message";


    if(empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<h2><br/><br/><strong>Message not sent</h2></strong><h4><br/> <br/>Please fill out the entire form correctly</h4><FORM> 
</form>";
    }
    elseif(!ereg("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
        echo "<h2><br/><br/><strong>Message not sent</h2></strong><h4><br/> <br/>You did not enter your email address correctly</h4><FORM> 
</form>";
    }
    elseif(mail($receiverMail, $subject, $msgformat, "From: PZW REN-A-CAR $email")) {
        echo "<h2><br/><br/>Message sent!</h2><h4><br/><br/>Expect a reply soon.<FORM> 
		</form></h4>"; }
    else {
        echo "<h2>Message not sent.</h2><p>Please try again ... Certainly comes server problem.<FORM> 
</form></p>";
    }
}
else { }
?> 
                                                </header>
						</article>
											</div>
				</section>

			</div>

		<!-- Footer -->
			<div id="footer">

								<div class="copyright">
									<ul class="menu">
                                                                            
										<li>&copy; PZW 2015</li><li>Design: Matf team</li>
									</ul>
								</div>
						</div>
	</body>
</html>