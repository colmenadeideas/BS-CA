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
         'appassets/steps' : ['jquery', 'globals', 'assets/jquery.validate.min'],
         'assets/handlebars.min' :['jquery'],
          //'assets/jquery.dataTables.min': ['jquery'],
         //'assets/jquery.maskedinput.min': ['jquery'],
         //'assets/dataTables.bootstrap': ['jquery', 'assets/bootstrap.min', 'assets/jquery.dataTables.min'], 
         //'paging': ['jquery','assets/jquery.dataTables.min'],
      	 //'assets/fullcalendar.min': ['jquery'/*,'assets/fullcalendar-es'*/],
       	 'assets/jquery.geocomplete.min' : ['jquery'],
       	 'assets/bootstrap-datetimepicker-v4':['jquery','assets/bootstrap.min'],
       	 'assets/ jquery.carouFredSel-6.1.0-packed':['jquery','assets/easing.min'],
       	
         'functions': ['jquery','assets/handlebars.min','assets/all','assets/jquery-ui.min','assets/bootstrap.min',
         'assets/jquery.validate.min','assets/jquery.easing.min','assets/jquery.scrollTo.min','assets/bootstrap-datetimepicker-v4',
         'assets/jquery.geocomplete.min','assets/moment.min','assets/fullcalendar.min','assets/dateTimePicker','assets/jsonsql','config'],
         'app/search': ['jquery','globals', 'functions'],
         'app/doctor': ['jquery','globals', 'functions','app/search','assets/jquery.easing.min', 'assets/jquery.carouFredSel-6.1.0-packed'],
         'app/panel': ['jquery','globals', 'functions','assets/jquery.validate.min', 'assets/slick.min'],
         'app/login': ['jquery','globals', 'functions','assets/jquery.validate.min'],
         'app/start-panel': ['functions', 'app/search', 'app/panel', 'app/login'],
       
	}
});

require([
        'jquery',
        'globals', 
        //'async!https://maps.googleapis.com/maps/api/js?v=3&libraries=places&sensor=false',
        'app/start-panel',
        'app/panel'
        ],
        function($, app,/* gmaps_ , */ start, Panel ) { 
          Panel.run();


        // Implementation in progress to process all panels
        var accessArray = window.location.pathname.split('/');
        var accessHash = $.param.fragment();
        
        console.log("Access:" + accessArray[3] +" Hash:" + accessHash);

        switch(accessArray[3]) {
          case "panel":  
            if(accessHash == 'undefined' || accessHash == ''){
              window.location.hash = '#appointments/next/'; 
            } 
            break;
        }
      }
);