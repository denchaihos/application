<?php
/**
 * Created by PhpStorm.980459
 * User: User
 * Date: 25/10/2557
 * Time: 20:46 น.
 */
include 'connect.php';
echo $_POST[id_dx];
echo "<br/>";
echo $_POST[icd10];
echo "<br/>";

$sql = "select * from ovstdx where  id = ".$_POST[id_dx]."";
$result = mysql_query($sql,$con);
$obj = mysql_fetch_object($result);


$sqlinsert = "insert into ovstdx_original_dx (id,vn,icd10,icd10name,cnt) values ('$obj->id','$obj->vn','$obj->icd10','$obj->icd10name','$obj->cnt')";
mysql_query($sqlinsert);

/////////////////

$sql =  "delete from ovstdx  where id = ".$_POST[id_dx]."";
mysql_query($sql);
mysql_close($con);
echo "<br/>";
echo "SAVE COMPLETE";
?>