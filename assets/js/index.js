
var upfiles = new Array();  
// getElementById  
function $id(id) {  
	return document.getElementById(id);  
}  
// output information  
function Output(msg,flag) { 
	if (flag == 1) {
		var m = $id("messages");  
		m.innerHTML = msg + m.innerHTML;  
	}
	if (flag == 2) {
		var m = $id("messages2");  
		m.innerHTML = msg + m.innerHTML;  
	}
}  
// file drag hover  
function FileDragHover(e) {  
	e.stopPropagation();  
	e.preventDefault();  
	e.target.className = (e.type == "dragover" ? "hover" : "");  
} 
// file selection  
function FileSelectHandler(e) {  
	// cancel event and hover styling  
	FileDragHover(e);  
	// fetch FileList object  
	var files = e.target.files || e.dataTransfer.files;  
	// process all File objects  
	for ( var i = 0, f; f = files[i]; i++) {  
		ParseFile(f,1);  
		upfiles.push(f);  
	}  
} 
// output file information  
function ParseFile(file,flag) { 
	if (file.type != 'image/jpeg') {
		return;
	}
	var str = '<div class="info"><hr>\
		<span>文件名：'+file.name+'</span><br/>\
		<span>文件大小：'+file.size+'</span><br/>\
		<hr>\
		</div>';
	Output(str,flag);  
}  
function upLoad() {  
	upLoad2();
	if (upfiles[0]) {  
		var xhr = new XMLHttpRequest();   //Ajax异步传输数据  
		xhr.open("POST", "UploadServlet", true);  
		var formData = new FormData();  
		for ( var i = 0, f; f = upfiles[i]; i++) {  
			formData.append('myfile', f);  
			
			formData.append("nihao",'ffsdfsdf');
		}  
		xhr.send(formData);  
		xhr.onreadystatechange=function(e){  
			history.go(0);  //由于这个页面还要显示可以下载的文件，所以需要刷新下页面  
		}                 
		return false;  
	}  

}  
// initialize  
function Init() {  
	var fileselect = $id("fileselect"), filedrag = $id("filedrag"),filedrag2 = $id("filedrag2"), submitbutton = $id("submitbutton");  
	// file select  
	fileselect.addEventListener("change", FileSelectHandler, false);  
	// is XHR2 available?  
	var xhr = new XMLHttpRequest();  
	if (xhr.upload) {  
		// file drop  
		filedrag.addEventListener("dragover", FileDragHover, false);  
		filedrag.addEventListener("dragleave", FileDragHover, false);  
		filedrag.addEventListener("drop", FileSelectHandler, false);  
		filedrag.style.display = "block";  
	}  
}  

 


