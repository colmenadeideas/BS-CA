define(function() {
	
	var cache = {
		'' : $('#desktop #search'), /*title: "<?= $page->attr['title'] ?>", elem: $('.site-head')*/
		//'search' : $('#desktop #search'),
		//'search=': $('#desktop #search'),
	};
	$(window).bind('hashchange', function () {
		var url = $.param.fragment();
		// Hide any visible ajax content.
		$('#desktop').children(':visible').hide();		
		if (cache[url]) {
			
			//Prevent desktop to usea .load() method
			/*if (url == 'search'){
				 $('#desktop #search').show();
				 console.log( "is "+ cache[url]);
			} else {
				cache[url].show();
			}*/		
			$('#preloader').fadeOut();
			
		} else {

			$('#preloader').show();			
			//show preloader per request -- This is not related to first login preloader			
			cache[url] = $('<div class="view"/>').appendTo('#desktop').load(url, function() {

				var active_page = url.split('/');
				
				switch(active_page[1]) {
					case "doctor":
						require(['app/doctor'], function($) {
							
							switch(active_page[1]) {
								case 'details':
									doctorLoadDetails();
									break;
								default:
									//doctorLoadDetails();
									break;
							}
							
						});						
						break;

					case "practice":
						require(['app/practice'], function(practice) {
							practice.add();								
						});						
						break;	

					case "appointments":
						require(['app/appointments'], function(appointments) {
							appointments.list();
														
						});						
						break;

					case "schedule":
						require(['app/schedule'], function(schedule) {
							schedule.add();
														
						});						
						break;
					
					default:					
						break;
				}
				$('#preloader').fadeOut();
			});
			
		}
		
	});
	// Trigger and Handle the hash the page may have loaded with
	$(window).trigger('hashchange');		
});