<div id="main-content">
<div id="login">
<h3><span>Đăng nhập</span></h3>

<?php
if(!isset($_SESSION['user'])){
?>
<form method="POST" name="flogin" action="?page=login&act=do" onsubmit="return check();">
<label>Tên đăng nhập</label><input name="U_Username" type="text" /><br />
<label>Mật khẩu</label><input name="U_Password" type="password" />
<div id="button-login">
<input value="Reset" type="reset" />
<input style="color:#0000ff" name="ok-login" value="Đăng nhập" type="submit" />
</div>
</fieldset>
</form>
<div style="clear: both;"></div>
<?php
if(isset($_POST['ok-login'])){
	echo "<div id='infor-login'>";
	$sql="select U_ID,U_Username,U_Password,U_name from user where U_Username='".$_POST['U_Username']."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if(strlen($_POST['U_Username'])<=0)
	{
		echo"<b>Lỗi.</b>Bạn chưa nhập username.";
	}
	else if(strlen($_POST['U_Password'])<=0)
	{
		echo"<b>Lỗi.</b>Bạn chưa nhập mật khẩu.";
	}
	else if((mysql_num_rows($result)<=0) || ($row['U_Password']!=md5($_POST['U_Password'])))
	{
		echo "<b>Lỗi.</b>Sai tên truy cập hoặc mật khẩu.";
	}
	else{
		// Khởi động phiên làm việc (session)
		$user=$row['U_ID'];
		$_SESSION['user']=$user;
		$_SESSION['name']=$row['U_name'];
		// đăng nhập thành công
		header("Location:index.php");
	}
	echo "</div>";
}
}else{
$result = mysql_query("select * from user where U_ID='".$_SESSION['user']."'");
$row=mysql_fetch_array($result);
echo "<div id='login-message'>Hệ thống ghi nhận bạn đã đăng nhập với tài khoản <font color='#0000FF'>".$row['U_Username']."</font>";
echo "<br/>Bạn có muốn <a href='index.php?page=logout&link=login' style='color: #0000FF;'>thoát</a> ra để đăng nhập vào tài khoản mới không?</div>";
}
?>
</div>
<script>
function check(){
	if(document.flogin.U_Username.value==''){
		alert("Bạn chưa điền tên đăng nhập !");
		document.flogin.U_Username.focus;
		return false; 
	}
	if(document.flogin.U_Password.value==''){
		alert("Bạn chưa nhập mật khẩu !");
		document.flogin.U_Password.focus;
		return false; 
	}
	return true;
}
</script>
</div>