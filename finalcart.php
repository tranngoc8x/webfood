<?php
ob_start();
session_start();
require"mysql.php";
$sql="select * from User where U_ID='".$_SESSION['user']."'";
$row=mysql_fetch_array(mysql_query($sql));
if(isset($_POST['process']))
{
	if($_POST['address2']==NULL)
	{
		$address=$_POST['address'];
	}
	else
	{
		$address=$_POST['address2'];
	}
	$bdate=date("Y-m-j");
	$sql = "INSERT INTO bill (`U_ID`, `B_Date`, `B_Address`,`B_Flag`) VALUES ('".$_SESSION['user']."','".$bdate."','".$address."','0');";
	mysql_query($sql);
	$bid=mysql_insert_id();
	foreach($_SESSION['cart'] as $key=>$value)
	{
		$item[]=$key;
	}
	$str=implode(",",$item);
	$sqlx="select * from Food where F_ID in ($str)";
	$resultx=mysql_query($sqlx);
	while($rowx=mysql_fetch_array($resultx))
		{

				$fid=$rowx['F_ID'];
				$price=$rowx['F_Price'];
				$quantity=$_SESSION['cart'][$rowx['F_ID']];
				$sqlx="INSERT INTO detail_bill (`B_ID`,`F_ID`, `BD_Price`, `BD_quantity`) VALUES ('".$bid."','".$fid."','".$price."','".$quantity."');";
				mysql_query($sqlx);
		}
	unset ($_SESSION['cart']);
	header("Location:index.php");
}

?>