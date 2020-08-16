 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?php 
 	require_once("../mysql.php");
	require_once("../function.php");  
	$tbl=$_REQUEST["tbl"];
	$fldid=$_REQUEST["fldid"];
	$re=$_REQUEST["re"];
	$re=str_replace("-ask-","?",$re);
	$re=str_replace("-as-","=",$re);
	$re=str_replace("-and-","&",$re);
	$val=$_REQUEST["val"];
	if($tbl=='food_type'){
		$arr=explode(',',$val);
		foreach($arr as $n){
			$a=getdata("select count(*) from food where FD_ID = '$n'");	
			if($a>0){
				redirect($re, "<br><br><p align='centr'>Bạn không thể xóa mục này vì nó còn chứa các mục con.Hãy xóa hoặc chuyển mục con đi trước khi xóa mục này!</p>","3");	
			}
		}
	}
	$val=str_replace(",","','",$val);
	if($tbl=='bill'){
		mysql_query("DELETE FROM detail_bill where B_ID in ('".$val."')");
	}
	$sql="DELETE FROM $tbl WHERE $fldid in ('".$val."')";
	$sql=str_replace("''","'0'",$sql);
	mysql_query($sql);
	redirect($re,"Xóa thành công!","0");
?>
 