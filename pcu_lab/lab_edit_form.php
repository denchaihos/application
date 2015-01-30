<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
        <meta http-equiv="pragma" content="no-cache" />
        <title></title>
        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">  
                       function reply_click() {
  alert('me');
}
            $(document).ready(function () {
                $('#1').focus(); 
                //disable scroll mouse on select tag
                $('select').each(function() {
                    $(this).on('mousewheel', function(){
                    return false;
                });
            });
    
                //////////////

                /*    e = jQuery.Event("keypress")
                e.which = 32 //choose the one you want
                    $("#1").keypress(function(){
                     e.which = 32;
                    }).trigger(e)*/
                        var e = jQuery.Event("keydown");
                e.which = 32; // # Some key code value
                $("select").trigger(e);
                ///////////
                // go next element  after change value
                $("#pculab").change(function(e) {                   
                    var cur = document.activeElement.id;                  
                    var cur =parseInt(cur) +1;
                    var curtag = parseInt(cur)-1;
                    var nexttag =('#'+cur );
                     //alert(curtag);  
                    $(nexttag).focus();                   
                });   
                
                // go next element after keypress enter
               $("#pculab").keypress(function(e) {                   
                    var cur = document.activeElement.id;                  
                    var cur =parseInt(cur) +1;
                    var curtag = parseInt(cur)-1;
                    var cur =('#'+cur );
                   //var x = document.getElementById("pculab").elements.length;//count all element in form                   
                   var tag = document.getElementById(curtag).tagName.toLowerCase();                    
                   var code = (e.keyCode ? e.keyCode : e.which);
                   //alert(code);
                    if((code == 13 && tag == 'input' ) ||(code == 13 && tag == 'select')) { //Enter keycode && tag == 'input' && tag == 'select'
                        code = 9;                        
                       // event.preventDefault();                      
                        $(cur).focus();
                      return false;
                    }    
                });
            });

                      
             function textareaC(){
               var enteredText = $('#11').val();
               var numberOfLineBreaks = ((enteredText.match(/\n\n/g || [])).length);                
                //characterCount = enteredText.length //+ numberOfLineBreaks;
                //alert(numberOfLineBreaks);               
               if(numberOfLineBreaks == 1){
                   $('#12').focus();
                   exit();
               }                
            }  
            //-----------convert Enter to Tab-----Using onKeyPress="return tabE(this,event)"-------
            function tabE(obj,e){ 
               var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
               if(e.keyCode==13){ 
                 var ele = document.forms[0].elements; 
                 for(var i=0;i<ele.length;i++){ 
                   var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
                   if(obj==ele[i]){ele[q].focus();break} 
                 } 
              return false; 
               } 
              } 
              
            function btnsub(el) {
                var url = el.value;
                var pcucode = document.forms["pculab"]["pcucode"].value;
                var hn = document.forms["pculab"]["hn"].value;                
                if (pcucode == null || pcucode == "" ) {
                    alert("ยังไม่ได้เลือกสถานบริการ");
                }else if(hn == null || hn == ""){
                    alert("ยังไม่ได้กรอก  HN");
                }else {                
                    document.forms["pculab"].action = url;                    
                    var data = $("#pculab").serialize();
                    //alert (url);
                        $.ajax({
                                type: "post",
                                url: url,
                                data: data,
                                datatype: 'html',
                                success: function(data){
                                        alert(data);
                                        //window.location.reload(true);
                                       if(url == 'lab_edit.php') {
                                            window.opener.location.href = window.opener.location;   
                                        }else{
                                            window.location.href = "index.php";  
                                        }
                                }    
                        })
                   return false;
                }            
            } 


        </script>    
    </head>
    <body>
        <div class="container">
            <?php
                include 'header.php';
                
            ?>
           
            <div class="panel panel-warning">
                <div class="panel-heading" id="flip">
                    <h3 class="panel-title">แก้ไขรายการ LAB PCU  ANC</h3>
                    <h2>
                        <?php
               
                            function DateThai($strDate)
                            {
                                    $strYear = date("Y",strtotime($strDate))+543;
                                    $strMonth= date("n",strtotime($strDate));
                                    $strDay= date("j",strtotime($strDate));
                                    $strHour= date("H",strtotime($strDate));
                                    $strMinute= date("i",strtotime($strDate));
                                    $strSeconds= date("s",strtotime($strDate));
                                    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                    $strMonthThai=$strMonthCut[$strMonth];
                                    return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
                            }                         
                            date_default_timezone_set('Asia/Bangkok');
                            $date = date('m/d/Y h:i:s a');                            
                            echo '<h5>'.DateThai($date).'</h5>';
                            include 'connect.php';
                            $vn = $_GET['vn']; 
                            $dbh = new PDO($dsn, $username, $password, $options);
                            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = 'select * from tsu_labpcu where vn = '.$vn.' ';
                            $stmt = $dbh->prepare($sql);
                            try{
                                $stmt->execute();
                            } catch (Exception $ex) {
                                echo $e->getMessage();    
                            }
                            $obj = $stmt->fetch();
                        ?>
                    </h2>
                </div>
                <div class="panel-body" id="panel">
                    <form class="form-horizontal" name="pculab" id="pculab" method="post"  >
                        <input type="hidden" name="vn" value="<?php echo $obj['vn']; ?>"/>
                        <div class="form-group">
                          <label for="pcucode" class="col-sm-2 control-label">สถานบริการ</label>
                          <div class="col-sm-10">
                              <select name="pcucode" id="1"  class="form-control pculab">
                                  <option value="">เลือกสถานบริการ</option>                                  
                                  <option <?php if( $obj['pcucode']=='03790') echo 'selected';  ?> value="03790">หนองอ้ม</option>
                                  <option <?php if( $obj['pcucode']=='03791') echo 'selected';  ?> value="03791">นาเกษม</option>
                                  <option <?php if( $obj['pcucode']=='03792') echo 'selected';  ?> value="03792">โนนใหญ่</option>
                                  <option <?php if( $obj['pcucode']=='03793') echo 'selected';  ?> value="03793">กุดเรือ</option>
                                  <option <?php if( $obj['pcucode']=='03794') echo 'selected';  ?> value="03794">ทุ่งช้าง</option>
                                  <option <?php if( $obj['pcucode']=='03795') echo 'selected';  ?> value="03795">หนองบัวอารี</option>                                  
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="hn" class="col-sm-2 control-label">รหัสผู้รับบริการ</label>
                          <div class="col-sm-10">
                              <input type="text" name="hn" id="2" class="form-control pculab"  placeholder="" value="<?php echo $obj['hn'] ?>"/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="vdrl" class="col-sm-2 control-label">VDRL</label>
                            <div class="col-sm-10">
                                <select name="vdrl" id="3" class="form-control">
                                    <option value=""></option>
                                    <option <?php if( $obj['vdrl']=='Pos') echo 'selected';  ?>  value="Pos">Reactive</option>
                                    <option <?php if( $obj['vdrl']=='Neg') echo 'selected';  ?>  value="Neg">NonReactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="hbsag" class="col-sm-2 control-label">HBsAg</label>
                            <div class="col-sm-10">
                                <select name="hbsag" id="4" class="form-control">
                                    <option value=""></option>
                                    <option <?php if( $obj['hbsag']=='Pos') echo 'selected';  ?> value="Pos">Pos</option>
                                    <option <?php if( $obj['hbsag']=='Neg') echo 'selected';  ?> value="Neg">Neg</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="hiv" class="col-sm-2 control-label">HIV</label>
                            <div class="col-sm-10">
                                <select name="hiv" id="5" class="form-control">
                                    <option value=""></option>
                                    <option <?php if( $obj['hiv']=='Pos') echo 'selected';  ?>  value="Pos">Reactive</option>
                                    <option <?php if( $obj['hiv']=='Neg') echo 'selected';  ?>  value="Neg">NonReactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="hct" class="col-sm-2 control-label">HCT</label>
                            <div class="col-sm-10">
                                <input type="text" name="hct" id="6" class="form-control"  placeholder="" value="<?php echo $obj['hct'] ?>" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="dcip" class="col-sm-2 control-label">DCIP</label>
                            <div class="col-sm-10">
                                <select name="dcip"  id="7" class="form-control">
                                    <option value=""></option>
                                    <option <?php if( $obj['dcip']=='Pos') echo 'selected';  ?> value="Pos">Pos</option>
                                    <option <?php if( $obj['dcip']=='Neg') echo 'selected';  ?> value="Neg">Neg</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="mcv" class="col-sm-2 control-label">MCV</label>
                            <div class="col-sm-10">
                                <input type="text" name="mcv" id="8" class="form-control"  placeholder="" value="<?php echo $obj['mcv'] ?>" autocomplete="off"/>
                            </div>
                        </div>
                         <div class="form-group">
                          <label for="bloodgrp" class="col-sm-2 control-label">Bloodgroup</label>
                          <div class="col-sm-10">
                              <select name="bloodgrp" id="9" class="form-control">
                                  <option value=""></option>
                                  <option <?php if( $obj['bloodgrp']=='A') echo 'selected';  ?> value="A">A</option>
                                  <option <?php if( $obj['bloodgrp']=='B') echo 'selected';  ?> value="B">B</option>
                                  <option <?php if( $obj['bloodgrp']=='AB') echo 'selected';  ?> value="AB">AB</option>
                                  <option <?php if( $obj['bloodgrp']=='O') echo 'selected';  ?> value="O">O</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="rh" class="col-sm-2 control-label">RH</label>
                            <div class="col-sm-10">
                                <select name="rh" id="10" class="form-control">
                                    <option value=""></option>
                                    <option <?php if( $obj['rh']=='Rh+') echo 'selected';  ?> value="Rh+">+Rh</option>
                                    <option <?php if( $obj['rh']=='Rh-') echo 'selected';  ?> value="Rh-">-Rh</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="lab_note" class="col-sm-2 control-label">Note</label>
                            <div class="col-sm-10">
                                <textarea name="lab_note" id="11" class="form-control"  placeholder="" autocomplete="off" onkeypress="textareaC()"><?php echo $obj['lab_note'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                              <div class="col-lg-6">
                                  <button type="button" id="12"  class="btn btn-primary btn-lg btn-block" value="lab_edit.php" onclick="btnsub(this)">บันทึก</button>
                              </div>
                              <div class="col-lg-6">
                                  <button type="button" id="13"  class="btn btn-danger btn-lg btn-block" value="lab_delete.php" onclick="btnsub(this)">ลบรายการ</button>
                              </div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
                             
    </body>
</html>
