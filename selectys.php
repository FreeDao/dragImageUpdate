<html>
<head>
<meta charset="utf-8"/>

<style type="text/css">

a:link{ color: #f00; }
a:visited{ color: #F60; }
a:hover{ color: #ff0; }

.btn{
	text-align:center;
	 font-size:30px;
	
	height:37px;
	background-color:#6ac335;
	width: 300px;
	border:0px;
	-moz-border-radius: 25px;      /* Gecko browsers */
    -webkit-border-radius: 25px;   /* Webkit browsers */
    border-radius:25px;            /* W3C syntax */
	color:#FFF;  margin:auto; padding-top:8px; cursor:pointer;
	
}
body{
	background-color:#333C43;
	color:#47A45D;
}
th{
	width:200px;padding:10px 5px; background-color:#151A1E; border:#565655 1px solid;
}
table{ font-size:12px; color:#47A45D}
td{
word-wrap: break-word; 
word-break:break-all;  padding:3px 5px; border:#565655 1px solid;
height:60px;
} 
</style>

</head>


<body>
<?php
$yyid = $_GET["yyid"];

echo '<script >yyid='.$yyid.'</script>';

$con = mysql_connect("192.168.1.201","openfire","openfire");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_query("set names 'UTF8'",$con); 
mysql_select_db("lvbao", $con);

$result = mysql_query("SELECT * FROM lb_doctor where yyid=".$yyid);

echo "<table border='0' cellpadding='0' cellspacing='0'>
<tr>
<th>医院ID</th>
<th>医师ID</th>
<th>医师名称</th>
<th>医师头像</th>
<th>医师职称</th>
<th>主治项目</th>
<th>医师简介</th>
<th>擅长领域</th>
<th>操作</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td width='4%' align='center'>" . $row['yyid'] . "</td>";
  echo "<td width='7%'>" . $row['ysid'] . "</td>";
  echo "<td width='4%'>" . $row['ysmc'] . "</td>";
  echo "<td width='7%'><img style='width:150px;' src='http://183.62.71.21:800/lvbaoApp/adddata/" . $row['img'] . "' /></td>";
  echo "<td width='6%'>" . $row['zc'] . "</td>";
  echo "<td width='6%'>" . $row['zz'] . "</td>";
  echo "<td width='23%'>" . $row['ysjj'] . "</td>";
  echo "<td width='8%'>" . $row['scly'] . "</td>";
  echo "<td width='5%'><a href='#' onClick='del(".$row['ysid'].",".$row['yyid'].")' >删除医师</a></td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>
<br/><br/>
<!-- <div class="btn">添加医师</div> -->
<div class="btn" onClick="toaddys()">继续添加医师</div>
<br/>
<div class="btn" onClick="toyy()">返回医院列表</div>
<script >
function toaddys(){
	window.location.href="add_doc_base.php?yyid="+yyid+"&flag=3"; 	
}
function toyy(){
	window.location.href="index.php"; 	
}
function del(v,v2){
	//alert(v+"  "+v2)
	if (confirm("确认要删除？")) {
          window.location.href="deleteys.php?ysid="+v+"&yyid="+v2; 
    }	
}
</script>
</body>
</html>