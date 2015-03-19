<?php
/**
 * Created by PhpStorm.980459
 * User: User
 * Date: 25/10/2557
 * Time: 20:46 น.
 */
include 'connect.php';
//echo "icd0".$_POST[icd_0];
$num_post = count($_POST);
$post_icd = $_POST;
$post_icdname = $_POST;

for ($x = 0; $x <= ($num_post/2)-1; $x++){
    unset($post_icd['icdname_'.$x.'']);
}

for ($x = 0; $x <= ($num_post/2)-1; $x++){
    unset($post_icdname['icd_'.$x.'']);
}


//if(isset($_POST[icd_0])){
    for($j=0;$j<=($num_post/2)-1;$j++){
        $icd = $post_icd['icd_'.$j.''];
        $icdname = $post_icdname['icdname_'.$j.''];
        $sql =  "INSERT INTO ovstdx (vn,icd10,icd10name,cnt) values ('$_POST[vn]','$icd','$icdname','0') ";
        mysql_query($sql);
    }
//}


mysql_close($con);

//echo '<br/>';
echo "SAVE COMPLETE";
?>