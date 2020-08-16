<div id="main-content">
<div id="thongtincanhan">
<h3><span>Đổi mật khẩu</span></h3>
<?php
	$sql="select * from user where U_ID  = '$uid'";
	$re=mysql_query($sql);
	$rows=mysql_fetch_assoc($re);

?>
    <div class="detail-infor">
       <form action="index.php?page=changepass" method="post">
        <p><span> Mật khẩu cũ :</span><input type="password" name="oldpass" /></p>
        <p><span> Mật khẩu mới :</span><input type="password" name="newpass" /></p>
        <p><span> Nhắc lại mật khẩu :</span><input type="password" name="repass" /></p>
        <p><input type="submit" id="submit-acc" name="submit-pass">
			&nbsp;<input type="button" id="backchange" onclick="return window.history.go(-1);" value="Quay lại" />
			</p>
    </form>
    <?php
		if(isset($_POST['submit-pass'])){
			$oldpass=addslashes($_POST['oldpass']);
			$newpass=addslashes($_POST['newpass']);
			$repass=addslashes($_POST['repass']);
			$val=md5($repass);
			$sqls="select U_Password from user where U_ID  = '$uid'";
			$res=mysql_query($sqls);
			$num=mysql_fetch_assoc($res);
			if($num['U_Password'] != md5($oldpass)){
				echo "<p>Mật khẩu hiện tại không đúng.Hãy nhập lại !</p>";
			}else{
				if($newpass==$repass){
					if($oldpass !='' && $newpass !='' && $repass !=''){
						mysql_query("update user set U_Password='$val' where U_ID  = '$uid'");
						echo "<p>Thay đổi mật khẩu thành công !</p>";
						header("Location: index.php?page=infor");
					}else{
						echo "<p>Bạn phải điền đầy đủ các thông tin !</p>";
					}
				}else{
					echo "<p>Mật khẩu mới không giống nhau</p>";
				}
			}
		}
	?>
    </div>
</div></div>