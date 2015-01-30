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
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css"/>
    <style type="text/css">
       /* body{
            background-color: #285e8e;
        }*/
       /* input {
            font-size: 24px;
            font-weight: bold;
            color: #009;
            height: 40px;
            width: 300px;
            text-align: center;
        }*/
        label {
            font-size: 24px;
            font-weight: bold;
        }
        .mydiv{
            width: 400px;
            height: 400px;
            margin: auto;
            background-color: #cccccc;
            align-items: center;
            text-align: center;
        }
    </style>

    <script type="text/javascript" language="javascript">
        $(document).ready(function(){
            $('#hn').focus();
        })
        function getname(){
            var today = new Date();
            var yyyy =  parseInt(today.getFullYear());
            var hn = $('#hn').val();
            //alert(hn);
            $("#name").val('');

            $.getJSON('get_data.php',{hn:hn}, function(data) {
                $.each(data, function(key,value) {

                    $("#ptname").val(value.ptname);
                    //$("#submit").focus()

                });
            });

        }
        //-----------convert Enter to Tab------------
        function tabE(obj,e){
            var e=(typeof event!='undefined')?window.event:e;// IE : Moz
            if(e.keyCode==13){
                $("#submit").focus();
                return false;
            }
        }
        function validateForm() {
            var x = document.forms["myform"]["ptname"].value;
            var y = document.forms["myform"]["doctor"].value;
            if (x==null || x=="HN นี้ไม่มีอยู่ในทะเบียน" || y == null || y =="เลือกแพทย์ผู้ทำการตรวจ") {
                alert("ยังกรอกข้อมูลไม่ถูกต้อง");
                return false;
            }
        }
    </script>
</head>
<Body>
<?
    include 'connect.php';
?>
<div class="col-lg-3"></div>
<div class="col-lg-6">
    <div class="panel panel-primary">
        <div class="panel-heading">  <center><h1>พิมพ์ใบรับรองแพทย์</h1></center></div>
        <div class="panel-body">
            <form role="form" name="myform" method="post" action="doctor_cert_print.php" onsubmit="return validateForm()" target="_blank">
                <div class="form-group has-success">
                    <i class="fa fa-keyboard-o fa-2x">&nbsp;&nbsp;</i><label class="control-label" for="inputSuccess1">HN::</label>
                    <input type="text" class="form-control" placeholder="กรอก HN แล้ว Enter" name="hn" id="hn" type="text" maxlength="9" align="middle" onKeyPress="return tabE(this,event)"   onBlur="getname()"/>
                </div>
                <div class="form-group has-success">
                    <i class="fa fa-slideshare fa-2x">&nbsp;&nbsp;</i><label class="control-label" for="inputSuccess1">ชื่อผู้รับบริการ::</label>
                    <input type="text" class="form-control" placeholder="--" name="ptname" id="ptname" type="text" maxlength="9" align="middle" onKeyPress="return tabE(this,event)"   />
                </div>
                <div class="form-group has-success">
                    <i class="fa fa-user-md fa-2x">&nbsp;&nbsp;</i><label class="control-label" for="inputSuccess1">แพทย์ผู้ทำการตรวจ::</label>
                    <?
                        $sql = 'select concat(d.registerno,":","แพทย์หญิง",d.fname,"  " ,d.lname) as doctor,concat(l.prename_desc,d.fname,"  " ,d.lname) as doctorname from dct d JOIN l_prename l on l.prename_code=d.pname  where d.specialty="GP" and d.lcno is not null and d.statusdct="0"  ';
                        $result = mysql_query($sql,$con);
                    ?>
                    <select class="form-control" name="doctor">
                        <option>เลือกแพทย์ผู้ทำการตรวจ</option>
                        <?
                        while($obj = mysql_fetch_object($result) ){

                            echo "<option value='$obj->doctor'>";
                            echo $obj->doctorname;
                            echo "</option>";

                        }
                        ?>

                    </select>
                </div>
                <br/>

                <input name="btnsave" type="submit" class="btn btn-success btn-block btn-lg" value="พิมพ์" id="submit"  />

            </form>
        </div>
    </div>
</div>
<div class="col-lg-3"></div>






</Body>
</html>