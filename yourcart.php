<div id="main-content">
<div id="yourcart">
<h3><span>Giỏ hàng của bạn</span></h3>
<?php
//tham khao trên qhonline.info
	$ok=1;
	if(isset($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $k => $v)
		{
			if(isset($k))
			{
				$ok=2;
			}
		}
	}
	if($ok == 2)
	{?>
		<table width="90%" border=0 align="center" cellspacing=0>
        <tr><td colspan="7" height="30">&nbsp;</td>
		<form action='index.php?page=yourcart' method=post>
		<?php
		foreach($_SESSION['cart'] as $key=>$value)
			{
				$item[]=$key;
			}
			$str=implode(",",$item);
			$sql="select * from Food where F_ID in ($str)";
			$result=mysql_query($sql);
		?>
		<tr bgcolor="#0fff91" id="title-table">
          <th height="30" align="center" valign="middle" bgcolor="#E3FAFA"><strong>STT</strong></th>
          <th height="30" align="center" valign="middle" bgcolor="#E3FAFA"><strong>Tên</strong></th>
          <th height="30" align="center" valign="middle" bgcolor="#E3FAFA"><strong>Số lượng</strong></th>
          <th height="30" align="center" valign="middle" bgcolor="#E3FAFA"><strong>Giá</strong></th>
          <th height="30" align="center" valign="middle" bgcolor="#E3FAFA"><strong>Giảm giá</strong></th>
          <th height="30" align="center" valign="middle" bgcolor="#E3FAFA"><strong>Thành tiền</strong></th>
          <th height="30" align="center" valign="middle" bgcolor="#E3FAFA"><strong>Xóa</strong></th>
		</tr>
		<?php
		$i=1;
		$total=0;
		$sluong = 0;
		while($row=mysql_fetch_array($result))
		{?>
			<tr><td height="30" align="center" valign="middle"><?php echo $i;?></td>
            <td height="30" align="center" valign="middle"><?php echo $row['F_Name'];?></td><td height="30" align="center" valign="middle">
			<input name="quantity[<?php echo $row[F_ID];?>]" type="text" 
            value="<?php echo $_SESSION['cart'][$row['F_ID']];?>" size="2"  />
            <input type="submit" id='capnhat-product' name='submit' value='Cập nhật'></td>
            <td height="30" align="center" valign="middle" style="padding-right: 8px;"><?php echo number_format($row['F_Price'],3);?> VNĐ</td>
            <td height="30" align="center" valign="middle" style="padding-right: 12px;"><?php echo $row['F_Sale'];?> %</td>
            <td height="30" align="center" valign="middle" style="padding-right: 8px;"><?php echo @number_format((number_format($_SESSION['cart'][$row[F_ID]]*$row['F_Price'],3)- $_SESSION['cart'][$row['F_ID']]*$row['F_Price']*($row['F_Sale']/100)),3);?> VNĐ</td>
            <td height="30" align="center" valign="bottom"><a href="delcart.php?productid=<?php echo $row[F_ID];?>">
            <img src='images/delete-product.png' alt="Xóa món này" width="20" height="20" border="0" align="bottom"></a>
		  </td></tr>
			<?php
                $sluong+=$_SESSION['cart'][$row['F_ID']];
                $total+=($_SESSION['cart'][$row['F_ID']]*$row['F_Price']- $_SESSION['cart'][$row['F_ID']]*$row['F_Price']*($row['F_Sale']/100));
            $i++;
			}?>
		<tr>
		  <td colspan=2 align="center">Tổng cộng:</td>
		  <td> <?php echo $sluong;?> sản phẩm</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><?php echo number_format($total,3);?> VNĐ</td>
        <td>&nbsp;</td>
		</tr>
		</form>
        <tr>
          <td colspan="7" align="center" valign="middle">&nbsp;</td>
        </tr>
        <tr>
        <td colspan="7" align="center" valign="middle">
		<a href=index.php><img src="images/btn-tieptucmua.png" width="120" height="30" border="0" /></a>&nbsp;
        <a href=delcart.php?productid=0><img src="images/btn-xoagiohang.png" width="88" height="30" border="0" /></a>
        <?php
			if(isset($_SESSION['user'])){?>
			<a href="index.php?page=cartprocess"><img src="images/btn-thanhtoan.png" width="88" height="30" border="0" /></a>
			<?php }else{echo "(bạn cần đăng nhập mới có thể mua sản phẩm !)";}?>
        </td></tr>
        </table>
	<?php }else{?>
	<div style="text-align:center; font-size: 18px; margin-top: 30px;">Bạn không có món nào trong giỏ hàng<br /><a style="text-align:center; color: #0000FF; text-decoration: blink;" href=index.php><span>Tiếp tục mua hàng</span></a></div>
	<?php }
	//cập nhật số lượng món ăn
	if(isset($_POST['submit']))
	{
		foreach($_POST['quantity'] as $key=>$value)
		{
			if( ($value == 0) and (is_numeric($value)))
			{
				unset ($_SESSION['cart'][$key]);//xóa món ăn nếu số lượng bằng 0
			}
			elseif(($value > 0) and (is_numeric($value)))
			{
				$_SESSION['cart'][$key]=$value;
			}
		}
		header("location:index.php?page=yourcart");
	}
?>
</div>
</div>