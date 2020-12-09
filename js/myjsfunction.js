function validateForm1(){
	if ( document.forms["form1"]["email"].value== "") {
		$("#alert-div").css("display","block");
		$("#alert-div").text("Email is Required");
		$("#email").focus();
		return false;
	}
	if (document.forms["form1"]["email"].value !="") {
		var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,4}$/i.test($("#email").val());
		if(!re){
			$("#alert-div").css("display","block");
			$("#alert-div").text("Email must be valid");
			$("#email").focus();
			return false;
		}
	}
	if ( document.forms["form1"]["name"].value== "") {
		$("#alert-div").css("display","block");
		$("#alert-div").text("Name must be filled out");
		$("#name").focus();
		return false;
	}
	if ( document.forms["form1"]["mobile"].value== "") {
		$("#alert-div").css("display","block");
		$("#alert-div").text("Mobile Number must be filled out");
		$("#mobile").focus();
		return false;
	}
	if ( document.forms["form1"]["mobile"].value) {
		$("#alert-div").css("display","block");
		var m = document.forms["form1"]["mobile"].value;
		count = 0;
		for(i=0;i<m.length;i++){
			if(m[1]==m[i]){
				count++;
			}
		}
		if(m.length==11 && m[0]!='0'){
				$("#alert-div").text("Mobile Number is not valid");
				$("#mobile").focus();
				return false;
		}
		if(m.length<10){
			$("#alert-div").text("Mobile Number is not valid");
			$("#mobile").focus();
			return false;
		}
		if(count>9){
			$("#alert-div").text("Mobile Number must not be identical");
			$("#mobile").focus();
			return false;
		}
	}
	if ( document.forms["form1"]["password"].value== "") {
		$("#alert-div").css("display","block");
		$("#alert-div").text("Password must be filled out");
		$("#password").focus();
		return false;
	}
	if ( document.forms["form1"]["cpassword"].value== "") {
		$("#alert-div").css("display","block");
		$("#alert-div").text("Confirm Password must be filled out");
		$("#cpassword").focus();
		return false;
	}
	if ( document.forms["form1"]["password"].value != document.forms["form1"]["cpassword"].value) {
		$("#alert-div").css("display","block");
		$("#alert-div").text("Both Password must be same");
		$("#password").focus();
		return false;
	}
	if (document.forms["form1"]["password"].value !="") {
		var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}$/i.test($("#password").val());
		if(!re){
			$("#alert-div").css("display","block");
			$("#alert-div").text("Password must contains atleast 1 lower,1 upper letter,1 number and length should be 8 ");
			$("#password").focus();
			return false;
		}
	}
	if ($("#sinput").val()=="") {
		$("#alert-div").css("display","block");
		$("#alert-div").text("Security Answer must be filled");
		$("#sinput").focus();
		return false;
	}
}
function validateForm2(){
	if ( document.forms["form2"]["email"].value== "") {
		$("#alert-div").css("display","block");
		$("#alert-div").text("Email is Required");
		$("#email").focus();
		return false;
	}
	if (document.forms["form2"]["email"].value !="") {
		var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,4}$/i.test($("#email").val());
		if(!re){
			$("#alert-div").css("display","block");
			$("#alert-div").text("Email must be valid");
			$("#email").focus();
			return false;
		}
	}
	if ( document.forms["form2"]["password"].value== "") {
		$("#alert-div").css("display","block");
		$("#alert-div").text("Password is Required");
		$("#email").focus();
		return false;
	}
}
