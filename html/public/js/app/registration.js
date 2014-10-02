$('#register_with_email').click(function() {
	$('#registration-panels').scrollTo($('#registration-emails'), 500);	
	registerWithEmail();	
});
$('#signin .back').click(function() {
	$('#registration-panels').scrollTo($('#register-select'), 500);	
});

//Show hide evreything else
$('#signin').on('show.bs.modal', function (e) {
	$('.site-head .temporaryfademe').css('opacity','0');
});
$('#signin').on('hide.bs.modal', function (e) {
	$('.site-head .temporaryfademe').css('opacity','1');
});

function registerWithEmail() {

	// $('#birth').datepicker({ format: "dd/mm/yyyy",  language: "es", autoclose: true });
	 $('.datetimepicker').datetimepicker({pickTime: false, });
	 
	 
	 //Validate Registry Form
	$('#form-registration-patient').validate({
		rules : {
			"email": {
	        	required: true,
	            email: true,
	            remote: {
	            	url: URL+'account/checkregistered/patient/username',
	                type: 'post'
	            }
	       	},
	       	"birth": { 
	       		required: true,
	       		check_age: true ,
	       	}	       
		},
		messages: {
			email: { remote:jQuery.format("Ya existe un usuario registrado con este correo") },	
			//"birth": {check_age: "" },        
		},
		//onkeyup: false,
		//onfocusout: false,
		//onclick: false,
		submitHandler : function(form) {
			$('.register-send').attr('disabled', 'disabled');//prevent double send
			$.ajax({
				type : "POST",
				url : URL + "account/process/",
				data : $(form).serialize(),
				timeout : 15000,
				success : function(response) {
						console.log('works' + response);
						  $('#registration-patient').remove();
						  $('#response-registration').html(response).fadeIn('fast');
					},
				error : function(response) {
						console.log(response);
						 $('.register-send').removeAttr("disabled");
						 $('#response-registration').html(response).fadeIn('fast');
					}
				
				
			});
			return false;
		}
	});
    //form-registration-patient
    
/*	$( "#register_doctor_button" ).click(function() {
	  $( "#role" ).val("doctor");
	  $( "#register_doctor" ).css("display","block");
	
	 
	
	  validate_register_doctor();
	});
	$( "#register_patient_button" ).click(function() {
	   
	     $( "#register_patient" ).css("display","block");
	     validate_register_patient();
	});
*/
}
