function validateForm3(){
	if($("#select1").val()==''){
		swal("please Select Category");
		return false;
	}
	if($("#prod_name").val()==''){
		swal("Please Enter Product Name");
		return false;
	}
	if($("#prod_name").val()){
		var re = /^[a-zA-Z0-9. ]+$/.test($("#prod_name").val());
		if(!re){
			swal("Product Name is not valid");
			return false;
		}
	}
	
	if($("#select2").val()==''){
		swal("please Select Availability");
		return false;
	}
}

function validateForm4(){

	if($("#select").val()==''){
		swal("Please Select Product Category");
		return false;
	}

	if($("#input1").val()==''){
		swal("Please Enter Product Name");
		return false;
	}

	if($("#input1").val()){
		var re = /^([a-zA-Z0-9]+(\.[a-zA-Z0-9]+)?)$/.test($("#input1").val());
		if(!re){
			swal("Product name is not valid");
			return false;
		}
	}
	
	if($("#input3").val()==''){
		swal("Please Enter Monthly Price");
		return false;
	}

	if($("#input3").val()){
		var re = /^([0-9]+(\.[0-9]+)?)$/.test($("#input3").val());
		if(!re){
			swal("Monthly Price is not valid");
			return false;
		}
	}

	if($("#input4").val()==''){
		swal("Please Enter Annual Price");
		return false;
	}

	if($("#input4").val()){
		var re = /^([0-9]+(\.[0-9]+)?)$/.test($("#input4").val());
		if(!re){
			swal("Bandwidth Price is not valid");
			return false;
		}
	}
	if($("#input5").val()==''){
		swal("Please Enter SKU");
		return false;
	}
	if($("#input5").val()){
		var re = /^[a-zA_Z0-9#-]+$/.test($("#input5").val());
		if(!re){
			swal("SKU is not valid");
			return false;
		}
	}
	if($("#input6").val()==''){
		swal("Please Enter Web Space(in GB)");
		return false;
	}
	if($("#input6").val()==''){
		var re = /^([0-9]+(\.[0-9]+)?)$/.test($("#input6").val());
		if(!re){
			swal("Web Space is not valid");
			return false;
		}
	}
	if($("#input7").val()==''){
		swal("Please Enter Bandwidth(in GB)");
		return false;
	}
	if($("#input7").val()==''){
		var re = /^([0-9]+(\.[0-9]+)?)$/.test($("#input7").val());
		if(!re){
			swal("Web Space is not valid");
			return false;
		}
	}
	if($("#input8").val()==''){
		swal("Please Enter Domain Name");
		return false;
	}
	if($("#input8").val()==''){
		var re = /^([a-zA_Z0-9]+)?)$/.test($("#input8").val());
		if(!re){
			swal("Domain Name is not valid");
			return false;
		}
	}
	if($("#input9").val()==''){
		swal("Please Enter Language/Technology");
		return false;
	}
	if($("#input9").val()==''){
		var re = /^([a-zA_Z0-9,]+[\s])?)$/.test($("#input10").val());
		if(!re){
			swal("Format is invalid");
			return false;
		}
	}
	if($("#input10").val()==''){
		swal("Please Enter Number of Mailbox");
		return false;
	}
}