<div id="content-outer">
<!-- start content -->
<div id="content">

<!--  start page-heading -->
	<div id="page-heading">
		<h1>Danh sách sản phẩm
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
					<th align="center" class="table-header-repeat line-left"><a href="#">Tên sản phẩm</a>	</th>
					<th align="center" class="table-header-repeat line-left"><a href="#">Danh mục</a></th>
					<th align="center" class="table-header-repeat line-left"><a href="#">Giá bán</a></th>
					<th align="center" class="table-header-repeat line-left"><a href="#">Trạng thái</a></th>
					<th  align="center"class="table-header-options line-left"><a href="#">Tùy chọn</a></th>
				</tr>
                <?php
				$page="";
				if(isset($_REQUEST["page"])){
				$page=$_REQUEST["page"];
				 }
				 
				$oRow = "";
				if(isset($_REQUEST["row"])){
				$oRow=$_REQUEST["row"];
				}
				$row_per_page=10;
					 $sql_cat="SELECT count(*) as tongso from food";
					 $result=mysql_query($sql_cat);
					 $rows=mysql_fetch_object($result);
					 $tong=$rows->tongso;
						//$tong=100;
					if ($page>$tong/$row_per_page)$page=ceil($tong/$row_per_page);
				 if ($page=="")$page=1;
				
				 $from=$row_per_page*($page - 1);
				$to=$row_per_page;
					$sql="select * from food order by F_ID DESC limit $from,$to";
				if($oRow=="All")
				{
				$sql="select * from food order by F_ID DESC";;
				} 
					$i=0;
					
					$re=mysql_query($sql);
					$i=0;
					while($row=mysql_fetch_assoc($re)){
						$i++;
				?>	
				<tr <?php if($i%2==0){?>class="alternate-row"<?php }?>>
					<td><input value='<?php echo $row['F_ID'];?>' name="chk" type="checkbox"/></td>
					<td>
                    <?php echo $row['F_Name'];?>
                    </td>
					<td><?php echo getdata("select FD_Name from food_type where FD_ID = '".$row['FD_ID']."'");?></td>
					<td><?php echo number_format($row['F_Price'],3);?> vnđ</td>
					<td>                    
                   
                   		 <select name="select" class="styledselect_pages">
                              <option value="onproduct-<?php echo $row['F_ID'] ?>" <?php if ($row['F_Flag']==1){ ?> selected="1" <?php }?>>Hiển thị</option>
                              <option value="ofproduct-<?php echo $row['F_ID'] ?>" <?php if ($row['F_Flag']==0){ ?> selected="1" <?php }?>>Ẩn</option>
                            </select>
                    </td>
					<td class="options-width">
                
					  <a href="javascript:void(0);" title="Ok" class="icon-5 info-tooltip" onclick="if(confirm('Bạn có chắc chắn muốn cập nhật mục này không ?')){window.location.href='update.php?re=index.php?mod=product&tbl=food&fldid=F_ID&fldup=F_Flag&cont=1&val=<?php echo $row['F_ID'];?>';}"></a>
                      
                      
					  <a href="javascript:void(1);" title="Edit" class="icon-1 info-tooltip" onclick="openpopup(<?php echo $row['F_ID'];?>,'detail-product');"></a>
                      <a href="javascript:void(2);" title="Del" class="icon-2 info-tooltip" onclick="if(confirm('Bạn có chắc chắn muốn xóa mục này không ?')){window.location.href='delete.php?re=index.php?mod=product&tbl=food&fldid=F_ID&val=<?php echo $row['F_ID'];?>';}"></a>
				    </td>
				</tr>
				<?php }?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="javascript:void(0);" onclick=" javascript:update('index.php?mod=product','food','F_ID','F_Flag','1');" class="action-edit"> Hiển thị</a>
                   <a href="javascript:void(0);" onclick=" javascript:update('index.php?mod=product','food','F_ID','F_Flag','0');" class="action-edit"> Ẩn</a>
					<a href="javascript:void(0);" onclick=" javascript:check('index.php?mod=product','food','F_ID');" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>				
				  <?php
					$tongtrang=ceil($tong/$row_per_page);
					//echo $tongtrang%$page;
					//echo $tong/$row_per_page;
					 if($page>1){?>
                    <a href="?mod=product&page=1" class="page-far-left"></a>
                    <a class="page-left" href="?mod=product&page=<?php echo ($page-1)?($page-1):1 ?>"></a>
                  <?php }
					for ($i=1;$i < ($tongtrang+1);$i++)
					{
						if ($i==$page){
							echo " <div id='page-info'>Page <strong>".$i."</strong> / ".$tongtrang."</div>";
						}
					}
                     if($tongtrang > $page){?>
                    <a href="?mod=product&page=<?php echo $page+1; ?>" class="page-right"></a>
                    <a href="?mod=product&page=<?php echo $tongtrang; ?>" class="page-far-right"></a>
                  <?php }?>
			</td>
			<td>
			<select name="paging" class="styledselect_pages">
				<option value="product-0">Number of rows</option>
                <?php
                	for ($i=1;$i < ($tongtrang+1);$i++){?>
					<option value="product-<?php echo $i;?>" <?php if ($i==$page){ ?> selected="1" <?php }?> ><?php echo $i;?></option>		
                 <?php }?>
			</select>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			
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