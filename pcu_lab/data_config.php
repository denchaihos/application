<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$pcudata = array(['03790','หนองอ้ม'],
                ['03791','นาเกษม'],
                ['03792','โนนใหญ่'],
                ['03793','กุดเรือ'],
                ['03794','ทุ่งช้าง'],
                ['03795','หนองบัวอารี']);


$pcu = Array();
for($i=0;$i<=5;$i++){
    $row_array['pcucode'] = $pcudata[$i][0];
    $row_array['pcuname'] = $pcudata[$i][1];
    array_push($pcu,$row_array);
   
}

//echo json_encode($pcu);
//print_r($pcudata);
//print_r($pcu);
$jsondata = json_encode($pcu);
echo $jsondata;