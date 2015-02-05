<?php
/**
 * Created by PhpStorm.
 * User: IT3
 * Date: 12/6/2557
 * Time: 13:36 น.
 */
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>-->
    <!--<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>-->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery-migrate-1.0.0.js"></script>
    <!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/datepicker.css">
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.th.js" charset="UTF-8"></script>

    <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="js/jquery-blockUI.js"></script>

    <title>Patient Visit</title>
    <style type="text/css">
        p{
            text-align: center;
        }
        .dx,.dx_all{
            cursor: pointer;
            text-align: center;
        }
        .show_pointer{
            cursor: pointer;
        }
        table { border-collapse: separate;
            font-size: 14px;
        }
        td.dx:hover,td.dx_all:hover{
            background-color:rgb(214,214,214) !important;
            /* border-radius:4px;*/
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            border:1px solid red;
            overflow:auto;
            color:red;
        }
        .mythead{
            text-align: center;
        }
        #cc{
            width: 30%;
            overflow: visible;
            font-size: 12px;
        }
        #pi{
            display: none;
            overflow: visible;
            font-size: 12px;
            color: blue;
        }
        #show_pi{
            color: red;
            text-align: right;
            font-size: 12px;
            cursor: pointer;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#hn").keypress(function(e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if(code == 13) { //Enter keycode
                    code = 9;
                    return false;
                }
            });
            //////////// javascritp  for  other file on fancybox  call  /////////////
            ///// pt_history_form.php///////////
           $('body').on('click', '#vstdate', function(){
              // alert('me');
              var history_vstdate = this.innerText;
              var hn = $('#hnn').val();
              
              $.getJSON('pt_history_data.php',{vstdttm:history_vstdate,hn:hn}, function(data) {
                    $.each(data, function(key,value){
                        //alert(value.bw);
                        $('#bw').text(value.bw+" ก.ก.") ;
                        $('#height').text(value.height+" ซ.ม.");
                        $('#waist_cm').text(value.waist_cm+" cc.");
                        $('#tt').text(value.tt+" ก.ก.") ;
                        $('#bmi').text(value.bmi+" ");
                        $('#pr').text(value.pr+" ครั้ง/นาที");
                        $('#rr').text(value.rr+" ครั้ง/นาที") ;
                        $('#sbp').text(value.sbp+" / "+value.dbp+" มม.ปรอท");
                        $('#cc_h').text(value.cc);
                        $('#pe_h').text(value.pe);
                        $('#pi_h').text(value.pi);
                        $('#pdx_h').text(value.pdx);
                        $('#dx_other_h').text('');
                        $('#dx_other_h').append("<div>"+value.dx1+"</div><div>"+value.dx2+"</div><div>"+value.dx3+"</div><div>"+value.dx4+"</div><div>"+value.dx5+"</div>");
                        //$('#dx_other1_h').add('p').text(value.dx2);
                        //$('#dx_other2_h').text(value.dx2);
                        
                        //alert(value.bw);
                    });
                });
               
            }); 
            //  end of  pt_history_form.php//////
            //  end of  javascritp  for  other file on fancybox  call//////
            
        });
        //  end of  document.reday/////////
        

        // unblock when ajax activity stops
        $(document).ajaxStop($.unblockUI);

        function test() {
            $.ajax({ url: 'wait.php', cache: false });
        }

        $(document).ready(function() {
            $('#submit_date1').click(function() {
                $.blockUI();
                test();
            });
            $('#submit_date').click(function() {
                //alert('me');
                $.blockUI({ message: '<h1><img src="img/busy.gif" /> Just a moment...</h1>' });
                test();
            });
            $('.dem2').click(function() {
                $.blockUI({ message: '<h1><img src="img/busy.gif" /> Just a moment...</h1>' });
                test();
            });
            $('#pageDemo3').click(function() {
                $.blockUI({ css: { backgroundColor: '#f00', color: '#fff' } });
                test();
            });

            $('#pageDemo4').click(function() {
                $.blockUI({ message: $('#domMessage') });
                test();
            });
        });
        //--------------Cancel-------------
        function btnCancel(){
            $.fancybox.close();
            //$("#flex1").flexReload();
        }
        ///////////set icd10 name  to  input//////////
        function set_icd10name(){
            //alert('me');

            var icd10t = $('#icd10').val();
            var icd10 = icd10t.toUpperCase();
            $('#icd10').val(icd10);
            var len_icd10 = icd10.length;
            //alert(len_icd10);

            if(len_icd10==0){
                //alert(len_icd10);
                var add_form = document.getElementById('add_dx');
                if (add_form != null) {
                    document.getElementById('submit_save').disabled = false;
                }else{
                    document.getElementById('submit_save').disabled = true;
                }
            }else{
                document.getElementById('submit_save').disabled = false;
            }
            if(len_icd10>0){
                //alert(len_icd10);
                $.getJSON('pt_edit_dx_data.php',{icd10:icd10}, function(data) {
                    $.each(data, function(key,value){
                        //alert(value.icd10name);
                        $('#icd10name').val(value.icd10name);
                    });
                });
            };
        }
        function calendar(){
            $('#visit_date').focus();
        }

    </script>
