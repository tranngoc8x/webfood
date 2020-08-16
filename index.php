<?php
	require_once("mysql.php");
	require_once("function.php");
	session_start();
	if(isset($_SESSION['user'])){
		$uid=$_SESSION['user'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="css/style.css" rel="stylesheet" charset="utf-8" type="text/css">
<title>SVF</title>
</head>
<body>
	<div id="wrapper">
    <div id="min-warpper">
        <div id="header">
        <a href="index.php"><img src="images/logo.png" width="400" height="148" /></a>
            <ul id="menu-nav">
                <li><a href="index.php"><span>Trang chủ</span></a></li>
                <li><a href="?page=register"><span>đăng ký</span></a></li>
                <li><a href="?page=login"><span>đăng nhập</span></a></li>
                <li><a href="?page=yourcart"><span>giỏ hàng</span></a></li>
                <li><a href="?page=huongdan"><span>hướng dẫn</span></a></li>
                <li><a href="?page=aboutus"><span>about us</span></a></li>
                <li><a href="?page=contact"><span>liên hệ</span></a></li>
                <?php if(isset($_SESSION['name'])){?>
                <li style="float:right;">
                <a href="index.php?page=infor"><span style=" padding:0 5px;">Chào <?php echo $_SESSION['name'];?>.</span></a>
                <a style="background:none; padding:0 5px;" href="index.php?page=logout&link=home"><span style="background:none; padding:0;">thoát</span></a></li>
                <?php }?>
            </ul>
		</div>
        <div class="crl"></div>
        <div id="main">
        	<div id="left-menu">
            	<h3>DANH MỤC</h3>
                <ul id="menu-left">
                	<li><a href='index.php'>Tất cả</a></li>
                    <?php
						$sql="select * from food_type where FD_Flag='1' order by FD_ID ASC";
						$result=mysql_query($sql);
						while($row=mysql_fetch_array($result))
						{
							echo "<li><a href='index.php?product=".$row['FD_ID']."&#dish'>";
							echo $row['FD_Name'];
							echo"</a></li>";
					}?>
                </ul>
                <div class="crl"></div>
                <?php
   					if(!isset($_SESSION['user'])){?>
					<div id="login-left">
                    <h3>LOGIN</h3>
                    <form name="login" method="POST" action="index.php?page=login&act=do">
                    <label>Username </label><input type="text" name="U_Username" />
                    <label>Password </label><input type="password" name="U_Password" />
                    <input name="ok-login" value="Login" type="submit" />
                    <a href="index.php?page=quenmatkhau" id="quenmatkhau">Quên mật khẩu ?</a>
                    </form>
                </div>
				<?php }else{?>
					<div id="yourcart-left">
                        <h3>GIỎ HÀNG CỦA BẠN</h3>
                        <?php
						$ok= -1;
                            if(isset($_SESSION['cart'])){
                                $totalcart=0;
                                foreach($_SESSION['cart'] as $k=>$v)
                                {
                                if(isset($k)){
                                    $ok=2;
                                    $totalcart+=$v;
                                }
                                }
                            }
                            if ($ok != 2)
                            {
                                echo '<div align="center" style="height: 40px; line-height: 40px;">Bạn chưa có món nào!</div>';
                            }
                            else
                            {
                                $items = $_SESSION['cart'];
                                echo "<div style='color:#959595;padding-left: 15px;display:block; height:30px; line-height: 30px;'>Bạn có&nbsp;<span style=\"color: #FF0000;\">".$totalcart."&nbsp;món hàng.</span></div><div  class='clr'></div>";
                                foreach($_SESSION['cart'] as $key=>$value)
                                {
                                    $item[]=$key;
                                }
                                $str=implode(",",$item);
                                $sql="select * from Food where F_ID in ($str)";
                                $result=mysql_query($sql);
								$total = 0;
                                while($row=mysql_fetch_array($result))
                                {
                                    $total+=$_SESSION['cart'][$row['F_ID']]*$row['F_Price']- $_SESSION['cart'][$row['F_ID']]*$row['F_Price']*($row['F_Sale']/100);
                                }
                                echo "<div style='color:#959595;display:block; padding-left: 15px; height:30px; line-height:30px;'>Tổng tiền<span style=\"color: #FF0000;\">&nbsp;".number_format($total,3)." VNĐ</span></div>";
                        ?>
                        <div style=" text-align:center; margin-top:5px;">
                        <a href="index.php?page=yourcart#cart-message"><img border=0 src="images/thanhtoan.png" alt="Thanh toán | " /></a>
                        <a href="delcart.php"><img border=0 src="images/del.png" alt="Xóa giỏ hàng" /></a><br /><br />
                        </div>
                        <?php }?>
                    </div>
				<?php }?>
    			<div class="crl"></div>
				<div id="online-help">
                    <h3>HỖ TRỢ TRỰC TUYẾN</h3><br />
					<div id="link-hotro">
                    Hỗ trợ 1 <a href="ymsgr:sendIM?<?php echo getdata("select Infor_Noidung from infor where Infor_ID = '10'");?>&m=Xin chào!"> <img src="http://mail.opi.yahoo.com/online?u=<?php echo getdata("select Infor_Noidung from infor where Infor_ID = '10'");?>&amp;m=g&t=1" /></a><br />
                    Hỗ trợ 2 <a href="ymsgr:sendIM?<?php echo getdata("select Infor_Noidung from infor where Infor_ID = '11'");?>&m=Xin chào!">
                    <img src="http://mail.opi.yahoo.com/online?u=<?php echo getdata("select Infor_Noidung from infor where Infor_ID = '11'");?>&amp;m=g&t=1" /></a>
                    </div>
                </div>
 </div>
                <?php
					$page="";
					if(isset($_REQUEST['page'])){
						$page=$_REQUEST['page'];
					}
					switch($page){
						case "" :			include("main.php");			break;
						case "contact" :	include("contact.php");			break;
						case "logout" :		include("logout.php");			break;
						case "register":	include("register.php");		break;
						case "yourcart":	include("yourcart.php");		break;
						case "login":		include("login.php");			break;
						case "infor":		include("infor.php");			break;
						case "edit-acc":	include("edit-acc.php");		break;
						case "changepass":	include("changepass.php");		break;
						case "aboutus":		include("about.php");			break;
						case "huongdan":	include("guide.php");			break;
						case "quenmatkhau":	include("quenmatkhau.php");		break;
						case "cartprocess":	include("cartprocess.php");		break;
						default: 			include("main.php");			break;
					}
				?>
            <div class="crl"></div>
        </div>
        <div id="footer">
        	<ul id="menu-foot">
                <li><a href="index.php"><span>Trang chủ</span></a></li>
                <li><a href="?page=register"><span>đăng ký</span></a></li>
                <li><a href="?page=login"><span>đăng nhập</span></a></li>
                <li><a href="?page=yourcart"><span>giỏ hàng</span></a></li>
                <li><a href="?page=huongdan"><span>hướng dẫn</span></a></li>
                <li><a href="?page=aboutus"><span>about us</span></a></li>
                <li><a href="?page=contact"><span>liên hệ</span></a></li>
            </ul>
            <div id="copyright">
            	<?php
					echo getdata("select Infor_Noidung from infor where Infor_ID = '9'");
				?>
           </div>
       </div>
    </div>
    </div>
</body></html>