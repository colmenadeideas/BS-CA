
$('.collapse').collapse();

//forms
floatinput();

$("[id^=collapse]").on('shown', function(){
    $(this).parents('.accordion-group').find('.accordion-toggle')
         .prop('checked', true);
});

function addMenu(){$('#addMenu').slideToggle(400);}



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

function contextmenu() {
	console.log(URL);
	$('.sb-button').click(function(e){

		var position = $(this).attr("position");
		
		if ((position == "opened") || (position == undefined)) {
			$(this).attr("position", "closed");
			$(this).removeClass("glyphicon-resize-small");
			$(this).addClass("glyphicon-resize-full");
			
			$('.sb-slidebar').removeClass("col-lg-3 col-md-3 col-sm-3").addClass("col-lg-1 col-md-1 col-sm-1", 500);
			$('#panel-desktop').delay(200).removeClass("col-lg-9 col-md-9 col-sm-9").addClass("col-lg-11 col-md-11 col-sm-11", 500);
			$('.sb-slidebar').delay(400).removeClass("col-xs-3").addClass("col-xs-1");
			$('#panel-drawer').load("panel/nav/nav-small");
			$(this).fadeOut(400, function(){
				$('.sb-button').css({
				"top": "auto",
				"bottom": "15px",
				"left": "2.5%"
				});
				$(this).fadeIn();
			});
			
			return false;
		}
		
		if (position == "closed") {
			$(this).removeClass("glyphicon-resize-full");
			$(this).addClass("glyphicon-resize-small");
			$(this).attr("position", "opened");
			$('.sb-slidebar').removeClass("col-lg-1 col-md-1 col-sm-1").addClass("col-lg-3 col-md-3 col-sm-3", 500);
			$('#panel-desktop').delay(200).removeClass("col-lg-11 col-md-11 col-sm-11").addClass("col-lg-9 col-md-9 col-sm-9", 500);
			$('.sb-slidebar').delay(400).removeClass("col-xs-1").addClass("col-xs-3");
			$('#panel-drawer').load("panel/nav/nav-big");
			$('.drawer_menu').css("padding", "0");
			$(this).fadeOut(400, function(){
				$('.sb-button').css({
				"bottom": "15px",
				"left": "10.5%"
				});
				$(this).fadeIn();
			});
			return false;
		};
		
	});
} 