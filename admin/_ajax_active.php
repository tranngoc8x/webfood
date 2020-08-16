<?php
ob_start();
session_start();
require_once("../mysql.php");
require_once("../function.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$tbl=$_REQUEST["tbl"];
$fld=$_REQUEST["fld"];
$fldid=$_REQUEST["fldid"];
$uid=$_REQUEST["uid"];
$val=$_REQUEST["val"];
$mod=$_REQUEST['mod'];
if($mod){
	switch($mod){
		case 'product' : 		$tbl='food';			$fld = 'F_Flag';		$fldid='F_ID';			break;
		case 'catalog' : 		$tbl='food_type'; 		$fld = 'FD_Flag';		$fldid='FD_ID';			break;
		case 'other-infor' : 	$tbl='infor'; 			$fld = 'Infor_Flag';	$fldid='Infor_ID';		break;
		case 'contact' : 		$tbl='contact'; 		$fld = 'Contact_Flag';	$fldid='Contact_ID';	break;
		case 'user' : 			$tbl='user'; 			$fld = 'U_Flag';		$fldid='U_ID';			break;
		default : break;
	}
}
echo $sql="UPDATE $tbl set $fld='$val' where $fldid='$uid'";
mysql_query($sql);
 ?>