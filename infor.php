<div id="main-content">
<div id="thongtincanhan">
<h3><span>Thông tin của bạn</span></h3>
<?php
	$sql="select * from user where U_ID  = '$uid'";
	$re=mysql_query($sql);
	$rows=mysql_fetch_assoc($re);
?>
    <div class="detail-infor">
    	<p class="infor-head">Thông tin cá nhân<a href="index.php?page=edit-acc">Chỉnh sửa</a></p>
		<p><span> Tên của bạn :</span><?php echo $rows['U_Name'];?></p>
        <p><span> Email :</span><?php echo $rows['U_Email'];?></p>
        <p><span> Số điện thoại :</span><?php echo $rows['U_Phone'];?></p>
        <p><span> Địa chỉ 1 :</span><?php echo $rows['U_Address'];?></p>
        <p><span> Địa chỉ 2 :</span><?php echo $rows['U_Address1'];?></p>
        <p class="infor-head">Thông tin tài khoản<a href="index.php?page=changepass">Đổi mật khẩu</a></p>
        <p><span> Uername :</span><?php echo $rows['U_Username'];?></p>
    </div>
</div></div>