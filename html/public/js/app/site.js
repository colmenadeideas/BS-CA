$(document).ready(function() {
	$(".rotate").textrotator({
		animation : "fade",
		separator : ",",
		speed : 800
	});
<<<<<<< HEAD
	
	$('.datetimepicker').datetimepicker({pickTime: false, });
	
	$.backstretch([
	      URL+"public/images/backgrounds/01.jpg"
	    , URL+"public/images/backgrounds/02.jpg"
	  ], {duration: 3000, fade: 2000});
	  
   
   $('#construccion').modal('show');	
   
=======
	register_person();
	validate_login();
>>>>>>> cferrer
	search_location();
	load_calendar();

	//console.log(jsonsql.query("select id,type from datos  order by label asc limit 3",datos));
	
<<<<<<< HEAD
	//init();
=======
	 $('#search_options').click(function() {
	 event.preventDefault();
	 location_f=$('#city_value').val();
	 value=$( "input[name=specialty]" ).val();
	 type=$( "input[name=type]" ).val();
	 search_doctor(type,value,location_f);

	 });

	/*$('#searchform').validate({
		messages : {
			city : 'requerido',
			speciality : 'requerido',
		},
		submitHandler : function(form) {
			location_f = $('input[name=city_value]').val();
			value = $("input[name=specialty]").val();
			type = $("input[name=type]").val();
			search_doctor(type, value, location_f);
		}
	});*/
>>>>>>> cferrer

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
					$('.send').removeAttr("disabled");
					$("#response").addClass('alert alert-danger');
					$('Error de Conexión. Intente de nuevo').hide().appendTo("#response").fadeIn(1000).delay(3000).fadeOut(function() {
						$("#response").slideUp(500);
					});
					console.log(errorText);

				}
			});
			return false;
		}
	});

});

function load_calendar() {

	$('#calendar').fullCalendar({
		defaultDate : '2014-09-12',
		editable : true,
		eventLimit : true, // allow "more" link when too many events

		dayClick : function(date, jsEvent, view) {
			practice = $("#practice").val();
			$.ajax({
				type : "POST",
				url : URL + "appointments/reserve/" + practice + "/" + date.format(),
				timeout : 12000,
				success : function(response) {
					alert(response);
					$('.send').removeAttr('disabled');
					$('#detail_delete').modal('hide');
				},
				error : function(response) {
					console.log(response);
				}
			});

			/*  alert('Clicked on: ' + date.format());

			alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

			alert('Current view: ' + view.name);*/

			// change the day's background color just for fun
			//  $(this).css('background-color', 'red');

		}
	});
}


$("input[name=specialty]").autocomplete({
	source : datos,
	// minLength:3
<<<<<<< HEAD
});

$("input[name=specialty]").on("autocompleteselect", function(event, ui) {

	//location_f=$( "input[name=specialty]" ).val();
	$("input[name=type]").val(ui.item.type);
//	location_f = $('#city_value').val();
			
			//search_doctor(type, value, location);
	//search_doctor(ui.item.type,ui.item.value,location_f);

});

function search_location() {

	$("input[name='city']").geocomplete({
		country : "ve"
	}).bind("geocode:result", function(event, result) {

		$("input[name='city_value']").val(result.name);
	}).bind("geocode:error", function(event, status) {
		// $.log("ERROR: " + status);
	}).bind("geocode:multiple", function(event, results) {
		//   $.log("Multiple: " + results.length + " results found");
	});

	$("#find").click(function() {
		$("input[name='city']").trigger("geocode");
	});

=======
});

$("input[name=specialty]").on("autocompleteselect", function(event, ui) {

	//location_f=$( "input[name=specialty]" ).val();
	$("input[name=type]").val(ui.item.type);
//	location_f = $('#city_value').val();
			
			//search_doctor(type, value, location);
	//search_doctor(ui.item.type,ui.item.value,location_f);

});

function search_location() {

	$("input[name='city']").geocomplete({
		country : "ve"
	}).bind("geocode:result", function(event, result) {

		$("input[name='city_value']").val(result.name);
	}).bind("geocode:error", function(event, status) {
		// $.log("ERROR: " + status);
	}).bind("geocode:multiple", function(event, results) {
		//   $.log("Multiple: " + results.length + " results found");
	});

	$("#find").click(function() {
		$("input[name='city']").trigger("geocode");
	});

>>>>>>> cferrer
	$("#examples a").click(function() {
		$("input[name='city']").val($(this).text()).trigger("geocode");
		return false;
	});
}

function register_person() {
<<<<<<< HEAD

	$("#register_doctor_button").click(function() {
		$("#role").val("doctor");
		$("#register_doctor").css("display", "block");

		$('#birth').datepicker({
			format : "dd/mm/yyyy",
			language : "es",
			autoclose : true
		});

		validate_register_doctor();
	});
	$("#register_patient_button").click(function() {

		$("#register_patient").css("display", "block");
		validate_register_patient();
	});
}

=======

	$("#register_doctor_button").click(function() {
		$("#role").val("doctor");
		$("#register_doctor").css("display", "block");

		$('#birth').datepicker({
			format : "dd/mm/yyyy",
			language : "es",
			autoclose : true
		});

		validate_register_doctor();
	});
	$("#register_patient_button").click(function() {

		$("#register_patient").css("display", "block");
		validate_register_patient();
	});
}

>>>>>>> cferrer
function validate_register_patient() {
	$('#register_patient_form').validate({

		submitHandler : function(form) {
			$('.send').attr('disabled', 'disabled');
			//prevent double send
			$.ajax({
				type : "POST",
				data : $(form).serialize(),
				url : URL + "account/add/",
				timeout : 12000,
				success : function(response) {
					console.log("listo!" + response);

				},
				error : function(response) {
					console.log(response);
				}
			});
			return false;
		}
	});

}

function validate_register_doctor() {
	$('#register_doctor_form').validate({

		submitHandler : function(form) {
			$('.send').attr('disabled', 'disabled');
			//prevent double send
			$.ajax({
				type : "POST",
				data : $(form).serialize(),
				url : URL + "account/add/",
				timeout : 12000,
				success : function(response) {
					console.log("listo!" + response);

				},
				error : function(response) {
					console.log(response);
				}
			});
			return false;
		}
	});

}

function validate_login() {
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

<<<<<<< HEAD
=======
function search_doctor(type, value, location_f) {
	
	doctores_list = jsonsql.query("select * from doctores where ("+type+"=='"+value+"' )  order by name asc ", doctores);		
	
	$.each(doctores_list, function (ind, elem) { 
		
		doctores_city=jsonsql.query("select * from doctores_list  where ("+elem.centros[0].direccion +"== direccion) order by name asc limit 3", elem.centros);
		//console.log(doctores_city);		
	}); 
	
	$.each(doctores_city, function (ind, elem2) {
		console.log(elem2.practice[0].id);
		//reemplazar el 1 por el id verdadero de la practica que esta en el json
			 $( "#search_result" ).append( "<div>"+elem2.id+" "+elem2.name+" <br> "+elem2.centros[0].direccion+'<a class="btn btn-primary" href="site/calendar/'+elem2.practice[0].id+'">Ver </a></div>');
	});
}
>>>>>>> cferrer
