var sendbutton = $('#form-search-doctor .send');
//Home  Main form Validate and send
$('#form-search-doctor').validate({
	submitHandler : function(form) {
		sendbutton.attr('disabled', 'disabled');
		
		//Get Form Vars
		location_f = $('input[name=city_value]').val();
		value = $("input[name=specialty]").val();
		type = $("input[name=type]").val();
		
		searchDoctor(type, value, location_f);
		
		/*$.ajax({
			type : "POST",
			url : URL + "account/process/",
			data : $(form).serialize(),
			success : function(response) {
				console.log('works' + response);
				$('#registration-patient').remove();
				$('#response-registration').html(response).fadeIn('fast');
			},
			error : function(response) {
				console.log(response);
				sendbutton.removeAttr("disabled");
				$('#response-registration').html(response).fadeIn('fast');
			}
			
		});*/
		
		return false;
	}
});

function searchDoctor(type, value, location_f) {
	
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
	
	
		var context = {
		    name: "John Doe",
		    colors: ["Red", "Blue", "Green"]
		};
		
		//var template = "Favorite color: {{colors.0}}";
		//var result = Mark.up(template, context);
		//var template = myapp.templates.user_sidebar;
		var template = document.getElementById("item-card-list").firstChild.textContent;
		$("#results").html(Mark.up(template, context));

}