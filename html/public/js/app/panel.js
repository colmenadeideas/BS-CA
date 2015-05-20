$('.collapse').collapse();

//forms
floatinput();

$("[id^=collapse]").on('shown', function(){
    $(this).parents('.accordion-group').find('.accordion-toggle')
         .prop('checked', true);
});

function practiceForm() {
	$('#clinic-adress').collapse({ toggle: false });
	$('#regular-adress').collapse({ toggle: false });
	
	//$('#ini_schedule_1').collapse('show');
	//$('#end_schedule_1').collapse('show');
 
	$('input:radio[name="isclinic"]').change(function(){		
		if ($('input:radio[name="isclinic"]:checked').val() == 1) {
			$('#clinic-adress').collapse('show'); 
			$('#regular-address').collapse('hide'); 
		} else {
			$('#clinic-adress').collapse('hide'); 
			$('#regular-address').collapse('show');   
		}
		//console.log($('input:radio[name="isclinic"]:checked').val());
	});
	
		
	

	
		/*$('input:checkbox[id="day_1"]').change(function(){		
		if ($('input:checkbox[name="day_1"]:checked').val() == 1) {
			$('#ini_schedule_1').collapse('show'); 
			$('#end_schedule_1').collapse('show'); 
		} else {
			$('#ini_schedule_1').collapse('hide'); 
			$('#end_schedule_1').collapse('hide');   
		}*/
	
	$('#ini_schedule_1').datetimepicker({
    	format: 'LT'
    });
    $('.timepicker').datetimepicker({
    	format: 'LT'
    });
	//$('.datetimepicker').timepicker();
	
	
	$('#day_1').click(function() {
    if($(this).is(':checked')){
        
        $('.div_schedule_1').collapse('show'); 
        
    }else{
       
        $('.div_schedule_1').collapse('hide'); 
        $('#ini_schedule_1').val(''); 
        $('#end_schedule_1').val(''); 
       }
		});
		
		$('#day_2').click(function() {
    if($(this).is(':checked')){
       
        $('.div_schedule_2').collapse('show'); 
          
    }else{
        
        $('.div_schedule_2').collapse('hide'); 
         $('#ini_schedule_2').val(''); 
        $('#end_schedule_2').val(''); 
		}
		});
		
		$('#day_3').click(function() {
    if($(this).is(':checked')){
       
        $('.div_schedule_3').collapse('show'); 
   
        
   } else{
       
        $('.div_schedule_3').collapse('hide'); 
        $('#ini_schedule_3').val(''); 
        $('#end_schedule_3').val(''); 
		}
		});
		
		$('#day_4').click(function() {
    if($(this).is(':checked')){
       
        $('.div_schedule_4').collapse('show'); 
        
    }else{
        
        $('.div_schedule_4').collapse('hide'); 
        $('#ini_schedule_4').val(''); 
        $('#end_schedule_4').val(''); 
		}
		});
		
		$('#day_5').click(function() {
    if($(this).is(':checked')){
        
        $('.div_schedule_5').collapse('show'); 
        
    }else{
       
        $('.div_schedule_5').collapse('hide'); 
        $('#ini_schedule_5').val(''); 
        $('#end_schedule_5').val(''); 
		}
		});
		
	$('#day_6').click(function() {
    if($(this).is(':checked')){
        
        $('.div_schedule_6').collapse('show'); 
        
        
    }else{
        
        $('.div_schedule_6').collapse('hide');
        $('#ini_schedule_6').val(''); 
        $('#end_schedule_6').val('');  
		}
		});
		
		$('#day_7').click(function() {
    if($(this).is(':checked')){
       
        $('.div_schedule_7').collapse('show'); 
        
    }else{
       
        $('.div_schedule_7').collapse('hide'); 
        $('#ini_schedule_7').val(''); 
        $('#end_schedule_7').val(''); 
		}
		});
	
	

	
}

function search_location () {
	
	$("textarea[name='address']").geocomplete({
	}).bind("geocode:result", function(event, result) {
		//Retener Coordenadas
		$("input[name='address_location']").val(result.geometry.location.k+","+result.geometry.location.D);
		$("input[name='address_url']").val(result.url);
		//result.formatted_address
		console.log(result);			
	}).bind("geocode:error", function(event, status) {
		// $.log("ERROR: " + status);
	}).bind("geocode:multiple", function(event, results) {
		//   $.log("Multiple: " + results.length + " results found");
	});
	
	$("#find").click(function() {
		$("textarea[name='city']").trigger("geocode");
	});
	
}

function autocomplete() {
	$("input[name=clinic]").autocomplete({
		source : URL + "api/autocomplete/json/practices/", //aqui llama al api que retorna el valor de las clinicas guardadas previamente
		minLength : 1,
		delay : 50,
		messages : {
			noResults : '',
			results : function() {
			}
		},
		select: function(event, ui) {
			console.log(ui);
			$("input[name='clinic_id']").val(ui.item.id_value);
		/* var url = ui.item.name;
		 if(url != '#') {
		 location.href = '/blog/' + url;
		 }*/
		 },
		html : true,
		/*        appendTo: '#specialty-input',*/
		// optional (if other layers overlap autocomplete list)
		open : function(event, ui) {
			$(".ui-autocomplete").css("z-index", 1000);
			//$(".ui-autocomplete").css("background", 'red');
		},
		/*close : function (event, ui) {
		 val = $("input[name=search_term]").val();
		 $("input[name=search_term]").autocomplete( "search", val ); //keep autocomplete open by
		 //searching the same input again
		 $("input[name=search_term]").focus();
		 return false;
		 }*/
	});
}


