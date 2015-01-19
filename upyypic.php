<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>HTML5 File Drag and Drop Upload with jQuery and PHP | Tutorialzine Demo</title>
        
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="assets/css/styles.css" />
           <!-- Including The jQuery Library -->
		<script src="http://code.jquery.com/jquery-1.6.3.min.js"></script>
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <script>
        yyid = -1;
		flag = -1;
		ysid = -1;
       
        </script>
        
         <?php echo "<script>yyid=".$_GET["yyid"].";</script>"; ?>
         <?php echo "<script>flag=".$_GET["flag"].";</script>"; ?>
         <?php echo "<script>ysid=".$_GET["ysid"].";</script>"; ?>
          
          <script>
          	function toUpPic5(){
				flag++;
				if(flag == 2){
					window.location.href="upyypic.php?yyid="+yyid+"&flag="+flag; 	
				}else if(flag >= 3){
					window.location.href="add_doc_base.php?yyid="+yyid+"&flag="+flag; 	
				}
				
			}
			
			function tohome(){
				window.location.href="index.php"; 
			}
			
			//alert("ysid:"+ysid)
			
          </script>
    </head>
    
    <body>
		
	 <h1></h1>
         <script>
          	if(flag == 1){
				$("h1").text("上传医院icon（最多1张）");
			}else if(flag == 2){
				$("h1").text("上传医院图片（最多5张）");
			}else{
				$("h1").text("上传医师icon（最多1张）");
			}
          
          </script>
     	
		
		<div id="dropbox">
			<span class="message">把图片拖拽到这里进行上传<br /><i></i></span>
		</div>
		<button id = "btn" class="btn" onClick="toUpPic5()">下一步</button><br/><br/>
        
        <button  id = "btn2" class="btn2" onClick="tohome()">完成</button>
      	 <script>
		 // alert("flag:"+flag)
		  if(flag == 2){
			 // alert('sdfsdfsdfdsf')
			   document.body.style.backgroundColor = "#6E372A";
		  }
		 
		 
		  if(flag==1){
			  document.getElementById("btn2").style.display = "none";
			  	 sss = "下一步";
		  }else if(flag == 3){
			  document.getElementById("btn2").style.display = "block";
			   sss = "继续添加医师";
		  }else{
			   document.getElementById("btn2").style.display = "none";
		  }
		  document.getElementById("btn").innerHTML = sss;
		  
		 
		  
		  
          </script>
		<!-- Including the HTML5 Uploader plugin -->
		<script src="assets/js/jquery.filedrop.js"></script>
		
		<!-- The main script file -->
        <script src="assets/js/tz_up_pic.js"></script>
    
    </body>
</html>

