define(['globals', 'appassets/stepform', 'appassets/enhance'], function(globals, stepform, enhance) {
	
	function add() {
		//var step;		
		stepform.run();
		enhance.fieldsfor("patient");
		autocomplete();
	}

	function autocomplete() {
	
		//TODO use this field to fill and "block"? the others related to this patient data

		//Is user is selected with autofilled, 
		//fill every field, and skip registration. 
		//Show "¿Do yo want to add an Appointment?"

		$("input[name=name]").autocomplete({
				source : URL + "api/autocomplete/json/patient/", //aqui llama al api que retorna el valor de las clinicas guardadas previamente
				minLength : 1,
				delay : 50,
				messages : {
				noResults : '',
				results : function() {
				}
			},
			select: function(event, ui) {
				console.log(ui);
				//$("input[name='patient_id']").val(ui.item.id_value);
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

function progressbar(){
	// Defining variables
	var step = $('.step').attr('step');
	$(".progressbar li:nth-child("+step+")").attr('class','active');
}

	return {
		add: add
	}


});
