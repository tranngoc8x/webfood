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
function deleteproduct(val){
	var conf = confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');
	if(conf){
		window.close();
		window.location.href='delete.php?re=index.php&tbl=food&fldid=F_ID&val='+val;
		window.opener.location.reload();
	}
}

</script> 
</head>
<body>
  <?php 
		if(isset($_REQUEST['submit'])){
		$txtten = $_REQUEST['txtten'];	
		$txtprice = $_REQUEST['txtprice'];	
		$txtsale = $_REQUEST['txtsale'];	
		$id = $_REQUEST['id'];
		$file=$_FILES["file"]["name"];
	
		$xoaanh=$_REQUEST["chk"];//check
		$anhcu=$_REQUEST["anhcu"];//hidden
		if($xoaanh==1)
		{
			if($file=="")
			{$anh="";}
			else{
				$anh=date("YmdHis").$file;
				move_uploaded_file($_FILES["file"]["tmp_name"],"../images/product/".$anh);
				}
			if($anhcu !=""){
			unlink("../images/product/".$anhcu);}
		}else{	
			if ($file=="")
			{		
				$anh=$anhcu;
			}else{
				$anh=date("YmdHis").$file;
		  		if($anhcu !=""){
					unlink("../images/product/".$anhcu);}
					move_uploaded_file($_FILES["file"]["tmp_name"],"../images/product/".$anh);
			}
		}
		$sqlu = "UPDATE food SET F_Name  = '$txtten',F_Price  = '$txtprice',F_Image  = '$anh',F_Sale = '$txtsale' WHERE F_ID = '$id'";
		mysql_query($sqlu);
	}
	
	$id=$_REQUEST['id'];
	if(isset($_GET['action']) and ($_GET['action']=='xuly')){
		mysql_query("UPDATE food SET F_Flag = '1' WHERE F_ID = '$id'");
	}
	$sql="select * from food where F_ID='$id'";
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
          <td width="784" height="30" align="center" bgcolor="#E2E2E2"><span class="Title_14_Red">Chi tiết sản phẩm</span></td>
          <td width="34" height="30" align="center" valign="middle" bgcolor="#E2E2E2">  <a class="info-tooltip" title="Xử lý" href="detail-product.php?id=<?php echo $id;?>&action=xuly"><img src="images/table/action_ok.gif" width="24" height="24" border="0" /></a>
          </td>
          <td width="46" align="center" valign="middle" bgcolor="#E2E2E2">
          <a class="info-tooltip" title="Xoá" href="javascript:void(0);"  onclick="deleteproduct(<?php echo $id?>) "><img src="images/table/action_delete.gif" alt="Xóa" border="0" align="absmiddle" width="24" height="24"/></a>
          </td>
          <td width="12" valign="top" background="images/CM1_06.gif">&nbsp;</td>
        </tr>
        <tr>
          <td width="12" height="100%" background="images/CM1_08.gif">&nbsp;</td>
          <td height="100%" colspan="3" align="center">
          <table class="antiintro" cellspacing="1" cellpadding="0" width="100%"  border="0" style="border:#CCCCCC 1px solid;">
            <form name="fupdate" id="frmform" class="frmform" onsubmit="return checkForm();" action="detail-product.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
              <tbody>
                <tr>
                  <td height="10" colspan="2" class="Tile_12_black">&nbsp;</td>
                  <td width="37%" class="Tile_12_black">&nbsp;</td>
                  <td width="35%" rowspan="11" align="center" valign="middle" id="ai11">
                  <?php
				  		if($rw['F_Image']!=''){
				  ?>
                  <img src="../images/product/<?php echo $rw['F_Image'];?>" width="100" height="100" />
                  <br /><label for="Xóa"><input class="checkbox-size" type="checkbox" name="chk" value="1"/>Xóa ảnh</label>
                  <?php }else{?>
                   <img src="../images/product/no-image.png" alt="Chưa có ảnh" width="120" height="90" />
                  <?php }?>
                  <input type="hidden" value="<?php echo $rw['F_Image'];?>" name="anhcu" />
                  </td>
                </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black">&nbsp;Tên sản phẩm</td>
                  <td class="Tile_12_black"><input value="<?php echo $rw['F_Name'];?>" name="txtten" id="txtten" class="inp-form"/></td>
                </tr>
                <tr>
                  <td height="10" colspan="2" class="Tile_12_black" id="ai5">&nbsp;</td>
                  <td class="Text_12_black" id="ai5">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black" id="ai8">&nbsp;&nbsp;Giá</td>
                  <td class="Text_12_black" id="ai8"><input value="<?php echo number_format($rw['F_Price'],3);?>" name="txtprice" class="inp-form"/> vnđ</td>
                </tr>
                <tr>
                  <td height="10" colspan="2" class="Tile_12_black" id="ai9">&nbsp;</td>
                  <td class="Text_12_black" id="ai9">&nbsp;</td>
                </tr>
                <tr>
                  
                  <td height="21" colspan="2" class="Tile_12_black" id="ai7">&nbsp;Giảm giá</td>
                  <td class="Text_12_black" id="ai7"><input value="<?php echo $rw['F_Sale'];?>" name="txtsale" class="inp-form"/> %</td>
                </tr>
                <tr>
                  <td height="10" colspan="2" class="Tile_12_black" id="ai10">&nbsp;</td>
                  <td class="Text_12_black" id="ai10">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black" id="ai6">&nbsp;Danh mục</td>
                  <td class="Text_12_black" id="ai6"><select name="standard-dropdown2" onchange="javascript:changecat(this.value,'<?php echo $id;?>');">
                    <?php
				  	$sqlx="select * from food_type where FD_Flag = '1'";
					$rex=mysql_query($sqlx);
					while($rx=mysql_fetch_assoc($rex)){
				  ?>
                    <option value="<?php echo $rx['FD_ID'];?>" <?php if($rx['FD_ID']==$rw['FD_ID']){?> selected="selected"<?php }?>><?php echo $rx['FD_Name'];?></option>
                    <?php }?>
                    </select>
                    
                  </td>
                </tr>
                <tr>
                  <td height="10" colspan="2" class="Tile_12_black" id="ai">&nbsp;</td>
                  <td class="Text_12_black" id="ai">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black" id="ai2">&nbsp;Trạng thái</td>
                  <td class="Text_12_black" id="ai2"><select name="standard-dropdown" onchange="javascript:activestatus(this.value,'<?php echo $id;?>');">
                    <option value="1" <?php if($rw['F_Flag']==1){?> selected="selected"<?php }?>>Hiển thị</option>
                    <option value="0" <?php if($rw['F_Flag']==0){?> selected="selected"<?php }?>>Ẩn</option>
                  </select></td>
                </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black" id="ai15">&nbsp;</td>
                  <td class="Text_12_black" id="ai15">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black" id="ai14">&nbsp;</td>
                  <td class="Text_12_black" id="ai14">
                  <div style="position:relative;">
                    <input type="text" id="fileName" class="file_input_textbox" readonly="readonly">
                    <div class="file_input_div">
                      <img src="images/forms/upload_file.gif" class="file_input_button" />
                      <input type="file" class="file_input_hidden"  name="file" onchange="javascript: document.getElementById('fileName').value = this.value"/>
                    </div>
                   </div>
                  </td>
                  <td class="Text_12_black" id="ai14">  <div class="bubble-left"></div>
                    <div class="bubble-inner">JPEG, GIF 5MB max per image</div>
                  <div class="bubble-right"></div></td>
                </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black" id="ai3">&nbsp;</td>
                  <td class="Text_12_black" id="ai3">&nbsp;</td>
                  <td width="35%" align="center" valign="middle" id="ai11">&nbsp;</td>
                </tr>
                <tr>
                  <td width="28%" height="21" align="center" class="Tile_12_black" id="ai13">&nbsp;</td>
                  <td height="21" colspan="2" align="center" class="Tile_12_black" id="ai13">
                  <input type="submit" name="submit" class="submit-form" value="Cập nhật"  /> 
                  <input type="button" onclick="javascript:window.opener.location.reload();window.close();" name="button2" id="button2" class="cancel-form" value="Cancel" /></td>
                  <td width="35%" align="center" valign="middle" id="ai11">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" align="center" class="Tile_12_black" id="ai4">&nbsp;</td>
                  <td height="21" colspan="2" align="center" class="Tile_12_black" id="ai4">&nbsp;</td>
                  <td align="center" valign="middle" id="ai12">&nbsp;</td>
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