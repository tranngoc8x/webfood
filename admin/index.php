<?php
ob_start();
session_start();
require_once("../mysql.php");
require_once("../function.php");
$user=$_SESSION['admin'];
$mod=@$_REQUEST['mod'];
if(!$user){
header("Location:login.php");
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../icon.ico" type="image/x-icon" rel="shortcut icon" />
<title>Administrator -::- SVF</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->


<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>
<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
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
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function()
{

// initialise the "Select date" link
$('#fdate-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2000',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#fd option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#fm option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#fy option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#fd, #fm, #fy')
	.bind(
		'change',
		function()
		{
			var d = new Date(
				$('#fy').val(),
				$('#fm').val()-1,
				$('#fd').val()
			);
			$('#fdate-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#fd').trigger('change');
});

$(function()
{

// initialise the "Select date" link
$('#tdate-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2000',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#td option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#tm option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#ty option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#td, #tm, #ty')
	.bind(
		'change',
		function()
		{
			var d = new Date(
				$('#ty').val(),
				$('#tm').val()-1,
				$('#td').val()
			);
			$('#tdate-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#td').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script> 
<script type="text/javascript">
	function openpopup(val,page){
		var h = window.screen.availHeight; 
		var w = window.screen.availWidth;
		var wp = 800;
		var hp = 660;
		var cp = (w-wp)/2;
		window.open (page+".php?id="+val+"","ViewDetail","scrollbars =1,menubar=1,resizable=1,width="+wp+",height="+hp+",left="+cp+"");
	}
		function popupadd(page){
		var h = window.screen.availHeight; 
		var w = window.screen.availWidth;
		var wp = 800;
		var hp = 660;
		var cp = (w-wp)/2;
		window.open (page+".php","ViewDetail","scrollbars =1,menubar=1,resizable=1,width="+wp+",height="+hp+",left="+cp+"");
	}
</script> 
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href="index.php"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
            <!--
			<div class="showhide-account"><img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div> -->
            <div class="account">
            <a href="index.php?mod=account">
            <img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="Tài khoản" />
            </a></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="logout.php" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content 
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-details">Thông tin cá nhân </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Thông tin tài khoản</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Thư đến</a>
				<div class="clear">&nbsp;</div>
			</div>
			</div>
			 end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul <?php if($mod==''  || $mod=='report'){echo 'class="current"';}else{echo 'class="select"';}?>><li><a href="index.php"><b>Trang chủ</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if($mod==''  || $mod=='report'){echo ' show';}?>">
			<ul class="sub">
				<li  <?php if($mod==''){echo 'class="sub_show"';}?>><a href="index.php">Đơn đặt hàng</a></li>
				<li  <?php if($mod=='report'){echo 'class="sub_show"';}?>><a href="?mod=report">Thống kê</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul <?php if($mod=='product'  || $mod=='addproduct'){echo 'class="current"';}else{echo 'class="select"';}?>><li><a href="?mod=product"><b>Sản phẩm</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if($mod=='addproduct'  || $mod=='product'){echo ' show';}?>">
			<ul class="sub">
				<li <?php if($mod=='product'){echo 'class="sub_show"';}?>><a href="?mod=product">Danh sách sản phẩm</a></li>
				<li <?php if($mod=='addproduct'){echo 'class="sub_show"';}?>><a href="#" onclick="javascript:popupadd('product-add');">Thêm sản phẩm</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul <?php if($mod=='user'){echo 'class="current"';}else{echo 'class="select"';}?>><li><a href="?mod=user"><b>Người dùng</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		
		<ul <?php if($mod=='catalog'  || $mod=='addcatalog'){echo 'class="current"';}else{echo 'class="select"';}?>>
        <li><a href="?mod=catalog"><b>Danh mục</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if($mod=='catalog'  || $mod=='addcatalog'){echo ' show';}?>">
			<ul class="sub">
				<li <?php if($mod=='catalog'){echo 'class="sub_show"';}?>><a href="?mod=catalog">Danh sách</a></li>
				<li <?php if($mod=='addcatalog'){echo 'class="sub_show"';}?>><a href="#" onclick="javascript:popupadd('catalog-add');">Thêm mới danh mục</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul <?php if($mod=='other-infor'){echo 'class="current"';}else{echo 'class="select"';}?>><li><a href="?mod=other-infor"><b>Thông tin khác</b><!--[if IE 7]><!--></a><!--<![endif]-->
		
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul <?php if($mod=='contact' ){echo 'class="current"';}else{echo 'class="select"';}?>><li><a href="?mod=contact"><b>Liên hệ</b><!--[if IE 7]><!--></a><!--<![endif]-->
		
		</li>
		</ul>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<?php
switch($mod){
	case 'report': 			include("thongke.php");			break;
	case 'product': 		include("product.php");			break;
	case 'user' : 			include ("user.php");			break;
	case 'addproduct':		include("addproduct.php");		break;
	case 'catalog': 		include("catalog.php");			break;
	case 'addcatalog':		include("addcatalog.php");		break;
	case 'other-infor':		include("other-infor.php");		break;
	case 'contact':			include("contact.php");			break;
	case 'account': 		include("account.php");			break;
	default: 				include("main.php");			break;
}
?>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
	<!--  start footer-left -->
	<div id="footer-left">
	SVF &copy; Copyright 2011. <span id="spanYear"></span> <a target="_blank" href="http://www.cơmvs.vn">www.cơmvs.vn</a>. All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 
</body>
</html>