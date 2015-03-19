<?php session_start(); ob_start();
if($_SESSION['name']==''){    
     header( "location: login.php" );
 exit(0);
}else{
?>
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
        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/wow.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <link href="css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        
         <link type="text/css" rel="stylesheet" href="css/datepicker.css">
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.th.js" charset="UTF-8"></script>
        <title>PCU LAB</title>
        <link rel="shortcut icon" href="images/search.png"> <!--Pemanggilan gambar favicon-->
        <style>
            .html-skill {
                
                //242,242,242,1  สีเทา
            background: rgb(242,242,242); /* Old browsers */
            background: -moz-linear-gradient(top, rgba(106,164,242,1) 0%, rgba(106,164,242,1) 15%, rgba(106,164,47,1) 15%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(106,164,242,1)), color-stop(15%,rgba(242,242,242,1)), color-stop(15%,rgba(106,164,47,1))); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, rgba(106,164,242,1) 0%,rgba(106,164,242,1) 15%,rgba(106,164,47,1) 15%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top, rgba(106,164,242,1) 0%,rgba(106,164,242,1) 15%,rgba(106,164,47,1) 15%); /* Opera 11.10+ */    
            background: -ms-linear-gradient(top, rgba(106,164,242,1) 0%,rgba(106,164,242,1) 15%,rgba(106,164,47,1) 15%); /* IE10+ */
            background: linear-gradient(to bottom, rgba(106,164,242,1) 0%,rgba(106,164,242,1) 15%,rgba(106,164,47,1) 15%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f2f2', endColorstr='#6aa42f',GradientType=0 ); /* IE6-9 */
          }

          .css-skill {
            background: rgb(242,242,242); /* Old browsers */
            background: -moz-linear-gradient(top, rgba(106,164,242,1) 0%, rgba(106,164,242,1) 15%, rgba(255,189,32,1) 15%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(106,164,242,1)), color-stop(15%,rgba(242,242,242,1)), color-stop(15%,rgba(255,189,32,1))); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, rgba(106,164,242,1) 0%,rgba(106,164,242,1) 15%,rgba(255,189,32,1) 15%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top, rgba(106,164,242,1) 0%,rgba(106,164,242,1) 15%,rgba(255,189,32,1) 15%); /* Opera 11.10+ */    
            background: -ms-linear-gradient(top, rgba(106,164,242,1) 0%,rgba(106,164,242,1) 15%,rgba(255,189,32,1) 15%); /* IE10+ */
            background: linear-gradient(to bottom, rgba(106,164,242,1) 0%,rgba(106,164,242,1) 15%,rgba(255,189,32,1) 15%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f2f2', endColorstr='#6aa42f',GradientType=0 ); /* IE6-9 */
          }

          .wp-skill {
              //219,54,21,1 สีแดง
            background: rgb(242,242,242); /* Old browsers */
            background: -moz-linear-gradient(top, rgba(106,164,242,1) 0%, rgba(106,164,242,1) 15%, rgba(219,54,21,1) 15%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(106,164,242,1)), color-stop(15%,rgba(242,242,242,1)), color-stop(15%,rgba(219,54,21,1))); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, rgba(106,164,242,1) 0%,rgba(106,164,242,1) 15%,rgba(219,54,21,1) 15%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top, rgba(106,164,242,1) 0%,rgba(106,164,242,1) 15%,rgba(219,54,21,1) 15%); /* Opera 11.10+ */    
            background: -ms-linear-gradient(top, rgba(106,164,242,1) 0%,rgba(106,164,242,1) 15%,rgba(219,54,21,1) 15%); /* IE10+ */
            background: linear-gradient(to bottom, rgba(106,164,242,1) 0%,rgba(106,164,242,1) 15%,rgba(219,54,21,1) 15%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f2f2', endColorstr='#6aa42f',GradientType=0 ); /* IE6-9 */
          }
            
            
            
              /*

/*background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(242,242,242,1)), color-stop(9%,rgba(242,242,242,1)), color-stop(9%,rgba(106,164,47,1))); /* Chrome,Safari4+ */
/*background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(242,242,242,1)), color-stop(32%,rgba(242,242,242,1)), color-stop(32%,rgba(255,189,32,1))); /* Chrome,Safari4+ */
/*background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(242,242,242,1)), color-stop(19%,rgba(242,242,242,1)), color-stop(19%,rgba(219,54,21,1))); /* Chrome,Safari4+ */

          
          .sinlge-skill{
              margin-left: auto;
              margin-right: auto;
          }
          a {
            color: yellow;
           /* box-shadow: 0 10px 0 white, 0 11px 0 white;
            text-decoration: none;
            transition: all 300ms ease-in;*/
           }
            a:hover { 
                color:yellow;
            //box-shadow: 0 0 0 white , 0 1px 0 black;
           }
           #flip{
               cursor: pointer;
              
              
           }
           #flip2{
               cursor: pointer;
              
              
           }
           #panel {
                padding:5px;
                text-align:center;
                background-color:#e5eecc;
                border:solid 1px #c3c3c3;
                padding:10px;
                display:none;
            }
            #list_pt_in_day
            {
                padding:10px;
               //display:none;
            }
            table tr td a {
    display:block;
    height:100%;
    width:100%;
}
table tr td {
    padding-left: 0;
    padding-right: 0;
}

        </style>
        <script> 
            $(document).ready(function(){
                $("#flip").click(function(){
                    $("#panel").slideToggle("slow");
                    //$("#flip").slideToggle("slow");
                    $("#menutab").slideToggle("slow");
                    
                });
                $("#flip2").click(function(){
 
                     $("#menutab").slideToggle("slow");
                     $("#panel").hide("slow");
                    
                    
                });
                  //loop  data pt in day
                  
                $("#submit").click(function(event){
                    
                    //$("#list_pt_in_day").slideToggle("slow");
                   // $("#menutab").slideToggle("slow");
                   var visit_date = $('#visit_date').val();
                   var hn = $('#hn').val();
                   var pcucode = $('#pcucode').val(); 
                    //var visit_date = visit_date.substring(6)+'-'+visit_date.substring(3,5)+'-'+visit_date.substring(0,2);
                   //$('tbody#my_data tr').remove();
                    //if(hn=''){
                        $.getJSON('pt_visit_inday.php',{visit_date:visit_date,pcucode:pcucode,hn:hn}, function(data) {
                            
                            var i = 1;
                            $('tbody#my_data tr').remove();
                            $.each(data, function(key,value) {
                                $("tbody#my_data").append("<tr>"+
                                "<td style='width: 20%'><a href='lab_edit_form.php?vn="+value.vn+"'>"+value.hn+"</a></td>" +                    
                                "<td style='width: 80%'><a href='lab_edit_form.php?vn="+value.vn+"'>"+value.pcuname+"</a></td>" +                                
                                "</tr>");
                         
                                i++;
                            });
                           
                        });
                    //}
                   
                });
            });//end ready function
            function calendar(){
                        $('#visit_date').val('');
                    }
        </script>  
    </head>
    <body>
        <?php
         date_default_timezone_set('Asia/Bangkok');
         $curdatethai = date('Y');
       
            include 'header.php';
        ?>
