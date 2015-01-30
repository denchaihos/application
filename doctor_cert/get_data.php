<?php
include 'connect.php';
$hn = $_GET['hn'];

$data = array();
$sql ="select CONCAT(pname,fname,'   ',lname) as ptname from pt where hn = '$hn'";
$result = mysql_query($sql,$con);
if (mysql_num_rows($result)==0){
    $row_array['ptname'] = 'HN นี้ไม่มีอยู่ในทะเบียน';

    array_push($data,$row_array);
}else{
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $row_array['ptname'] = $row['ptname'];
        array_push($data,$row_array);
    }
}


echo json_encode($data);
exit;


 
?>