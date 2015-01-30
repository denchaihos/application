
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>PCU LAB</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="images/search.png"> <!--Pemanggilan gambar favicon-->
        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="css/styles.css" rel="stylesheet">
        <style>                       
            #loginModal {
                top:25%;
                right:0%;
                outline: none;
            }
            input{
   text-align:center;
}
        </style>
        <script>
            $(document).ready(function () {
                $('#username').focus();
            });
            //-----------convert Enter to Tab------------
            function tabE(obj,e){ 
               var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
               if(e.keyCode==13){ 
                 var ele = document.forms[0].elements; 
                 for(var i=0;i<ele.length;i++){ 
                   var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
                   if(obj==ele[i]){ele[q].focus();break} 
                 } 
              return false; 
               } 
              } 

        </script>
    </head>
   
    <body>
        <?php
            include 'header.php';
        ?>
        <!--login modal-->
        <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h1 class="text-center">Login</h1>
              </div>
              <div class="modal-body">
                  <form class="form col-md-12 center-block" method="post" action="check_login.php">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" style="" id="username" name="username" placeholder="Username" onKeyPress="return tabE(this,event)" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" name="password" placeholder="Password" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary btn-lg btn-block">LOG In</button>
                      <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
                    </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <div class="col-md-12">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                          </div>	
              </div>
          </div>
          </div>
        </div>
        
        
        
        
        

        <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>