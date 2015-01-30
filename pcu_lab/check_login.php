<?php
    session_start();
    ob_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta  charset="utf-8">
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/alertifyjs/alertify.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="js/alertifyjs/css/alertify.css">
        <link type="text/css" rel="stylesheet" href="js/alertifyjs/css/themes/default.css" />
        <link type="text/css" rel="stylesheet" href="js/alertifyjs/css/themes/semantic.min.css" />

    </head>
    <body>
    <?php
	include 'connect.php';
        $dbh = new PDO($dsn, $username, $password, $options);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "SELECT * FROM lmlabman WHERE code = '".$_POST['username']."' and psw = '".$_POST['password']."'";
        
        $stmt = $dbh->prepare($sql);
        try{
            $stmt->execute();
        } catch (Exception $ex) {
            echo $e->getMessage();    
        }
        $obj = $stmt->fetch();
	//$strSQL = "SELECT * FROM risk_dep WHERE name ='admin' ";
	/*$objQuery = mysql_query($strSQL);
	echo "Process Login";
	$objResult = mysql_fetch_array($objQuery);*/
	if(!$obj) {
        ?>
            <script>
            //alert  popup
                alertify.alert("ผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง กรุณา login อีกครั้ง", function (e) {
                    if (e) {
                        // user clicked "ok"
                       window.location.replace("login.php");
                    }
                    
                });
  
                

            </script>
    <?php
    }else{
        $_SESSION["code"] = $obj['code'];
        $_SESSION['psw'] = $obj['psw'];
        $_SESSION['name'] = $obj['name'];
        session_write_close();
    ?>

        <script language="JavaScript">
            sec=1;
            function tplus() {
                sec-=1;
                if (sec==0) {
                    //window.location.replace("index.php");
                   window.location.replace("index.php");
                }
                if (sec>0) {
                    setTimeout("tplus()",1000);
                }
            }
            setTimeout("tplus()",1000);
        </script>
			<?php
	}
	//mysql_close($con);

?>
</body>
</html>