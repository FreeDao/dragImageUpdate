<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="assets/css/index.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/js/index.js" charset="utf-8"></script>
<script type="text/javascript" src="assets/js/index3.js" charset="utf-8"></script>
<title>医医师数据录入界面</title>

 <?php echo "<script>yyid=".$_GET["yyid"].";</script>"; ?>
 
 <script>
          
			
			function tohome(){
				window.location.href="index.php"; 
			}
			
			//alert("ysid:"+ysid)
			
          </script>

</head>

<body>
 <h1 style="text-align:center;" >添加一位医师</h1>

	 
<form action="php/save_doc_base.php" method="post" id="frm">
<input type="hidden" name="yyid" id="yyid"/>
	<div class="key">
        <table border="0" cellpadding="0" cellspacing="0">
        <tr>
                <td align="right" valign="middle">医师名称：</td><td valign="top"><input id="ysmc" name="ysmc" type="text"></input></td>
            </tr>
             <tr>
                <td align="right" valign="middle">职称：</td><td valign="top"><input id="zc" name="zc" type="text"></input></td>
            </tr>
       
             <tr>
                <td align="right" valign="middle">主治：</td><td valign="top"><input	id="zz" name="zz" type="text"></input></td>
            </tr>

            <tr>
                <td align="right" valign="middle">医师简介：</td><td valign="top"><input id="ysjj" name="ysjj" type="text"></input></td>
            </tr>
           
            <tr>
                <td align="right" valign="top">擅长领域：</td><td valign="top"><textarea id="scly" name="scly" rows="5" style="height:120px"></textarea></td>
            </tr>
           
        </table>		
        <div style="text-align:center; padding-top:40px">
        
        <div class="btn" onClick="check()">保存-下一步</div><br/><br/>
          <div  id = "btn2" class="btn2" onClick="tohome()">不保存本页面-完成</div>
      </div>    
	</div>
</form>
	 

	  <script>
  document.getElementById("yyid").value = yyid;
// alert(yyid)
 </script>
</body>
</html>