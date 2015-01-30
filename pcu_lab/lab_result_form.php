<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">     
            $(document).ready(function () {
                $('#1').focus();
                //disable scroll mouse on select tag
               /* $('select').each(function() {
                    $(this).on('mousewheel', function(){
                    return false;
                });*/
             //  $('#1').next('option').show(); //your id of select tag is 'year'
        
                /*$('#1').focus(function(){
                    $(this).bind("click", function(){ alert("Goodbye!"); }); 
                });*/
                
               //$("select.offsite").live("click", function(){ alert("Goodbye!"); }); 
                
    
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

            //validate form befor  submit    
            var ajaxSubmit = function(formEl) {
                var pcucode = document.forms["pculab"]["pcucode"].value;
                var hn = document.forms["pculab"]["hn"].value;                
                if (pcucode == null || pcucode == "" ) {
                    alert("ยังไม่ได้เลือกสถานบริการ");
                }else if(hn == null || hn == ""){
                    alert("ยังไม่ได้กรอก  HN");
                }else {
                    var url = $(formEl).attr('action');
                    var data = $(formEl).serialize();
                    $.ajax({
                            type: "post",
                            url: url,
                            data: data,
                            datatype: 'html',
                            success: function(data){
                                    alert(data);
                                    window.location.reload(true);
                            }    
                    })
                }
                return false;
            }; 
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
            
        </script>    
    </head>
    <body>
        <div class="container">
            <?php
                include 'header.php';
            ?>
           
            <div class="panel panel-success">
                <div class="panel-heading" id="flip">
                    <h3 class="panel-title"><li class="fa fa-list">&nbsp;</li>เพิ่มรายการ LAB PCU  ANC</h3>
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
                           
                            $vn = substr(date('Y')+543,2,2).date('mdhis');
                            //echo $vn;
                        ?>
                    </h2>
                </div>
                <div class="panel-body" id="panel">
                    <form class="form-horizontal" name="pculab" id="pculab" method="post" action="lab_result.php" onsubmit="return ajaxSubmit(this)" >
                        <input type="hidden" name="dateserv" value="<?php echo $vn; ?>"/>
                        <div class="form-group">
                          <label for="pcucode" class="col-sm-2 control-label">สถานบริการ</label>
                          <div class="col-sm-10">
                              <select name="pcucode" id="1"  class="form-control pculab offsite">
                                  <option value="">เลือกสถานบริการ</option>
                                  <option value="03790">หนองอ้ม</option>
                                  <option value="03791">นาเกษม</option>
                                  <option value="03792">โนนใหญ่</option>
                                  <option value="03793">กุดเรือ</option>
                                  <option value="03794">ทุ่งช้าง</option>
                                  <option value="03795">หนองบัวอารี</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="hn" class="col-sm-2 control-label">รหัสผู้รับบริการ</label>
                          <div class="col-sm-10">
                              <input type="text" name="hn" id="2" class="form-control pculab"  placeholder="" autocomplete="off" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="vdrl" class="col-sm-2 control-label">VDRL</label>
                            <div class="col-sm-10">
                                <select name="vdrl" id="3" class="form-control">
                                    <option value=""></option>
                                    <option value="Pos">Reactive</option>
                                    <option value="Neg">NonReactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="hbsag" class="col-sm-2 control-label">HBsAg</label>
                            <div class="col-sm-10">
                                <select name="hbsag" id="4" class="form-control">
                                    <option value=""></option>
                                    <option value="Pos">Pos</option>
                                    <option value="Neg">Neg</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="hiv" class="col-sm-2 control-label">Anti HIV</label>
                            <div class="col-sm-10">
                                <select name="hiv" id="5" class="form-control">
                                    <option value=""></option>
                                    <option value="Pos">Reactive</option>
                                    <option value="Neg">NonReactive</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                          <label for="hct" class="col-sm-2 control-label">HCT</label>
                            <div class="col-sm-10">
                                <input type="text" name="hct" id="6" class="form-control"  placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="dcip" class="col-sm-2 control-label">DCIP</label>
                            <div class="col-sm-10">
                                <select name="dcip"  id="7" class="form-control">
                                    <option value=""></option>
                                    <option value="Pos">Pos</option>
                                    <option value="Neg">Neg</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                          <label for="mcv" class="col-sm-2 control-label">MCV</label>
                            <div class="col-sm-10">
                                <input type="text" name="mcv" id="8" class="form-control"  placeholder="" autocomplete="off">
                            </div>
                        </div>
                         <div class="form-group">
                          <label for="bloodgrp" class="col-sm-2 control-label">Bloodgroup</label>
                          <div class="col-sm-10">
                              <select name="bloodgrp" id="9" class="form-control">
                                  <option value=""></option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="AB">AB</option>
                                  <option value="O">O</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="rh" class="col-sm-2 control-label">RH</label>
                            <div class="col-sm-10">
                                <select name="rh" id="10" class="form-control">
                                    <option value=""></option>
                                    <option value="Rh+">+Rh</option>
                                    <option value="Rh-">-Rh</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="lab_note" class="col-sm-2 control-label">Note</label>
                            <div class="col-sm-10">
                                <textarea name="lab_note" id="11" class="form-control"  placeholder="" autocomplete="off" onkeypress="textareaC()"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" id="12"  class="btn btn-primary btn-lg btn-block">บันทึก</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
