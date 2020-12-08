function validateForm1(){
	if ( document.forms["form1"]["email"].value== "") {
		$("#alert-div").removeClass("hide");
		$("#alert-div").text("Email is Required");
		$("#email").focus();
		return false;
	}
	if (document.forms["form1"]["email"].value !="") {
		var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,4}$/i.test($("#email").val());
		if(!re){
			$("#alert-div").removeClass("hide");
			$("#alert-div").text("Email must be valid");
			$("#email").focus();
			return false;
		}
	}
	if ( document.forms["form1"]["name"].value== "") {
		$("#alert-div").removeClass("hide");
		$("#alert-div").text("Name must be filled out");
		$("#name").focus();
		return false;
	}
	if ( document.forms["form1"]["mobile"].value== "") {
		$("#alert-div").removeClass("hide");
		$("#alert-div").text("Mobile Number must be filled out");
		$("#mobile").focus();
		return false;
	}
	if ( document.forms["form1"]["password"].value== "") {
		$("#alert-div").removeClass("hide");
		$("#alert-div").text("Password must be filled out");
		$("#password").focus();
		return false;
	}
	if ( document.forms["form1"]["cpassword"].value== "") {
		$("#alert-div").removeClass("hide");
		$("#alert-div").text("Confirm Password must be filled out");
		$("#cpassword").focus();
		return false;
	}
	if ( document.forms["form1"]["password"].value != document.forms["form1"]["cpassword"].value) {
		$("#alert-div").removeClass("hide");
		$("#alert-div").text("Both Password must be same");
		$("#password").focus();
		return false;
	}
	if (document.forms["form1"]["password"].value !="") {
		var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/i.test($("#password").val());
		if(!re){
			$("#alert-div").removeClass("hide");
			$("#alert-div").text("Password must contains atleast 1 lower,1 upper letter,1 number and length should be 8 ");
			$("#password").focus();
			return false;
		}
	}
	if ($("#sinput").val()=="") {
		$("#alert-div").removeClass("hide");
		$("#alert-div").text("Security Answer must be filled");
		$("#sinput").focus();
		return false;
	}
}
