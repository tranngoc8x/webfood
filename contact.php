<div id="main-content">
	<div id="contact">
		<h3><span>Liên hệ</span></h3>
		<?php
			echo getdata("select Infor_Noidung from infor where Infor_ID = '3'");
		?>
		<?php
			if(isset($_POST['submit-contact'])){
				$name=$_POST['name'];
				$diachi=$_POST['diachi'];
				$sdt=$_POST['sdt'];
				$email=$_POST['email'];
				$message=$_POST['txtcontact'];
				$subject=$_POST['subject'];
				if(strlen($_POST['name'])=='' || strlen($_POST['email'])=='' || strlen($_POST['subject'])==''){
					echo "Bạn  phải điền đầy đủ vào các trường yêu cầu.<br>";
				}else{
					$s="insert into contact (Contact_Ten,Contact_Phone,Contact_Email,Contact_Diachi,Contact_Subject,Contact_Noidung,Contact_Flag) values ('$name','$sdt','$email','$diachi','$subject','$message','0')";
					mysql_query($s);
					echo "<div style='text-align:center;margin: 10px;'>Cảm ơn bạn đã liện hệ với chúng tôi. Chúng tôi sẽ trả lời bạn trong thời gian sớm nhất !</div>";
				}
			}
			if(!isset($_SESSION['user'])){?>
			<form name="contact" method="post"  onsubmit="return check();" action="<?php $PHP_SELF;?>">
				<div id="contact-input">
					<label>Tên của bạn<span></span></label>
					<input name="name" type="text" value="" />
					<label>Địa chỉ:</label>
					<input type="text" name="diachi" value="" />
					<label>Số điện thoại:</label>
					<input type="text" name="sdt" value="" />
					<label>Địa chỉ E-mail:</label>
					<input type="text" name="email" value="" />
					<label>Chủ đề</label>
					<input type="text" name="subject" />
					<label>Nội dung</label>
					<textarea name="txtcontact"></textarea>
				</div>
				<div class="crl"></div>
				<div id="submit-contact">
					<input type="submit" name="submit-contact" value="Send contact" />
					<input type="reset" value="Reset" />
				</div>
			</form>
			<?php
				}else{
				$sql="select * from User where U_ID={$_SESSION['user']}";
				$row=mysql_fetch_array(mysql_query($sql));
			?>
			<form name="contact" method="post" onsubmit="return check();" action="<?php $PHP_SELF;?>">
				<div id="contact-input">
					<label>Tên của bạn</label>
					<input type="text" name="name" value="<?php echo $row['U_Name'];?>" />
					<label>Địa chỉ:</label>
					<input type="text" name="diachi" value="<?php echo $row['U_Address'];?>" />
					<label>Số điện thoại:</label>
					<input type="text" name="sdt" value="<?php echo $row['U_Phone'];?>" />
					<label>Địa chỉ E-mail:</label>
					<input type="text" name="email" value="<?php echo $row['U_Email'];?>" />
					<label>Chủ đề</label>
					<input type="text" name="subject" />
					<label>Nội dung</label>
					<textarea name="txtcontact"></textarea>
				</div>
				<div class="crl"></div>
				<div id="submit-contact">
					<input type="reset" name="reset" value="Reset" />
					<input type="submit" name="submit-contact" value="Send contact" />
				</div>
			</form>
		<?php }?>
		<div class="crl"></div>
		<script type="text/javascript">
			function check(){
				if(document.contact.name.value==''){
					alert("Bạn chưa nhập tên !");
					document.contact.name.focus;
					return false;
				}
				if(document.contact.diachi.value==''){
					alert("Bạn chưa nhập địa chỉ !");
					document.contact.diachi.focus;
					return false;
				}
				if(document.contact.sdt.value==''){
					alert("Bạn chưa nhập số điện thoại !");
					document.contact.sdt.focus;
					return false;
				}
				if(document.contact.subject.value==''){
					alert("Bạn chưa nhập tiêu đề !");
					document.contact.subject.focus;
					return false;
				}
				if(document.contact.name.value==''){
					alert("Bạn chưa nhập tên !");
					document.contact.name.focus;
					return false;
				}
				return true;
			}
		</script>
	</div>
</div>