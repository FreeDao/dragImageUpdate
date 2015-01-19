<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="assets/css/index.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/js/index.js" charset="utf-8"></script>
<script type="text/javascript" src="assets/js/index2.js" charset="utf-8"></script>
<script type="text/javascript" src="assets/js/jquery.js" charset="utf-8"></script>
<title>医院数据录入界面</title>

	  <?php /*?><?php
      $yyjj = "";
      $yyid = $_GET["yyid"];
      $con = mysql_connect("192.168.1.201","openfire","openfire");
      if (!$con)
      {
      die('Could not connect: ' . mysql_error());
      }
      mysql_query("set names 'UTF8'",$con); 
      mysql_select_db("lvbao", $con);
      
      $result = mysql_query("SELECT * FROM lb_hospital where yyid = ".$yyid);
      
      if($row = mysql_fetch_array($result)){
        echo '<script>$(document).ready(function() {';
        
        //echo 'yyid="'.$yyid.'";';
        
        echo ' $("#yymc").val("'.$row['yymc'].'");';
        
        //echo 'yymc="'.$row['yymc'].'";';
        
        echo ' $("#dz").val("'.$row['dz'].'");';
        //echo ' $("#yymc").val('.$row['dqbh'].');';
        //echo ' $("#yymc").val('.$row['yydj'].');';
      
        echo ' $("#clsj").val("'.$row['clsj'].'");';
        echo ' $("#fwdh").val("'.$row['dh'].'");';
      
        $yyjj =  $row['yyjj'];
        
        //echo ' $("#yyjj").val(\"'.$yyjj.'\");';
        
        
        echo ' $("#tsly").val("'.$row['tsly'].'");';
        echo '});</script>';
      }
      
      
      ?>
<?php */?> 
</head>

<body>

 <h1 style="text-align:center;" >新增一家医院</h1>
	 
<form action="php/save_base.php" method="post" id="frm">
	<div class="key">
        <table border="0" cellpadding="0" cellspacing="0">
        <tr>
                <td align="right" valign="middle">医院名称：</td><td valign="top"><input id="yymc" name="yymc" type="text"></input></td>
            </tr>
             <tr>
                <td align="right" valign="middle">详细地址：</td><td valign="top"><input id="dz" name="dz" type="text"></input></td>
            </tr>
              <tr>
                <td align="right" valign="middle">城市：</td>
                <td valign="top" align="left">
                <input id="dqbhcode" name="dqbhcode" type="hidden"></input>
                     <select name="dqbh" id = "s1" onChange="selectcity(this.value)">
					  <script>writeProvinceCode();</script>
                     </select>        
                     <select name="dqbh2" id = "s2" onChange="selectcity2(this.value)">
                     </select> 
                </td>
            </tr>
             <tr>
                <td align="right" valign="middle">等级：</td>
                <td valign="top" align="left">
                    <select name="yydj" class="slt">
					<script>writeDjCode();</script>
                    </select>
                </td>
            </tr>
             <tr>
                <td align="right" valign="middle">成立时间：</td><td valign="top"><input	id="clsj" name="clsj" type="text"></input></td>
            </tr>

            <tr>
                <td align="right" valign="middle">服务电话：</td><td valign="top"><input id="fwdh" name="fwdh" type="text"></input></td>
            </tr>
           
            <tr>
                <td align="right" valign="top">医院介绍：</td><td valign="top"><textarea id="yyjj" name="yyjj" rows="5" style="height:120px"  ></textarea></td>
            </tr>
            <tr>
                <td align="right" valign="top">擅长/特色领域：</td><td valign="top"><textarea id="tsly" name="tsly" rows="5" style="height:120px"></textarea></td>
            </tr>
        </table>		
        <div style="text-align:center; padding-top:40px">
        
        <div class="btn" onClick="check()">下一步</div>
      </div>    
	</div>
</form>
	 

	 
</body>
</html>