<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/10/2557
 * Time: 10:33 น.
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Diag</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--<script src="js/jquery-1.4.2.js" type="text/javascript"></script>-->
    <!--<script src="js/jquery-2.1.3.min.js" type="text/javascript"></script>-->
<!--    <script src="js/jquery-1.11.0.min.js"></script>-->
    <!-- Bootstrap -->
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    <style type="text/css">
        .baackgroud_me{
            
            height: 100%;
            background-color: #e0e0e0;
            padding: 5px;
            margin: auto;
        }
        .vstdate{
            overflow: scroll;
            width: 200px;
            height:500px;
            //position: left;
            cursor: pointer;
        }
        .content_history{
            
            height:500px;
            width: 1000px;
        }
        #title{
            font-size: 12px;
            color: #000;
            background-color: #ffffff;
        }
        .text_content{
            font-size: 12px;
        }
        #space{
            margin-left: 50px;
        }
        .panel{
            margin-bottom: 0px;
        }
    </style>
 
</head>
<body>
    <?    
    date_default_timezone_set('Asia/Bangkok');
    function DateThai($strDate) {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strHour= date("H",strtotime($strDate));
        $strMinute= date("i",strtotime($strDate));
        $strSeconds= date("s",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        //return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
        return "$strDay $strMonthThai $strYear";
    }
    function timespan($seconds = 1, $time = ''){
         if ( ! is_numeric($seconds)){
          $seconds = 1;
         }
         if ( ! is_numeric($time)){
          $time = time();
         }
         if ($time <= $seconds){
          $seconds = 1;
         }else{
          $seconds = $time - $seconds;
         }
         $str = '';
         $years = floor($seconds / 31536000);
         if ($years > 0) { 
          $str .= $years.' ปี, ';
         } 
         $seconds -= $years * 31536000;
         $months = floor($seconds / 2628000);
         if ($years > 0 OR $months > 0) {
          if ($months > 0) { 
           $str .= $months.' เดือน, ';
          } 
          $seconds -= $months * 2628000;
         }
         $weeks = floor($seconds / 604800);
         if ($years > 0 OR $months > 0 OR $weeks > 0) {
          if ($weeks > 0) { 
           $str .= $weeks.' สัปดาห์, ';
          }
          $seconds -= $weeks * 604800;
         }   
         $days = floor($seconds / 86400);
         if ($months > 0 OR $weeks > 0 OR $days > 0) {
          if ($days > 0) { 
           $str .= $days.' วัน, ';
          }
          $seconds -= $days * 86400;
         }
         $hours = floor($seconds / 3600);
         if ($days > 0 OR $hours > 0) {
          if ($hours > 0) {
           $str .= $hours.' ชั่วโมง, ';
          }
          $seconds -= $hours * 3600;
         }
         $minutes = floor($seconds / 60);
         if ($days > 0 OR $hours > 0 OR $minutes > 0){
          if ($minutes > 0) { 
           $str .= $minutes.' นาที, ';
          }
          $seconds -= $minutes * 60;
         }
         if ($str == '')  {
          $str .= $seconds.' วินาที';
         }
         return substr(trim($str), 0, -1);
        }
$today = time();

                            
                            //$date = date('m/d/Y h:i:s a');                            
                            //echo '<h5>'.DateThai($date).'</h5>';
    $hn = explode(',',$_GET['hn']);
    $hn = $hn[0];
    $vn = $hn[1];
    ?>
    Patient EMR
    <input type="hidden" name="hn" id="hnn" value="<? echo $hn ?>"/>
    <input type="hidden" name="vn" id="hnn" value="<? echo $vn ?>"/>
   
<?
    
    

    include 'connect.php';
    $sql = 'select vstdttm ,time(vstdttm) as vstdttmtime from ovst where hn = '.$hn.' order by vstdttm desc';
    $result = mysql_query($sql,$con);
    ?>
    <div class="baackgroud_me col-lg-12">
        <div class="col-lg-2 ">
            <div class="vstdate">
            
                <table class="table  table-hover table-striped" >
                    <thead>
                        <tr>
                            <th style="width: 150px">วันที่มารับบริการ</th>
                            
                        </tr>
                    </thead>
                     <tbody>
                    <?
                    while ($obj = mysql_fetch_object($result)){
                        echo '<tr>';
                        echo '<td id="vstdate" onclick="test(this)">';
                        echo $obj->vstdttm;
                        echo '</td>';

                        echo '</tr>';
                    }
                    ?>


                    </tbody>
                </table>  
            </div>
        </div>
        <div class="col-lg-10 ">
            <div class="content_history">
                
                <?
                    $sql = 'select p.*,m.namemrt,o.nameoccptn,r.namerlgn,t.nametumb,a.nameampur,c.namechw,py.namepttype '
                            . 'from pt p join mrtlst m on m.mrtlst = p.mrtlst '
                            . 'join occptn o on o.occptn = p.occptn '
                            . 'join rlgn r on r.rlgn = p.rlgn '
                            . 'JOIN tumbon t on t.chwpart=p.chwpart and t.amppart=p.amppart and t.tmbpart=p.tmbpart '
                            . 'JOIN ampur a on a.chwpart=p.chwpart and a.amppart=p.amppart '
                            . 'JOIN changwat c on c.chwpart=p.chwpart '
                            . 'join pttype py on py.pttype = p.pttype'
                            . ' where p.hn = '.$hn.' ';
                    $result = mysql_query($sql,$con);
                    $obj = mysql_fetch_object($result);
                    
                ?>
                <div class="panel panel-warning">
                    <div class="panel-heading" >
                        <h3 class="panel-title">ประวัติทั่วไป</h3>
                    </div>
                    <div class="panel-body" id="panel">                        
                        <span class="label label-default" id="title">ชื่อ-นามสกุล&nbsp</span>
                        <span class="text_content"><? echo $obj->fname.'  &nbsp&nbsp'.$obj->lname; ?></span>
                        <span id="space" ></span>
                        <span class="label label-default" id="title">วันเดือนปีเกิด&nbsp</span>
                        <span class="text_content"><? echo DateThai($obj->brthdate).'  &nbsp&nbsp'.'' ?></span>
                        <span class="label label-default" id="title">อายุ&nbsp</span>
                        <span class="text_content"><? echo timespan($obj->brthdate,$today).'  &nbsp&nbsp'.'' ?></span>
                        <span class="label label-default" id="title">เลขที่บัตรประชาชน&nbsp</span>
                        <span class="text_content"><? echo $obj->pop_id.'  &nbsp&nbsp'.'' ?></span>
                        <br/>
                        <span class="label label-default" id="title">สถานภาพ&nbsp</span>
                        <span class="text_content"><? echo $obj->namemrt.'  &nbsp&nbsp'.'' ?></span>
                        <span class="label label-default" id="title">อาชีพ&nbsp</span>
                        <span class="text_content"><? echo $obj->nameoccptn.'  &nbsp&nbsp'.'' ?></span>
                        <span class="label label-default" id="title">ศาสนา&nbsp</span>
                        <span class="text_content"><? echo $obj->namerlgn.'  &nbsp&nbsp'.'' ?></span>
                        <span class="label label-default" id="title">กรุ๊ปเลือด&nbsp</span>
                        <span class="text_content"><? if($obj->bloodgrp==''){ echo 'ไม่ระบุ  &nbsp&nbsp';  }  else { echo $obj->bloodgrp.'  &nbsp&nbsp'.'' ; } ?></span>
                        <span class="label label-default" id="title">ประวัติการแพ้ยา&nbsp</span>
                        <span class="text_content"><? if($obj->allergy=='' || $obj->allergy == null ){ echo 'ไม่ระบุ  &nbsp&nbsp';  }  else { echo $obj->allergy.'  &nbsp&nbsp'.'' ; } ?></span>
                        <span class="label label-default" id="title">สิทธิ์ประจำตัว&nbsp</span>
                        <span class="text_content"><? echo $obj->namepttype.'  &nbsp&nbsp'.'' ;  ?></span>
                       

                    </div>
                </div>
                <div class="panel panel-warning">
                    <div class="panel-heading" >
                        <h3 class="panel-title">ที่อยู่</h3>
                    </div>
                    <div class="panel-body" id="panel"> 
                        <span class="label label-default" id="title">เลขที่&nbsp</span>
                        <span class="text_content"><? echo $obj->addrpart.'  &nbsp&nbsp'; ?></span>
                        <span class="label label-default" id="title">หมู่&nbsp</span>
                        <span class="text_content"><? echo $obj->moopart.'  &nbsp&nbsp'.'' ?></span>
                        <span class="label label-default" id="title">ตำบล&nbsp</span>
                        <span class="text_content"><? echo $obj->nametumb.'  &nbsp&nbsp'.'' ?></span>
                        <span class="label label-default" id="title">อำเภอ&nbsp</span>
                        <span class="text_content"><? echo $obj->nameampur.'  &nbsp&nbsp'.'' ?></span>
                        <span class="label label-default" id="title">จังหวัด&nbsp</span>
                        <span class="text_content"><? echo $obj->namechw.'  &nbsp&nbsp'.'' ?></span>
                        <span class="label label-default" id="title">โทรศัพท์&nbsp</span>
                        <span class="text_content"><? echo $obj->infmtel.','.$obj->hometel.'  &nbsp&nbsp'.'' ?></span>
                    </div> 
                </div>
                <div class="panel panel-warning">
                    <div class="panel-heading" >
                        <h3 class="panel-title">ประวัติการรักษา</h3>
                    </div>
                    <div class="panel-body" id="panel">
                        <h6><b>ข้อมูลผู้ป่วย</b></h6>
                        <h6><b>ข้อมูลซักประวัติ</b></h6>
                        <span class="label label-default" id="title">น้ำหนัก&nbsp</span>
                        <span id="bw" class="text_content"> </span>
                        <span class="label label-default" id="title">ส่วนสูง&nbsp</span>
                        <span id="height" class="text_content"> </span>
                        <span class="label label-default" id="title">รอบเอว&nbsp</span>
                        <span id="waist_cm" class="text_content"> </span>
                        <span class="label label-default" id="title">BMI&nbsp</span>
                        <span id="bmi" class="text_content"> </span>
                        <span class="label label-default" id="title">อุณหภูมิ&nbsp</span>
                        <span id="tt" class="text_content"> </span>
                        <span class="label label-default" id="title">pr&nbsp</span>
                        <span id="pr" class="text_content"> </span>
                        <span class="label label-default" id="title">rr&nbsp</span>
                        <span id="rr" class="text_content"> </span>
                        <span class="label label-default" id="title">BP&nbsp</span>
                        <span id="sbp" class="text_content"> </span>
                        <br/>
                        <span class="label label-default" id="title">CC&nbsp</span>
                        <span id="cc_h" class="text_content"> </span>
                        <div>
                            <span class="label label-default" id="title">PI&nbsp</span>
                            <span id="pi_h" class="text_content"> </span>  
                        </div>
                        <div class="col-lg-6">
                            <h6><b>ข้อมูลการตรวจร่างกาย</b></h6>
                            <span id="pe_h" class="text_content"> </span>  
                        </div>
                        <div class="col-lg-6">
                            <h6><b>ข้อมูลการวินิจฉัย</b></h6>
                            <span class="label label-default" id="title">PDX&nbsp</span>
                            <span id="pdx_h" class="text_content"> </span>
                            <br/>
                            <span class="label label-default" id="title">Dx Other&nbsp</span>                        
                            <span id="dx_other_h" class="text_content"> </span> 
                        </div>

                        
                        

                    </div>
                </div>    
                
            </div>
        </div>    
    </div>    

</body>
</html>