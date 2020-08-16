<div id="content-outer">
<!-- start content -->
<div id="content">

<!--  start page-heading -->
	<div id="page-heading">
		<h1>Thông tin chung
          <div style="display:inline; float:right; margin-right:15px; "></div>
      </h1>

	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th align="center" class="table-header-check"><a id="toggle-all" ></a> </th>
					<th align="center" class="table-header-repeat line-left"><a href="#">Tên</a>	</th>
					<th align="center" class="table-header-repeat line-left"><a href="#">Mô tả</a></th>
					<th align="center" class="table-header-repeat line-left"><a href="#">Trạng thái</a></th>
					<th  align="center"class="table-header-options line-left"><a href="#">Tùy chọn</a></th>
				</tr>
                <?php
					$sql="select * from infor where Infor_Flag = '1' order by Infor_ID DESC";
					$i=0;
					$re=mysql_query($sql);
					$i=0;
					while($row=mysql_fetch_assoc($re)){
					$i++;
				?>	
				<tr <?php if($i%2==0){?>class="alternate-row"<?php }?>>
					<td><input value='<?php echo $row['Infor_ID'];?>' name="chk" type="checkbox"/></td>
					<td>
                    <?php echo $row['Infor_Ten'];?>
                    </td>
					<td><?php echo $row['Infor_Mota'];?></td>
					<td>                    
                   
                   		 <select name="select" class="styledselect_pages">
                              <option value="oninfor-<?php echo $row['Infor_ID'] ?>" <?php if ($row['Infor_Flag']==1){ ?> selected="1" <?php }?>>Hiển thị</option>
                              <option value="ofinfor-<?php echo $row['Infor_ID'] ?>" <?php if ($row['Infor_Flag']==0){ ?> selected="1" <?php }?>>Ẩn</option>
                            </select>
                    </td>
					<td class="options-width">
                
					  <a href="javascript:void(0);" title="Ok" class="icon-5 info-tooltip" onclick="if(confirm('Bạn có chắc chắn muốn cập nhật mục này không ?')){window.location.href='update.php?re=index.php?mod=other-infor&tbl=infor&fldid=Infor_ID&fldup=Infor_Flag&cont=1&val=<?php echo $row['Infor_ID'];?>';}"></a>
                      
                      
					  <a href="javascript:void(1);" title="Edit" class="icon-1 info-tooltip" onclick="openpopup(<?php echo $row['Infor_ID'];?>,'detail-infor');"></a>
				    </td>
				</tr>
				<?php }?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
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