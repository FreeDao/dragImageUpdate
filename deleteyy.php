<?php
//header("Content-type: text/html; charset=utf-8"); 

$yyid = $_GET["yyid"];

if($yyid != ""){
	$con = mysql_connect("192.168.1.201","openfire","openfire");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
	mysql_query("set names 'UTF8'",$con); 
	mysql_select_db("lvbao", $con);

	mysql_query("DELETE FROM lb_hospital WHERE yyid='".$yyid."'");
	mysql_query("DELETE FROM lb_doctor WHERE yyid='".$yyid."'");
	mysql_close($con);
}
$url = "./index.php";
		if (isset($url)){
			Header("Location: $url");
		}
?>