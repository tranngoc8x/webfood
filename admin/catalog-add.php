<?php
ob_start();
session_start();
require_once("../mysql.php");
require_once("../function.php");
$user=$_SESSION['admin'];
//$mod=$_REQUEST['mod'];
if(!$user){
header("Location:login.php");
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator -::- SVF</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<link type="text/css" rel="stylesheet" href="css/jquery.selectBox.css">
<link rel="stylesheet" href="css/invoice.css" type="text/css" media="screen" />

<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<!--  select box -->
<script type="text/javascript" src="js/jquery.selectBox.js"></script>
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready( function() {$("SELECT").selectBox()});
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});


</script> 
</head>
<body>
  <?php 
		if(isset($_REQUEST['submit'])){
		$txtten = $_REQUEST['txtten'];	
		$status = $_REQUEST['status'];
		$sqlu = "INSERT INTO food_type (FD_Name,FD_Flag) VALUES ('$txtten', '$status')";
		mysql_query($sqlu);
		
		?>
        <script type="text/javascript">
			var conf=confirm("Đã thêm danh mục thành công.Bạn có muốn thêm danh mục khác không?");
			if(conf){
			}else{
				window.opener.location.reload();
				window.close();
			}
		</script>
        
        <?php
	}
?> 
<div style="height:100px; width:97%;border:1px solid #333; line-height:100px; background:#333 url(images/shared/nav/account_drop_bg.gif); margin:0 auto;">
	<img src="images/shared/logo.png" width="156" height="40" alt="" align="middle" style="padding:20px;" />
</div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="Table11">
      <tbody>
        <tr>
          <td width="12">&nbsp;</td>
          <td colspan="3" background="images/CM1_02.gif">&nbsp;</td>
          <td width="11">&nbsp;</td>
        </tr>
        <tr>
          <td width="12" height="30" background="images/CM1_08.gif">&nbsp;</td>
          <td width="784" height="30" align="center" bgcolor="#E2E2E2"><span class="Title_14_Red">Thêm danh mục sản phẩm</span></td>
          <td width="34" height="30" align="center" valign="middle" bgcolor="#E2E2E2">&nbsp;</td>
          <td width="46" align="center" valign="middle" bgcolor="#E2E2E2">&nbsp;</td>
          <td width="12" valign="top" background="images/CM1_06.gif">&nbsp;</td>
        </tr>
        <tr>
          <td width="12" height="100%" background="images/CM1_08.gif">&nbsp;</td>
          <td height="100%" colspan="3" align="center">
          <table class="antiintro" cellspacing="1" cellpadding="0" width="100%"  border="0" style="border:#CCCCCC 1px solid;">
            <form name="fupdate" id="frmform" class="frmform" onsubmit="return checkForm();" action="catalog-add.php" method="post" enctype="multipart/form-data">
              <tbody>
                <tr>
                  <td width="36%" height="10" class="Tile_12_black">&nbsp;</td>
                  <td width="64%" class="Tile_12_black">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black">&nbsp;Tên danh mục</td>
                  <td class="Tile_12_black"><input name="txtten" id="txtten" class="inp-form"/></td>
                </tr>
                <tr>
                  <td height="10" class="Tile_12_black" id="ai5">&nbsp;</td>
                  <td class="Text_12_black" id="ai5">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai2">&nbsp;Trạng thái</td>
                  <td class="Text_12_black" id="ai2"><select name="status">
                    <option value="1" selected="selected">Hiển thị</option>
                    <option value="0">Ẩn</option>
                  </select></td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai15">&nbsp;</td>
                  <td class="Text_12_black" id="ai15">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai3">&nbsp;</td>
                  <td class="Text_12_black" id="ai3">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" colspan="2" align="center" class="Tile_12_black" id="ai13">
                    <input type="submit" name="submit" class="submit-form-add" value="Thêm mới"  /> 
                  <input type="button" onclick="javascript:window.opener.location.reload();window.close();" name="button2" id="button2" class="cancel-form" value="Cancel" /></td>
                </tr>
                <tr>
                  <td height="21" colspan="2" align="center" class="Tile_12_black" id="ai4">&nbsp;</td>
                </tr>
              </tbody>
              </form>
            </table></td>
          <td width="12" valign="top" background="images/CM1_06.gif">&nbsp;
         
          </td>
        </tr>
        </tbody>
    </table>  
    <div id="footer">
	<!--  start footer-left -->
	<div id="footer-left">
	SVF © Copyright 2011. www.cơmvs.vn. All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
    <script>
	
	
function checkForm(){
	if (document.theForm.txtten.value==""){
		alert("Bạn chưa nhập tên sản phẩm!");
		document.theForm.txtten.focus();
		//document.theForm.txtten.style.background="#CCCCCC";
		return false;
	}
	if (document.theForm.txtprice.value==""){
		alert("Bạn chưa nhập giá sản phẩm!");
		document.theForm.txtprice.focus();
		//document.theForm.txtten.style.background="#CCCCCC";
		return false;
	}
	return true;
}
	
	function postRequest(strURL,status) 
{

		var xmlHttp;

        if (window.XMLHttpRequest) { // Mozilla, Safari, ...

         	var xmlHttp = new XMLHttpRequest();

       	} else if (window.ActiveXObject) { // IE

         	var xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");

       	}

    xmlHttp.open('POST', strURL, true);

    xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xmlHttp.onreadystatechange = function() {

        if (xmlHttp.readyState == 4) 
		{
           GetAjax(xmlHttp.responseText);
        }

    }

    xmlHttp.send(strURL);

}
function activestatus(act,idp){
	  var url = "_ajax_active.php?tbl=food&fld=F_Flag&val="+act+"&uid="+idp+"&fldid=F_ID";
	  postRequest(url);
	 // alert('Đã thay đổi');
 }
 function changecat(val,id){
	  var url = "_ajax_active.php?tbl=food&fld=FD_ID&val="+val+"&uid="+id+"&fldid=F_ID";
	  postRequest(url);
   	}
 	function GetAjax(str){}	
	
	</script>
</body>
</html>