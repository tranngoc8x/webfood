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
function deletecatalog(val){
	var conf = confirm('Bạn có chắc chắn muốn danh mục này không?');
	if(conf){
		window.close();
		window.location.href='delete.php?re=index.php&tbl=food_type&fldid=F_ID&val='+val;
		window.opener.location.reload();
	}
}
</script> 
</head>
<body>
<?php 
	if(isset($_REQUEST['submit'])){
		$txtten = $_REQUEST['txtten'];	
		$id = $_REQUEST['id'];
		$sqlu = "UPDATE food_type SET FD_Name  = '$txtten' WHERE FD_ID = '$id'";
		mysql_query($sqlu);
	}
	
	$id=$_REQUEST['id'];
	if(isset($_GET['action']) and ($_GET['action']=='xuly')){
		mysql_query("UPDATE food_type SET FD_Flag = '1' WHERE FD_ID = '$id'");
	}
	$sql="select * from food_type where FD_ID='$id'";
	$re=mysql_query($sql);
	$rw=mysql_fetch_assoc($re);
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
          <td width="784" height="30" align="center" bgcolor="#E2E2E2"><span class="Title_14_Red">Cập nhật danh mục</span></td>
          <td width="34" height="30" align="center" valign="middle" bgcolor="#E2E2E2">  <a class="info-tooltip" title="Hiển thị" href="detail-catalog.php?id=<?php echo $id;?>&action=xuly"><img src="images/table/action_ok.gif" width="24" height="24" border="0" /></a>
          </td>
          <td width="46" align="center" valign="middle" bgcolor="#E2E2E2">
          <a class="info-tooltip" title="Xoá" href="javascript:void(0);"  onclick="deletecatalog(<?php echo $id?>) "><img src="images/table/action_delete.gif" alt="Xóa" border="0" align="absmiddle" width="24" height="24"/></a>
          </td>
          <td width="12" valign="top" background="images/CM1_06.gif">&nbsp;</td>
        </tr>
        <tr>
          <td width="12" height="100%" background="images/CM1_08.gif">&nbsp;</td>
          <td height="100%" colspan="3" align="center">
          <table class="antiintro" cellspacing="1" cellpadding="0" width="100%"  border="0" style="border:#CCCCCC 1px solid;">
            <form name="fupdate" id="frmform" class="frmform" onsubmit="return checkForm();" action="detail-catalog.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
              <tbody>
                <tr>
                  <td height="10" class="Tile_12_black">&nbsp;</td>
                  <td width="61%" class="Tile_12_black">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black">&nbsp;Tên danh mục</td>
                  <td class="Tile_12_black"><input value="<?php echo $rw['FD_Name'];?>" name="txtten" id="txtten" class="inp-form"/></td>
                </tr>
        
                <tr>
                  <td height="10" class="Tile_12_black" id="ai">&nbsp;</td>
                  <td class="Text_12_black" id="ai">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai2">&nbsp;Trạng thái</td>
                  <td class="Text_12_black" id="ai2"><select name="standard-dropdown" onchange="javascript:activestatus(this.value,'<?php echo $id;?>');">
                    <option value="1" <?php if($rw['FD_Flag']==1){?> selected="selected"<?php }?>>Hiển thị</option>
                    <option value="0" <?php if($rw['FD_Flag']==0){?> selected="selected"<?php }?>>Ẩn</option>
                  </select></td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai3">&nbsp;</td>
                  <td class="Text_12_black" id="ai3">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" colspan="2" align="center" class="Tile_12_black" id="ai13">
                    <input type="submit" name="submit" class="submit-form" value="Cập nhật"  /> 
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
    alert("Bạn chưa nhập tên danh mục!");
    document.theForm.txtten.focus();
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
  var url = "_ajax_active.php?tbl=food_type&fld=FD_Flag&val="+act+"&uid="+idp+"&fldid=FD_ID";
  postRequest(url);
 // alert('Đã thay đổi');
}	
</script>
</body>
</html>