</head>
<body>
<div style="background-color: #777">
    <div class="panel-heading has-success" style="height: 50px" >

        <div class="col-lg-8">
            <form class="form-inline" role="form" onsubmit="return false;">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">วันที่รับบริการ</div>
                        <input type="text" class="datepicker form-control show_pointer" name="visit_date"  id="visit_date" value="<?php if(isset($_POST['visit_date'])) echo $_POST['visit_date']; ?>" placeholder="visit_date"/>
                        <script language="JavaScript" >
                            $(document).ready(function() {
                                $('.datepicker').datepicker({
                                    format: 'dd-mm-yyyy',
                                    language: 'th',
                                    autoclose: true

                                })
                            })
                        </script>
                        <div class="input-group-addon show_pointer" id="calendar" onclick="calendar();"><i class="fa fa-calendar fa-1x"></i></div>

                    </div>

                </div>
                <div class="input-group">
                    <span class="input-group-addon ">
                        <input type="radio" name="visit_type" id="visit_type" class="show_pointer" value="O" checked>
                    </span>
                    <div class="input-group-addon">ผู้ป่วยนอก</div>
                    <span class="input-group-addon ">
                        <input type="radio" name="visit_type" id="visit_type"  class="show_pointer" value="I">
                    </span>
                    <div class="input-group-addon">ผู้ป่วยใน</div>
                </div><!-- /input-group -->
                <div class="form-group has-success">
                    <input type="button" class="btn btn-success custom" value="ค้นหา" name="submit" id="submit_date" onclick="search_by_date()" onsubmit="return false;">
                    <input type="button" class="btn btn-warning" value="ยกเลิก"/>
                </div>
            </form>
        </div>

        <div class="col-lg-4" style="text-align: right">
            <form class="form-inline" role="form">

                <div class="form-group">
                    <div class="input-group">

                        <input type="text" class="form-control show_pointer" placeholder="ค้นหาจาก HN" name="hn" id="hn" value="" />
                        <div class="input-group-addon show_pointer" onclick="search_by_hn()"><i class="fa fa-search fa-1x"></i></div>

                    </div>

                </div>


            </form>
        </div>
    </div>
</div>
<input type="hidden" name="change_dx" value="" id="change_dx"/>
<div class="col-lg-12" >

    <div class="col-md-12 table-curved">
        <table class="table  col-md-10 table-hover table-striped" id="mytable">
            <?php
            echo '<thead class="mythead">';
            echo '<tr>';
            echo '<th class="mythead">ลำดับ</th>';
            echo '<th >ชื่อสกุล</th>';
            echo '<th >HN</th>';
            echo '<th>เวลารับบริการ</th>';
            echo '<th>CC</th>';
            echo '<th></th>';
            echo '<th class="mythead">pdx</th>';
            echo '<th class="mythead">dx2</th>';
            echo '<th class="mythead">dx3</th>';
            echo '<th class="mythead">dx4</th>';
            echo '<th class="mythead">dx5</th>';
            echo '<th class="mythead">dx6</th>';
            //echo '<th style="text-align: center;cursor:zoom-out"><span></span></th>';
            echo '<th style="text-align: center;cursor:zoom-out"></th>';
            echo '<th style="text-align: center;cursor:zoom-out"></th>';
            echo '</tr>';
            echo '</thead>';
            ?>
            <tbody id="my_news">

            </tbody>
        </table>

    </div>
