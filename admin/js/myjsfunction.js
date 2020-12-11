function validateForm3(){
	if($("#select1").val()==''){
		swal("please Select Category");
		return false;
	}
	if($("#prod_name").val()==''){
		swal("Please Enter Product Name");
		return false;
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
	
	if($("#input3").val()==''){
		swal("Please Enter Monthly Price");
		return false;
	}
	if($("#input4").val()==''){
		swal("Please Enter Annual Price");
		return false;
	}
	if($("#input5").val()==''){
		swal("Please Enter SKU");
		return false;
	}
	if($("#input6").val()==''){
		swal("Please Enter Web Space(in GB)");
		return false;
	}
	if($("#input7").val()==''){
		swal("Please Enter Bandwidth(in GB)");
		return false;
	}
	if($("#input8").val()==''){
		swal("Please Enter Domain Name");
		return false;
	}
	if($("#input9").val()==''){
		swal("Please Enter SKU");
		return false;
	}
	if($("#input10").val()==''){
		swal("Please Enter Language/Technology");
		return false;
	}
	if($("#input11").val()==''){
		swal("Please Enter Number of Mailbox");
		return false;
	}
}