<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="fonts/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <style>
            #header{
                margin-bottom: 130px;
            }
        </style>
    </head>
    <body>
      <div id="header">
        <nav  class="navbar navbar-default navbar-fixed-top" >
            <div class="container-fluid" >
                <div class="col-lg-12">
                <h2>ThungsriUdom Application</h2>
                </div>
                <div class="col-lg-12">
                <div class="col-lg-6 ">
                    <ol class="breadcrumb" >
                    <?php
                        $curpage = basename($_SERVER['PHP_SELF']);
                    ?>

                        <li><a href="index.php">หน้าหลัก</a></li>
                        <li  class="active"><?php echo $curpage; ?></li>

                    </ol>
                </div>
                <?php
                if(!isset($_SESSION)){ 
                ?>    
                    <div class="col-lg-6  text-right">&nbsp;</div>
                <?php     
                }else{
                ?>
                <div class="col-lg-6  text-right">
                    <!--<div class="col-lg-4 text-right">-->
                        <i class="fa fa-user fa-2x"></i>
                        <?php
                            echo "ผู้ใช้งาน: ".$_SESSION['name'];
                        ?>
                    <!--</div>-->
                    <!--<div class="col-lg-1 text-right">-->
                    &nbsp;&nbsp;&nbsp;
                    <a href="logout.php">
                        <i class="fa fa-sign-out fa-2x"></i>
                    </a>    
                    <!--</div>-->
                </div>
                <?php
                }
                ?>
                </div>
            </div>
        </nav>
      </div>  
    </body>
</html>
