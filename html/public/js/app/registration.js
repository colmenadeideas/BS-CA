//Show hide evreything else
$('#signin').on('shown.bs.modal', function (e) {
	//$('.site-head .temporaryfademe').css('opacity','0');
	/*$('.modal-backdrop').css('opacity','1');
	$('.modal-backdrop').css('background','#3898f9');
	*/ $('.modal-backdrop').addClass('backdrop-signin');
	//Floatlabel
 	//$('input, textarea').jvFloat();
 	floatinput();
	
});





	

$('#signin').on('hide.bs.modal', function (e) {
	$('.site-head .temporaryfademe').css('opacity','1');
});




<<<<<<< HEAD
<<<<<<< HEAD
$('#register_with_email').click(function() {
=======
$('#register-select-patient #register_with_email, #register-select-doctor#register_with_email').click(function() {
>>>>>>> origin/Panel-Doctor
=======
$('#register-select-patient #register_with_email, #register-select-doctor#register_with_email').click(function() {
>>>>>>> origin/Calendario_Paciente
	$('#registration-panels').scrollTo($('#registration-emails'), 500);	
	registerWithEmail();	
});


<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> origin/Calendario_Paciente
$('#register_who_doctor').click(function() {
	$('#registration-panels').scrollTo($('#register-select-doctor'), 500);		
});

$('#register_who_patient').click(function() {
	$('#registration-panels').scrollTo($('#register-select-patient'), 500);		
});


<<<<<<< HEAD
>>>>>>> origin/Panel-Doctor
=======
>>>>>>> origin/Calendario_Paciente
$('#signin .back').click(function() {
	$('#registration-panels').scrollTo($('#register-select'), 500);	
});



function registerWithEmail() {

	$('.datetimepicker').datetimepicker({pickTime: false, });
	 
	 
	 //Validate Registry Form
	$('#form-registration-patient').validate({
		rules : {
			"email": {
	        	required: true,
	            email: true,
	            remote: {
	            	url: URL+'account/checkregistered/username/',
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

}
