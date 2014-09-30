require.config({
	baseUrl: URL+"public/js",
	requireDefine:true,
	waitSeconds:0,
	paths: {
	        jquery:[  'assets/jquery.min', '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min'], // 2.0.0
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
         'functions': ['jquery', 'assets/jquery.validate.min'],
          //'assets/jquery.dataTables.min': ['jquery'],
         //'assets/jquery.maskedinput.min': ['jquery'],
         //'assets/dataTables.bootstrap': ['jquery', 'assets/bootstrap.min', 'assets/jquery.dataTables.min'], 
         //'paging': ['jquery','assets/jquery.dataTables.min'],
      	 'assets/fullcalendar.min': ['jquery'/*,'assets/fullcalendar-es'*/],
       	 'assets/jquery.geocomplete.min' : ['jquery'],
       	 'assets/bootstrap-datepicker':['jquery','assets/bootstrap.min'],
         'common': ['jquery','assets/jquery-ui.min','assets/bootstrap.min','assets/jquery.validate.min','assets/jquery.easing.min','assets/jquery.scrollTo.min','assets/bootstrap-datepicker','assets/jquery.geocomplete.min','../data/ve/jsonload','../data/ve/doctors','assets/moment.min','assets/fullcalendar.min','assets/jsonsql','assets/all','functions','config'],
         'app/registration': ['jquery','common'],
         'app/site': ['common', 'app/registration'],
       
	}
});
require([
        'jquery',
        'async!https://maps.googleapis.com/maps/api/js?v=3&libraries=places&sensor=false',
        'app/site'
    ],
    function($) {    	
    	$(document).ready(function () {
   			console.log("Loaded :)"); 
   	 	});
    }
);