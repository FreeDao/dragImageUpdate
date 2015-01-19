

function check(){
	var flag = 0;
	var idArr = ['ysmc','zc','zz','ysjj','scly','yyid'];
	for(var i  in idArr){
		
		var ele = document.getElementById(idArr[i]);
		if(ele.value == ""){
			flag = 1;
			ele.style.border = "#fc0 1px solid";
		}else{
			ele.style.border = "#3a5168 1px solid";
		}
	}
	 
	if(flag == 1){
			alert("请完善必要信息");
	}else{
		document.getElementById("frm").submit();
	}
}







