<div id="main-content">
<div id="checkout">
<h3 ><span>Thanh toán</span></h3>
<?php
$sql="select * from User where U_ID='".$_SESSION['user']."'";
$row=mysql_fetch_array(mysql_query($sql));
?>
<form method="POST" name="cartprocess" id="cartprocess" action="finalcart.php" onsubmit="return checkout();">
<p>Tên khách hàng :&nbsp;<?php echo $row['U_Name'];?><br>
  Điện thoại :&nbsp;0<?php echo $row['U_Phone'];?><br>
  Địa chỉ:&nbsp;<br><input type="radio" name="address" value="<?php echo $row['U_Address'];?>"><?php echo $row['U_Address'];?><br>
  <input type="radio" value="<?php echo $row['U_Address1'];?>" name="address"><?php echo $row['U_Address1'];?><br>
  Địa chỉ  giao hàng khác:&nbsp;<br>
  <textarea name="address2"></textarea>
  </p>
<hr style="border: 0;border-bottom: 1px solid #CCC; color:#FFF;"/>
<p><br>
</p>
<table width="663" border=1 align="center" cellspacing=0>
  <tr bgcolor="#0fff91">
  <td height="30" colspan="4" align="center" valign="middle" bgcolor="#FFFFFF">Chi tiết đơn hàng</td>
  </tr>
<tr bgcolor="#0fff91" id="title-table">
		<th width="68" height="30" align="center" valign="middle" bgcolor="#E3FAFA"><strong>STT</strong></th>
		<th width="320" height="30" align="center" valign="middle" bgcolor="#E3FAFA"><strong>Tên</strong></th>
		<th width="88" height="30" align="center" valign="middle" bgcolor="#E3FAFA"><strong>Số lượng</strong></th>
		<th width="169" height="30" align="center" valign="middle" bgcolor="#E3FAFA"><strong>Thành tiền</strong></th>
		</tr>
<?php
		foreach($_SESSION['cart'] as $key=>$value)
		{
			$item[]=$key;
		}
		$str=implode(",",$item);
		$sql="select * from Food where F_ID in ($str)";
		$result=mysql_query($sql);
		$i=1;
		$total=0;
		while($row=mysql_fetch_array($result))
		{
			echo "<tr><td>";
			echo $i."</td><td>";
/*tên*/		echo $row['F_Name']."</td><td>";
/*số lượng*/echo $_SESSION['cart'][$row['F_ID']]."</td><td align=\"right\" style=\"padding-right: 8px;\">";
/*thành tiền*/echo @number_format((number_format($_SESSION['cart'][$row[F_ID]]*$row['F_Price'],3)- $_SESSION['cart'][$row['F_ID']]*$row['F_Price']*($row['F_Sale']/100)),3)." VNĐ</td></tr>";
/*tổng tiền*/$total+=($_SESSION['cart'][$row['F_ID']]*$row['F_Price']- $_SESSION['cart'][$row['F_ID']]*$row['F_Price']*($row['F_Sale']/100));
			$i++;
		}?>
		<tr><td colspan=3 align="left" valign="middle">Tổng tiền hàng:
		</td><td><?php echo number_format($total,3);?> VNĐ</td></tr>
		<tr><td colspan=3 align="left" valign="middle">Thuế GTGT</td><td><?php echo $vat=getdata("select Infor_Noidung from infor where Infor_ID = '7'");?> %</td></tr>
		<tr><td colspan=3 align="left" valign="middle">Phí vận chuyển:</td><td><?php echo $giao=number_format(getdata("select Infor_Noidung from infor where Infor_ID = '6'"),3);?> VNĐ</td></tr>
		<tr><td colspan=3 align="left" valign="middle">Tổng cộng:</td><td><?php echo number_format(($total+$giao)-($total*$vat/100),3);?> VNĐ</td></tr>
		</table>
<p align=center><br />
<input type="button" src="images/btn-quaylai.png" onclick="javascript:window.history.go(-1);" width="88" height="30" border="0" />
<input type="submit" name="process" value="Mua"/>
</p>
</form>
</div></div>