function conf(){

	var a,b;
	a=document.getElementById('confirm').value;
	b=document.getElementById('password').value;

	if (a != b){
	alert("passwors not matched");
	return false;
}
else{

	return true;
}
}

function changePsw(){
	var psw = document.getElementById('password').value;
	var oldpsw = document.getElementById('oldpsw').value;
	var newpsw = document.getElementById('newpsw').value;
	var confmpsw = document.getElementById('confirmpsw').value;

	if (psw != oldpsw){
		alert("Password does not match");
		return false;
	}
	else if( newpsw != confmpsw ){
		alert("Password does not confirm");
		return false;
	} 
	else{
		return true;
	}




}

$(document).ready(function() {
			$("#select1").change(function (){
				var cid = $('#select1 option:selected').val();
				var url = "getsubcat.php?catid=" + cid;
				$("#select2").load(url);
			});	
		


});