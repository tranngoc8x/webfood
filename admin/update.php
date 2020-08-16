 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?php 
 	require_once("../mysql.php");
	require_once("../function.php");  
	$tbl=$_REQUEST["tbl"];
	$fldid=$_REQUEST["fldid"];
	$fldup=$_REQUEST["fldup"];
	$re=$_REQUEST["re"];	
	$re=str_replace("-ask-","?",$re);
	$re=str_replace("-as-","=",$re);
	$re=str_replace("-and-","&",$re);
	$val=$_REQUEST["val"];
	$cont=$_REQUEST["cont"];
	$val=str_replace(",","','",$val);
	$sql="UPDATE $tbl SET $fldup = '$cont' WHERE $fldid in ('".$val."')";
	$sql=str_replace("''","'0'",$sql);
	mysql_query($sql);
	redirect($re,"Cập nhật thành công!","0");
?>
 