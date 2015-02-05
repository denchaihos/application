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
            height: 150px;
            background-color: #e0e0e0;
            padding: 5px;
            margin: auto;
        }
    </style>
    <script type="text/javascript">

        function save_dx(){
            document.getElementById("edit_dx").action="pt_edit_dx.php";
        }
        function delete_dx(){
            document.getElementById("edit_dx").action="pt_delete_dx.php";
            $("#icd10").val('');
        }
        var ajaxSubmit = function(formEl) {
                if ($("#icd10name").val() == 'ICD10 is not valid' ){
                    $('#icd10').focus();
                    alert("รหัส ICD10 ไม่ถูกต้อง");
                } else {
                        //document.getElementById("edit_dx").action="pt_delete_dx.php";
                        var url = $(formEl).attr('action');
                        var data = $(formEl).serialize();
                        $.ajax({
                            type: "post",
                            url: url,
                            data: data,
                            datatype: 'html',
                            success: function(data){
                                //alert(data);
                                alert('save  complete');
                                var change_dx = $("#icd10").val();
                                $('#change_dx').val(change_dx);//send value  to  mother page
                                $.fancybox.close();
                                //$("#flex1").flexReload();
                            }
                        })
                }
            return false;
        }
    </script>
</head>
<body>
<?
    $visit_type = $_GET['visit_type'];
//echo "visit_type".$visit_type;
    $id_dx = $_GET['id_dx'];
    $dx = $_GET['pdx'];
//echo $dx;
//echo $id_dx;
    include 'connect.php';
if($visit_type=="O"){
    $sql = 'select cnt as cnt from ovstdx where id="'.$id_dx.'"';
}else{
    $sql = 'select itemno as cnt from iptdx where id="'.$id_dx.'"';
}

    $result = mysql_query($sql,$con);
    $obj = mysql_fetch_object($result);
    $cnt = $obj->cnt;

    $sql = 'select icd10name from icd101 where icd10="'.$dx.'"';
    $result = mysql_query($sql,$con);
    $obj = mysql_fetch_object($result);
?>
<div class="baackgroud_me col-lg-12">
    รหัสวินิจฉัย
    <br/>
    <form name="edit_dx" id="edit_dx"  method="post"  onsubmit="return ajaxSubmit(this)">
        <input type="hidden" name="id_dx" value="<? echo $id_dx; ?>"/>
        <input type="hidden" name="visit_type" value="<? echo $visit_type; ?>"/>
        <input type="text"  id="icd10"  name="icd10" size="5" value="<? echo $dx; ?>" onkeyup="set_icd10name()"/>
        <input type="text" name="icd10name" id="icd10name"  size="100" value="<?  echo $obj->icd10name; ?>"/>
            <p></p>
            <div class="form-group">
                <input type="submit" id="submit_save" class="btn btn-success custom" value="บันทึก" name="submit_save" onclick="save_dx()"/>
                <input type="submit" id="submit_delete" class="btn btn-primary" value="ลบ DX"  name="submit_delete" onclick="delete_dx()" <? if($cnt==1) echo 'disabled'; ?> />
                <input type="button" class="btn btn-warning" value="ยกเลิก" onclick="btnCancel()"/>
            </div>
    </form>
</div>
</body>
</html>