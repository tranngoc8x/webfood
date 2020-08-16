
  
 <div id="content-outer">
<!-- start content -->
<div id="content">

<!--  start page-heading -->
	<div id="page-heading">
		<h1>Danh sách khách hàng
        <div style="display:inline; float:right; margin-right:15px; "></div>
      </h1>

	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
  
   <?php 
	if($_GET['action']=='view' && $_GET['mod']=='kh')
	{
		
		$sql = "SELECT * FROM `khach_hang`";
		$ketqua = mysql_query($sql) or die ('khong tim thay du lieu');
	?>
      <tr>
    	<td></td>
        <td>Name</td>
        <td>Username</td>
        <td>Password</td>
        <td>Email</td>
        <td>Adress1</td>
        <td>Adress2</td>
        <td>Phone</td>
        <td>Trạng thái</td>
    </tr>
     <?php
				$page=$_REQUEST["page"];
				 
				if($page=="") {$page=1;}
				$oRow=$_REQUEST["row"];
				$row_per_page=10;
					 $sql_cat="SELECT count(*) as tongso from contact";
					 $result=mysql_query($sql_cat);
					 $rows=mysql_fetch_object($result);
					 $tong=$rows->tongso;
						//$tong=100;
					if ($page>$tong/$row_per_page)$page=ceil($tong/$row_per_page);
				 if ($page=="")$page=1;
				
				 $from=$row_per_page*($page - 1);
				$to=$row_per_page;
					$sql="select * from contact order by Contact_ID DESC limit $from,$to";
				if($oRow=="All")
				{
				$sql="select * from contact order by Contact_ID DESC";;
				} 
					$i=0;
					
					$re=mysql_query($sql);
					$i=0;
					while($row=mysql_fetch_assoc($re)){
						$i++;
				?>	
    <?php 
    echo "<tr>";
   
echo "<td>$row[U_Name]</td>";
echo " <td> $row[U_Username]</td>";
echo "<td> $row[U_Password]</td>";
echo"<td>$row[U_Address]</td>";
echo "<td> $row[U_Address1]</td>";
echo "</tr>";
}
	?>
</table>