<!--        <div class="container">-->
            <div id="menutab" class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" style="width: 100%;height: 250px;background-color: buttonface;border-radius: 0px;">
                <div class="col-sm-12">
                    <!--<div class="row">-->   
                    <div class="col-sm-4">
                            <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                                <a href="lab_result_form.php" style="color: white;">
                                    <div class="html-skill">                                    
                                        <p><i class="fa fa-bullhorn" style="font-size: 70px"></i>
                                    <p>รายงานผล</p>                                    
                                    </div>
                                        
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1000ms">
                                
                                <div class="css-skill" id="flip" >
                                    <p><i class="fa fa-comments" style="font-size: 70px"></i></p>
                                    <p>แก้ไข หรือ ลบ</p>
                                </div>
                                  
                            </div>
                            
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
                                <div class="wp-skill">
                                    <p><i class="fa fa-cloud-download" style="font-size: 70px"></i></p>
                                    <p>รายงาน</p>
                                </div>
                            </div>
                        </div>
                    <!--</div>-->
                </div>    
            </div>
        <!--</div>-->  
        <div id="panel" class="panel panel-danger">
            <div class="panel-heading" id="flip2">
                <h3 class="panel-title">กรอกรายการ เพื่อค้นหา ๆ<center><i class="fa fa-angle-double-down" style="font-size: 25px"></i></center> </h3>
            </div>    
            <div class="panel-body">
                
                    <?php //  echo $curdatethai; ?>
                    <form class="form-horizontal" name="pculab" id="pculab" onsubmit="return false;" >
                        <div class="form-group">
                            <label for="visit_date" class="col-sm-2 control-label">วันที่รับบริการ</label>
                            <div class="col-sm-10">

                                <input type="text" class="datepicker form-control show_pointer" name="visit_date"  id="visit_date" value="<?php echo $curdatethai ?>" placeholder="visit_date"  onclick="calendar();"/>
                                <script language="JavaScript" >
                                    $(document).ready(function() {
                                        //$('.datepicker').datepicker('setDate', 'today');
                                        $('.datepicker').datepicker({
                                            format: 'dd-mm-yyyy',
                                            language: 'th',
                                            autoclose: true   
                                        })
                                    })
                                </script>
                                <!--<div class="input-group-addon show_pointer" id="calendar" onclick="calendar();"><i class="fa fa-calendar fa-1x"></i></div>-->

                            </div>

                        </div>
                        <div class="form-group">
                                  <label for="pcucode" class="col-sm-2 control-label">สถานบริการ</label>
                                  <div class="col-sm-10">
                                      <select name="pcucode" id="pcucode"  class="form-control pculab offsite">
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
                                      <input type="text" name="hn" id="hn" class="form-control pculab"  placeholder="HN" />
                                  </div>
                        </div>
                        <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                      <!--<button type="submit" id="submit"  class="btn btn-primary btn-lg btn-block">ตกลง</button>-->
                                      <input type="button" class="btn btn-primary btn-lg btn-block" value="ค้นหา" name="submit" id="submit" onclick="search_by_date()" onsubmit="return false;">
                                  </div>
                        </div>
                    </form>
            
                <!--แสดงรายการผู้ป่วยในวัน--> 
           
                <div class="col-sm-offset-2 col-sm-10" id="list_pt_in_day">
                   <div class="col-lg-12">ผลการค้นหา</div>
                   <div class="col-lg-1"></div>
                   <div class="col-lg-10">
                       <table class="table table-hover" id="my_data">
                            <thead>
                            <tr>

                                <td>รหัสผู้รับบริการ</td>
                                <td>หน่วยสถานบริการ</td>


                            </tr>
                            </thead>
                             <tbody id="my_data">

                             </tbody>
                        </table>
                   </div>
                   <div class="col-lg-1"></div>
                </div> 
            </div>    
        </div>   
        <!--login  form-->
        
    </body>
</html>
<?php
}
?>