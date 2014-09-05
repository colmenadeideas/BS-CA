$(document).ready(function() {
	$(".rotate").textrotator({
        animation: "fade",
        separator: ",",
    	speed: 800
    });
    register_person();
    validate_login();
});


$("input[name=specialty]").autocomplete({
   source: data
});

$('#searchform').validate({
				
	submitHandler: function(form) {
			$('.send').attr('disabled', 'disabled'); //prevent double send
			$.ajax({
				type: "POST",
				data: $(form).serialize(),
				url: URL+"site/search/",				
				timeout: 12000,
				success: function(response) {
						$('#searchform').html(response); 
														   	
				},
				error: function(response) { console.log(response); }
			});
			return false;
		}
	});


function register_person(){
	
	
	$( "#register_doctor_button" ).click(function() {
	  $( "#role" ).val("doctor");
	  $( "#register_doctor" ).css("display","block");
	
	  $('#birth').datepicker({ format: "dd/mm/yyyy",
    language: "es",
    autoclose: true});
	
	  validate_register_doctor();
	});
	$( "#register_patient_button" ).click(function() {
	   
	     $( "#register_patient" ).css("display","block");
	     validate_register_patient();
	});
}


function validate_register_patient(){	
	$('#register_patient_form').validate({
				
	submitHandler: function(form) {
			$('.send').attr('disabled', 'disabled'); //prevent double send
			$.ajax({
				type: "POST",
				data: $(form).serialize(),
				url: URL+"account/add/",				
				timeout: 12000,
				success: function(response) {
						console.log("listo!"+response); 
						
						
														   	
				},
				error: function(response) { console.log(response); }
			});
			return false;
		}
	});
	
}

function validate_register_doctor(){	
	$('#register_doctor_form').validate({
				
	submitHandler: function(form) {
			$('.send').attr('disabled', 'disabled'); //prevent double send
			$.ajax({
				type: "POST",
				data: $(form).serialize(),
				url: URL+"account/add/",				
				timeout: 12000,
				success: function(response) {
						console.log("listo!"+response); 
						
						
														   	
				},
				error: function(response) { console.log(response); }
			});
			return false;
		}
	});
	
}


function validate_login(){
	//console.log($('#login_form'));
		$('#login_form').validate({
		messages : {
			email : 'requerido',
			password : 'requerido',
		},
		submitHandler : function(form) {
			$('.send').attr('disabled', 'disabled');
			$('#response').html('');
			//prevent double send
	
			$.ajax({
				type : "POST",
				url : URL + "account/login/",
				data : $(form).serialize(),
				timeout : 12000,
				success : function(response) {
					console.log('(' + response + ')');
					switch (response) {
						case 'timeout':
	
							var htmlz = "<div>¿tienes internet? pacere que hay problemas de conexión</div>";
	
							$('.send').removeAttr("disabled");
							$("#response").addClass('alert alert-warning');
							$("#response").slideDown(500);
							$(htmlz).hide().appendTo("#response").fadeIn(1000).delay(3000).fadeOut(function() {
								$("#response").slideUp(500);
							});
	
							break;
	
						case 'error':
	
							var htmlz = "<div>Usuario o clave inválido</div>";
	
							$('.send').removeAttr("disabled");
							$("#response").addClass('alert alert-danger');
							$("#response").slideDown(500);
							$(htmlz).hide().appendTo("#response").fadeIn(1000).delay(3000).fadeOut(function() {
								$("#response").slideUp(500);
							});
	
							break;	
						
						case 'welcome':
							document.location = URL + 'account/identify';
							break;
					}
	
				},
				error : function(obj, errorText, exception) {
					console.log(errorText);
	
				}
			});
			return false;
		}
	});
}
