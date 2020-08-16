<div id="main-content">
    <!-- catalog dish  -->
    <div id="deitary">
    <h3><span>Suất ăn ngẫu nhiên</span></h3>
        <?php
            $sql="select * from food where FD_ID='0'";
            $result=mysql_query($sql);
            $i=1;
            while($row=mysql_fetch_assoc($result))
            {
                echo "<div class='food-detail'>";
                if($row['F_Image']==0){echo "<image src=\"images/product/svf.jpg\" alt=\"SVF-Cơm sinh viên\" width=\"130\" height=\"130\" />";}
                else{echo"<image src='images/product/".$row['F_Image']."' alt=\"SVF-Cơm sinh viên\" width=\"130\" height=\"130\" />";}
                echo "<br><span class='food-name'>".$row['F_Name']."</span>";
                echo "<br>Giá:<font color=#FF0000>".number_format($row['F_Price'],3)."</font> vnđ";
                echo "<p align=center style='margin-top: 5px;'><a href=addtocart.php?item=$row[F_ID]><img src=\"images/add-to-cart.png\" alt=\"Add to cart\" border='0'></a></p>";
                $i++;
                if($i>3)
                {
                    echo"<div style=\"clear: both;\"></div>";
                    $i=1;
                }
            echo "</div>";
            }
        ?>
    </div>
    <div class="crl"></div>
    <!-- catalog dish  -->
    <div id="dish">
    <h3><span>Suất ăn tự chọn</span>
        <select id="chonmon"  name="product" onchange="location.href='index.php?product='+this.value+'&#dish'">
        <option value="" selected="selected">ALL</option>
        <?php
        $sql="select * from Food_type where FD_ID <> 0 order by FD_ID ASC";
        $result=mysql_query($sql);
        while($row=mysql_fetch_array($result))
        { ?>
        <option <?php if(isset($_REQUEST['product']) && $_REQUEST['product']==$row['FD_ID']) echo"selected=1"; ?> value="<?php echo $row['FD_ID'];?>"><?php echo $row['FD_Name'];?></option>
        <?php } ?>
        </select>
       </h3>
        <?php
        //tat ca cac mon an
			$product="";
			if(isset($_REQUEST['product']) && $_REQUEST['product'] !=""){
				$product=$_REQUEST['product'];
			}
            if($product=='')
            {
                $string= "and 1";
            }else{
                $string=" and FD_ID='".$product."'";
            }
           $sql="select * from food where FD_ID <>0 $string";
            $result=mysql_query($sql);
            while($row=mysql_fetch_array($result))
            {
                echo "<div class='food-detail'>";
                if($row['F_Image']==''){echo "<image src=\"images/product/svf.jpg\" alt=\"SVF-Cơm sinh viên\" width=\"100\" height=\"100\" />";}
                else{echo"<image src='images/product/".$row['F_Image']."' alt=\"SVF-Cơm sinh viên\" width=\"100\" height=\"100\" />";}
                echo "<br><span class='food-name'>".$row['F_Name']."</span>";
                echo "<br>Giá:<font color=#FF0000>".number_format($row['F_Price'],3)."</font> vnđ";
                echo "<p align=center style='margin-top: 5px;'><a href=addtocart.php?item=$row[F_ID]&back=dish><img src=\"images/add-to-cart.png\" alt=\"Add to cart\" border='0'></a></p>";
                $i++;
                if($i>=6)
                {
                    echo"<div style=\"clear: both;\"></div>";
                    $i=1;
                }
                echo "</div>";
            }
        ?>
    </div>
</div>