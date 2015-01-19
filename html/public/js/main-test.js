require.config({
	baseUrl: URL+"public/js",
	requireDefine:true,
	waitSeconds:0,
	paths: {
	        jquery:[  '//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min'], // 2.0.0	        
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
         'assets/markup.min': ['jquery'],
         'app/test': ['assets/markup.min', 'common'],
       
	}
});
require([
        'jquery',        
        'app/test'
    ],
    function($) {    	
    	$(document).ready(function () {
   			console.log("Loaded :)"); 
   	 	});
    }
);