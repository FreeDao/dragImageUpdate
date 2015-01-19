<?php
//header("Content-type: text/html; charset=utf-8"); 

$ysid = $_GET["ysid"];
$yyid = $_GET["yyid"];

if($ysid != ""){
	$con = mysql_connect("192.168.1.201","openfire","openfire");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
	mysql_query("set names 'UTF8'",$con); 
	mysql_select_db("lvbao", $con);

	mysql_query("DELETE FROM lb_doctor WHERE ysid='".$ysid."'");
	mysql_close($con);
}
$url = "./selectys.php?yyid=".$yyid;
		if (isset($url)){
			Header("Location: $url");
		}
?>