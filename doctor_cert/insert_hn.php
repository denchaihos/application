<?
//if($realname==NULL) header("location:index.php");
//$email=$_POST["email"];
//$password=MD5($_POST["password0"]);
$hn = $_GET['hn'];
$name = trim($_GET['name']);
$birthday = trim($_GET['birthday']);
//copy($imageTemp,"$imagename");

$host ="localhost";
$uname="sn";
$passwd="sn";
$dbname="snhos";
$con = mysql_connect($host,$uname,$passwd);
If (!$con) {
	echo "<h3> error  :  can not connect database</h3>";
	exit();
}

mysql_query("set character_set_results=utf8");
mysql_query("set character_set_connection=utf8");
mysql_query("set character_set_client=utf8");


$sql="insert into discharge_opdcard (hn,name,birthdate,date_update) values('$hn','$name','$birthday',now())";
mysql_db_query ($dbname,$sql);
mysql_close($con);


//set ptnote
$host ="192.168.1.3";
$uname="sa";
$passwd="sa";
$dbname="hos";
$con = mysql_connect($host,$uname,$passwd);
If (!$con) {
	echo "<h3> error  :  can not connect database</h3>";
	exit();
}
$sql="insert into discharge_opdcard (hn,name,birthdate,date_update) values('$hn','$name','$birthday',now())";
mysql_db_query ($dbname,$sql);
mysql_close($con);

$host ="192.168.1.3";
$uname="sa";
$passwd="sa";
$dbname="hos";
$con = mysql_connect($host,$uname,$passwd);
If (!$con) {
	echo "<h3> error  :  can not connect database</h3>";
	exit();
}

mysql_query("set character_set_results=utf8");
mysql_query("set character_set_connection=utf8");
mysql_query("set character_set_client=utf8");
$sql = "select serial_no from serial where name='ptnote_id' ";
$result = mysql_db_query ($dbname,$sql);
$obj = mysql_fetch_object($result);
$last_ptnote_id = $obj->serial_no+1;
//insert ptnote to hos

$sql_insert="insert into ptnote (ptnote_id,hn,noteflag,ptnote,plain_text,note_datetime,note_staff,public_note) values('$last_ptnote_id','$hn','[OPDCARD][REGIST]','OPD CARD จำหน่ายเพราะขาดการติดต่อ 5 ปี','OPD CARD',now(),'admin','Y')";
mysql_db_query ($dbname,$sql_insert) or die(mysql_error());
$sql_update_ptnote_id = "update serial set serial_no='$last_ptnote_id' where name='ptnote_id' ";
mysql_db_query ($dbname,$sql_update_ptnote_id);
mysql_close($con);
header("location:index.php");
//echo $_GET['name'];
?>