<?php
/**
 * Created by PhpStorm.980459
 * User: User
 * Date: 25/10/2557
 * Time: 20:46 น.
 */
include 'connect.php';
$len_id = strlen($_POST[id_dx]);
//echo $_POST[id_dx];
echo "<br/>";
//echo $_POST[icd10];
$id_dx = substr($_POST[id_dx],2,$len_id);
$id_type =  substr($_POST[id_dx],0,2);
echo $id_dx;
echo "<br/>";
if($_POST[visit_type]=="O"){
    if($id_type != "vn"){
        $sql = "select * from ovstdx where  id = ".$_POST[id_dx]."";
        $result = mysql_query($sql,$con);
        $obj = mysql_fetch_object($result);
        $sqlinsert = "insert into ovstdx_original_dx (id,vn,icd10,icd10name,cnt) values ('$obj->id','$obj->vn','$obj->icd10','$obj->icd10name','$obj->cnt')";
        mysql_query($sqlinsert);
        $sql =  "update ovstdx set icd10 = '".$_POST[icd10]."',icd10name = '".$_POST[icd10name]."' where id = ".$_POST[id_dx]."";
        mysql_query($sql);
    }else{
        $sql =  "update ovstdx set icd10 = '".$_POST[icd10]."',icd10name = '".$_POST[icd10name]."' where vn = ".$_POST[id_dx]." and icd10  = '".$_POST[icd10]."' ";
        mysql_query($sql);
    }
}else{
    $sql = "select * from iptdx where  id = ".$_POST[id_dx]."";
    $result = mysql_query($sql,$con);
    $obj = mysql_fetch_object($result);
    $sqlinsert = "insert into iptdx_original_dx (id,an,itemno,dct,icd10,icd10name,spclty) values ('$obj->id','$obj->an','$obj->itemno','$obj->dct','$obj->icd10','$obj->icd10name','$obj->spclty')";
    mysql_query($sqlinsert);
    $sql =  "update iptdx set icd10 = '".$_POST[icd10]."',icd10name = '".$_POST[icd10name]."' where id = ".$_POST[id_dx]."";
    mysql_query($sql);
}

/////////////////



mysql_close($con);
echo "<br/>";
echo "SAVE COMPLETE";
?>