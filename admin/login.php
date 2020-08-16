<?php
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Administrator Login</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
function checkform(){
	if(document.flogin.username.value=='' || document.flogin.username.value=='Username'){
		alert('Bạn chưa nhập tên đăng nhập !');	
		document.flogin.username.focus;
		return false;
	}	
	if(document.flogin.password.value=='' || document.flogin.password.value== '******'){
		alert('Bạn chưa nhập mật khẩu !');	
		document.flogin.password.focus;
		return false;
	}
	return true;
}
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="index.php"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
		<table border="0" cellpadding="0" cellspacing="0">
        <form name="flogin" action="login.php" onsubmit=" return checkform();" method="post">
		<tr>
			<th>Username</th>
			<td><input type="text"  class="login-inp" value="Username" name="username" onfocus="this.value=''"/></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" value="******"  name="password" onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top">
           <!-- <input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label> -->
            </td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="submit-login"  name="submit-login" /></td>
		</tr>
        </form>
        <tr><th></th>
        <td>
        <?php
			require_once("../mysql.php");
			include_once("../function.php");
			if(isset($_POST['submit-login']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$pass=md5($password);
				if(strlen($username)==NULL || $username == 'Username')
				{
					echo"<div class=\"error\">Bạn phải điền tên đăng nhập.</div>";
					exit();
				}
				elseif(strlen($password)==NULL || $password == '******')
				{
					echo "<div class=\"error\">Bạn chưa điền mật khẩu.</div>";
					exit();
				}
				$sql="select A_Username from admin where A_Username='$username' and A_Password= '$pass'";
				$result=mysql_query($sql);
				$sqlx="select A_Password from admin where A_Username='$username' and A_Password= '$pass'";
				$resultx=mysql_query($sqlx);
				if((mysql_num_rows($result)<=0 )||( mysql_num_rows($resultx)<=0))
				 {
					echo "<div class=\"error\">Tên đăng nhập hoặc mật khẩu không chính xác.</div>";
				 }
				 
				 if($username=(mysql_fetch_assoc($result)) && $pass=(mysql_fetch_assoc($resultx)))
				 {
					session_start();
					$_SESSION['admin']=$username;
					header('Location:index.php');
				 }
			}
		//	echo md5('123456');
			?>
        </td></tr>
		</table>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">Forgot Password?</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
        <form action="login.php" method="post">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value="" name='toemail'  class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="submit" name="forgot-pass" class="submit-login"  /></td>
		</tr>
		</table>
        </form>
        <?php
			if(isset($_POST['forgot-pass']))
			{
			$to_email=$_POST['toemail'];
			$sqlt="select A_Name,A_Username,A_Email from admin where A_Email  = '$to_email'";
			$ret=mysql_query($sqlt);
			$numt=mysql_num_rows($ret);
			$rowt=mysql_fetch_assoc($ret);
			if($numt<=0){?>
             <script>
                   alert ('Email không tồn tại trong dữ liệu của chúng tôi. Hãy nhập mail khác!');
					</script>
            <?php
			}else{
				$newpass=randpass();
				$savepass=md5($newpass);
				$message='';
				$message.="<pre>
				Chào";
				$message.=$rowt['A_Name'].",";
				$message.="
				Khi bạn yêu cầu, mật khẩu của bạn đã được đặt lại. Thông tin tài khoản của bạn như sau:
				Tên:";
				$message.=$rowt['A_Username'];
				
				$message.="
				Mật khẩu:";
				$message.=$newpass;
				$message.="
				
				Để thay đổi mật khẩu của bạn, xin vui lòng truy cập trang này:
				<a href='http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."'>http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."</a>
				
				Trân trọng,
				SFV - Cơm sinh viên.
			</pre>";
			//echo $message;
				$subject="Cấp lại mật khẩu - SVF - Cơm sinh viên";
				$header= "From SVF - Cơm sinh viên";
				if($_POST['toemail']!='')
				{
					mysql_query("update admin set A_Password= '$savepass'");
					$sendmail=@mail($to_email, $subject, $message, $header);
					?>
                    <script>
                   alert ('Email chứa mật khẩu mới đã được gửi vào hòm thư  của bạn!');
					</script>
					<?php
                    //header("Location:index.php");
				}
			}
		}
		?>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>
<?php
ob_end_flush();
?>