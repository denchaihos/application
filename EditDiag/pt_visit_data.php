<?
include "connect.php";
mysql_query("set character_set_results=utf8");
mysql_query("set character_set_connection=utf8");
mysql_query("set character_set_client=utf8");
$visit_type =$_GET['visit_type'];
$visit_date = substr($_GET['visit_date'],-4)."-".substr($_GET['visit_date'],3,2)."-".substr($_GET['visit_date'],0,2);

$limit = $_GET['limit'];

if($visit_type =='O'){

    $sql_numrow = "SELECT count(vn) as totalrow  FROM  ovst where date(vstdttm)='$visit_date' ";
    $sql ='select od.id as id_dx,concat(p.fname," ",p.lname) as ptname,o.hn,time(o.vstdttm) as vstdttm,od.icd10,od.cnt,o.vn from ovst o left outer join ovstdx od on od.vn=o.vn left outer join pt p on p.hn=o.hn   where date(o.vstdttm) = "'.$visit_date.'" and od.cnt="1" order by o.vstdttm limit '.$limit.', 10 ';

}else{

    $sql_numrow = "SELECT count(an) as totalrow  FROM  ipt where date(dchdate)='$visit_date' ";
    $sql = 'select idx.id as id_dx,concat(p.fname," ",p.lname) as ptname,i.hn,time(i.dchdate) as vstdttm,idx.icd10,idx.itemno as cnt,i.vn from ipt i left outer join iptdx idx  on idx.an=i.an left outer join pt p on p.hn=i.hn   where date(i.dchdate) =  "'.$visit_date.'" and idx.itemno="1" order by i.dchdate limit '.$limit.', 10 ';
}

$result_numrow = mysql_query($sql_numrow);
$numrow = mysql_fetch_array($result_numrow,MYSQL_ASSOC);

$data = array();
//$sql ='select od.id as id_dx,concat(p.fname," ",p.lname) as ptname,o.hn,o.vstdttm,od.icd10,od.cnt,o.vn from ovst o left outer join ovstdx od on od.vn=o.vn left outer join pt p on p.hn=o.hn   where date(o.vstdttm) = "'.$visit_date.'" and od.cnt="1" order by o.vstdttm limit '.$limit.', 10 ';

$result = mysql_query($sql,$con);
$i = $limit+1;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $row_array['numrecord'] = $i ;
    $row_array['id_dx'] = $row['id_dx'];
    $row_array['vn'] = $row['vn'];
    $row_array['hn'] = $row['hn'];
    $row_array['ptname'] = $row['ptname'];
    $row_array['vstdttm'] = $row['vstdttm'];
    //  add cc//////
    $sql_cc = 'select pillness from pillness where vn="'.$row['vn'].'"  ';
    $result_cc = mysql_query($sql_cc);
    $row_array['cc'] = "";
    while($row_cc = mysql_fetch_array($result_cc,MYSQL_ASSOC)){
        $row_array['cc'] = $row_array['cc'].$row_cc['pillness'];
    };
    $row_array['pdx'] = $row['icd10'];
    // add other dx///
    $sql_subdx = 'select id,icd10 as subdx from ovstdx where vn="'.$row['vn'].'" and cnt = 0 ';
    $result_subdx = mysql_query($sql_subdx);
    $numrow_subdx = mysql_num_rows($result_subdx);
    $j = 1;
    while($row_subdx = mysql_fetch_array($result_subdx, MYSQL_ASSOC)){
        $row_array['id'.$j] = $row_subdx['id'];
        $row_array['dx'.$j] = $row_subdx['subdx'];
        $j++;

    };
    if($numrow_subdx < 5){
        for($k=$numrow_subdx+1; $k<=5; $k++) {
            $row_array['id'.$k] = '';
            $row_array['dx'.$k] = '';
        }
    }
    $row_array['total_rows'] = $numrow['totalrow'];
    array_push($data,$row_array);
    $i++;
}
echo json_encode($data);
exit;
?>