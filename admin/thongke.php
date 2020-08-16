<div id="content-outer">
<!-- start content -->
<div id="content">

<!--  start page-heading -->
	<div id="page-heading">
		<h1>Thống kê</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%"  cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top" class="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td align="center">
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				<!--  start product-table ..................................................................................... -->
            <?php
				$srtdate ="";
				if(isset($_REQUEST['selectdate'])){
					$fd=$_REQUEST['fd'];
					$fm=$_REQUEST['fm'];
					$fy=$_REQUEST['fy'];
					$td=$_REQUEST['td'];
					$tm=$_REQUEST['tm'];
					$ty=$_REQUEST['ty'];
					$ft=$fy.'-'.$fm.'-'.$fd;
					$tt=$ty.'-'.$tm.'-'.$td;
					$srtdate=" WHERE B_Date BETWEEN '$ft' AND '$tt' ";
				}
			?>
             	<form id="chooseDateForm" method="post" action="index.php?mod=report">
            
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr  valign="top">
                    <td width="133">
                    
                    
                    Từ ngày <select id="fd" name="fd" class="styledselect-day">
                        <option value="">Ngày</option>
                        <script>
                        for(var i=1;i<31;i++){
                        document.write('<option value="'+i+'">'+i+'</option>');
                        }
                        </script>
                    </select>
                    </td>
                    <td width="98">
                        <select id="fm" name="fm" class="styledselect-month">
                            <option value="">Tháng</option>
                            <script>
							for(var i=1;i<13;i++){
							document.write('<option value="'+i+'">Tháng '+i+'</option>');
							}
							</script>
                        </select>
                    </td>
                    <td width="95">
                        <select  id="fy" name="fy" class="styledselect-year">
                            <option value="">Năm</option>
                             <script>
								for(var i=2010;i<2020;i++){
								document.write('<option value="'+i+'">'+i+'</option>');
								}
							</script>
                        </select>
                    </td>
                    <td width="32"><!-- <a href=""  id="fdate-pick"><img src="images/forms/icon_calendar.jpg"   alt="" /></a>--></td>
               
					<td width="79">&nbsp;
				
					
				</td>
					<td width="135">
				Đến ngày <select id="td" name="td" class="styledselect-day">
					<option value="">Ngày</option>
                    <script>
					for(var i=1;i<31;i++){
					document.write('<option value="'+i+'">'+i+'</option>');
					}
					</script>
					</select>
                    </td>
				<td width="98">
					<select id="tm" name="tm" class="styledselect-month">
						<option value="">Tháng</option>
						<script>
						for(var i=1;i<13;i++){
						document.write('<option value="'+i+'">Tháng '+i+'</option>');
						}
						</script>
					</select>
				</td>
				<td width="95">
					<select  id="ty" name="ty" class="styledselect-year">
						<option value="">Năm</option>
						 <script>
					for(var i=2010;i<2020;i++){
					document.write('<option value="'+i+'">'+i+'</option>');
					}
					</script>
					</select>
				</td>
				<td width="35"><!-- <a href=""  id="tdate-pick"><img src="images/forms/icon_calendar.jpg"   alt="" /></a> --></td>
			</tr>
                <tr  valign="top">
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td height="20" valign="middle">&nbsp;</td>
                  <td valign="middle"><input type="submit" name="selectdate" id="selectdate" value="Tìm" /></td>
                  <td height="50" valign="middle">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                
                  	<tr>
                  	  <td colspan="9">
                      <table width="100%" id="product-table">
                        <tr  valign="top">
                          <td height="50" colspan="2" align="center">
                         <?php
				   if(isset($_POST['selectdate'])){
				  ?> 
                          Thống kê từ ngày <?php echo $fd.'/'.$fm.'/'.$fy;?>đến ngày <?php echo $td.'/'.$tm.'/'.$ty;?>
                        <?php }else{
							echo 'Thống kê';	
						}?>  
                          </td>
                          </tr>
                        <tr  valign="top">
                          <td width="23%" height="20" align="left">Tổng khách hàng</td>
                          <td width="77%" height="20" align="left">&nbsp;<?php echo getdata("SELECT count(U_ID) from bill $srtdate");?> khách </td>
                        </tr>
                        <tr  valign="top">
                          <td height="20" align="left">Tổng giá trị thu được</td>
                          <td height="20" align="left">
                          &nbsp;<?php
							$s1="SELECT B_ID from bill $srtdate";
							$re1=mysql_query($s1);
							$billid='';
							while( $row1=mysql_fetch_assoc($re1)){
							$billid.=$row1['B_ID'].",";
							}
							$billid=str_replace(",","','",$billid);
							//echo $billid;
							$s2="SELECT F_ID from detail_bill where B_ID in('$billid') group by F_ID";
							$re2=mysql_query($s2);
							$foodid = "";
							while( $row2=mysql_fetch_assoc($re2)){
							$foodid.=$row2['F_ID'].",";
							}
							$foodid=str_replace(",","','",$foodid);
							//echo $foodid;
							
							$s3="SELECT F_Price,F_Sale from food where F_ID in ('$foodid') ";
							$re3=mysql_query($s3);
							$tfrice=0;
							while( $row3=mysql_fetch_assoc($re3)){
							$tfrice+=($row3['F_Price']*$row3['F_Sale'])-($row3['F_Price']*$row3['F_Sale'])/100;
							}
							echo number_format($tfrice,3);
							?> vnđ
                          </td>
                        </tr>
                        <tr  valign="top">
                          <td height="20" align="left">Tống số sản phẩm đã bán</td>
                          <td height="20" align="left">&nbsp;
						  <?php echo getdata("SELECT count(*) from food where F_ID in ('$foodid')");
						  ?> sản phẩm</td>
                        </tr>
                        <tr  valign="top">
                          <td height="20" align="left">Sản phẩm bán nhiều nhất</td>
                          <td height="20" align="left">&nbsp;<?php echo getdata("SELECT F_Name from food where F_ID in ('$foodid')");?></td>
                        </tr>
                        <tr  valign="top">
                          <td height="20" align="left">Sản phẩm bán ít nhất</td>
                          <td height="20" align="left">&nbsp;<?php echo getdata("SELECT F_Name from food where F_ID in ('$foodid')");?></td>
                        </tr>
                        <tr  valign="top">
                          <td height="20" align="left">&nbsp;</td>
                          <td height="20" align="center">&nbsp;</td>
                        </tr>
                    </table>
                    </td></tr>
			    </table>
                
              </form>
                    
               
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th align="center" class="table-header-check"><a id="toggle-all" ></a> </th>
					<th align="center" class="table-header-repeat line-left"><a href="#">Tên khách hàng</a>	</th>
					<th align="center" class="table-header-repeat line-left"><a href="#">Điện thoại</a></th>
					<th align="center" class="table-header-repeat line-left"><a href="#">Ngày mua</a></th>
					<th align="center" class="table-header-repeat line-left"><a href="#">Trạng thái</a></th>
					<th  align="center"class="table-header-options line-left"><a href="#">Tùy chọn</a></th>
				</tr>
                <?php
				$page="";
				if(isset($_REQUEST["page"])){
				$page=$_REQUEST["page"];
				 }
				if($page=="") {$page=1;}
				$oRow = "";
				if(isset($_REQUEST["row"])){
				$oRow=$_REQUEST["row"];
				}
				$row_per_page=10;
				 $sql_cat="SELECT count(*) as tongso from bill $srtdate";
				 $result=mysql_query($sql_cat);
				 $rows=mysql_fetch_object($result);
				 $tong=$rows->tongso;
						//$tong=100;
					if ($page>$tong/$row_per_page)$page=ceil($tong/$row_per_page);
				 if ($page=="")$page=1;
				
				 $from=$row_per_page*($page - 1);
				$to=$row_per_page;
				
					$sql="select * from bill $srtdate order by B_ID DESC limit $from,$to";
				if($oRow=="All")
				{
					$sql="select * from bill $srtdate order by B_ID DESC";
				} 
					$re=mysql_query($sql);
					$i=0;
					while($row=mysql_fetch_assoc($re)){
						$i++;
						$uinf = getdata("select * from user where U_ID = '".$row['U_ID']."'");
						$flag="Đã xử lý";
						if($row['B_Flag']==0){$flag="Chưa xử lý";}
				?>	
				<tr <?php if($i%2==0){?>class="alternate-row"<?php }?>>
					<td><input value='<?php echo $row['B_ID'];?>' name="chk" type="checkbox"/></td>
					<td>
                    <?php echo $uinf['U_Name'];?>
                    </td>
					<td><?php echo $uinf['U_Phone'];?></td>
					<td><?php echo chuyenngaythangnam($row['B_Date']);?></td>
					<td><?php echo $flag;?></td>
					<td class="options-width">
                
					  <a href="javascript:void(0);" title="Ok" class="icon-5 info-tooltip" onclick="if(confirm('Bạn có chắc chắn muốn xóa các mục đã chọn không ?')){window.location.href='update.php?re=index.php&tbl=bill&fldid=B_ID&fldup=B_Flag&cont=1&val=<?php echo $row['B_ID'];?>';}"></a>
                      
                      
					  <a href="javascript:void(1);" title="View" class="icon-4 info-tooltip" onclick='openpopup(<?php echo $row['B_ID'];?>);'></a>
                      <a href="javascript:void(2);" title="Del" class="icon-2 info-tooltip" onclick="if(confirm('Bạn có chắc chắn muốn xóa các mục đã chọn không ?')){window.location.href='delete.php?re=index.php&tbl=bill&fldid=B_ID&val=<?php echo $row['B_ID'];?>';}"></a>
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
					<a href="javascript:print();" class="action-edit">In</a>
					<a href="javascript:check();" class="action-delete">Delete</a>
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
                    <a href="index.php?page=1" class="page-far-left"></a>
                    <a class="page-far-left" href="index.php?page=<?php echo ($page-1)?($page-1):1 ?>"></a>
                  <?php }
					for ($i=1;$i < ($tongtrang+1);$i++)
					{
						if ($i==$page){
							echo " <div id='page-info'>Page <strong>".$i."</strong> / ".$tongtrang."</div>";
						}
					}
                     if($tongtrang > $page){?>
                    <a href="index.php?page=<?php echo $page+1; ?>" class="page-right"></a>
                    <a href="index.php?page=<?php echo $tongtrang; ?>" class="page-far-right"></a>
                  <?php }?>
			</td>
			<td>
			<select name="paging" class="styledselect_pages" onfocus="page(this.value)">
				<option value="">Number of rows</option>
                <?php
                	for ($i=1;$i < ($tongtrang+1);$i++){?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>		
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