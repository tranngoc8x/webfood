<div id="main-content">
<div id="quenpass">
<h3><span>Quên mật khẩu</span></h3>
<form id="fquenmk" method="post" action="index.php?page=quenmatkhau">
	Địa chỉ mail mà bạn đã đăng ký tài khoản tại website của chúng tôi: <br>
    <input type="text" name="toemail">
    <br />
    <input type="submit" id="forgotpass" name="submit-forgot" value="forgotpass">
</form>
<?php
if(isset($_POST['submit-forgot']))
{
	$newpass=randpass();
	$savepass=md5($newpass);
	$to_email=$_POST['toemail'];
	$sqlt="select U_Email,U_Username,U_Name from user where U_Email  = '$to_email'";
	$ret=mysql_query($sqlt);
	$numt=mysql_num_rows($ret);
	$rowt=mysql_fetch_assoc($ret);
	if($numt<=0){
		echo "Email không tồn tại trong dữ liệu của chúng tôi. Hãy nhập mail khác!";
	}else{
		$message='';
		$message.="<pre>
		Chào";
		$message.=$rowt['U_Name'].",";
		$message.="
		Khi bạn yêu cầu, mật khẩu của bạn đã được đặt lại. Thông tin tài khoản của bạn như sau:
		Tên:";
		$message.=$rowt['U_Username'];
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
		$header= "From thangtn@iforce.com.vn";
		if($_POST['toemail']!='')
		{
			mysql_query("update user set U_Password = '$savepass'");
			$sendmail=@mail($to_email, $subject, $message, $header);
			echo "Email chứa mật khẩu mới đã được gửi vào hòm thư  của bạn!";
			//header("Location:index.php");
		}
	}
}
?>
</div></div>