<div id="main-content">
<div id="thongtincanhan">
<h3><span>Thông tin cá nhân</span></h3>
<?php
	$sql="select * from user where U_ID  = '$uid'";
	$re=mysql_query($sql);
	$rows=mysql_fetch_assoc($re);
?>
    <div class="detail-infor">
    <form action="index.php?page=edit-acc" method="post">
		<p><span> Tên của bạn :</span><input type="text" name="name" value="<?php echo $rows['U_Name'];?>" /></p>
        <p><span> Email :</span><input type="text" name="email" value="<?php echo $rows['U_Email'];?>" /></p>
        <p><span> Số điện thoại :</span><input type="text" name="phone" value="<?php echo $rows['U_Phone'];?>" /></p>
        <p><span> Địa chỉ 1 :</span><input type="text" name="add1" value="<?php echo $rows['U_Address'];?>" /></p>
        <p><span> Địa chỉ 2 :</span><input type="text" name="add2" value="<?php echo $rows['U_Address1'];?>" /></p>
        <p><input type="submit" id="submit-acc" name="submit-acc">
				&nbsp;<input type="button" id="backchange" onclick="return window.history.go(-1);" value="Quay lại" />
			</p>
    </form>
    <?php
		if(isset($_POST['submit-acc'])){
			$ten=addslashes($_POST['name']);
			$email=addslashes($_POST['email']);
			$phone=addslashes($_POST['phone']);
			$add1=addslashes($_POST['add1']);
			$add2=addslashes($_POST['add2']);
			$sqls="select * from user where U_ID  != '$uid' and U_Email ='$email'";
			$res=mysql_query($sqls);
			$num=mysql_num_rows($res);
			if($num){
				echo "<p>Email này đã có. Hãy dùng địa chỉ email khác !</p>";
			}else{
				if($ten !='' && $email !='' && $phone !='' && $add1 !='' && $add2 !=''){
					mysql_query("update user set U_Name='$ten',U_Email='$email',U_Address='$add1',U_Address1='$add2',U_Phone='$phone' where U_ID  = '$uid'");
					$_SESSION['name']=$ten;
					echo "<p>Thay đổi thông tin thành công !</p>";
					header("Location: index.php?page=infor");
				}else{
					echo "<p>Bạn phải điền đầy đủ các thông tin !</p>";
				}
			}
		}
	?>
   </div>
</div></div>