function validateForm1(){
	if ( document.forms["form1"]["email"].value== "") {
		swal("Email is Required");
		$("#email").css({border:'1px solid red'});
		return false;
	}
	if (document.forms["form1"]["email"].value !="") {
		var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,4}$/i.test($("#email").val());
		if(!re){
			swal("Email must be valid");
			$("#email").css({border:'1px solid red'});
			return false;
		}
	}
	$("#email").bind("keypress keyup keydown", function (e) {


		var email = $('#email').val();
		var regtwodots = /^(?!.*?\.\.).*?$/;
		var lemail = email.length;
		if ((email.charAt(0) == ".") || !(regtwodots.test(email))) {
		alert("invalid email");
		$('#email').val("");
		return;
		}
		
		});
	if ( document.forms["form1"]["name"].value== "") {
		swal("Name must be filled out");
		$("#name").css({border:'1px solid red'});
		return false;
	}
	if ( document.forms["form1"]["mobile"].value== "") {
		swal("Mobile Number must be filled out");
		$("#mobile").css({border:'1px solid red'});
		return false;
	}
	if ( document.forms["form1"]["mobile"].value) {
		var m = document.forms["form1"]["mobile"].value;
		count = 0;
		for(i=0;i<m.length;i++){
			if(m[1]==m[i]){
				count++;
			}
		}
		if(m.length==11 && m[0]!='0'){
			swal("Mobile Number is not valid");
			$("#mobile").css({border:'1px solid red'});
			return false;
		}
		if(m.length<10){
			swal("Mobile Number is not valid");
			$("#mobile").css({border:'1px solid red'});
			return false;
		}
		if(count>9){
			swal("Mobile Number must not be identical");
			$("#mobile").css({border:'1px solid red'});
			return false;
		}
	}
	if ( document.forms["form1"]["password"].value== "") {
		swal("Password must be filled out");
		$("#password").css({border:'1px solid red'});
		return false;
	}
	if ( document.forms["form1"]["cpassword"].value== "") {
		swal("Confirm Password must be filled out");
		$("#cpassword").css({border:'1px solid red'});
		return false;
	}
	if ( document.forms["form1"]["password"].value != document.forms["form1"]["cpassword"].value) {
		swal("Both Password must be same");
		$("#password").css({border:'1px solid red'});
		return false;
	}
	if (document.forms["form1"]["password"].value !="") {
		var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test($("#password").val());
		if(!re){
			swal("Password must contains atleast 1 lower,1 upper letter,1 number and length should be 8 ");
			$("#password").css({border:'1px solid red'});
			return false;
		}
	}
	if ($("#sinput").val()=="") {
		swal("Security Answer must be filled");
		$("#sinput").css({border:'1px solid red'});
		return false;
	}
	if($("#sinput").val()){
		$alex=$('#sinput').val();
		if(Number.isInteger(parseInt($alex)))
		{
			swal("answer can be only in alphanumeric or alphabets");
			return false;
		}
    }
	// if($("$sinput").val()){
	// 	var re = //i.test($("#password").val());
	// 	if(!re){
	// 		swal("Security Answer not valid ");
	// 		$("#sinput").css({border:'1px solid red'});
	// 		return false;
	// 	}
	// }
}
function validateForm2(){
	if ( document.forms["form2"]["email"].value== "") {
		swal("Email is Required");
		$("#email").css({border:'1px solid red'});
		return false;
	}
	if (document.forms["form2"]["email"].value !="") {
		var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/i.test($("#email").val());
		if(!re){
			swal("Email must be valid");
			$("#email").css({border:'1px solid red'});
			return false;
		}
	}
	if ( document.forms["form2"]["password"].value== "") {
		swal("Password is Required");
		$("#email").css({border:'1px solid red'});
		return false;
	}
}

function alexa()
{


}

