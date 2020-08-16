<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator -::- SVF</title>
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
function deletebill(val){
	var conf = confirm('Bạn có chắc chắn muốn xóa đơn đặt hàng này không?');
	if(conf){
		window.close();
		
		window.location.href='delete.php?re=index.php&tbl=bill&fldid=B_ID&val='+val;
		window.opener.location.reload();
	}
	
}
</script> 

<link rel="stylesheet" href="css/invoice.css" type="text/css" media="screen" title="default" />
</head>
<body>
<?php 
require_once("../mysql.php");
require_once("../function.php"); 
$id=$_REQUEST['id'];
if(isset($_GET['action']) and ($_GET['action']=='xuly')){
	mysql_query("UPDATE bill SET B_Flag = '1' WHERE B_ID = '$id'");
}
$sql="select * from bill where B_ID='$id'";
$re=mysql_query($sql);
$rw=mysql_fetch_assoc($re);
$n=explode("-",$rw['B_Date']);
$d=$n['2'];
$m=$n['1'];$y=$n['0'];
$date=$d."/".$m."/".$y;
if($rw['B_Flag']=='1'){
	$status="<img src='images/table/daxuly.png'>";   
}else if($rw['B_Flag']=='0'){
	$status="<img src='images/table/chuaxuly.png'>";  
	}