</div>
<div class="col-md-12" >
    <div class="dem dem2" style="text-align: center"></div>
    <div class="content2"  style="text-align: center"></div>
    <div class="input-group-addon"><p class="total"></p></div>
    <input type="hidden" name="curpage" id="curpage" value=""/>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#visit_date').focus();

    $(function(){
        var keyStop = {
            8: ":not(input:text, textarea, input:file, input:password)", // stop backspace = back
            13: "input:text, input:password", // stop enter = submit

            end: null
        };
        $(document).bind("keydown", function(event){
            var selector = keyStop[event.which];

            if(selector !== undefined && $(event.target).is(selector)) {
                event.preventDefault(); //stop event
            }
            return true;
        });
    });
    

    /////////////////////////////  function  on click submit_date///////////////////////////////////////////////////
    $("input#submit_date").click(function(event){
        $('#hn').val('');
        var radios_visit_type = document.getElementsByName("visit_type");
        for (var i = 0; i < radios_visit_type.length; i++) {
            if (radios_visit_type[i].checked) {
                var visit_type = (radios_visit_type[i].value);
                break;
            }
        }
        
        //alert(visit_type);
        var row_per_page = 10;
        var visit_date = $('#visit_date').val();
        var total_row = new Array();

        // $(".content2").html("หน้าที่ 1 / "+(total_row / row_per_page);
        $("#curpage").val(1);
        $.getJSON('pt_visit_data.php',{visit_date:visit_date,visit_type:visit_type,limit:0}, function(data) {
            $.each(data, function(key,value) {
                total_row.push(value.total_rows);
            });

            var numrow = (total_row[1]);
             $(".content2").html("หน้าที่ 1 / "+Math.ceil((numrow/row_per_page)));
            $(".total").html("จำนวนผู้รับบริการในช่วงเวลาที่เลือก  "+numrow+"   ราย");
            $('.dem2').bootpag({
                total: Math.ceil(numrow/row_per_page),
                page: 1,
                maxVisible:10//Math.ceil(numrow/row_per_page)
            })
            $('tbody#my_news tr').remove();
            var i = 1;
            $.each(data, function(key,value) {
                $("tbody#my_news").append("<tr><td style='text-align: center'>"+value.numrecord+"</td>" +
                    "<td>"+value.ptname+"</td>" +
                    "<td>"+value.hn+"</td>" +
                    "<td>"+value.vstdttm+"</td>" +
                    "<td id='cc'>"+value.cc+"<div id='pi'>PI::"+value.pi+"</div></td>" +
                    "<td id='show_pi'>show</td>" +
                    "<td class='dx' id='"+value.id_dx+"'>"+value.pdx+"</td>" +
                    "<td class='dx' id='"+value.id1+"'>"+value.dx1+"</td>" +
                    "<td class='dx' id='"+value.id2+"'>"+value.dx2+"</td>" +
                    "<td class='dx' id='"+value.id3+"'>"+value.dx3+"</td>" +
                    "<td class='dx' id='"+value.id4+"'>"+value.dx4+"</td>" +
                    "<td class='dx' id='"+value.id5+"'>"+value.dx5+"</td>" +
                    //"<td class='dx_all'  id='"+value.vn+"'><i class='fa fa-child'></i></td>" +
                    "<td class='dx_new'  id='"+value.vn+"'><i class='fa fa-plus dx'></i></td>" +
                    "<td class='history' id='"+value.hn+","+value.vn+"'><i class='fa fa-user dx' style='color: #0089CB'></i></td>" +
                    "</tr>");
                i++;
            });
                        ///////////click  to show present illnes  //////////
            $("td#show_pi").click(function(){
                var this_td = this;               
                var check_status = this.innerText;
                
               $(this).parent().find('div#pi').slideToggle("slow");
                if(check_status == 'show'){   
                    this_td.innerText = "hide";
                }else{
                     this_td.innerText = "show";
                } 
            });
            $("td#show_pi").mouseover(function(){
                var this_td = this;
               $(this).parent().find('div#pi').slideToggle("slow");
                     this_td.innerText = "hide";
            });
            $("td#show_pi").mouseout(function(){                
                $(this).parent().find('div#pi').slideToggle("slow");
                var this_td = this;
                this_td.innerText = "show";
            });
            /////////////click dx  to  edit/////////////////////////////////
            var dx = $('td.dx');
            var len_dx = dx.length;
            $("td.dx_p,td.dx,td.dx_all,td.history,.dx_new").click(function(event){
                var id_dx =  this.id;
                var class_dx = this.className;
                //alert(class_dx);
                if(id_dx!=''){
                    var pdx = this.innerText;
                    var this_td = this;
                    var this_tr = this_td.parentNode.rowIndex;
                    if(class_dx=='dx'){
                        var link_page = 'pt_edit_dx_form.php?id_dx='+id_dx+'&&pdx='+pdx+'&&visit_type='+visit_type;
                    }else if(class_dx=='dx_new'){
                        var link_page = 'pt_add_dx_form.php?id_dx='+id_dx;
                    }else if(class_dx=='history'){                           
                        var link_page = 'pt_history_form.php?hn='+id_dx;
                    }else{
                        var link_page = 'pt_edit_dx_all_form.php?id_dx='+id_dx;
                    }
                    $.fancybox({'href'	: link_page,//link_page+id_dx+'&&pdx='+pdx+'',
                        'width' : '100%',
                        'height' : '90%',
                        'autoSize' : false,
                        'transitionIn'  :   'elastic',
                        'transitionOut' :   'elastic',
                        'speedIn'    :  600,
                        'speedOut'   :  200,
                        'overlayShow'   :   false,
                        'closeBtn': true,
                        "hideOnOverlayClick" : false, // prevents closing clicking OUTSIE fancybox
                        "hideOnContentClick" : false, // prevents closing clicking INSIDE fancybox
                        "enableEscapeButton" : false,  // prevents closing pressing ESCAPE key
                        onComplete : function() {
                            var old_dx = this_td.innerText;
                            $('#change_dx').val(old_dx);
                            $("input#icd10").focus().select();

                        },
                        beforeShow: function () {
                           // $("body").css({'display': 'none'});
                            //alert('me');
                            /* this.width = $(this.element).data("width") ? $(this.element).data("width") : null;
                             this.height = $(this.element).data("height") ? $(this.element).data("height") : null;*/
                        },
                        afterClose: function(){
                           // $("body").css({'overflow-y':'visible'});
                        },
                        onClosed : function(){
                            var change_dx = $('#change_dx').val();
                            if(class_dx=='dx'){
                                this_td.innerText = $('#change_dx').val();
                                if(change_dx ==''){
                                    this_td.id = '';
                                }
                            }else{
                                var dx_str = $('#change_dx').val();
                                var dx_array = dx_str.split(',');
                                var dx_array_len = dx_array.length;
                                var table = document.getElementById("mytable");
                                var row = table.rows[this_tr] ;
                                var start_dx = 6;
                                var num_cell = row.cells.length ;
                                var n = 0;
                                for (var i = start_dx; i < num_cell; i++) {
                                    var dx_status = row.cells[i].innerText;
                                    if ( dx_status == "" && n  <= dx_array_len-1 ) {
                                        row.cells[i].innerText =  dx_array[n];
                                        row.cells[i].id = "vn"+id_dx;
                                        n++;
                                    }
                                }
                            }
                        }
                    });
                    ////  use ajax to sent  $_get  to  other page///////////////
                    if(class_dx=='dx'){
                        url: "pt_edit_dx_form.php"
                    }else{
                        url: "pt_add_dx_form.php"
                    }
                    $.ajax({
                        type: "POST",
                        dataType: "html",
                            url: url,
                        data: id_dx
                    });
                };
            });
            /////////////// enc of  edit  dx/////////////////
            ////  function  on click  page number////////////////////
            $('.dem2').on('page', function(event, num){

                var hn = $('#hn').val();
                // alert(search);
                if(hn == ''){
                     $(".content2").html("หน้าที่  " + num + " / "+ Math.ceil((numrow/row_per_page)) ); // or some ajax content loading...
                    var radios_visit_type = document.getElementsByName("visit_type");

                    for (var i = 0; i < radios_visit_type.length; i++) {
                        if (radios_visit_type[i].checked) {
                            var visit_type = (radios_visit_type[i].value);
                            break;
                        }
                    }
                    //alert(visit_type);
                    $("#curpage").val(num);
                    var limit = (num-1) * row_per_page;
                    $('tbody#my_news tr').remove();
                    //alert('me');
                    $(".dem2").delay(20).fadeOut();
                    $(".dem2").delay(1000).fadeIn();
                    $.getJSON('pt_visit_data.php',{visit_date:visit_date,visit_type:visit_type,limit:limit}, function(data) {
                        $.each(data, function(key,value) {
                            $("tbody#my_news").append("<tr><td style='text-align: center'>"+value.numrecord+"</td>" +
                                "<td>"+value.ptname+"</td>" +
                                "<td>"+value.hn+"</td>" +
                                "<td>"+value.vstdttm+"</td>" +
                                "<td id='cc'>"+value.cc+"<div id='pi'>PI::"+value.pi+"</div></td>" +
                                "<td id='show_pi'>show</td>" +
                                "<td class='dx' id='"+value.id_dx+"'>"+value.pdx+"</td>" +
                                "<td class='dx' id='"+value.id1+"'>"+value.dx1+"</td>" +
                                "<td class='dx' id='"+value.id2+"'>"+value.dx2+"</td>" +
                                "<td class='dx' id='"+value.id3+"'>"+value.dx3+"</td>" +
                                "<td class='dx' id='"+value.id4+"'>"+value.dx4+"</td>" +
                                "<td class='dx' id='"+value.id5+"'>"+value.dx5+"</td>" +
                               // "<td class='dx_all'  id='"+value.vn+"'><i class='fa fa-child'></i></td>" +
                                "<td class='dx_new'  id='"+value.vn+"'><i class='fa fa-plus dx'></i></td>" +
                                "<td class='history' id='"+value.hn+","+value.vn+"'><i class='fa fa-user dx' style='color: #0089CB'></i></td>" +                                        
                                "</tr>");
                        });
                        ///////////click  to show present illnes  //////////
                        $("td#show_pi").click(function(){
                            var this_td = this;               
                            var check_status = this.innerText;

                           $(this).parent().find('div#pi').slideToggle("slow");
                            if(check_status == 'show'){   
                                this_td.innerText = "hide";
                            }else{
                                 this_td.innerText = "show";
                            } 
                        });
                        $("td#show_pi").mouseover(function(){
                            var this_td = this;
                           $(this).parent().find('div#pi').slideToggle("slow");
                                 this_td.innerText = "hide";
                        });
                        $("td#show_pi").mouseout(function(){                
                            $(this).parent().find('div#pi').slideToggle("slow");
                            var this_td = this;
                            this_td.innerText = "show";
                        });
                        /////////////click dx  to  edit/////////////////////////////////
                        var dx = $('td.dx');
                        var len_dx = dx.length;
                        $("td.dx_p,td.dx,td.dx_all,td.history,td.dx_new").click(function(event){
                            var id_dx =  this.id;
                            var class_dx = this.className;
                            //alert(id_dx);
                            if(id_dx!=''){
                                var pdx = this.innerText;
                                var this_td = this;
                                var this_tr = this_td.parentNode.rowIndex;
                                if(class_dx=='dx'){
                                    var link_page = 'pt_edit_dx_form.php?id_dx='+id_dx+'&&pdx='+pdx+'&&visit_type='+visit_type;
                                }else if(class_dx=='dx_new'){
                                    var link_page = 'pt_add_dx_form.php?id_dx='+id_dx;
                                }else if(class_dx=='history'){                           
                                    var link_page = 'pt_history_form.php?hn='+id_dx;
                                } else{
                                    var link_page = 'pt_edit_dx_all_form.php?id_dx='+id_dx;
                                }
                                $.fancybox({'href'	: link_page,//link_page+id_dx+'&&pdx='+pdx+'',
                                    //'width' : '70%',
                                    //'height' : '50%',
                                    'autoSize' : true,
                                    'transitionIn'  :   'elastic',
                                    'transitionOut' :   'elastic',
                                    'speedIn'    :  600,
                                    'speedOut'   :  200,
                                    'overlayShow'   :   false,
                                    'closeBtn': true,
                                    "hideOnOverlayClick" : false, // prevents closing clicking OUTSIE fancybox
                                    "hideOnContentClick" : false, // prevents closing clicking INSIDE fancybox
                                    "enableEscapeButton" : false,  // prevents closing pressing ESCAPE key                                    
                                    onComplete : function() {
                                        var old_dx = this_td.innerText;
                                        $('#change_dx').val(old_dx);
                                        $("input#icd10").focus().select();
                                    },
                                    beforeShow: function () {
                                        this.width = $(this.element).data("width") ? $(this.element).data("width") : null;
                                        this.height = $(this.element).data("height") ? $(this.element).data("height") : null;
                                    },
                                    onClosed : function(){
                                       var change_dx = $('#change_dx').val();
                                        if(class_dx=='dx'){
                                            this_td.innerText = $('#change_dx').val();
                                            if(change_dx ==''){
                                                this_td.id = '';
                                            }
                                        }else{
                                            var dx_str = $('#change_dx').val();
                                            var dx_array = dx_str.split(',');
                                            var dx_array_len = dx_array.length;
                                            var table = document.getElementById("mytable");
                                            var row = table.rows[this_tr] ;
                                            var start_dx = 6;
                                            var num_cell = row.cells.length ;
                                            var n = 0;
                                            for (var i = start_dx; i < num_cell; i++) {
                                                var dx_status = row.cells[i].innerText;
                                                if ( dx_status == "" && n  <= dx_array_len-1 ) {
                                                    row.cells[i].innerText =  dx_array[n];
                                                    row.cells[i].id = "vn"+id_dx;
                                                    n++;
                                                }
                                            }
                                        }
                                    }
                                });
                                ////  use ajax to sent  $_get  to  other page///////////////
                                $.ajax({
                                    type: "POST",
                                    dataType: "html",
                                    url: "pt_edit_dx_form.php"
                                    //data: id

                                });
                            };
                        });
                        /////////////// enc of  edit  dx/////////////////
                    });
                };
            });
            //////End of  funtion on click  page  number ///////////////
        });
    });
    /////////////////////////////  End of function  on click submit_date///////////////////////////////////////////////////

});
/////////////end of ready function///////////////////////////////////////////
//----------------------Search  patient-----------------------------------
$(document).keyup(function (e) {
    if ($("#hn").is(":focus") && (e.keyCode == 13)) {
        search_by_hn();
    }
});


