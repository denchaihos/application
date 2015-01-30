<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 14/11/2557
 * Time: 8:40 น.
 */

?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css" media="print">

        @page
        {
            size: auto;   /* auto is the initial value */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }
        body{
            font-family: AngsanaUPC;/*BrowalliaUPC;*/
            font-size: 18px;
            margin: 0px;  /* the margin on the content before printing */
        }
        table {table-layout: fixed;}
        .mytable{
            font-family: AngsanaUPC;/*BrowalliaUPC;*/
            font-size: 18px;
            border: none;
        }
        div.content{
            margin-left: 30px;
            margin-right: 30px;
            margin-top: 0px;
            padding-left: 30px;
            padding-right: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            border: 1px solid;
        }
        div#subcontent{
            margin-left: 30px;
            margin-right: 30px;
            margin-top: 0px;
            padding-left: 10px;
            padding-right: 10px;


        }

        #head1{
            font-family: AngsanaUPC;/*BrowalliaUPC;*/
            font-size: 18px;
            font-weight: bold;
        }
       #foot_note{

            font-size: 12px;
           margin-left: 30px;
           margin-right: 30px;
           margin-top: 0px;
           padding-left: 30px;
           padding-right: 10px;



        }

    </style>
    <script language="Javascript">

        function MyOnLoad()
        {
            window.print();
            var WshShell = new ActiveXObject("WScript.Shell");
            WScript.Sleep(100);
            WshShell.SendKeys("{ENTER}");

            //window.onfocus=function(){ window.close();}
        }
        function closeAll(){
            window.parent.close();


        }

    </script>
</Head>
<Body OnLoad="MyOnLoad()" onfocus="closeAll()">
<?
date_default_timezone_set('Asia/Bangkok');

	function DateThai($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        //$strHour= date("H",strtotime($strDate));
        //$strMinute= date("i",strtotime($strDate));
        //$strSeconds= date("s",strtotime($strDate));
        $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน.","พฤษภาคม","มิถุนายน","กรกฏาคม.","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        $strMonthThai=$strMonthCut[$strMonth];
       // return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
        return "วันที่  $strDay      เดือน  $strMonthThai    พ.ศ.  $strYear";
    }

$strDate =  date("Y-m-d");
$curyear = date("Y");
$hn = $_POST['hn'];
$strpos_doctor =strpos($_POST[doctor], ":");
$lcno = substr($_POST[doctor],0,$strpos_doctor);
$doctorname = substr($_POST[doctor],$strpos_doctor+1,80);

	//echo "ThaiCreate.Com Time now : ".DateThai($strDate);

    include 'connect.php';
    $sql = "SELECT p.male,p.mrtlst,p.pname,CONCAT(p.fname,'   ',p.lname) as pt,p.pop_id,$curyear - year(p.brthdate) as age,CONCAT('เลขที่  ',p.addrpart,'    หมู่  ',p.moopart,'      ต.  ',t.nametumb,'      อ.  ',a.nameampur,'     จ.  ',c.namechw) as address from pt p
JOIN tumbon t on t.chwpart=p.chwpart and t.amppart=p.amppart and t.tmbpart=p.tmbpart
JOIN ampur a on a.chwpart=p.chwpart and a.amppart=p.amppart
JOIN changwat c on c.chwpart=p.chwpart
WHERE p.hn= '$hn'";
    $result = mysql_query($sql);
    $obj = mysql_fetch_object($result);
    //echo $obj->fname;
?>

<br/>

<center><h1>ใบรับรองแพทย์</h1></center>

<div class="content">
    <div id="head1">ส่วนที่ ๑ ของผู้รับใบรับรองสุขภาพ</div>
    <div id="subcontent">
        ข้าพเจ้า  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?
        if($obj->pname  == ''){
            if($obj->male == 1 && $obj->age < 15){
                echo "เด็กชาย";
            }else if($obj->male == 2 && $obj->age < 15){
                echo "เด็กหญิง";
            }else if($obj->male == 1 && $obj->age > 15){
                echo "นาย";
            }else if($obj->male == 2 && $obj->age > 15 && $obj->mrtlst != 1){
                echo "นาง";
            }else{
                echo "";
            }
        }else{
            echo $obj->pname;
        }

        echo $obj->pt;
        ?>
        <br/>
        สถานที่อยู่ (ที่สามารถติดต่อได้) &nbsp;&nbsp;&nbsp; <? echo $obj->address ?>
        <br/>
        หมายเลขบัตรประชาชน  &nbsp;&nbsp;&nbsp;<? echo $obj->pop_id  ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้าขอใบรับรองสุขภาพโดยมีประวัติสุขภาพดังนี้
        <br/>
        <table border="0" class="mytable">
            <tr><td>  ๑. โรคประจำตัว</td><td> &#9633 &nbsp;&nbsp;&nbsp;ไม่มี</td><td>&nbsp;&nbsp;&nbsp; &#9633 &nbsp;&nbsp;&nbsp;มี (ระบุ)</td><td>..............................................................................</td></tr>
            <tr><td>  ๒. อุบัติเหตุ และผ่าตัด</td><td> &#9633 &nbsp;&nbsp;&nbsp;ไม่มี</td><td>&nbsp;&nbsp;&nbsp; &#9633 &nbsp;&nbsp;&nbsp;มี (ระบุ)</td><td>..............................................................................</td></tr>
            <tr><td>  ๓. เคยเข้ารับการรักษาในโรงพยาบาล</td><td> &#9633 &nbsp;&nbsp;&nbsp;ไม่มี</td><td>&nbsp;&nbsp;&nbsp; &#9633 &nbsp;&nbsp;&nbsp;มี (ระบุ)</td><td>..............................................................................</td></tr>
            <tr><td colspan="4">  ๔. ประวัติอื่นที่สำคัญ...................................................................................................................</td></tr>
            <tr><td></td><td></td><td></td><td>ลงชื่อ.................................................................</td></tr>
            <tr><td colspan="3" style="font-size: 14px">(กรณีเด็กที่ไม่สามารถรับรองตนเองได้ให้ผู้ปกครองลงนามรับรองแทน)</td><td><? echo DateThai($strDate);?> </td></tr>
        </table>
    </div>