?>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="Table11">
      <tbody>
        <tr>
          <td width="12">&nbsp;</td>
          <td width="637" colspan="2" background="images/CM1_02.gif">&nbsp;</td>
          <td width="11">&nbsp;</td>
        </tr>
        <tr>
          <td width="12" height="30" background="images/CM1_08.gif">&nbsp;</td>
          <td height="30" colspan="2" align="center" bgcolor="#E2E2E2"><span class="Title_14_Red">Chi tiết đơn hàng</span></td>
          <td valign="top" background="images/CM1_06.gif">&nbsp;</td>
        </tr>
        <tr>
          <td width="12" height="100%" background="images/CM1_08.gif">&nbsp;</td>
          <td height="100%" colspan="2" align="center"><table class="antiintro" cellspacing="0" cellpadding="0" width="100%" 
        border="0" style="border:#CCCCCC 1px solid;">
            <form name="frmList" action="index.php?mod=danhsachdon" method="post">
              <tbody>
                <tr>
                  <td colspan="4"><!--Start Table-->
                    <table width="100%" align="center" cellpadding="0" cellspacing="0" class="smallgrey">
                      <tbody>
                        <tr>
                          <td width="50%" rowspan="3" align="left" class="Text_12_black" 
                style="BACKGROUND: none transparent scroll repeat 0% 0%">&nbsp;</td>
                          <td colspan="3" align="right" class="Text_12_black" 
                style="BACKGROUND: none transparent scroll repeat 0% 0%"></td>
                          </tr>
                        <tr>
                          <td colspan="3" align="right" class="Text_12_black"></td>
                          </tr>
                        <tr>
                          <td width="41%" align="right" class="Text_12_black" ></td>
                          <td width="4%" align="center" class="Text_12_black" >
                            <a class="info-tooltip" title="Xử lý" href="detail-bill.php?id=<?php echo $id;?>&action=xuly"><img src="images/table/action_ok.gif" width="24" height="24" border="0" /></a>
                        </td>
                          <td width="5%" align="center" class="Text_12_black" >
                              <a class="info-tooltip" title="Xoá" 
                  href="javascript:void(0);"  onclick="deletebill(<?php echo $id?>) "><img src="images/table/action_delete.gif" alt="Xóa" border="0" align="absmiddle" width="24" height="24"/></a>
                              
                              </td>
                        </tr>
                        </tbody>
                      </table>
                    <!--End Table--></td>
                </tr>
                <tr>
                  <td height="21" colspan="4" align="center" bgcolor="#E7EFEF" class="Tile_14_black" id="ai12">Thông tin khách hàng</td>
                  </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black">Tên khách hàng</td>
                  <td class="Tile_12_black"> <?php echo getdata("select U_Name from user where U_ID = '".$rw['U_ID']."'");?></td>
                  <td rowspan="5" align="center" valign="middle" id="ai4"><?php echo $status;?></td>
                </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black" id="ai8">Địa chỉ</td>
                  <td class="Text_12_black" id="ai8"><?php echo $rw['B_Address'];?></td>
                  </tr>
                <tr>
                  
                  <td height="21" colspan="2" class="Tile_12_black" id="ai7">Điện thoại</td>
                  <td class="Text_12_black" id="ai7">
                  <?php echo getdata("select U_Phone from user where U_ID = '".$rw['U_ID']."'");?>
                  
                  </td>
                  </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black" id="ai6">Email</td>
                  <td class="Text_12_black" id="ai6"><a href="mailto:<?php echo getdata("select U_Email from user where U_ID = '".$rw['U_ID']."'");?>"><?php echo getdata("select U_Email from user where U_ID = '".$rw['U_ID']."'");?></a></td>
                  </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black" id="ai13">Ngày mua</td>
                  <td class="Text_12_black" id="ai13"><?php echo $date;?></td>
                  </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black" id="ai14">Ghi chú</td>
                  <td colspan="2" class="Text_12_black" id="ai14"><?php echo $rw['B_Note'];?></td>
                  </tr>
                <tr>
                  <td height="21" colspan="2" class="Tile_12_black" id="ai11">
                    </td>
                  <td colspan="2" id="ai11"></td>
                  </tr>
                <tr>
                  <td height="21" colspan="4" align="center" bgcolor="#E7EFEF" class="Tile_14_black" id="ai10">Chi tiết</td>
                  </tr>
                <tr class="Tile_12_black"><td colspan="4">
                  <div style="page-break-after: always;">
                    <h1>SVF</h1>
                    <table class="product">
                      <tbody><tr class="heading">
                        <td width="6%" align="center" class="header_title">STT</td>
                        <td width="40%" align="left" class="header_title">Tên sản phẩm</td>
                        <td width="8%" align="center" class="header_title">Số lượng</td>
                        <td width="12%" align="center" class="header_title">Giá bán</td>
                        <td width="11%" align="center" class="header_title">Giảm giá</td>
                        <td width="23%" align="center" class="header_title">Thành tiền</td>
                        </tr>
                        <?php
							$sqlb="SELECT * FROM detail_bill where B_ID = '$id'";	
							$reb=mysql_query($sqlb);
							$i=0;
							$tong=0;
							$pvat=0;
							while($rb=mysql_fetch_assoc($reb)){$i++;
						?>
                        <tr class="Text_12_black">
                          <td height="21" align="center" class="Tile_12_black" id="ai9"><?php echo $i;?></td>
                          <td width="40%"  id="ai9">&nbsp;<?php echo getdata("select F_Name from food where F_ID='".$rb['F_ID']."'");?></td>
                          <td width="8%" align="center"  id="ai9"><?php echo $rb['BD_Quantity'];?></td>
                          <td width="12%" align="center"  id="ai9"><?php echo number_format($rb['BD_Price'],3);?> vnđ</td>
                          <td width="11%" align="center"  id="ai9"><?php echo $sale=getdata("select F_Sale from food where F_ID='".$rb['F_ID']."'");?> %</td>
                          <td width="23%" align="right" class="Text_12_black"id="ai9">
						  <?php
						  echo number_format(($rb['BD_Price']*$rb['BD_Quantity'])-($rb['BD_Price']*$rb['BD_Quantity']*$sale)/100,3);
					
						  
						  ?> vnđ</td>
                          </tr>
                        <?php
						$pvat+=$rb['BD_Price'];
						$tong+=$rb['BD_Price']*$rb['BD_Quantity']-($rb['BD_Price']*$rb['BD_Quantity']*$sale)/100;
						}?>
                        <tr>
                          <td colspan="5" align="right"><b>Tổng:</b></td>
                          <td align="right">$<?php echo number_format($tong,3);?>vnđ</td>
                          </tr>
                        <tr>
                          <td colspan="5" align="right"><b>Phí giao hàng:</b></td>
                          <td align="right">$<?php echo  $phi=number_format(getdata("select Infor_Noidung from infor where Infor_ID='6'"),3);?> vnđ</td>
                          </tr>
                        <tr>
                          <td colspan="5" align="right"><b>VAT (<?php echo $vat= getdata("select Infor_Noidung from infor where Infor_ID='7'");?> %):</b></td>
                          <td align="right"><?php echo $thue=number_format($vat *$pvat/100 ,3);?> vnđ</td>
                          </tr>
                        <tr>
                          <td colspan="5" align="right"><b>Tổng phải trả:</b></td>
                          <td align="right" class="Tile_12_red" c><span style="font-size: 14px"></span>$<?php echo number_format($tong+$thue+$phi,3);?>vnđ</td>
                          </tr>
                        </tbody></table>
                    </div>
                  </td></tr>
                </tbody>
              </form>
            </table>          </td>
          <td valign="top" background="images/CM1_06.gif">&nbsp;</td>
        </tr>
        </tbody>
    </table>     
</body>
</html>