function search_by_hn(){
    var hn = $('#hn').val();
    var visit_date = $('#visit_date').val();

    //alert(hn);
    var radios_visit_type = document.getElementsByName("visit_type");

    for (var i = 0; i < radios_visit_type.length; i++) {
        if (radios_visit_type[i].checked) {
            var visit_type = (radios_visit_type[i].value);
            break;
        }
    }
    if(visit_date != '' && hn !=''){
        //var  row_per_page = 5;
        //var total_row = new Array();
        $.getJSON('pt_visit_data_hn.php',{hn:hn,visit_date:visit_date,visit_type:visit_type,limit:0}, function(data) {
            /* $.each(data, function(key,value) {
             total_row.push(value.total_rows);
             });
             var numrow = (total_row[1]);*/

            $('.dem2').bootpag({
                total: 1,
                page: 1,
                maxVisible: 1
            })
            $('tbody#my_news tr').remove();
            $.each(data, function(key,value) {
                $("tbody#my_news").append("<tr><td style='text-align: center'>"+value.numrecord+"</td>" +
                    "<td>"+value.ptname+"</td>" +
                    "<td>"+value.hn+"</td>" +
                    "<td>"+value.vstdttm+"</td>" +
                    "<td id='cc'>"+value.cc+"</td>" +
                    "<td class='dx' id='"+value.id_dx+"'>"+value.pdx+"</td>" +
                    "<td class='dx' id='"+value.id1+"'>"+value.dx1+"</td>" +
                    "<td class='dx' id='"+value.id2+"'>"+value.dx2+"</td>" +
                    "<td class='dx' id='"+value.id3+"'>"+value.dx3+"</td>" +
                    "<td class='dx' id='"+value.id4+"'>"+value.dx4+"</td>" +
                    "<td class='dx' id='"+value.id5+"'>"+value.dx5+"</td>" +
                   // "<td class='dx_all'  id='"+value.vn+"'><i class='fa fa-child'></i></td>" +
                    "<td class='dx_new'  id='"+value.vn+"'><i class='fa fa-plus dx'></i></td>" +
                    "</tr>");
            });
            /////////////click dx  to  edit/////////////////////////////////
            var dx = $('td.dx');
            var len_dx = dx.length;
            $("td.dx_p,td.dx,td.dx_all,td.dx_new").click(function(event){
                var id_dx =  this.id;
                var class_dx = this.className;
                //alert(id_dx);
                if(id_dx!=''){
                    var pdx = this.innerText;
                    var this_td = this;
                    var this_tr = this_td.parentNode.rowIndex;
                    if(class_dx=='dx'){
                        var link_page = 'pt_edit_dx_form.php?id_dx='+id_dx+'&&pdx='+pdx+'&&visit_type='+visit_type;
                    }else if(class_dx=='dx_new'){
                        var link_page = 'pt_add_dx_form.php?id_dx='+id_dx;
                    } else{
                        var link_page = 'pt_edit_dx_all_form.php?id_dx='+id_dx;
                    }
                    $.fancybox({'href'	: link_page,//link_page+id_dx+'&&pdx='+pdx+'',
                        //'width' : '70%',
                        //'height' : '50%',
                        'autoSize' : true,
                        'transitionIn'  :   'elastic',
                        'transitionOut' :   'elastic',
                        'speedIn'    :  600,
                        'speedOut'   :  200,
                        'overlayShow'   :   false,
                        'closeBtn': true,
                        onComplete : function() {
                            var old_dx = this_td.innerText;
                            $('#change_dx').val(old_dx);
                            $("input#icd10").focus().select();
                        },
                        beforeShow: function () {
                            this.width = $(this.element).data("width") ? $(this.element).data("width") : null;
                            this.height = $(this.element).data("height") ? $(this.element).data("height") : null;
                        },
                        onClosed : function(){
                            var change_dx = $('#change_dx').val();
                            if(class_dx=='dx'){
                                this_td.innerText = $('#change_dx').val();
                                if(change_dx ==''){
                                    this_td.id = '';
                                }
                            }else{
                                var dx_str = $('#change_dx').val();
                                var dx_array = dx_str.split(',');
                                var dx_array_len = dx_array.length;
                                var table = document.getElementById("mytable");
                                var row = table.rows[this_tr] ;
                                var start_dx = 6;
                                var num_cell = row.cells.length ;
                                var n = 0;
                                for (var i = start_dx; i < num_cell; i++) {
                                    var dx_status = row.cells[i].innerText;
                                    if ( dx_status == "" && n  <= dx_array_len-1 ) {
                                        row.cells[i].innerText =  dx_array[n];
                                        row.cells[i].id = "vn"+id_dx;
                                        n++;
                                    }
                                }
                            }
                        }
                    });
                    ////  use ajax to sent  $_get  to  other page///////////////
                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: "pt_edit_dx_form.php"
                        //data: id

                    });
                };
            });
            /////////////// enc of  edit  dx/////////////////
        });
    }else{
        alert('คุณยังไม่ได้ระบุวันที่ หรือ ไม่ได้ใส่ HN')

    }
};

//////////////////////////


</script>
</body>
</html>