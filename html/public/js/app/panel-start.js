define(function() {
	console.log('RUNNING site-start.js');
	var cache = {
		'' : $('#desktop #search'), /*title: "<?= $page->attr['title'] ?>", elem: $('.site-head')*/
		'search' : $('#desktop #search'),
		'search=': $('#desktop #search'),
	};
	$(window).bind('hashchange', function () {
		var url = $.param.fragment();
		// Hide any visible ajax content.
		$('#desktop').children(':visible').hide();
		
		if (cache[url]) {
			
			//Prevent desktop to usea .load() method
			if (url == 'search'){
				 $('#desktop #search').show();
				 console.log( "is "+ cache[url]);
			} else {
				cache[url].show();
			}			
			$('#preloader').fadeOut();
			
		} else {
			$('#preloader').show();
			
			//show preloader per request -- This is not related to first login preloader			
			cache[url] = $('<div class="view"/>').appendTo('#desktop').load(url, function() {
				var active_page = url.split('/');
				console.log(active_page[0]+"->"+active_page[1]);
				
				//TODO lo cmabie al active_page[1] active, porque todo corre actualmente dentro de 1 solo controller (panel)
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
						require(['app/panel'], function($) {							
							floatinput();
							autocomplete();
							search_location();
							practiceForm();
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