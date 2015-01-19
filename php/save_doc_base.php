<html>
<head>
<meta charset="utf-8" />
</head>
</html>
<?php 

$yyid = $_POST["yyid"];
$ysmc = $_POST["ysmc"];
$zc = $_POST["zc"];
$zz = $_POST["zz"];
$ysjj = $_POST["ysjj"];
$scly = $_POST["scly"];


echo $yyid." --  ".$ysmc."  -- ".$zc."  --  ".$zz."--    ".$ysjj."   -- ".$scly;

$con = mysql_connect("192.168.1.201","openfire","openfire");
if($con){
	
}else{
	echo "false";
	exit(0);
}
mysql_query("set names 'UTF8'",$con); 
mysql_select_db("lvbao", $con);

$sql = "INSERT INTO lb_doctor (yyid,ysmc, zc, zz,ysjj,scly) 
VALUES ('".$yyid."', '".$ysmc."', '".$zc."','".$zz."','".$ysjj."','".$scly."')";
//echo $sql;

if(mysql_query($sql)){ 
	$result = mysql_query("SELECT * FROM lb_doctor WHERE ysmc = '".$ysmc."' order by ysid desc");
	if($row = mysql_fetch_array($result)){
		$ysid = $row['ysid'];
	}else{
		echo "false";	
	}
	if($ysid > 0){
		$url = "../upyypic.php?ysid=".$ysid."&flag=3&yyid=".$yyid;
		if (isset($url)){
			Header("Location: $url");
		}
		//echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=../upyypic.html?yyid=\""+$yyid+">"; 
	}else{
		echo "false";
	}
}else{
	echo "false";
}
mysql_close($con);
?>