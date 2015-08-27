define(['globals'], function(globals) {

	function fieldsfor(form) {

		switch (form) {
			case "practice":			
				
				$('#clinic-address'	).collapse({ toggle: false });
				$('#regular-address').collapse({ toggle: false });	
				$('#days-list').collapse({ toggle: false });	
		 
				$('input:radio[name="isclinic"]').change(function(){		
					if ($('input:radio[name="isclinic"]:checked').val() == 1) {
						$('#clinic-address' ).collapse('show'); 
						$('#regular-address').collapse('hide'); 
					} else {
						$('#clinic-address' ).collapse('hide'); 
						$('#regular-address').collapse('show');   
					}			
				});

				$('input:radio[name="autoquota"]').change(function(){		
					if ($('input:radio[name="autoquota"]:checked').val() == 1) {
						$('#days-list' ).collapse('hide');
						$('.spots').val('5');
						$('.spots').prop('disabled', false); 						
					} else {						
						$('#days-list' ).collapse('show'); 
						$('.spots').val('');
				    	$('.spots').prop('disabled', true);  
					}			
				});
		
				$('.timepicker').datetimepicker({ format: 'LT' });
				$('.time-lapse').datetimepicker({
					format: 'HH:mm',
					useCurrent: false,
			    }); 					
				
				//Days Format
				//$('input:checkbox[name="day[]"]').change(function(){
				$('input:checkbox.day').change(function(){	
					var selected = $(this).attr("id");
					var value = selected.split("_");					
					if ($('input:checkbox[id="day_'+value[1]+'"]:checked').val() == 1) {
						$('.div_schedule_'+value[1]).collapse('show');

					} else {
						$('.div_schedule_'+value[1]).collapse('hide'); 
				        $('#ini_schedule_'+value[1]).val(''); 
				        $('#end_schedule_'+value[1]).val('');  

					}		
				});	

				/*$('.add-reason').click(function(){
				    var add = $(this).closest('.addarea').find('.add');
				    
				    add.each(function(){
				        var content = $(this).text();
				        if ($('#area > div:contains('+content+')').length == 0) {
				            $('#area').append($(this).clone());
				        }
				    });

				});*/

		
				$(".add-reason").click(function(e){
					var newid = "reasonId_"+uniqId();
					$(".practice-format:last").clone().prop({ id: newid /*, name: "newName"*/ }).insertAfter('.practice-format:last');
					$("#"+newid).find(".remove-action").css("display", "block");
					$("#"+newid).find("input").val("");
					/*$('.practice-format:last').clone(true).appendTo("#reasons");
					$('.practice-format:last').find(".remove-action").css("display", "block");
					$('.practice-format:last').find("input").val("");
					remove();*/
					console.log(e);
					fieldsfor("practice"); // TODO -- running this makes clone to create horrible duplicates T_T
					e.preventDefault();
				});

				$(".remove-reason").click(function(e){
					console.log("cl" +e);
					$(this).closest(".practice-format").remove();
					e.preventDefault();
				});
				

				break;
		}
	
	}
	function remove() {

		$(".remove-reason").click(function(e){
			console.log("cl");
			$(this).closest(".practice-format").remove();
			e.preventDefault();
		});

	}


	return {
      fieldsfor: fieldsfor,
	}

});