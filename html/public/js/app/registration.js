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


function floatinput (){
  var onClass = "on";
  var showClass = "show";
  
  $("input").bind("checkval",function(){
    var label = $(this).prev("label");
    if(this.value !== ""){
      label.addClass(showClass);
    } else {
      label.removeClass(showClass);
    }
  }).on("keyup",function(){
    $(this).trigger("checkval");
  }).on("focus",function(){
    $(this).prev("label").addClass(onClass);
  }).on("blur",function(){
      $(this).prev("label").removeClass(onClass);
  }).trigger("checkval");
};


	

$('#signin').on('hide.bs.modal', function (e) {
	$('.site-head .temporaryfademe').css('opacity','1');
});




$('#register_with_email').click(function() {
	$('#registration-panels').scrollTo($('#registration-emails'), 500);	
	registerWithEmail();	
});


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
