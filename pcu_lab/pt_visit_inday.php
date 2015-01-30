<?php
include 'connect.php';
    $visit_date = substr($_GET['visit_date'],-4)."-".substr($_GET['visit_date'],3,2)."-".substr($_GET['visit_date'],0,2);
    // $visit_date = '2015-01-15';
    //echo $_GET['visit_date'];
    $pcucode = $_GET['pcucode'];
    $hn = $_GET['hn'];
    $data = array();

                   $dbh = new PDO($dsn, $username, $password, $options);
                   $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   if($hn != '' && $pcucode != ''){
                    $sql = 'select tl.vn,tl.hn,tl.pcucode, h.NAMEHOSP as pcuname from tsu_labpcu tl join hospcode h on SUBSTR(h.CODEHOSP,3,5) = tl.pcucode where  dateserv = "'.$visit_date.'" and pcucode = "'.$pcucode.'" and hn ="'.$hn.'"';
                   }elseif ($hn != '' && $pcucode == '') {
                    $sql = 'select tl.vn,tl.hn,tl.pcucode, h.NAMEHOSP as pcuname from tsu_labpcu tl join hospcode h on SUBSTR(h.CODEHOSP,3,5) = tl.pcucode where  dateserv = "'.$visit_date.'" and hn ="'.$hn.'"';   
                   }elseif ($hn == '' && $pcucode != '') {
                    $sql = 'select tl.vn,tl.hn,tl.pcucode, h.NAMEHOSP as pcuname from tsu_labpcu tl join hospcode h on SUBSTR(h.CODEHOSP,3,5) = tl.pcucode where  dateserv = "'.$visit_date.'" and pcucode ="'.$pcucode.'"';   
                   }else{
                    $sql = 'select tl.vn,tl.hn,tl.pcucode, h.NAMEHOSP as pcuname from tsu_labpcu tl join hospcode h on SUBSTR(h.CODEHOSP,3,5) = tl.pcucode where  dateserv = "'.$visit_date.'"';   
                   }
                    $stmt = $dbh->prepare($sql);                       
                   try{
                       $stmt->execute();
                            while($obj = $stmt->fetch()){
                            $row_array['vn'] = $obj['vn'];
                            $row_array['hn'] = $obj['hn'];
                            $row_array['vn'] = $obj['vn']; 
                            $row_array['pcuname'] = $obj['pcuname']; 
                            array_push($data,$row_array);
                        }
                        echo json_encode($data);
                        exit;
                    } catch (Exception $ex) {
                       echo $e->getMessage();    
                    }
   
?>
    