</div>
<div class="content">
    <div id="head1">ส่วนที่ ๒ ของแพทย์</div>
    <div id="subcontent">
        สถานที่ตรวจ  โรงพยาบาลทุ่งศรีอุดม  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo DateThai($strDate);?>
        <br/>
        ข้าพเจ้า   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $doctorname; ?>
        <br/>
        ใบประกอบวิชาชีพเวชกรรมเลขที่   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $lcno; ?>
        <br/>
        สถานที่ประกอบวิชาชีพเวชกรรม   โรงพยาบาลทุ่งศรีอุดม
        <br/>
        ได้ตรวจร่างกาย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?
        if($obj->pname  == ''){
            if($obj->male == 1 && $obj->age < 15){
                echo "เด็กชาย";
            }else if($obj->male == 2 && $obj->age < 15){
                echo "เด็กหญิง";
            }else if($obj->male == 1 && $obj->age > 15){
                echo "นาย";
            }else if($obj->male == 2 && $obj->age > 15 && $obj->mrtlst != 1){
                echo "นาง";
            }else{
                echo "";
            }
        }else{
            echo $obj->pname;
        }
        echo $obj->pt
        ?>
        <br/>
        แล้วเมื่อวันที่  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo DateThai($strDate);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ดังมีรายละเอียดดังนี้
        <br/>
        น้ำหนักตัว...........กิโลกรัม.&nbsp;&nbsp;&nbsp;   ความสูง...........เซนติเมตร&nbsp;&nbsp;&nbsp;&nbsp;ความดันโลหิต..............มม.ปรอท&nbsp;&nbsp;&nbsp;ชีพจร.............ครั้ง/นาที
        <br/>
        สภาพร่างกายทั่วไป  อยู่ในเกณฑ์ &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&#9633 &nbsp;&nbsp;ปกติ &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&#9633 &nbsp;&nbsp;ผิดปกติ(ระบุ)....................................................................
        <br/>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;ขอรับรองว่าบุคคลดังกล่าว  ไม่เป็นผู้มีร่างกายทุพพลภาพจนไม่สามารถปฏิบัติหน้าที่ได้  ไม่ปรากฎอาการของ
        <br/>
        โรคจิต  หรือจิตฟั่นเฟือน  หรือปัญญาอ่อน  ไม่ปรากฎ อาการของการติดยาเสพติดให้โทษ  และอาการของโรคพิษสุรา
        <br/>
        เรื้อรัง  และไม่ปรากฎอาการและอาการแสดงของโรคต่อไปนี้
        <br/>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;(๑) โรคเรื้อนในระยะติดต่อหรือในระยะที่ปรากฎอาการเป็นที่รังเกียจแก่สังคม<br/>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;(๒) โรควัณโรคในระยะอันตราย<br/>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;(๓) โรคเท้าช้างในระยะที่ปรากฎอาการเป็นที่รังเกียจแก่สังคม<br/>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;(๔) ...........................................................................................................................................................................<br/>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;.<sup>(ถ้าจำเป็นต้องตรวจหาโรคที่เกี่ยวข้องกับการปฏิบัติงานของผู้รับการตรวจให้ระบุในข้อนี้)</sup><br/>
        ...............................................................................................................................................................................................<br/>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;สรุปความเห็นแพทย์และข้อแนะนำของแพทย์ .......................................................................................................<br/>
        ...............................................................................................................................................................................................<br/>

        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;ลงชื่อ..............................................................แพทย์ผู้ตรวจร่างกาย


    </div>

</div>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<div  id="foot_note">หมายเหตุ  (๑) ต้องเป็นแพทย์ซึ่งได้ขึ้นทะเบียนรับใบอนุญาตประกอบวิชาชีพเวชกรรม  (๒) ให้แสดงว่าเป็นผู้มีร่างกายสมบูรณ์เพียงใด<br/>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; (๓) แบบฟอร์มนี้ได้รับการรับรองจากมติคณะกรรมการแพทย์สภาในการประชุมครั้งที่  ๘/๒๕๕๑ วันที่ ๑๔ สิงหาคม ๒๕๕๑<br/>
    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; * ใบรับรองแพทย์ฉบับนี้ให้ใช้ได้ ๑ เดือนนับแต่วันที่ตรวจร่างกาย (๔) ใบรับรองแพทย์นี้จะสมบูรณ์เมื่อประทับตราโรงพยาบาลแล้วเท่านั้น<br/>

</div>

</Body>
</html>