$(document).ready(function(){
	// Validate Form
	// $('#prodForm').on('submit', function(e){
	// 	let fields = $('#prodForm input,select');
	// 	$.each(fields, function(index, item){
	// 		if($(item).val() == '') {
	// 			$(this).addClass('has-Error');
	// 			$(this).next('span').text('Required*');
	// 			$(this).next('span').css({color: 'red'});
	// 			e.preventDefault();
	// 		} else {
	// 			if($(this).hasClass('has-Error')) {
	// 				$('#button').attr('disabled','true');
	// 			} else {
	// 				$(this).removeClass('has-Error');
	// 				$(this).css("border", "3px solid green");
	// 				$('#button').attr('disabled','false');
	// 			}
	// 		}
	// 	});
	// });

	$('select').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb1').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");
			$(this).addClass('has-Error');
		}
		else {
			$(this).css("border", "3px solid green");
			$('#eb1').html("");
			$(this).removeClass('has-Error');
			return true;
			
		}
	});
	$('#input1').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb2').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");
		}
		if(val){
			var pat = /^[^\s]([A-Za-z]{1,}|[\s]{1}[A-Za-z]{1,})*$/i.test($("#input1").val());
			if(!pat){
				$('#eb2').html("Wrong Product Name");
				$(this).focus();
				$(this).css("border", "3px solid red");
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb2').html("");
				return true;
			}
		}
	});
	$('#input3').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb4').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");
		}
		if(val){
			var pat = /^([0-9]+(\.[0-9]+)?)$/i.test($("#input3").val());
			if(!pat){
				$('#eb4').html("Wrong Monthly Price Format");
				$(this).focus();
				$(this).css("border", "3px solid red");
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb4').html("");
				return true;
				
			}
		}
	});
	$('#input4').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb5').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");
		}
		if(val){
			var pat = /^([0-9]+(\.[0-9]+)?)$/i.test($("#input4").val());
			if(!pat){
				$('#eb5').html("Wrong Annual Price Format");
				$(this).focus();
				$(this).css("border", "3px solid red");
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb5').html("");
				return true;
				
			}
		}
	});
	$('#input6').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb7').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");
		}
		if(val){
			var pat = /^([0-9]+(\.[0-9]+)?)$/i.test($("#input6").val());
			if(!pat){
				$('#eb7').html("Wrong SKU Format");
				$(this).focus();
				$(this).css("border", "3px solid red");
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb7').html("");
				return true;
				
			}
		}
	});
	$('#input7').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb8').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");
		}
		if(val){
			var pat = /^([0-9]+(\.[0-9]+)?)$/i.test($("#input7").val());
			if(!pat){
				$('#eb8').html("Wrong Web Space Format");
				$(this).focus();
				$(this).css("border", "3px solid red");
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb8').html("");
				return true;
			}
		}
	});
	$('#input5').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb6').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");
		}
		if(val){
			var pat = /^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$/i.test($("#input5").val());
			if(!pat){
				$('#eb6').html("Wrong Bandwidth Format");
				$(this).focus();
				$(this).css("border", "3px solid red");
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb6').html("");
				return true;
				
			}
		}
	});
	$('#input8').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb9').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");
		}
		if(val){
			var pat = /^((^[0-9]*$)|(^[A-Za-z]+$))/i.test($("#input8").val());
			if(!pat){
				$('#eb9').html("Wrong Domain Format");
				$(this).focus();
				$(this).css("border", "3px solid red");
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb9').html("");
				return true;
				
			}
		}
	});
	$('#input9').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb10').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");
		}
		if(val){
			var pat = /^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$/i.test($("#input9").val());
			if(!pat){
				$('#eb10').html("Wrong Format");
				$(this).focus();
				$(this).css("border", "3px solid red");
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb10').html("");
				return true;
				
			}
		}
	});
	$('#input10').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb11').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");
		}
		if(val){
			var pat = /^((^[0-9]*$)|(^[A-Za-z]+$))$/i.test($("#input10").val());
			if(!pat){
				$('#eb11').html("Wrong Mailbox format");
				$(this).focus();
				$(this).css("border", "3px solid red");
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb11').html("");
				return true;
			}
		}
	});
});

