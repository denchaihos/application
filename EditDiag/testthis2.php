<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
        (function($){
            $(document).on('click', '.click-me', function(e){
                doSomething.call(this, e);
            });
        })(jQuery);

        function insertHTML(str){
            var s = document.getElementsByTagName('script'), lastScript = s[s.length-1];
            lastScript.insertAdjacentHTML("beforebegin", str);
        }

        function doSomething(event){
            console.log(this.id); // this will be the clicked element
        }
    </script>
    <!--... other head stuff ...-->
</head>
<body>

<!--Best if you inject the button element with javascript if you plan to support users with javascript disabled-->
<script type="text/javascript">
    insertHTML('<button class="click-me" id="btn1">Button 1</button>');
</script>

<!--Use this when you don't care about broken buttons when javascript is disabled.-->
<!--buttons can be used outside of forms http://stackoverflow.com/a/14461672/175071 -->
<button class="click-me" id="btn2">Button 2</button>
<input class="click-me" type="button" value="Button 3" id="btn3">

<!--Use this when you want to lead the user somewhere when javascript is disabled-->
<a class="click-me" href="/path/to/non-js/action" id="btn4">Button 4</a>

</body>
</html>