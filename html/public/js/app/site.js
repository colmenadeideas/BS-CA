$(document).ready(function() {
	$(".rotate").textrotator({
        animation: "fade",
        separator: ",",
    	speed: 800
    });
    register_person();
});


$("input[name=specialty]").autocomplete({
   source: data
});


function register_person(){
	$('.datetimepicker').datetimepicker({
	pickTime : false
});
	$( "#register_doctor" ).click(function() {
	  $( "#role" ).val("doctor");
	  $( "#register_form" ).css("display","block");
	  validate_register();
	});
	$( "#register_person" ).click(function() {
	   $( "#role" ).val("pacient");
	     $( "#register_form" ).css("display","block");
	     validate_register();
	});
}
function validate_register(){	
	$('#register_person_form').validate({
				
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