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
        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">            
 $(document).ready(function () {
	$("#combobox").keypress(function(e) {
		var code = (e.keyCode ? e.keyCode : e.which);
		if(code == 13) { //Enter keycode
		code = 9;
			return false;
		}
	});
});


function validateForm() {
    var x = document.forms["pculab"]["pcucode"].value;
    if (x == null || x == "") {
        alert("First name must be filled out");
        return false;
    }
}
/////////////////end ready function/////////////////////
	var ajaxSubmit = function(formEl) {
	if ($("#pcucode").val() == '0' ){

		//alert("กรุณากรอกข้อมูลให้ครบ");	
		if($('#hn').val()==''){
			$('#pcucode').focus();
		}else{
			
		alert("กรุณากรอกข้อมูลให้ครบ");	
		}
	} else {
		var url = $(formEl).attr('action');
		var data = $(formEl).serialize();
		$.ajax({
			type: "post",
			url: url,
			data: data,
			datatype: 'html',
			success: function(data){
				alert(data);
				$.fancybox.close(); 
				//$("#flex1").flexReload();
			}    
		})
	}
	return false;
		
};
 </script>
    
    </head>
    <body>
        <div class="container">
            <?php
                //include 'header.php';
            ?>
            <p>.</p>
            <p>.</p>
            <p>.</p>
            <p>.</p>
            <div class="panel panel-danger">
                <div class="panel-heading" id="flip">
                    <h3 class="panel-title">LAB PCU  ANC</h3>
                    <h2>
                        <?php
                        
                            function DateThai($strDate)
                            {
                                    $strYear = date("Y",strtotime($strDate))+543;
                                    $strMonth= date("n",strtotime($strDate));
                                    $strDay= date("j",strtotime($strDate));
                                    $strHour= date("H",strtotime($strDate));
                                    $strMinute= date("i",strtotime($strDate));
                                    $strSeconds= date("s",strtotime($strDate));
                                    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                    $strMonthThai=$strMonthCut[$strMonth];
                                    return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
                            }                         
                            date_default_timezone_set('Asia/Bangkok');
                            $date = date('m/d/Y h:i:s a');                            
                            echo '<h3>'.DateThai($date).'</h3>';
                            echo '<br/>';
                            $vn = substr(date('Y')+543,2,2).date('mdhis');
                            //echo $vn;
                        ?>
                    </h2>
                </div>
                <div class="panel-body" id="panel">
                    <form class="form-horizontal" name="pculab"  method="post" action="test.php"  onsubmit="return validateForm()" >
                        <input type="text" name="dateserv" value="<?php echo $vn; ?>"/>
                        <div class="form-group">
                          <label for="pcucode" class="col-sm-2 control-label">สถานบริการ</label>
                          <div class="col-sm-10">
                              <select name="pcucode" id="pcucode" class="form-control">
                                  <option value="">เลือกสถานบริการ</option>
                                  <option value="03790">หนองอ้ม</option>
                                  <option value="03791">นาเกษม</option>
                                  <option value="03792">โนนใหญ่</option>
                                  <option value="03793">กุดเรือ</option>
                                  <option value="03794">ทุ่งช้าง</option>
                                  <option value="03795">หนองบัวอารี</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="hn" class="col-sm-2 control-label">รหัสผู้รับบริการ</label>
                          <div class="col-sm-10">
                              <input type="text" name="hn" id="hn" class="form-control"  placeholder="" />
                          </div>
                        </div>
                         
           
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">SAVE</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
