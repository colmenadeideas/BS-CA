$('.collapse').collapse();

//forms
floatinput();

$("[id^=collapse]").on('shown', function(){
    $(this).parents('.accordion-group').find('.accordion-toggle')
         .prop('checked', true);
});



function practiceForm() {
	$('#clinic-adress').collapse({ toggle: true });
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
		
	});
	
	$('#ini_schedule_1').datetimepicker({
    	format: 'LT'
    });
    $('.timepicker').datetimepicker({
    	format: 'LT'
    });
	$('.time-lapse').datetimepicker({
		format: 'HH:mm',
		useCurrent: false,
    });	 
		
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
	$('#auto-spots').click(function() {
    	if($(this).is(':checked')){
       
        $('.practice-list').collapse('hide');
        $('.spots').val('5');
        $('.spots').prop('disabled', false);

        
    }else{
    	$('.practice-list').collapse('show');
    	$('.spots').val('');
    	$('.spots').prop('disabled', true);
    }
	});
	

		registerPractice();
	
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
	});
	
	
}

registerPractice();

var d = [];
function registerPractice() {

	// setting up the function global variables
	var form = "form";
	var formId = $(form).attr('id');
	var data;
	var days;
	//Validate Practice Form
	$(form).validate({
		rules : {
		},
		submitHandler : function(form) {
			var data = $(form).serialize();
			console.log(data.split('&'));
			// days log
			if(formId == 'add') {			
				var days = data.split('&');
				$.each(days, function (key, value) {
					var n = days.length - 21;
					if ((key > 6) && (key < 6+n)) {
					value = this.replace("day=", "");	
					d.push(value);
					};
				});
			};
			// ajax request start
			$.ajax({
				type : "POST",
				url : URL + "panel/processpractice",
				//http://localhost/BS-OK/html/panel#panel/processpractice
				data : data + "&param="+formId,
				timeout : 15000,
				success : function(response) {
					console.log('\n\nresponse: ' + response);
					if (response == 'true') {
						// change to quote form
						if (formId == 'add') {				
							$('#desktop').load('panel/practice/quote', function () { 
								registerPractice();
								practiceForm();
		 						$.each(d, function(k, v){
									$('.practice-list').append('<div class="field-wrapper col-sm-3 col-lg-3">\n<h1>'+v+'</h1>\n<input style="width: 100px;" type="number" min="1" max="40" maxlength="2" size="7" name="'+v+'" value="1"  required="required" class="form-control">\n');								
								})

							});								
						}
						// changue to cost form
						if (formId == 'quote') {
							$('#desktop').load('panel/practice/cost', function () { 
								registerPractice();
								practiceForm();	
							});
						}
						// finish the form					
						if (formId == 'cost') {
							$(form).slideUp(300)
							$('.hidden-message').delay(350).fadeIn(300);
						}
					} else {
						alert('No se pudo guardar el registro, revise si los datos estan correctos\ne intente nueva mente')
					}
					
				},
				error : function(response) {
					alert('No se puedo guardar el registro, si el problema sige, porfavor contacenos')
					$.ajax({
						type: 'POST',
						url:  URL+"panel/errorlog",
						data: response
					})
				}
			});
			return false;
		}
	});

}
function appointments(){
	var list = $('.ap-list');	
	var i = 0;
	$.each(list, function(){
		var l = $(this).children('.patient-pic').length;
	    var c = this.children;
    	var i;
    	for (i = 0; i < c.length; i++) {
    		if (i > 3) {
    			c[3].className = "hidden-patient";
				c[i].className = "hidden-patient";
			};
   		}	
	var t = $(this).find('.hidden-patient').length;
	if (t >= 1) {
		$(this).append('<div class="col-lg-2 col-xs-2 extra-patients-circle text-center"></div>');
		p = t-3
		$(this).find('.extra-patients-circle').text('+'+p);
	};
 	});
 	$('.extra-patients-circle').click(function(){
 		//var day = $(this).parent().parent().parent().attr('id').replace(/-/g, '/');
 		var day = $(this).parent().parent().parent().attr('id');
 		var clinic = $(this).parent().parent().find('h1').text();
 		var did = '22';
 		document.location.href = "#panel/appointments/"+clinic+"/22/"+day;
 		
 	})
}

function addpatient(){
	// get the form id for codicionals functions
	var formId = $('form').attr('id');

	$('form').validate({
		rules : {
		},
		submitHandler: function(form){
			var data = $('form').serialize();
			console.log(data);
			$.ajax({
				type: 'POST',
				url: 'panel/addPatient',
				data: data+'&param='+formId,
				success: function(r){
					// Step 1 animation
					if (formId == 'patient') {
						$('form').animate({
							left: '100px',
							opacity: 0							
						},400, function (){
							$('.inn')
							.css({
								'opacity':'0',
								'left':'0'
							})
							.load('panel/patient/step2')
							.animate({
								left: '16.6667%',
								opacity: 1
							},400);
						});
					}else if (formId == 'patient2') {
						$('form').animate({
							left: '100px',
							opacity: 0							
						},400, function (){
							$('.inn')
							.css({
								'opacity':'0',
								'left':'0'
							})
							.load('panel/patient/step3')
							.animate({
								left: '16.6667%',
								opacity: 1
							},400);
						});

					};
				}
			})
		}
	})
}
function patient3(){
	yes = $('.yes');
	item = $(this).parent('div').parent('div').find('.collapse');

	$('.yes').click(function (){
		if ($(this).is(':checked')) {
			$(this).parent('div').parent('div').find('.collapse').collapse('show');
		}
	});
	$('.no').click(function (){
			$(this).parent('div').parent('div').find('.in').collapse('hide');
	});
}
var step;
function progressbar(){
	// Defining variables
	var step = $('.step').attr('step');
	$(".progressbar li:nth-child("+step+")").attr('class','active');
}
