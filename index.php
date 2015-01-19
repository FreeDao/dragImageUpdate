<html>
<head>
<meta charset="utf-8"/>
<script type="text/javascript" src="assets/js/index2.js" charset="utf-8"></script>

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
word-break:break-all;
 
word-wrap: break-word; 
word-break:break-all;  padding:3px 5px; border:#565655 1px solid;
} 
</style>

</head>


<body>
<br/>
  <td align="right" valign="middle">城市：</td>
                <td valign="top" align="left">
                <input id="dqbhcode" name="dqbhcode" type="hidden"></input>
                     <select name="dqbh" id = "s1" onChange="selectcityOnly(this.value)">
					  <script>writeProvinceCode2(5);</script>
                     </select>        
                    
                </td>

<div class="btn" onClick="toaddyy()">添加医院</div>
<br/>
<?php
//header("Content-type: text/html; charset=utf-8"); 

$citybhs = $_GET["citybhs"];
$index = $_GET["index"];

echo "<script>selectS(".$index.")</script>";

if($citybhs == ""){
	$citybhs = "16015,16014,16013,16012,16011,16010,16009,16008,16007,16006,16005,16004,16003,16002,16001";
}

$con = mysql_connect("192.168.1.201","openfire","openfire");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_query("set names 'UTF8'",$con); 
mysql_select_db("lvbao", $con);

$sql = "SELECT * FROM lb_hospital where dqbh in (".$citybhs.") ORDER BY yyid DESC LIMIT 100" ;
 

$result = mysql_query($sql);

echo "<table border='0' cellpadding='0' cellspacing='0'>
<tr>
<th>医院ID</th>
<th>医院名称</th>
<th>建立日期</th>
<th>服务电话</th>
<th>详细地址D</th>
<th>医院logo</th>
<th>介绍图片</th>
<th>医院简介</th>
<th>特色领域</th>
<th>地区编码</th>
<th>医院等级</th>
<th>操作</th>

</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr  height=’100px‘>";
  echo "<td width='4%' align='center'>" . $row['yyid'] . "</td>";
  
  echo "<td width='7%'>" . $row['yymc'] . "</td>";
  echo "<td width='5%'>" . $row['clsj'] . "</td>";
  echo "<td width='5%'>" . $row['dh'] . "</td>";
  echo "<td width='10%'>" . $row['dz'] . "</td>";
 // echo "<td width='7%'>" . $row['img'] . "</td>";
  echo "<td width='8%'><img style='width:150px;' src='http://183.62.71.21:800/lvbaoApp/adddata/" . $row['img'] . "' /></td>";
  echo "<td width='7%'>" . $row['zs_imgs'] . "</td>";
  
  echo "<td width='22%'><div style='height:100px; overflow:scroll;overflow-x:hidden'>" . $row['yyjj'] . "</div></td>";
  echo "<td width='18%'>" . $row['tsly'] . "</td>";
  echo "<td width='5%' align='center'>" . $row['dqbh'] . "</td>";
  
  echo "<td width='5%' align='center'>" . $row['yydj'] . "</td>";
  echo "<td width='5%' align='center'>" . "<a href='selectys.php?yyid=".$row['yyid']."' >查看医师</a>"."<br /><br /><a href='#' onClick='del(".$row['yyid'].")' >删除医院</a>"."<br /><br /><a href='#' onClick='edit(".$row['yyid'].")' >修改医院</a>". "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>
<br/><br/>

<script >
function toaddyy(){
	window.location.href="addyy.php"; 	
}
function del(v){
	if (confirm("确认要删除？")) {
          window.location.href="deleteyy.php?yyid="+v; 
    }	
}
function edit(v){
	window.location.href="modify1/xgyy.php?yyid="+v; 	
}
</script>
</body>
</html>