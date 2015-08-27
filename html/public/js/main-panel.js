require.config({
  baseUrl: "http://localhost/BS-OK/html/public/js",
  requireDefine:true,
  waitSeconds:0,
  paths: {
          jquery:[  'assets/jquery.min', '//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min'],
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
         'assets/slidebars.min': ['jquery'], 
         'functions': ['jquery', 'assets/jquery.validate.min'],
         'appassets/stepform' : ['jquery', 'globals', 'assets/jquery.validate.min'],
          //'assets/jquery.dataTables.min': ['jquery'],
         //'assets/jquery.maskedinput.min': ['jquery'],
         //'assets/dataTables.bootstrap': ['jquery', 'assets/bootstrap.min', 'assets/jquery.dataTables.min'], 
         //'paging': ['jquery','assets/jquery.dataTables.min'],
      	 //'assets/fullcalendar.min': ['jquery'/*,'assets/fullcalendar-es'*/],
       	 'assets/jquery.geocomplete.min' : ['jquery'],
       	 'assets/bootstrap-datetimepicker-v4':['jquery','assets/bootstrap.min'],
       	 'assets/ jquery.carouFredSel-6.1.0-packed':['jquery','assets/easing.min'],
       	
       	 //DATA TO PRELOAD
       //	 'assets/jsonsql': ['../../data/ve/jsonload'],
         //
         'common': ['jquery','assets/all','assets/jquery-ui.min','assets/bootstrap.min','assets/jquery.validate.min','assets/jquery.easing.min','assets/jquery.scrollTo.min','assets/bootstrap-datetimepicker-v4','assets/jquery.geocomplete.min','assets/moment.min','assets/fullcalendar.min','assets/jsonsql','functions','config'],
         'app/search': ['jquery','common', 'globals'],
         'app/doctor': ['jquery','common', 'globals','app/search','assets/jquery.easing.min', 'assets/jquery.carouFredSel-6.1.0-packed'],
         'app/panel': ['jquery','common', 'globals','assets/jquery.validate.min'],
         'app/login': ['jquery','common', 'globals','assets/jquery.validate.min'],
         'app/start-panel': ['common', 'app/search', 'app/panel', 'app/login'],
       
	}
});
/*require([
        'jquery',
        'async!https://maps.googleapis.com/maps/api/js?v=3&libraries=places&sensor=false',
        'app/panel-start'
    ],
    function($) {    	
    	$(document).ready(function () {
   			console.log("Loaded :)"); 
         $.slidebars();
   	 	});
    }
);*/

require([
        'jquery',
        'globals', //would replace 'common' eventually
        'async!https://maps.googleapis.com/maps/api/js?v=3&libraries=places&sensor=false',
        'app/start-panel'
    ],
    function($, app, gmaps_ , panel ) { 
        console.log("Loaded all"); 
        //login.init();     
    }
);