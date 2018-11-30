//search
<?php
session_start();
require 'database.php';//connect to database
if(time()>$_SESSION['cart_start']+60*60*1000)	//The cart information should be deleted after 1 hour.
	unset($_SESSION['cart']);
header("Cache-Control: no-cache, must-revalidate");	//We shouldn’t permit the cashing of our pages
header("Expires: Sat, 1 Jan 2019 08:35:00 GMT");
$key=htmlentities($_GET['key']);
$key=strtr($key,array("'"=>"\'","_" => "\_", "%" => "\%"));	//security
$q="select * from products where name like ?";
$rows= $db->getRows($q,$key);
if($rows>0)
{
	echo "<table border=3><tr><th>name</th><th>img</th><th>price</th>
	<th>offer_price</th><th>sales</th><th>description</th><th>origin</th><th></th></tr>";
	foreach($rows as $row)
	{
		echo "<tr><td>$row[name]</td><td><img src='$row[img]' style='width:150px;height:150px;'></td><td>$row[price]</td>
		<td>$row[offer_price]</td><td>$row[sales]</td><td>$row[description]</td><td>$row[origin]</td>
		<td><a href='addtocart.php?prod_id=$r[prod_id]'>add to cart</a></td></tr>";
	}
	echo "</table>";
}
else
	echo "no results found<br>";
?>
<a href="index.php" style="width:160px;height:50px;padding:4 20px;border-radius:8px;text-decoration:none;background-color:#ad58b8;text-align:center;">go to home page</a>	
				
