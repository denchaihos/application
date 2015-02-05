<?
function calage($pbday)
{
     $today = date("d/m/Y");
     list($bady , $bmonth , $byear) = explode("/" , $pbday);
     list($tday , $tmonth , $tyear) = explode("/" , $today);

     if($byear < 1970){
          $yearad =1970 - $byear;
          $byear =1970;
     }
     else
     {
          $yearad = 0;
     }
 
     $mbirth = mktime(0,0,0,$bmonth,$bday,$byear);
     $mnow = mktime(0,0,0,$tmonth,$tday,$tyear);

     $mage = ($mnow - $mbirth);
     $age = (date("Y",$mage)-1970 + $yearad)." ปี ".
     (date("m", $mage)-1)." เดือน " .
     (date("d", $mage)-1)." วัน" ; 

     return($age);
}
?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>:: สร้างฟังก์ชันคำนวณอายุเป็น ปี เดือน วัน จากวันที่เกิด ::</title>

<STYLE type=text/css>
  A:link { color: #0000cc; text-decoration:none}
  A:visited {color: #0000cc; text-decoration: none}
  A:hover {color: red; text-decoration: none}
 </STYLE>
<style type="text/css">
<!--
small { font-family: Arial, Helvetica, sans-serif; font-size: 8pt; } 
input, textarea { font-family: Arial, Helvetica, sans-serif; font-size: 9pt; } 
b { font-family: Arial, Helvetica, sans-serif; font-size: 10pt; } 
big { font-family: Arial, Helvetica, sans-serif; font-size: 14pt; } 
strong { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; font-weight : extra-bold; } 
font, td { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; } 
BODY { font-size: 11pt; font-family: Arial, Helvetica, sans-serif; } 
-->
</style>

</head>

<body>

<center>
<big>:: สร้างฟังก์ชันคำนวณอายุเป็น ปี เดือน วัน จากวันที่เกิด ::</big>

<br><br>

<u>คุณสามารถนำฟังก์ชันคำนวณอายุนี้ไปพัฒนาต่อในระบบของคุณได้เลยครับ</u>

</center>

<br><br>

วันที่เกิด : 02/02/1988
<br>อายุ : <?=calage("02/02/1988"); ?>

<br><br>


</body>

</html>