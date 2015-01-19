<?php
function getMillisecond() {
list($t1, $t2) = explode(' ', microtime());     
return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);  
}

$demo_mode = false;

$allowed_ext = array('jpg','jpeg','png','gif');
if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
	exit_status('Error! Wrong HTTP method!');
}

$yyid = $_GET["yyid"];
$flag = $_GET["flag"];
$ysid = $_GET["ysid"];
$upload_dir = 'uploads/'.$yyid."/";

if(!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 ){
	$pic = $_FILES['pic'];
	if(!in_array(get_extension($pic['name']),$allowed_ext)){
		exit_status('Only '.implode(',',$allowed_ext).' files are allowed!');
	}	
	if($demo_mode){
		// File uploads are ignored. We only log them.
		$line = implode('		', array( date('r'), $_SERVER['REMOTE_ADDR'], $pic['size'], $pic['name']));
		file_put_contents('log.txt', $line.PHP_EOL, FILE_APPEND);
		exit_status('Uploads are ignored in demo mode.');
	}

	$picname = $upload_dir.getMillisecond().".jpg";

	//file_put_contents('e:/log.txt',$pic["type"], FILE_APPEND);
	 
	if(move_uploaded_file($pic['tmp_name'], $picname)){
		//rename($upload_dir.$pic['name'], $picname);

		$con = mysql_connect("192.168.1.201","openfire","openfire");
		if($con){
				mysql_query("set names 'UTF8'",$con); 
				mysql_select_db("lvbao", $con);
				if($flag == 1){
					$sql = "UPDATE lb_hospital SET img = '".$picname."' where yyid =  ".$yyid;
				}else if($flag == 2){
					$result = mysql_query("SELECT zs_imgs FROM lb_hospital where yyid =  ".$yyid);
					if($row = mysql_fetch_array($result)){
						$imgs = $row['zs_imgs'].';'.$picname;
						if(strpos($imgs,";") == 0){
							$imgs =   substr($imgs,1,strlen($imgs)-1);
							}
						
						$sql = "UPDATE lb_hospital SET zs_imgs = '".$imgs."' where yyid =  ".$yyid;
					}
				}else if($flag == 3){
					$sql = "UPDATE lb_doctor SET img = '".$picname."' where ysid =  ".$ysid;
				}
				if(isset($sql)){
					mysql_query($sql);	
				}
				mysql_close($con);
		} 
		exit_status('File was uploaded successfuly!');
	}
}
exit_status('Something went wrong with your upload!');
// Helper functions
function exit_status($str){
	echo json_encode(array('status'=>$str));
	exit;
}
function get_extension($file_name){
	$ext = explode('.', $file_name);
	$ext = array_pop($ext);
	return strtolower($ext);
}
?>
