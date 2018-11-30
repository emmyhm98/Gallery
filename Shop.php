
<?php
session_start();
require 'database.php';//connect to database
if(time()>$_SESSION['cart_start']+60*60*1000)	//The cart information should be deleted after 1 hour.
	unset($_SESSION['cart']);
header("Cache-Control: no-cache, must-revalidate");	//We shouldn’t permit the cashing of our pages
header("Expires: Sat , 1 January 2018 08:35:00 GMT");
?>
<html>
	<head>
		<title>Shop Cart</title>
		<link rel="stylesheet" href="css/cart.css">


	</head>
	<body>
              <center> <img class ="logoImg" src="img/logo.jpg" width="200px" height="200px"> </center>
		 <br>
		<div id="container">
			<div id="header" style="font-size:40px;">
				<?php
					if($_SESSION['user_id'])
						{
							echo "<a href='logout.php'>Log Out</a><br>";
						}
						else
						{
							echo "<a href='register.php' '>Register</a> or <a href='login.php'>Log in</a><br>";
						}
				?>
				<div id="cart" style="float:left">
					<a href="viewcart.php" ><img src="img/icon-shopping-1.png"  width="70px" height="70px"></a>
					<?php
						if($_SESSION['cart'])
						{
							$count=count($_SESSION['cart']);
							echo "$count item Total: ";
							$total=0;
							foreach($_SESSION['cart'] as $k=>$v)
							{
								$q="select * from products where prod_id=$k";
								$r=$db->getRows($q,array());
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
				      <center>	<a href="index.php" style="width:190px;height:18px;padding:4 20px;float:center-left;border-radius:8px;text-decoration:none;font-size:25px;background-color:#C71585;color:white;text-align:center;">Continue Shopping</a>
                                          <br>
				</div>
				
			</div>
			<br clear=both>
			<form method=get action="search.php">
				<input type="text" size="60px" name="key" placeholder="Search for...">
			 	&nbsp;&nbsp;&nbsp;<input type="submit" value="Search" style="width:120px;height:40px;padding:3px 18px;background-color:green;font-size:18px;color:white;line-height:10px;">
			 </center></form>
			<div id="content">

				<div id=con1>
					<div id="gallery" style=" float:left">
						<?php
                                                        $q=$db->getRows("select * from prod order by sales desc limit 1");	//$q=$con->query("select * from products order by sales desc limit 1");
                                                        echo"<ul>";
                                                        if($q)
							{
								$r=mysql_fetch_assoc($q);	//$r=$q->fetchRow();
								$prod_id=$r['prod_id'];
								$img=$r['img'];
								$name=$r['name'];
								$price=$r['price'];
								$offer_price=$r['offer_price'];
								$description=$r['description'];
								echo "<li><img src='$img' style='float:left'></li><br>$name<br>";
								if($offer_price)
								{
									echo "<del><span  class='price'>$price \$</span></del><span  class='offer_price'> $offer_price \$</span>";
								}
								echo "<br>$description<br><a class='order_now' href='addtocart.php?prod_id=$prod_id'>Order Now</a>";
							}
                                                        echo"</ul>";
						?>

				<?php
					$qc=$db->getRows("select * from categories");
					if($qc)
					{
						while($rc=mysql_fetch_assoc($qc))
						{
							$cat_id=$rc['cat_id'];
							$cat_name=$rc['name'];
							$qp=$db->getRows("select * from products where cat_id=$cat_id order by prod_id desc limit 1");
							if($qp)
							{
								$rp=mysql_fetch_assoc($qp);	
								$img=$rp['img'];
								$name=$rp['name'];
								$price=$rp['price'];
								$offer_price=$rp['offer_price'];
								$description=$rp['description'];
								echo "<div class='product'>
									<h3>$cat_name</h3>
									<img src='$img'><br>$name<br>$description<br>";
								if($offer_price)
								{
									echo "from <del><span  class='price'>$price \$</span></del> <span  class='offer_price'>$offer_price \$</span>";
								}
								else
									echo "<span  class='price'>$price \$</span>";
								echo "<br><a class='order_now' href='addtocart.php?prod_id=$rp[prod_id]'>Order Now</a></div>";
							}
						}

					}
				?>
				<br clear=left>
				<?php
					$q="select * from products order by prod_id ";	//latest 3 products
                                        $rows=$db->getRows($q,array());
					if($q)
					{
                                                foreach($rows as $row)
	                                        {

							$prod_id=$row['prod_id'];
							$img=$row['img'];
							$name=$row['name'];
							$price=$row['price'];
							$offer_price=$row['offer_price'];
							$description=$row['description'];
							echo "<div  class='product2'>
								<img id='gallery' src='$img'><br>$name<br>$description";
							if($offer_price)
							{
								echo "from <del><span  class='price'>$price \$</span></del> <span  class='offer_price'>$offer_price \$</span>";
							}
							else
								echo "<span  class='price'>$price \$</span>";
							echo "<br><a class='order_now' href='addtocart.php?prod_id=$prod_id'>Order Now</a></div>";
						}
					}
				?>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>	
