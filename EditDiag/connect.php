<?php
$host = "localhost";
$uname = "root";
$passwd = "123456";
$dbname = "hi";
$con = mysql_connect($host,$uname,$passwd);
//$con = mysql_connect('192.168.11.5', 'hiuser', '212224');
If (!$con) {
    echo "<h3> error  :  Can not coonect databse</h3>";
    exit();
}
//echo "success";
mysql_select_db("hi");
mysql_query("set character_set_results=utf8");
mysql_query("set character_set_connection=utf8");
mysql_query("set character_set_client=utf8");
?>