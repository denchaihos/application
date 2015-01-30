<?php
    session_start();
    ob_start();

    include 'connect.php';
    //date_default_timezone_set('Asia/Bangkok');
    $vn = $_POST['vn'] ;



    try {
    $dbh = new PDO($dsn, $username, $password, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'DELETE FROM tsu_labpcu  WHERE vn = '.$vn.' ';

    $stmt = $dbh->prepare($sql);

        $stmt->execute();
        echo 'ลบข้อมูลเรียบร้อยแล้ว';
    }catch (PDOException $e) {
        $dbh->rollBack();
        die( $e->getMessage());

    }

    $dbh = null;

?>