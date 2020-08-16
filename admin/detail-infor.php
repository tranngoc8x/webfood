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
<!--soan thao-->
<script src="tinymce/tiny_mce.js" type="text/javascript"></script>
<script type="text/javascript">
	// Default skin
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm1",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

	// O2k7 skin
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm2",
		theme : "advanced",
		skin : "o2k7",
		plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

	// O2k7 skin (silver)
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm3",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "silver",
		plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

	// O2k7 skin (silver)
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm4",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "black",
		plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

</head>
<body>
  <?php 
  		$id = $_REQUEST['id'];
		if(isset($_REQUEST['submit'])){
		$txtten = $_REQUEST['txtten'];	
		$mota = $_REQUEST['mota'];	
		$value = $_REQUEST['value'];	
		$sqlu = "UPDATE infor SET Infor_Ten  = '$txtten',Infor_Mota  = '$mota',Infor_Noidung = '$value' WHERE Infor_ID = '$id'";
		mysql_query($sqlu);
	}
	$sql="select * from infor where Infor_ID='$id'";
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
          <td background="images/CM1_02.gif">&nbsp;</td>
          <td width="12">&nbsp;</td>
        </tr>
        <tr>
          <td width="12" height="30" background="images/CM1_08.gif">&nbsp;</td>
          <td height="30" align="center" bgcolor="#E2E2E2"><span class="Title_14_Red">Chi tiết thông tin</span>
          </td>
          <td width="12" valign="top" background="images/CM1_06.gif">&nbsp;</td>
        </tr>
        <tr>
          <td width="12" height="100%" background="images/CM1_08.gif">&nbsp;</td>
          <td height="100%" align="center">
          <table class="antiintro" cellspacing="1" cellpadding="0" width="100%"  border="0" style="border:#CCCCCC 1px solid;">
            <form name="fupdate" id="frmform" class="frmform" onsubmit="return checkForm();" action="detail-infor.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
              <tbody>
                <tr>
                  <td height="10" class="Tile_12_black">&nbsp;</td>
                  <td width="72%" class="Tile_12_black">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black">&nbsp;Tên </td>
                  <td class="Tile_12_black"><input value="<?php echo $rw['Infor_Ten'];?>" name="txtten" id="txtten" class="inp-form"/></td>
                </tr>
                <tr>
                  <td height="10" class="Tile_12_black" id="ai5">&nbsp;</td>
                  <td class="Text_12_black" id="ai5">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai8">&nbsp;&nbsp;Mô tả</td>
                  <td class="Text_12_black" id="ai8"><input value="<?php echo $rw['Infor_Mota'];?>" name="mota" class="inp-form"/></td>
                </tr>
                <tr>
                  <td height="10" class="Tile_12_black" id="ai9">&nbsp;</td>
                  <td class="Text_12_black" id="ai9">&nbsp;</td>
                </tr>
                <tr>
                  
                  <td height="21" class="Tile_12_black" id="ai7">&nbsp;Trạng thái</td>
                  <td class="Text_12_black" id="ai7"><select name="standard-dropdown" onchange="javascript:activestatus(this.value,'<?php echo $id;?>');">
                    <option value="1" <?php if($rw['Infor_Flag']==1){?> selected="selected"<?php }?>>Hiển thị</option>
                    <option value="0" <?php if($rw['Infor_Flag']==0){?> selected="selected"<?php }?>>Ẩn</option>
                  </select></td>
                </tr>
                <tr>
                  <td height="10" class="Tile_12_black" id="ai10">&nbsp;</td>
                  <td class="Text_12_black" id="ai10">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" class="Tile_12_black" id="ai2">Nội dung</td>
                  <td class="Text_12_black" id="ai2">
				  <textarea id="elm2" name="value" rows="15" cols="80" style="width: 80%">
				  	<?php echo $rw['Infor_Noidung'];?>
                  </textarea>
                  </td>
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