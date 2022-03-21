function myfac()
{
 var x=document.forms["myform"]["email"].value;
  var z=x.indexOf('@');
	if(z<1){
		alert("email must contain @ character");
	return false;
	}
	else if(z==null){
		alert("email must be fill out");
	return false;
	}
 var y=document.forms["myform"]["password"].value;
	if(y==null){
		alert("password must be failed out");
	return false;
	}

	 
}
 