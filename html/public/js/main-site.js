require.config({
	baseUrl: URL+"public/js",
	requireDefine:true,
	waitSeconds:0,
	paths: {
	        jquery:[  'assets/jquery.min', '//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min'], // 2.0.0
			'async': 'assets/requirejs-plugins/async',
	        
	   },	
	    
	shim: {
		'jquery': {
            exports: '$'
        },
        
        gmaps: {
         	exports: 'google',
        	exports: '$',
        },
       
        'bootstrap.min': {
            deps: ['jquery'],
            exports: '$'
        },
         'assets/all': ['jquery'],
         'assets/bootstrap.min' : ['jquery'],
         'assets/jquery.validate.min': ['jquery'],
         'assets/jquery.easing.min': ['jquery'],   
         'assets/jquery.scrollTo.min': ['jquery'], 
         'assets/jquery.backstretch.min': ['jquery'],
         'functions': ['jquery', 'assets/jquery.validate.min'],
          //'assets/jquery.dataTables.min': ['jquery'],
         //'assets/jquery.maskedinput.min': ['jquery'],
         //'assets/dataTables.bootstrap': ['jquery', 'assets/bootstrap.min', 'assets/jquery.dataTables.min'], 
         //'paging': ['jquery','assets/jquery.dataTables.min'],
      	 'assets/fullcalendar.min': ['jquery'/*,'assets/fullcalendar-es'*/],
       	 'assets/jquery.geocomplete.min' : ['jquery'],
       	 'assets/bootstrap-datetimepicker':['jquery','assets/bootstrap.min'],
       	 'assets/ jquery.carouFredSel-6.1.0-packed':['jquery','assets/easing.min'],
       	
       	 //DATA TO PRELOAD
       //	 'assets/jsonsql': ['../../data/ve/jsonload'],
         //
         'common': ['jquery','assets/all','assets/jquery-ui.min','assets/bootstrap.min','assets/jquery.validate.min','assets/jquery.easing.min','assets/jquery.scrollTo.min','assets/jquery.backstretch.min','assets/bootstrap-datetimepicker','assets/jquery.geocomplete.min','assets/moment.min','assets/fullcalendar.min','assets/jsonsql','functions','config'],
         'app/registration': ['jquery','common'],
         'app/search': ['jquery','common'],
         'app/doctor': ['jquery','common','app/search','assets/jquery.easing.min', 'assets/jquery.carouFredSel-6.1.0-packed'],
         'app/site': ['jquery','common','app/search'],
         'app/login': ['jquery','common','assets/jquery.validate.min'],
         'app/site-start': ['common', 'app/registration', 'app/search', 'app/site', 'app/login'],
       
	}
});
require([
        'jquery',
        'async!https://maps.googleapis.com/maps/api/js?v=3&libraries=places&sensor=false',
        'app/site-start'
    ],
    function($) {    	
    	$(document).ready(function () {
   			console.log("Loaded :)"); 
   	 	});
    }
);