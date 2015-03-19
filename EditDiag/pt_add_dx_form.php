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
    <!-- Bootstrap -->
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    <style type="text/css">
        .baackgroud_me{
            width: 1000px;
            height: 300px;
            background-color: #e0e0e0;
            padding: 5px;
            margin: auto;
        }
        #dx_box{
            height: auto;
        }
        #del_dx{
            cursor: pointer;
        }
    </style>
    <script type="text/javascript">

        function save_dx(){
            add_element();
            var dx_array = [];
            var obj = $('li input');
            var len_icd =  (obj.length)/2;
            //  loop create $_post[icd10]////
            var k=0;
            for (var i=0, n=len_icd; i<n; i++) {
               // alert(i);
               // alert(obj[k].value);
                obj[k].setAttribute("name","icd_"+i);
                dx_array.push(obj[k].value);
                k+=2;
            }
            //  loop create $_post[icd10name]////
            var k=1;
            for (var i=0, n=len_icd; i<n; i++) {
                // alert(i);
                // alert(obj[k].value);
                obj[k].setAttribute("name","icdname_"+i);
               // dx_array.push(obj[k].value);
                k+=2;
            }
            var all_dx = (dx_array.join(","));
            $('#change_dx').val(all_dx);

            document.getElementById("add_dx").action="pt_add_dx.php";
        }
        function delete_dx(){
            document.getElementById("add_dx").action="pt_delete_dx.php";
            $("#icd10").val('');
        }
        var ajaxSubmit = function(formEl) {
            var len_icd = $('#icd').length;
            if (len_icd == 0){
                $('#icd10').focus();
                alert("คุณยังไม่ได้เพิ่มวินิจฉัย");
            } else {
                //document.getElementById("edit_dx").action="pt_delete_dx.php";
                var url = $(formEl).attr('action');
                var data = $(formEl).serialize();
                //////////////////////////


                ///////////////////////////////////
                $.ajax({
                    type: "post",
                    url: url,
                    data: data,
                    datatype: 'html',
                    success: function(data){
                        alert(data);
                       // alert('save  complete');
                        var change_dx = $("#icd10").val();
                       // var dx_array = [];
                       /* var ele = $("input#icd");
                        var lols = $('#icd').val();
                        var len_icd = ele.length;
                        //alert(len_icd);
                        var vals=[];
                        for (var i=0, n=len_icd;i<n;i++) {


                            vals.push(ele[i].name);
                        }
                        alert(vals.join(","));

*/
                       // dx_array.toString();
                      //  var energy = dx_array.join();
                        //alert (dx_array);

                        //alert ("dxarray"+dx_array[1]);

                        var change_dx = $("#icd").val();
                       // $('#change_dx').val(change_dx);//send value  to  mother page

                       // $('.dx').innerText = 'test';
                        $.fancybox.close();
                        //$("#flex1").flexReload();
                    }
                })
            }
            return false;
        }
        function add_element(){
            var icd10 = $('input#icd10').val();
            var icd10name = $('input#icd10name').val();
            if(icd10 != ''){
                $('ul#data').append('<li><input type="text"  id="icd"  size="5"  value="'+icd10+'" /><input type="text"  size="100"  value="'+icd10name+'"/></li>');
                $('input#icd10').focus();
                $('input#icd10').val('');
                $('input#icd10name').val('');
            }
        }
        $("form#add_dx").bind("keypress", function (e) {
            var icd10 = $('input#icd10').val();

            if (e.keyCode == 13 && icd10 !='') {
                //$("#submit_save").attr('value');
                //add more buttons here
               // alert('me');
                //
               add_element();

                return false;

            }else{


                return true;
            }


        });
        function fancyboxClose(){
	$.fancybox.close(); 
}
    </script>
</head>
<body>
    <div class="container baackgroud_me">
        <div  class="col-lg-12 label label-default">
            <div class="col-lg-11" style="font-size:18px;text-align: left">
               เพิ่มรหัสวินิจฉัย        
            </div>
            <div class="col-lg-1 fancybox-skin" style="text-align:right;">  
                <!--<img src="css/fancybox/fancy_close.png" alt="" onclick="fancyboxClose();" style="cursor:pointer"/>-->
            </div>
        </div>

<?php
$id_dx = $_GET['id_dx'];
//$dx = $_GET['pdx'];
//echo $dx;
include 'connect.php';
$sql ='select o.*,i.icd10name from ovstdx o left outer join icd101 i on i.icd10=o.icd10 where o.vn="'.$id_dx.'" order by o.cnt desc';
$result = mysql_query($sql,$con);
?>
<div class="baackgroud_me col-lg-12">
    รหัสวินิจฉัย
    <br/>
    <!--<input type="hidden" id="add_dx" value="add_dx" name="add_dx"/>-->
    <form name="edit_dx" id="add_dx"  method="post"  onsubmit="return ajaxSubmit(this)">
        <div id="dx_box">
            <?
            $i_icd = 1;
            while($obj = mysql_fetch_object($result)){
                ?>

                <input type="hidden" name="vn" value="<? echo $id_dx; ?>"/>
                <!--<input type="text" name="id_dx_<? //echo $i_icd; ?>" value="<? //echo $obj->id; ?>"/>-->
                <?php echo $i_icd; ?>

                <input type="text"  id="icd10_old"  name="icd10_<? echo $i_icd; ?>" size="5" value="<? echo $obj->icd10; ?>" onkeyup="set_icd10name()" disabled/>
                <input type="text" name="icd10name_<? echo $i_icd; ?>" id="icd10name_old"  size="100" value="<?  echo $obj->icd10name; ?>" disabled/>

                <?
               /* if($obj->cnt == 0){*/
                    ?>
                   <!-- <i class="fa fa-cut fa-lg" id="del_dx"></i>-->
                <?

               // }
                ?>

                <br/>

                <?
                $i_icd++;
            }
            ?>
           <!-- <input type="text" name="count_post" value="<? //echo $i_icd ?>"/>-->
        </div>
        เพิ่มรหัสวินิจฉัย<br/>
        <input id="icd10" type="text"  size="5" onkeyup="set_icd10name()"  />
        <input id="icd10name" type="text"  name="" size="100" />
        <input type="button" name="ch" value="เพิ่ม" onclick="add_element()"/>
        <ul id="data" style="list-style: none;padding-left:0;">   </ul>
        <div class="form-group">
            <input type="submit" id="submit_save" class="btn btn-success custom" value="บันทึก" name="submit_save" onclick="save_dx()"/>
            <input type="submit" id="submit_delete" class="btn btn-primary" value="ลบ DX"  name="submit_delete" onclick="delete_dx()" disabled="<? if($obj->cnt==1) echo 'disabled'; ?>" />
            <input type="button" class="btn btn-warning" value="ยกเลิก" onclick="btnCancel()"/>
        </div>

    </form>
</div>
    </div>
</body>
</html>