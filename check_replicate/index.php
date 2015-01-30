<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<style type="text/css">
.style_tb{
     border: 1px solid #FF6600; 
	 padding: 2px;
	 -webkit-border-radius: 10px;
	 -moz-border-radius: 10px;
	 border-radius: 10px;
	 font-family:Tahoma;
	 font-size:14px;
	 color:#0000FF;
	 /*text-shadow: 0 0 0.2em #87F, 0 0 0.2em #87F, 0 0 0.2em #87F;*/
	 text-align:right;
	}
.sty_textbox{
    background: white;
    border: 1px double #DDD;
    border-radius: 5px;
    box-shadow: 0 0 5px #333;
    color: #666;
    float: left;
    padding: 5px 10px;
    width: 165px;
    outline: none;
   }
   .sty_bt{ 
    width: 110px; 
    height: 35px;
    background:#ff5c00;
    font-family:Tahoma, Geneva, sans-serif; 
    font-size:15px;
    padding: 5px 10px 5px 10px; 
    color: #fff; 
    font-weight: bold; 
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px; 
   -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
   -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5); 
    text-shadow: 0 -1px 1px rgba(0,0,0,0.25); 
    border-bottom: 1px solid rgba(0,0,0,0.25); 
   cursor: pointer; 
    border-left:none; 
   border-top:none; 
   margin:10px 0 10px 0; 
  -webkit-border-radius: 10px;
   -moz-border-radius: 10px;
   border-radius: 10px;
    } 
  .sty_bt:hover{ 
    background:#FF7E33; 
  } 
   .sty_title{     
    height: 35px;
    background:#ff5c00;
    font-family:Tahoma, Geneva, sans-serif; 
    font-size:15px;
    padding: 5px 10px 5px 10px; 
    color: #fff; 
    font-weight: bold; 
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px; 
   -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
   -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5); 
    text-shadow: 0 -1px 1px rgba(0,0,0,0.25); 
    border-bottom: 1px solid rgba(0,0,0,0.25); 
   cursor: pointer; 
    border-left:none; 
   border-top:none; 
   margin:10px 0 10px 0; 
  -webkit-border-radius: 10px;
   -moz-border-radius: 10px;
   border-radius: 10px;
   }
   .sty_line{
   border-left-style:solid;
   border-left-color:#999999;   
   }
  </style>
</head>

<body>
<form method="post"><table border="0" align="center" cellpadding="5" cellspacing="1" class="style_tb">
  <tr>
    <td colspan="2" class="sty_title"><div align="center"><strong>Master</strong></div></td>
    <td colspan="2" class="sty_title"><div align="center"><strong>Slave</strong></div></td>
    </tr>
  <tr>
    <td align="right">host:</td>
    <td><input name="conn_1" type="text" id="conn_1" value="<?php echo $_POST[conn_1]; ?>" class="sty_textbox"></td>
    <td align="right" class="sty_line">host:</td>
    <td><input name="conn_2" type="text" id="conn_2" value="<?php echo $_POST[conn_2]; ?>" class="sty_textbox"></td>
  </tr>
  <tr>
    <td align="right">user:</td>
    <td><input name="user_1" type="text" id="user_1" value="<?php echo $_POST[user_1]; ?>" class="sty_textbox"></td>
    <td align="right" class="sty_line">user:</td>
    <td><input name="user_2" type="text" id="user_2" value="<?php echo $_POST[user_2]; ?>" class="sty_textbox"></td>
  </tr>
  <tr>
    <td align="right">pass:</td>
    <td><input name="pass_1" type="text" id="pass_1" value="<?php echo $_POST[pass_1]; ?>" class="sty_textbox"></td>
    <td align="right" class="sty_line">pass:</td>
    <td><input name="pass_2" type="text" id="pass_2" value="<?php echo $_POST[pass_2]; ?>" class="sty_textbox"></td>
  </tr>
  <tr>
    <td align="right">db:</td>
    <td><input name="db_1" type="text" id="db_1" value="hi" class="sty_textbox"></td>
    <td align="right" class="sty_line">db:</td>
    <td><input name="db_2" type="text" id="db_2" value="hi" class="sty_textbox"></td>
  </tr>
  <tr>
    <td colspan="4"><div align="center">
      <input type="submit" name="button" id="button" value="OK"  class="sty_bt">
      <input type="reset" name="button2" id="button2" value="Reset" class="sty_bt"/>
    </div></td>
    </tr>
</table>
</form>
<hr size="1">
<?php 
if ($_POST[db_1] !=''){
function getmysql($sql,$op=NULL){
	if(strlen($op)>1){ $rs = mysql_fetch_array(mysql_query($sql)); $str=$rs[$op]; return $str; }
}
function connects($i,$u,$p){
$GLOBALS['mysql_links']=@mysql_connect($i,$u,$p) or die("เกิดข้อผิดพลาด: ไม่สามารถเชื่อมต่อได้");
@mysql_query('SET NAMES "utf8"') or die('เกิดข้อผิดพลาด: ไม่สามารถกำหนดชนิดฐานข้อมูลได้'); 
@mysql_query("SET character_set_results=utf8") or die('เกิดข้อผิดพลาด: ไม่สามารถตั้งค่าแสดงผลลัพธ์ได้'); 
}
 connects($_POST[conn_1], $_POST[user_1], $_POST[pass_1]);
@mysql_select_db($_POST[db_1]) or die("เกิดข้อผิดพลาด: ไม่สามารถระบุฐานข้อมูล");
 $result = mysql_list_tables($_POST[db_1]); 
 //$num_rows = mysql_num_rows($tableresult);
 $num_rows = mysql_num_rows($result);
echo "<table width='70%'>";
echo "<th widht='50%'>TableName</th>";
echo "<th widht='25%'>Master:Record</th>";
echo "<th widht='25%'>Slave:Record</th>";
for ($i = 0; $i < $num_rows; $i++) {
	connects($_POST[conn_1], $_POST[user_1], $_POST[pass_1]);
	@mysql_select_db($_POST[db_1]) or die("เกิดข้อผิดพลาด: ไม่สามารถระบุฐานข้อมูล");
	$rsx = getmysql("SELECT count(*) as rxs FROM `".mysql_tablename($result, $i)."`","rxs");
	if($rsx){
	echo "<tr>";
	echo "<td style='padding-left: 10px'>";
    		echo " ", mysql_tablename($result, $i),"  ";
	echo "</td>";
	echo "<td align='center'>";
		echo $rsx;
	echo "</td>";
	echo "<td align='center'>";
		connects($_POST[conn_2], $_POST[user_2], $_POST[pass_2]);
		@mysql_select_db($_POST[db_2]) or die("เกิดข้อผิดพลาด: ไม่สามารถระบุฐานข้อมูล");
		echo getmysql("SELECT count(*) as rxs FROM `".mysql_tablename($result, $i)."`","rxs")." ";
		echo "<br>\n";
	echo "</td>";
	echo "</tr>";
	}
}
echo "</table>";
}
?>
</body>
</html>
