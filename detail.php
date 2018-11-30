//detail
<?php
ob_start();
session_start();
require 'database.php';//connect to database
if(time()>$_SESSION['cart_start']+60*60*1000)
	unset($_SESSION['cart']);
header("Cache-Control: no-cache, must-revalidate");	//We shouldn’t permit the cashing of our pages
header("Expires: Thu, 31 May 1984 04:35:00 GMT");	
$prod_id=$_GET['prod_id'];
?>
<html>
	<head>
		<title>my e commerce web site</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
            <center> <img class ="logoImg" src="img/logo.jpg" width="200px" height="200px"> </center>
		 <br>
		<div id="container">
			<div id="header">
				<?php
					if($_SESSION['user_id'])
						{
							echo "<a href='logout.php'>log out</a><br>";
						}
						else
						{
							echo "<a href='register.php'>Register</a> or <a href='login.php'>log in</a><br>";
						}
				?>
				<div id=cart>
					<a href="viewcart.php"><img src="images/nb-vcO.gif"></a>
					<?php
						if($_SESSION['cart'])
						{
							$count=count($_SESSION['cart']);
							echo "$count item Total: ";
							$total=0;
							foreach($_SESSION['cart'] as $k=>$v)
							{
								$q=mysql_query("select * from prod where prod_id=$k");
								$r=mysql_fetch_assoc($q);
								$tot_cost_single_prod=$r['price']*$v;
								$total+=$tot_cost_single_prod;
							}
							$shipping=20;	//or any calculation
							$total+=$shipping;
							echo "$total \$";
						}
						else
							echo "Total: 0.0";
							
					?>
				</div>
				
			</div>
			<br clear=both>
			<div id="content">
				<?php $q=mysql_query("select * from prod where prod_id='$prod_id'");
				$r=mysql_fetch_assoc($q);
				if($q)
					{
						$prod_id=$r['prod_id'];
						$img=$r['img'];
						$name=$r['name'];
						$price=$r['price'];
						$offer_price=$r['offer_price'];
						$description=$r['description'];
						echo "<div style='width:280px;height:300px;text-align:center;float:left;margin-left:5px;'>
							<img src='$img'><br>$name<br>$description<br>";
						if($offer_price)
						{
							echo "<span  class='surprise'>Surprise it costs $offer_price \$ instead of $price \$</span>";
						}
						else
							echo "$price \$";
						echo "</div>";

					}
				?>


				
				<br clear=left><br>
				<a href="index.php" style="width:160px;height:50px;padding:4 20px;border-radius:8px;text-decoration:none;background-color:#ad58b8;text-align:center;">Continue Shopping</a>	
				<a href="viewcart.php" style="width:160px;height:50px;padding:4 20px;border-radius:8px;text-decoration:none;background-color:#ad58b8;text-align:center;">View Cart</a>	
			</div>
		</div>
	</body>
</html>	
<?php ob_flush();?>
