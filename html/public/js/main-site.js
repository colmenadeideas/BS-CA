require.config({
  baseUrl: "http://localhost/BS-OK/html/public/js",
  requireDefine: true,
  waitSeconds:0,
  paths: {
          jquery:[  'assets/jquery.min', 'http://localhost/BS-OK/html/js/assets/jquery.min'], // 2.0.0
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
         // 'functions': ['jquery', 'assets/jquery.validate.min'],
          //'assets/jquery.dataTables.min': ['jquery'],
         //'assets/jquery.maskedinput.min': ['jquery'],
         //'assets/dataTables.bootstrap': ['jquery', 'assets/bootstrap.min', 'assets/jquery.dataTables.min'], 
         //'paging': ['jquery','assets/jquery.dataTables.min'],
         'assets/fullcalendar.min': ['jquery'/*,'assets/fullcalendar-es'*/],
         'assets/jquery.geocomplete.min' : ['jquery'],
         'assets/bootstrap-datetimepicker':['jquery','assets/bootstrap.min'],
         'assets/jquery.carouFredSel-6.1.0-packed':['jquery','assets/jquery.easing.min'],

         'functions': ['jquery','assets/all','assets/jquery-ui.min','assets/bootstrap.min','assets/jquery.validate.min','assets/jquery.easing.min','assets/jquery.scrollTo.min','assets/jquery.backstretch.min','assets/bootstrap-datetimepicker','assets/jquery.geocomplete.min','assets/moment.min','assets/fullcalendar.min','assets/jsonsql','config'],
         'app/registration': ['jquery','functions', 'globals'],
         'app/search': ['jquery','functions', 'globals'],
         'app/doctor': ['jquery','functions', 'globals','app/search','assets/jquery.easing.min', 'assets/jquery.carouFredSel-6.1.0-packed'],
         'app/site': ['jquery','functions', 'globals','app/search','assets/jquery.carouFredSel-6.1.0-packed'],
         'app/login': ['jquery','functions', 'globals','assets/jquery.validate.min'],
         'app/start-site': ['', 'globals', 'app/registration', 'globals', 'app/search', 'app/site', 'app/login'],

       }
     });
require([
        'jquery',
        'globals', 
       // 'async!https://maps.googleapis.com/maps/api/js?v=3&libraries=places&sensor=false',
        'app/start-site',
        'app/site'
        ],
        function($, app,/* gmaps_ , */ start, site ) { 
          console.log("Loaded all");
          site.run();
        }
);