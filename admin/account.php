<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Thông tin tài khoản</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td colspan="2" align="center">
	  <!-- start id-form -->
      
      <?php
	  	$sql="select * from admin";
		$re=mysql_query($sql);
		$row=mysql_fetch_assoc($re);
	  ?>
	  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
	    <tr>
	      <th valign="top">Tên người dùng:</th>
	      <td>&nbsp;<?php echo $row['A_Name'];?></td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	      <th valign="top">Tên đăng nhập:</th>
	      <td>&nbsp;<?php echo $row['A_Username'];?></td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	      <th valign="top">Địa chỉ E-mail:</th>
	      <td>&nbsp;<?php echo $row['A_Email'];?></td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	      <th>&nbsp;</th>
	      <td valign="top">
	        <a href="javascript:void();" onclick="openpopup('<?php echo $row['A_ID'];?>','detail-account')" class="form-acc">Thay đổi thông tin</a>
	        </td>
	      <td>&nbsp;</td>
	      </tr>
	    </table>
</td>
	</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>
<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>