// function validateForm3(){
// 	if($("#select1").val()==''){
// 		swal("please Select Category");
// 		return false;
// 	}
// 	if($("#prod_name").val()==''){

// 		swal("Please Enter Product Name");
// 		return false;
// 	}
// 	if($("#prod_name").val()){
// 		var re = /^[^\s]([A-Za-z]{1,}|[\s]{1}[A-Za-z]{1,})*$/.test($("#prod_name").val());
// 		if(!re){
// 			swal("Product Name is not valid");
// 			return false;
// 		}
// 	}

// 	if($("#select2").val()==''){
// 		swal("please Select Availability");
// 		return false;
// 	}
// }


// function validateForm4(){
// 	if($("#select").val()==''){
// 		swal("Please Select Product Category");
// 		return false;
// 	}

// 	if($("#input1").val()==''){
// 		swal("Please Enter Product Name");
// 		return false;
// 	}

// 	if($("#input1").val()){
// 		var re = /^[^\s]([A-Za-z]{1,}|[\s]{1}[A-Za-z]{1,})*$/.test($("#input1").val());
// 		if(!re){
// 			swal("Product name is not valid");
// 			return false;
// 		}
// 	}

// 	if($("#input3").val()==''){
// 		swal("Please Enter Monthly Price");
// 		return false;
// 	}

// 	if($("#input3").val()){
// 		var re = /^([0-9]+(\.[0-9]+)?)$/.test($("#input3").val());
// 		if(!re){
// 			swal("Monthly Price is not valid");
// 			return false;
// 		}
// 	}

// 	if($("#input4").val()==''){
// 		swal("Please Enter Annual Price");
// 		return false;
// 	}

// 	if($("#input4").val()){
// 		var re = /^([0-9]+(\.[0-9]+)?)$/.test($("#input4").val());
// 		if(!re){
// 			swal("Bandwidth Price is not valid");
// 			return false;
// 		}
// 	}
// 	if($("#input5").val()==''){
// 		swal("Please Enter SKU");
// 		return false;
// 	}
// 	if($("#input5").val()){
// 		var re = /^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$/.test($("#input5").val());
// 		if(!re){
// 			swal("SKU is not valid");
// 			return false;
// 		}
// 	}
// 	if($("#input6").val()==''){
// 		swal("Please Enter Web Space(in GB)");
// 		return false;
// 	}
// 	if($("#input6").val()){
// 		var re = /^([0-9]+(\.[0-9]+)?)$/.test($("#input6").val());
// 		if(!re){
// 			swal("Web Space is not valid");
// 			return false;
// 		}
// 	}
// 	if($("#input7").val()==''){
// 		swal("Please Enter Bandwidth(in GB)");
// 		return false;
// 	}
// 	if($("#input7").val()){
// 		var re = /^([0-9]+(\.[0-9]+)?)$/.test($("#input7").val());
// 		if(!re){
// 			swal("Web Space is not valid");
// 			return false;
// 		}
// 	}
// 	if($("#input8").val()==''){
// 		swal("Please Enter Domain Name");
// 		return false;
// 	}
// 	if($("#input8").val()){
// 		var re = /^((^[0-9]*$)|(^[A-Za-z]+$))/.test($("#input8").val());
// 		if(!re){
// 			swal("Domain Name is not valid");
// 			return false;
// 		}
// 	}
// 	if($("#input9").val()==''){
// 		swal("Please Enter Language/Technology");
// 		return false;
// 	}
// 	if($("#input9").val()){
// 		var re = /^([a-zA_Z0-9,]+[\s])?)$/.test($("#input9").val());
// 		if(!re){
// 			swal("Format is invalid");
// 			return false;
// 		}
// 	}
// 	if($("#input10").val()==''){
// 		swal("Please Enter Number of Mailbox");
// 		return false;
// 	}
// 	if($("#input10").val()){
// 		var re = /^((^[0-9]*$)|(^[A-Za-z]+$))$/.test($("#input10").val());
// 		if(!re){
// 			swal("Format is invalid");
// 			return false;
// 		}
// 	}
// }