<?php
//=================================================================================================

   //[Ten function] : chuanSoanthao($string) 

   //[Chuc nang]	: - Chuyen noi dung cua bo soan thao thanh dang chuan de luu vao CSDL

   //[Dau vao]		: + $string	                     : Noi dung can chuan hoa

   //==================================================================================================

		function chuanSoanthao($string)

		{

		   $str=str_replace("'","\'",$string);

		   $str=str_replace("\"","\\\"",$str);

		   return $str;	  

		}

	/********************************Ket thuc ham chuanSoanthao********************************/


	function redirect($url, $message="", $delay=1) { 

		echo "<meta http-equiv='refresh' content='$delay;URL=$url'>"; 

		if (!empty($message)) echo "<div style='font-family: Arial, Sans-serif;

		font-size: 14pt;' align=center>$message</div>"; 

		exit; 

	} 

   /*Ket thuc ham redirect*/
//===========================================================================

		function paging($totalRows,$maxRows,$curPg,$curRow)

		{

			if($totalRows%$maxRows==0)  

				$totalPages = (int)($totalRows/$maxRows);

			 else 

				$totalPages = (int)($totalRows/$maxRows+1);

			 $curPg =1;

			 if($HTTP_POST_VARS{"curPg"}=="") 

				$curPg =1;

			 else 

				$curPg = $HTTP_POST_VARS{"curPg"};   

			 $curRow = ($curPg-1)*$maxRows+1;

			 if($totalRows>$maxRows)

				{

				$start=1;

				$end=1;

				$paging1 ="";				 	 

				for($i=1;$i<=$totalPages;$i++)

				{	 

				if(($i>((int)(($curPg-1)/$maxPages))* $maxPages) && ($i<=((int)(($curPg-1)/$maxPages+1))* $maxPages))

						{

						if($start==1) $start=$i;

						if($i==$curPg)      

							$paging1 .=  $i."&nbsp;&nbsp;";

						else    

							$paging1 .= "<a href='javascript:GotoPage(".$i.")'  class='Titlink_BR12'>".$i."</a>&nbsp;&nbsp;";	

						$end=$i;	

						}

				}

				$paging.= "<span class='Titlink_BR12'>Xem ti&#7871;p :</span>&nbsp;&nbsp;" ;

				 if($curPg>$maxPages)

					$paging .="<a href='javascript:GotoPage(".($start-1).")'  class='Titlink_BR12'><<</a>&nbsp;&nbsp;";

				$paging.=$paging1;

				 if(((($curPg-1)/$maxPages+1)*$maxPages) < (ceil($totalPages/$maxPages))*$maxPages)

					 $paging .= "<a href='javascript:GotoPage(".($end+1).")'  class='Titlink_BR12'>>></a>&nbsp;&nbsp;";

					 //echo $paging;

					 //$paging.=$paging1;

				}  

				return $paging;

		}

		/********************************Ket thuc ham paging********************************/

	

//********************************************************



function string_short($str,$num)

		{ 

		  	if(is_numeric($num)&&$num>0)

			{

				 $str=explode(" ", trim($str));

				 $s_str="";

				 for ($i=0; $i<$num-1; $i++){

				 	$s_str.=$str[$i]." ";

				 }

				 $s_str.=$str[$num-1];

				if($num < count($str)){

					$s_str.="...";

				}

				return $s_str;

			}

			else

			{

				return "";

			}

			//return $number;

		   

		}

//////////////////////////////////////////////////////////////////////////

function getdata($query,$multiple=false,$all=0){
	global $link;
    @mysql_select_db(DB, $link);
	$sql_=$query;
	$result = @mysql_query($sql_);
	if($result===false)
	{
		echo "error_getdata $query";
		return;
	}
	if($multiple){
 		if($all==1)//Lấy tất bản ghi
		{
			$recode = $result;
  		}else//Lấy 2 bản ghi
		{
			while($row=mysql_fetch_array($result)){
					$recode[$row[0]] = $row[1];
		}
	}
	return $recode;
}else{
		//Chỉ lấy 1 bản ghi
		$row=mysql_fetch_array($result)	;
			$count=count($row);
			if($count>2)	// neu co nhieu (2) truong tro len thi tra ve kieu mang
				return $row;
			else			// nguoc lai chi co 1 truong thi tra ve kieu bien binh thuong
			{
				$kq=$row[0];
				$kq=trim($kq);
				return $kq;
			}
		}
}

 function chuyenngaythangnam($ngaythangnam)
   {
		$year=substr($ngaythangnam,0,4);
		$month=substr($ngaythangnam,5,2);
		$date=substr($ngaythangnam,8,2);
		$namthangngay=$date."/".$month."/".$year;
		return $namthangngay;
   }
   
 function randpass(){
$characters = array(
"A","B","C","D","E","F","G","H","I","J","K","L","M","a","b","c","d","e","f","g","h","i","j","k","l","m",
"N","O","P","Q","R","S","T","U","V","W","X","Y","Z","n","o","p","q","r","s","t","u","v","w","x","y","z",
"1","2","3","4","5","6","7","8","9","!","@","#","$","%","^","&","*");

//make an "empty container" or array for our keys
$keys = array();

//first count of $keys is empty so "1", remaining count is 1-6 = total 7 times
while(count($keys) < 6) {
    //"0" because we use this to FIND ARRAY KEYS which has a 0 value
    //"-1" because were only concerned of number of keys which is 32 not 33
    //count($characters) = 33
    $x = mt_rand(0, count($characters)-1);
    if(!in_array($x, $keys)) {
       $keys[] = $x;
    }
}
$random_chars = "";
foreach($keys as $key){
   $random_chars .= $characters[$key];
}
return $random_chars;
}  
?>