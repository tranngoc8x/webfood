<div id="main-content">
<div id="register">
<h3><span>ĐĂNG KÝ</span></h3>
<?php
if(!isset($_SESSION['user']))
{
if(isset($_POST['ok-register']) && ($_GET['act']=="do"))
{
echo"<div id=\"infor-regis\">";
	$name=$_POST['U_Name'];
	$username=$_POST['U_Username'];
	$pass=$_POST['U_Password'];
	$repass=$_POST['U_Re'];
	$mail=$_POST['U_Email'];
	$address=$_POST['U_Address'];
	$address1=$_POST['U_Address1'];
	$phone=$_POST['U_Phone'];
	$i=0;
	if(strlen($name)==''&&strlen($username)==''&&strlen($pass)==''&&strlen($repass)==''&&strlen($cmt)==''&&strlen($mail)==''&&strlen($address)==''&&strlen($phone)=='')
	{
		echo "Bạn chưa điền thông tin.";
		$i+=1;
	}
	elseif(strlen($name)==''&&strlen($username)==''||strlen($pass)==''||strlen($cmt)==''||strlen($repass)==''||strlen($mail)==''||strlen($addess)==''||strlen($phone)=='')
	{
		if(strlen($name)=='')
		{
			echo "Bạn chưa nhập tên hiển thị.<br>";
			$i+=1;
		}
		if(strlen($username)=='')
		{
			echo "Bạn chưa nhập tên đăng nhập.<br>";
			$i+=1;
		}
		if(strlen($pass)=='')
		{
			echo "Bạn chưa điền mật khẩu đăng nhập.<br>";
			$i+=1;
		}
		if(strlen($repass)=='')
		{
			echo "Bạn cần xác nhận lại mật khẩu.<br>";
			$i+=1;
		}
		if(strlen($mail)=='')
		{
			echo "Bạn phải nhập địa chỉ E-mail.<br>";
			$i+=1;
		}
		if(strlen($address)=='')
		{
			echo "Bạn phải nhập địa chỉ liên lạc.<br>";
			$i+=1;
		}
		if(strlen($phone)=='')
		{
			echo "Bạn chưa điền số điện thoại liên hệ.<br>";
			$i+=1;
		}
	}
	elseif($pass!=$repass)
	{
		echo "Mật khẩu không trùng nhau.<br>";
		$i+=1;
	}
//	elseif(kiem tra email)
	//{
	//}
	$sql="select U_Username from user where U_Username='".$username."'";
	$row= mysql_num_rows(mysql_query($sql));
	if($row > 0)
	{
		echo "Tên đăng nhập này đã tồn tại.Hãy chọn tên khác.<br>";
		$i+=1;
	}
	$sql="select U_Email from user where U_Username='".$username."'";
	$row= mysql_num_rows(mysql_query($sql));
	if($row > 0)
	{
		echo "Email này đã tồn tại.Hãy chọn email khác.<br>";
		$i+=1;
	}
	if($i==0)
	{
		$passmd=md5($pass);
		if(strlen($address1)=='')
		{
			$sqlx="INSERT INTO user(U_Name,U_Username,U_Password,U_CMT,U_Email,U_Address,U_Phone) VALUES ('$name','$username','$passmd','$cmt','$mail','$address','$phone');";	
		}
		else
		{
			$sqlx="INSERT INTO user(U_Name,U_Username,U_Password,U_Email,U_Address,U_Address1,U_Phone) VALUES ('$name','$username','$passmd','$mail','$address','$address1','$phone');";
		}
		mysql_query($sqlx);
		$sql="select U_ID from User where U_Username='".$username."'";
		$row=mysql_fetch_array(mysql_query($sql));
		ob_start();
		$user=$row['U_ID'];
		session_register("user");
		echo"<p>Bạn đã đăng ký thành công.Nhấn <a href=index.php style=\"color= #F00;\">vào đây</a> để mua hàng.</p>";
		exit;
	}
	echo"</div>";
}
?>
<div style="clear: both;"></div>
	<form method="POST" name="registerform" action="index.php?page=register&act=do" onSubmit="return check();defaultagree(this);">
		<label>Tên thật của bạn</label><input name="U_Name" type="text" maxlength="20" />
		<font color="#FF0000">&nbsp;</font>
	  <label>Tên đăng nhập</label><input name="U_Username" type="text" maxlength="30" />
	  <label>Mật khẩu</label><input name="U_Password" type="password" />
	  <label>Xác nhận mật khẩu</label><input name="U_Re" type="password" />
	  <label>E-mail</label><input name="U_Email" type="text" />
		<label>Địa chỉ 1</label><input name="U_Address" type="text" />
		<label>Địa chỉ 2</label><input name="U_Address1" type="text" />
		<label>Số điện thoại</label><input name="U_Phone" type="text"/>
		<label>Điều khoản sử dụng</label>
        <div id="dieukhoan">
        	<?php echo getdata("select Infor_Noidung from infor where Infor_ID = '8'");?>
        </div>
<div class="crl"></div>
		<input id="checkbox"name="agreecheck" type="checkbox" onClick="agreesubmit(this)"/><b>Đồng ý sử dụng!</b>
		<div id="button-regis">
		<input value="Reset" type="reset" />
		<input style="color:#0000ff" name="ok-register" value="Đăng ký" type="submit" disabled="disabled" />
		</div>
	</form>
    <script>
document.forms.registerform.checkbox.checked=false;
var checkobj;
function agreesubmit(el){
checkobj=el;
if (document.all||document.getElementById){
for (i=0;i<checkobj.form.length;i++){  //hunt down submit button
var tempobj=checkobj.form.elements[i];
if(tempobj.type.toLowerCase()=="submit")
tempobj.disabled=!checkobj.checked;
}
}
}

function defaultagree(el){
	if (!document.all&&!document.getElementById){
		if (window.checkobj&&checkobj.checked)
		return true;
		else{
			alert("Please read and accept terms to submit form");
			return false;
		}
	}
}
function check(){
	if(document.registerform.U_Name.value==''){
		alert("Bạn chưa nhập tên hiển thị !");
		document.registerform.U_Name.focus;
		return false; 
	}
	if(document.registerform.U_Username.value==''){
		alert("Bạn chưa nhập tên đăng nhập !");
		document.registerform.U_Username.focus;
		return false; 
	}
	if(document.registerform.U_Password.value==''){
		alert("Bạn chưa nhập mật khẩu !");
		document.registerform.U_Password.focus;
		return false; 
	}
	if(document.registerform.U_Re.value==''){
		alert("Bạn chưa nhập lại mật khẩu !");
		document.registerform.U_Re.focus;
		return false; 
	}
	if(document.registerform.U_Email.value==''){
		alert("Bạn chưa nhập địa chỉ Email !");
		document.registerform.U_Email.focus;
		return false; 
	}
	if(document.registerform.U_Address.value==''){
		alert("Bạn chưa nhập địa chỉ của bạn !");
		document.registerform.U_Address.focus;
		return false; 
	}
	if(document.registerform.U_Phone.value==''){
		alert("Bạn chưa nhập điện thoại!");
		document.registerform.U_Phone.focus;
		return false; 
	}
	return true;
}
</script>
<?php
}else{
	$sql="select U_Username from user where U_ID='".$_SESSION['user']."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	echo "<div id='login-message'>Hệ thống ghi nhận bạn đã đăng ký với tài khoản <font color='#0000FF'>".$row['U_Username']."</font>";
	echo "<br/>Bạn có muốn <a href='index.php?page=logout&link=register' style='color: #0000FF;'>thoát</a> ra để đăng ký tài khoản mới không?</div>";
}?>
</div>
</div>