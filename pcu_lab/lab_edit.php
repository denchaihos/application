<?php
session_start();
ob_start();

include 'connect.php';
//date_default_timezone_set('Asia/Bangkok');
$vn = $_POST['vn'] ;

$pcucode = $_POST['pcucode'] ;
$hn = $_POST['hn'];
$dateserv = date("Y-m-d");
$timeserv = date("h:i:s");
$bloodgrp = $_POST['bloodgrp'];

$rh = $_POST['rh'];
$hct = $_POST['hct'];
$dcip = $_POST['dcip'];
$hiv = $_POST['hiv'];
$hbsag =  $_POST['hbsag'];
$vdrl = $_POST['vdrl'];
$mcv = $_POST['mcv'];
$lab_note = nl2br($_POST['lab_note']);
$lab_staff = $_SESSION['code'];

try {
$dbh = new PDO($dsn, $username, $password, $options);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'UPDATE tsu_labpcu set bloodgrp = :bloodgrp ,rh = :rh ,hct = :hct, dcip = :dcip ,hiv = :hiv, hbsag = :hbsag ,vdrl = :vdrl ,mcv = :mcv ,lab_note = :lab_note ,lab_staff = :lab_staff WHERE vn = '.$vn.' ';

$stmt = $dbh->prepare($sql);
//$stmt->bindParam(':vn',$vn);
//$stmt->bindParam(':pcucode',$pcucode);
//$stmt->bindParam(':hn',$hn);
//$stmt->bindParam(':dateserv',$dateserv);
//$stmt->bindParam(':timeserv',$timeserv);
$stmt->bindParam(':bloodgrp',$bloodgrp);
$stmt->bindParam(':rh',$rh);
$stmt->bindParam(':hct',$hct);
$stmt->bindParam(':dcip',$dcip);
$stmt->bindParam(':hiv',$hiv);
$stmt->bindParam(':hbsag',$hbsag);
$stmt->bindParam(':vdrl',$vdrl);
$stmt->bindParam(':mcv',$mcv);
$stmt->bindParam(':lab_note',$lab_note);
$stmt->bindParam(':lab_staff',$lab_staff);

    $stmt->execute();
    echo 'บันทึข้อมูลเรียบร้อยแล้ว';
}catch (PDOException $e) {
    $dbh->rollBack();
    die( $e->getMessage());
  
}

$dbh = null;

?>