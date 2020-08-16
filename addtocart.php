<?php
session_start();
session_register("cart");
$id=$_GET['item'];

	if(isset($_SESSION['cart'][$id]))
	{
	 $quantity = $_SESSION['cart'][$id] + 1;
	}
	else
	{
	 $quantity=1;
	}
	$_SESSION['cart'][$id]=$quantity;
if(!isset($_GET['back']))
{
	header("Location:index.php");
}
else
{
	if($_GET['back']=="dish")
	{
		require"mysql.php";
		$sql="select FD_ID from Food where F_ID='".$id."'";
		$row=mysql_fetch_array(mysql_query($sql));
		header("Location:index.php?product=".$row['FD_ID']."&#dish");
	}
	if($_GET['back']=="all")
	{
		require"mysql.php";
		$sql="select FD_ID from Food where F_ID='".$id."'";
		$row=mysql_fetch_array(mysql_query($sql));
		header("Location:index.php?product=&#dish");
	}
}
ob_end_flush();
exit();
?>