<!DOCTYPE html>
<html>
<head>
    <title>Edit Diag</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
        <meta http-equiv="pragma" content="no-cache" />
    <!-- Bootstrap -->
    <script src="js/jquery-1.11.0.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="themes/blue/style.css" rel="stylesheet">
   <!-- <link href="css/tablesorter.css" rel="stylesheet">-->


    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.th.js" charset="UTF-8"></script>

    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
</head>
<style>
    .custom {
        width: 150px !important;
    }
    table.tablesorter tbody {
        font-family:tahoma, sans-serif;
        background-color: #CDCDCD;
        margin:10px 0pt 15px;
        font-size: 14px !important;
        width: 100%;
        text-align: left;
        border-radius:3px;
    }
    table.tablesorter thead tr th {
        font-family:tahoma, sans-serif;
        background-color: #e6EEEE;
        border: 1px solid #FFF;
        font-size: 15px !important;
        padding: 4px;
    }
</style>

<body>
<div class="navbar navbar-inverse" style="padding-top: 5px;border-radius: 0px;margin-bottom: 0px">

        <div class="col-lg-6">
            <span class="label" style="font-size: 20px">ปรับปรุงรหัสวินิจฉัย</span>
        </div>
        <div class="col-lg-6 " style="text-align: right">
            <form class="form-inline" role="form">
                <div class="form-group has-success">
                    <div class="form-group ">
                        <input type="Username" class="form-control " id="Username" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="Password" placeholder="Password">
                </div>
                <!--<div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                </div>-->
                <button type="submit" class="btn btn-default">Sign in</button>
            </form>
        </div>

</div>

<?php
include 'pt_visit.php';
?>

<script language="JavaScript" >
    $(document).ready(function()
        {
            $("#myTable").tablesorter();
        }
    );
</script>
</body>
</html>