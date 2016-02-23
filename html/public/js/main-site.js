require.config({
  baseUrl: "http://localhost/BS-OK/html/public/js",
  requireDefine: true,
  waitSeconds:0,
  paths: {
          jquery:[  'assets/jquery.min', 'http://localhost/BS-OK/html/js/assets/jquery.min'], // 2.0.0
          'async': 'assets/requirejs-plugins/async',    
          'facebook': 'http://connect.facebook.net/en_US/sdk',     
        },  

        shim: {
          'jquery': { 
            exports: '$'
          },
          'facebook' : {
            exports: 'FB'
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
         'assets/jquery.geocomplete.min' : ['jquery'],
         'assets/bootstrap-datetimepicker':['jquery','assets/bootstrap.min'],
         'assets/jquery.carouFredSel-6.1.0-packed':['jquery','assets/jquery.easing.min'],

         'functions': ['jquery','assets/all','assets/jquery-ui.min','assets/bootstrap.min','assets/jquery.validate.min','assets/jquery.easing.min','assets/jquery.scrollTo.min','assets/jquery.backstretch.min','assets/fullcalendar.min','assets/bootstrap-datetimepicker','assets/jquery.geocomplete.min','assets/moment.min','assets/dateTimePicker.min','assets/jsonsql','config'],
         'app/registration': ['jquery','functions', 'globals'],
         'app/search': ['jquery','functions', 'globals'],
         'app/doctor': ['jquery','functions', 'globals','app/search', 'app/payment','assets/jquery.easing.min', 'assets/jquery.carouFredSel-6.1.0-packed'],
         'app/site': ['jquery','functions', 'globals','app/search','assets/jquery.carouFredSel-6.1.0-packed', 'assets/slick.min'],
         'app/login': ['jquery','functions', 'globals','assets/jquery.validate.min'],
         'app/hashchange': ['jquery', 'globals', 'app/registration', 'globals', 'app/search', 'app/site', 'app/login'],

       }
     });
require([
        'jquery',
        'globals', 
        'async!https://maps.googleapis.com/maps/api/js?v=3&libraries=places&sensor=false',
        'app/hashchange',
        'app/site',
        'app/facebook'
        ],
        function($, app, gmaps_ , start, Site, FB ) { 
          Site.run();
        }
);