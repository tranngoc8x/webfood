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
<link rel="stylesheet" href="css/invoice.css" type="text/css" media="screen" />
</head>
<body>

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
          <td height="30" align="center" bgcolor="#E2E2E2"><span class="Title_14_Red">Cập nhật thông tin tài khoản</span></td>
          <td width="12" valign="top" background="images/CM1_06.gif">&nbsp;</td>
        </tr>
        <tr>
          <td width="12" height="100%" background="images/CM1_08.gif">&nbsp;</td>
          <td height="100%" align="center">
          
         
          <table border="0"  cellpadding="0" cellspacing="0"  id="id-form">
	    <tr>
	      <th valign="top">&nbsp;</th>
	      <td>
          <?php
			$id = $_REQUEST['id'];
			if(isset($_REQUEST['submit'])){
		
			$ten = $_REQUEST['ten'];	
			$email = $_REQUEST['email'];
			$pass = $_REQUEST['pass'];
			$newpass = $_REQUEST['newpass'];
			$repass = $_REQUEST['repass'];
			$rt=mysql_query("select A_Password from admin where  A_ID = '$id'");
			$rot=mysql_fetch_assoc($rt);
			if($pass){
				if($rot['A_Password']==md5($pass)){
					if($newpass==$repass){
						$password=md5($newpass);
						$ok=1;
						echo "<p style='color: #006600;'>Cập nhật thành công !</p>";	
					}else{
						echo "<p style='color: #FF0000;'>Mật khẩu phải trùng nhau.</p>";	
						$ok=0;
					}
				}else{
					echo "<p style='color: #FF0000;'>Mật khẩu hiện tại không đúng.</p>";	
					$ok=0;
				}
			}else{$ok=2;}
			if($ok==1){
				$sqlu = "UPDATE admin SET A_Name = '$ten', A_Password = '$password', A_Email  = '$email' WHERE A_ID = '$id'";
			}else if($ok==2){
				 $sqlu = "UPDATE admin SET A_Name = '$ten', A_Email  = '$email' WHERE A_ID = '$id'";
			}
			mysql_query($sqlu);
		}
		
			$sql="select * from admin where  A_ID = '$id'";
			$re=mysql_query($sql);
			$row=mysql_fetch_assoc($re);
		?> 
          </td>
	      <td>&nbsp;</td>
	      </tr>
           <form action="detail-account.php?id=<?php echo $id;?>" method="post" >
	    <tr>
	      <th valign="top">Tên đăng nhập:</th>
	      <td>&nbsp;<input class="inp-form" type="text" name="user" readonly="readonly" value="<?php echo $row['A_Username'];?>" /></td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	      <th valign="top">Tên người dùng:</th>
	      <td>&nbsp;<input name="ten" type="text" class="inp-form" id="ten" value="<?php echo $row['A_Name'];?>" /></td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	      <th valign="top">Địa chỉ E-mail:</th>
	      <td>&nbsp;<input name="email" type="text" class="inp-form" id="email" value="<?php echo $row['A_Email'];?>" /></td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	      <th valign="top">Mật khẩu cũ:</th>
	      <td>&nbsp;
	        <input class="inp-form" type="password" name="pass" id="pass" /></td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	      <th valign="top">Mật khẩu mới:</th>
	      <td>&nbsp;
	        <input class="inp-form" type="password" name="newpass" id="newpass" /></td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	      <th valign="top">Nhắc lại mật khẩu:</th>
	      <td>&nbsp;
	        <input class="inp-form" type="password" name="repass" id="repass" /></td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	      <th>&nbsp;</th>
	      <td valign="top">
	         <input type="submit" name="submit" class="submit-form" value="Cập nhật"  /> 
             <input type="button" onclick="javascript:window.opener.location.reload();window.close();" name="button2" id="button2" class="cancel-form" value="Cancel" />
	        </td>
	      <td>&nbsp;</td>
	      </tr> </form>
	    </table>
        </td>
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

</script>
</body>
</html>