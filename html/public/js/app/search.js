//Autocomplete Main Fields
$("input[name=search_term]").autocomplete({
        source: URL+"api/autocomplete/",
        minLength: 2,
      /*  select: function(event, ui) {
        	
            var url = ui.item.name;
            if(url != '#') {
                location.href = '/blog/' + url;
            }
        },*/
        html: true,
      // optional (if other layers overlap autocomplete list)
        open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", 1000);
           //$(".ui-autocomplete").css("background", 'red');
        }
});


$("input[name=search_term]").on("autocompleteselect", function(event, ui) {
	$("input[name=type]").val(ui.item.type);
});


var sendbutton = $('#form-search-doctor .send');
//Home  Main form Validate and send
$('#form-search-doctor').validate({
	submitHandler : function(form) {
		//sendbutton.attr('disabled', 'disabled');
		
		//Get Form Vars
		location_f = $('input[name=city_value]').val();
		value = $("input[name=search_term]").val();
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
	
	var template = document.getElementById("item-card-list").firstChild.textContent;
		
	var searchterms = value.match(/\S+/g); //value.split(/\b\s+(?!$)/);
	console.log ("SpliT: "+ searchterms);
	
	if (!type) { type = 'all';} 
	
	var context = $.getJSON(URL+"api/search/"+type+"/"+searchterms ,function(data) { 
		console.log(data);
		
		var context = data;
		$.each( data, function(key, val) {	  
		  // items.push( "<li id='" + key + "'>" + val + "</li>" );
		});	
		
		$("#results").html(Mark.up(template, context));
		
		$('.site-head').css({
			'margin-top':'70px',
			'min-height': '200px'
		});
		$('.site-head h1').fadeOut();
		//fade each result
		$('.item-card').css('opacity','0');
		$('.item-card').each(function(i) {
			$(this).delay((i++) * 300).fadeTo(500, 1); 
		});	
		//Activate Rating	
		$(".rating").rating(); 	
	});
	
	return false;
}




function search_location() {

	$("input[name='city']").geocomplete({
	//	country : "ve"
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

	/*$("#examples a").click(function() {
		$("input[name='city']").val($(this).text()).trigger("geocode");
		return false;
	});*/
}