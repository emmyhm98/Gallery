<!DOCTYPE html>
</html>
   <head>
       <title> Gallery Website | Handmade Products </title>
	    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	   <link rel="stylesheet" href="css/style.css">
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	   <!---fonts--->
	   <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	   <link href='https://fonts.googleapis.com/css?family=Baloo Bhaina' rel='stylesheet'>
	   <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	   <link href='https://fonts.googleapis.com/css?family=Eagle Lake' rel='stylesheet'>
	   <!---fonts--->

	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  <!-- to include jquery --->
	   <script src="js/script.js"></script>
	   <script src="js/jquery.flexslider.js"></script>
	   <script type="text/javascript" charset="utf-8">
		  $(window).load(function() {
			$('.flexslider').flexslider({
				touch: true,
				pauseOnAction: false,
				pauseOnHover: false,
			});
		  });
	   </script>
   </head>
   <body>
         <img class ="logoImg" src="img/logo.jpg" width="200px" height="200px">
		 <br>
		 
        <header>
           <center>
		     <div class="container">

				  <nav>  				  <!-- navigation bar menu in the header -->
					  <ul>
					  <center>
						 <li><a href="#"> Home  </a>&nbsp;|</li>
						 <li><a href="shop.php"> Shop </a>&nbsp;|</li>
						 <li><a href="login.php"> Login</a>&nbsp;	|</li>
						 <li><a href="#aboutInfo"> About</a>&nbsp;|</li>
						 <li><a href="#contactInfo"> Conatct Us</a>&nbsp;</li>
						 
						 </center>
					 </ul>
				 </nav>
				 
			 </div>
			</center> 
		</header>
		
		 <section class="tagline">
				<h1>Welcome To Gallery Website <h1>      
		 </section>
		
		<!-- Slideshow container -->
		<center>
		<div class="flexslider">
		  <ul class="slides">
			<li>
			  <img src="img/reWalls.com-60424о.jpg" height="650px"/>
			</li>
			<li>
			  <img src= "img/wool.jpg" height="650px" />
			</li>
			<li>
			  <img src="img/news-02.jpg" height="650px" />
			</li>
			<li>
			  <img src="img/gift-wrapping-ideas-pink-white-and-gold-wrapping-idea-cool-gift-wrapping-ideas-for-birthdays.jpg"  height="650px"/>
			</li>
		  </ul>
		</div>
		</center>

		<section >
		   <div id="aboutInfo" class="tagline"> <h1>Who We Are? <h1> </div><br>
		   <img id="aboutimg" src="img/22554782-origpic-d26291.jpg" height="600px" width="600px"align="Gallery Image">
		   <p id="aboutparag">Gallery Website aims to promote enthusiasm about contemporary Egyptian craft and the artists we proudly represent.The handmade works of art in our gallery should be something you would find useful or be proud to give.You could spend hours exploring this treasure trove of unique pieces. Can’t find what you are looking for? Well feel free to contact us anytime and we will try and find one of artists who will tailor to your very needs. Customers can be guaranteed that they are buying Egyptian, handmade products and supporting Egyptian artists.  Whether it is a personalized gift for a loved one, for the home, or for yourself.<br> <i>The Artists' Gallery is bound to inspire you.<i><br>
		   <span style="color:#C71585;"><b><u><i>Our goal is simple:</u></span><span style="color:darkturquoise;"> to put handcrafted art in your hands.</span></i></b> </p>

		</section><br>

		<footer class="footer-distributed">

			<div class="footer-left">

				<h3>Handmade<span>Gallery</span></h3>

				
				<p class="footer-company-name"><p style="font-family: 'Baloo Bhaina';">  Gallery Copyright &copy; 2018, All Rights Reserved </p> </p>
			</div>

			<div class="footer-center">

				
				<div>
					<i class="fa fa-phone"></i>
					<p id="contactInfo" >+2 02096547</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p ><a href="mailto:support@company.com">info@galleryco.com</a></p>
				</div>
				
			</div>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>
				

			</div>

		  
		</footer>
   </body>
</html>
