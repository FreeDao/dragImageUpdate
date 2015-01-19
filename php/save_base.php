<html>
<head>
<meta charset="utf-8" />
</head>
</html>
<?php
$yymc = $_POST ["yymc"];
$clsj = $_POST ["clsj"];
$dh = $_POST ["fwdh"];
$dz = $_POST ["dz"];
$img = $_POST ["img"];
$zs_imgs = $_POST ["zs_imgs"];
$yyjj = $_POST ["yyjj"];
$tsly = $_POST ["tsly"];
$dqbhcode = $_POST ["dqbhcode"];
$yydj = $_POST ["yydj"];

$con = mysql_connect ( "192.168.1.201", "openfire", "openfire" );
if ($con) {
} else {
	echo "false";
	exit ( 0 );
}
mysql_query ( "set names 'UTF8'", $con );
mysql_select_db ( "lvbao", $con );

// echo $sql;
$yyid = $_POST ["yyid"];
if (isset ( $yyid )) { // 更新
	mysql_query ( "DELETE FROM lb_hospital WHERE yyid='".$yyid."'" );
}
$sql = "INSERT INTO lb_hospital (yymc, clsj, dh,dz,img,zs_imgs,yyjj,tsly,dqbh,yydj)
VALUES ('" . $yymc . "', '" . $clsj . "', '" . $dh . "','" . $dz . "','" . $img . "','" . $zs_imgs . "','" . $yyjj . "','" . $tsly . "','" . $dqbhcode . "','" . $yydj . "')";

if (mysql_query ( $sql )) {
	$result = mysql_query ( "SELECT * FROM lb_hospital WHERE yymc = '" . $yymc . "' order by yyid desc" );
	
	if ($row = mysql_fetch_array ( $result )) {
		$yyid = $row ['yyid'];
	} else {
		echo "false";
	}
	
	if ($yyid > 0) {
		$url = "../upyypic.php?yyid=" . $yyid . "&flag=1";
		if (isset ( $url )) {
			Header ( "Location: $url" );
		}
		// echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=../upyypic.html?yyid=\""+$yyid+">";
	} else {
		echo "false";
	}
} else {
	echo "false";
}

mysql_close ( $con );
?>