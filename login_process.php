
<?php
ob_start();
session_start();
require 'database.php';//connect to database
if($_POST['h'])
{
	$user=htmlentities($_POST['user']);
	$pass=htmlentities($_POST['pass']);
	$q="select * from client where username=? and password=? limit 1";
        $rows= $db->getRow($q,array($user,$pass));
	if($rows>0)	//if($q->numRows()>0)
	{
	       	//$r=$q->fetchRow();
		$_SESSION['user_id']=$r['cust_id'];
		echo "<h2 style='text-align:center;color:green'>Welcome $user<br>you will be redirected after 3 seconds</h2>";
		header("Refresh:3;url=index.php");
	}
	else
	{
		echo "<h2 style='text-align:center;color:red'>invalid username or password <br>you will be redirected after 3 seconds</h2>";
		header("Refresh:3;url=login.php");
	}
}
ob_flush();	
?>
