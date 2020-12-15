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
			$(this).addClass('has-Error');check12();
		}
		else {
			$(this).css("border", "3px solid green");
			$('#eb1').html("");
			$(this).removeClass('has-Error');
			check12();
			
		}
	});
	$('#input1').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb2').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");check12();
		}
		if(val){
			var pat = /^[^\s]([A-Za-z]{1,}|[\s]{1}[A-Za-z]{1,})*$/i.test($("#input1").val());
			if(!pat){
				$('#eb2').html("Wrong Product Name");
				$(this).focus();
				$(this).css("border", "3px solid red");check12();
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb2').html("");
				check12();
			}
		}
	});
	$('#input3').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb4').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");check12();
		}
		if(val){
			var pat = /^([0-9]+(\.[0-9]+)?)$/i.test($("#input3").val());
			if(!pat){
				$('#eb4').html("Wrong Monthly Price Format");
				$(this).focus();
				$(this).css("border", "3px solid red");check12();
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb4').html("");
				check12();
				
			}
		}
	});
	$('#input4').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb5').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");check12();
		}
		if(val){
			var pat = /^([0-9]+(\.[0-9]+)?)$/i.test($("#input4").val());
			if(!pat){
				$('#eb5').html("Wrong Annual Price Format");
				$(this).focus();
				$(this).css("border", "3px solid red");check12();
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb5').html("");
				check12();
				
			}
		}
	});
	$('#input6').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb7').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");check12();
		}
		if(val){
			var pat = /^([0-9]+(\.[0-9]+)?)$/i.test($("#input6").val());
			if(!pat){
				$('#eb7').html("Wrong SKU Format");
				$(this).focus();
				$(this).css("border", "3px solid red");check12();
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb7').html("");
				check12();
				
			}
		}
	});
	$('#input7').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb8').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");check12();
		}
		if(val){
			var pat = /^([0-9]+(\.[0-9]+)?)$/i.test($("#input7").val());
			if(!pat){
				$('#eb8').html("Wrong Web Space Format");
				$(this).focus();
				$(this).css("border", "3px solid red");check12();
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb8').html("");
				check12();
			}
		}
	});
	$('#input5').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb6').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");check12();
		}
		if(val){
			var pat = /^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$/i.test($("#input5").val());
			if(!pat){
				$('#eb6').html("Wrong Bandwidth Format");
				$(this).focus();
				$(this).css("border", "3px solid red");check12();
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb6').html("");check12();
				
			}
		}
	});
	$('#input8').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb9').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");check12();
		}
		if(val){
			var pat = /^((^[0-9]*$)|(^[A-Za-z]+$))/i.test($("#input8").val());
			if(!pat){
				$('#eb9').html("Wrong Domain Format");
				$(this).focus();
				$(this).css("border", "3px solid red");check12();
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb9').html("");check12();
				
			}
		}
	});
	$('#input9').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb10').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");check12();
		}
		if(val){
			var pat = /^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$/i.test($("#input9").val());
			if(!pat){
				$('#eb10').html("Wrong Format");
				$(this).focus();
				$(this).css("border", "3px solid red");check12();
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb10').html("");check12();
				
			}
		}
	});
	$('#input10').blur(function(){
		var val = $(this).val();
		if(val==""){
			$('#eb11').html("*Required");
			$(this).focus();
			$(this).css("border", "3px solid red");check12();
		}
		if(val){
			var pat = /^((^[0-9]*$)|(^[A-Za-z]+$))$/i.test($("#input10").val());
			if(!pat){
				$('#eb11').html("Wrong Mailbox format");
				$(this).focus();
				$(this).css("border", "3px solid red");check12();
			}
			else {
				$(this).css("border", "3px solid green");
				$('#eb11').html("");check12();
			}
		}
	});
});

function check12(){
		var a = $('select').val();
		var b = $('#input1').val();
		var c = $('#input3').val();
		var d = $('#input4').val();
		var e = $('#input5').val();
		var f = $('#input6').val();
		var g = $('#input7').val();
		var h = $('#input8').val();
		var i = $('#input9').val();
		var j = $('#input10').val();
	
		if(a!="" && b!="" && c!="" && d!="" && e!="" && f!="" && g!="" && h!="" && i!="" && j!="")
		{	
			$("#button").removeClass("disable");
		}
		else $("#button").addClass("enable");
	}

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
		var re = /^[^\s]([A-Za-z]{1,}|[\s]{1}[A-Za-z]{1,})*$/.test($("#prod_name").val());
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

