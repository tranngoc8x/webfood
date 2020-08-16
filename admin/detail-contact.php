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
function deletecontact(val){
	var conf = confirm('Bạn có chắc chắn muốn xóa liên hệ này không?');
	if(conf){
		window.close();
		window.location.href='delete.php?re=index.php&tbl=contact&fldid=Contact_ID&val='+val;
		window.opener.location.reload();
	}
}
</script> 
<!--soan thao-->


</head>
<body>
<?php 
  	$id = $_REQUEST['id'];
	if(isset($_GET['action']) and ($_GET['action']=='xuly')){
		mysql_query("UPDATE contact SET Contact_Flag = '1' WHERE Contact_ID = '$id'");
	}
	$sql="select * from contact where Contact_ID='$id'";
	$re=mysql_query($sql);
	$row=mysql_fetch_assoc($re);
?> 
<div style="height:100px; width:97%;border:1px solid #333; line-height:100px; background:#333 url(images/shared/nav/account_drop_bg.gif); margin:0 auto;">
	<img src="images/shared/logo.png" width="156" height="40" alt="" align="middle" style="padding:20px;" />
</div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="Table11">
      <tbody>
        <tr>
          <td width="12">&nbsp;</td>
          <td colspan="3" background="images/CM1_02.gif">&nbsp;</td>
          <td width="12">&nbsp;</td>
        </tr>
        <tr>
          <td width="12" height="30" background="images/CM1_08.gif">&nbsp;</td>
          <td width="815" height="30" align="center" bgcolor="#E2E2E2"><span class="Title_14_Red">Chi tiết liên hệ</span></td>
          <td width="32" align="center" bgcolor="#E2E2E2"><a class="info-tooltip" title="Đã xem" href="detail-contact.php?id=<?php echo $id;?>&amp;action=xuly"><img src="images/table/action_ok.gif" alt="" width="24" height="24" border="0" /></a></td>
          <td width="37" align="center" bgcolor="#E2E2E2"><a class="info-tooltip" title="Xoá" href="javascript:void(0);"  onclick="deletecontact(<?php echo $id?>) "><img src="images/table/action_delete.gif" alt="Xóa" border="0" align="absmiddle" width="24" height="24"/></a></td>
          <td width="12" valign="top" background="images/CM1_06.gif">&nbsp;</td>
        </tr>
        <tr>
          <td width="12" height="100%" background="images/CM1_08.gif">&nbsp;</td>
          <td height="100%" colspan="3" align="center">
          <table class="antiintro" cellspacing="1" cellpadding="0" width="100%"  border="0" style="border:#CCCCCC 1px solid;">
            <form name="fupdate" id="frmform" class="frmform" onsubmit="return checkForm();" action="detail-contact.php?id=<?php echo $id;?>" method="post">
              <tbody>
                <tr>
                  <td width="19%" height="10" class="Tile_12_black">&nbsp;</td>
                  <td width="81%" class="Tile_12_black">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black">&nbsp;Tên </td>
                  <td class="Tile_12_black">&nbsp;<?php echo $row['Contact_Ten'];?></td>
                </tr>
                <tr>
                  <td height="10" class="Tile_12_black" id="ai5">&nbsp;</td>
                  <td class="Text_12_black" id="ai5">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai8">&nbsp;Địa chỉ</td>
                  <td class="Text_12_black" id="ai8">&nbsp;<?php echo $row['Contact_Diachi'];?></td>
                </tr>
                <tr>
                  <td height="10" class="Tile_12_black" id="ai9">&nbsp;</td>
                  <td class="Text_12_black" id="ai9">&nbsp;</td>
                </tr>
                <tr>
                  
                  <td height="21" class="Tile_12_black" id="ai7">&nbsp;Điện thoại</td>
                  <td class="Text_12_black" id="ai7">&nbsp;<?php echo $row['Contact_Phone'];?></td>
                </tr>
                <tr>
                  <td height="10" class="Tile_12_black" id="ai">&nbsp;</td>
                  <td class="Text_12_black" id="ai">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai14">E-mail</td>
                  <td class="Text_12_black" id="ai14">&nbsp;<a href="mailto:<?php echo $row['Contact_Email'];?>"><?php echo $row['Contact_Email'];?></a></td>
                </tr>
                <tr>
                  <td height="10" class="Tile_12_black" id="ai10">&nbsp;</td>
                  <td class="Text_12_black" id="ai10">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai11">&nbsp;Tiêu đề</td>
                  <td class="Text_12_black" id="ai11">&nbsp;<?php echo $row['Contact_Subject'];?></td>
                </tr>
                <tr>
                  <td height="10" class="Tile_12_black" id="ai6">&nbsp;</td>
                  <td class="Text_12_black" id="ai6">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai2">&nbsp;Nội dung</td>
                  <td class="Text_12_black" id="ai2"><?php echo $row['Contact_Noidung'];?></td>
                </tr>
                <tr>
                  <td height="10" class="Tile_12_black" id="ai12">&nbsp;</td>
                  <td class="Text_12_black" id="ai12">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai15">&nbsp;Trạng thái</td>
                  <td class="Text_12_black" id="ai15"><select name="standard-dropdown" onchange="javascript:activestatus(this.value,'<?php echo $id;?>');">
                    <option value="1" <?php if($row['Contact_Flag']==1){?> selected="selected"<?php }?>>Đã xem</option>
                    <option value="0" <?php if($row['Contact_Flag']==0){?> selected="selected"<?php }?>>Chưa xem</option>
                  </select></td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai3">&nbsp;</td>
                  <td class="Text_12_black" id="ai3">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" colspan="2" align="center" class="Tile_12_black" id="ai13"><input type="button" onclick="javascript:window.opener.location.reload();window.close();" name="button2" id="button2" class="cancel-form" value="Cancel" /></td>
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
	  var url = "_ajax_active.php?tbl=contact&fld=Contact_Flag&val="+act+"&uid="+idp+"&fldid=Contact_ID";
	  postRequest(url);
	 // alert('Đã thay đổi');
 }
 function GetAjax(str){}
	</script>
</body>
</html>