define(['module'], function(module){
	
	function okey() {
		var okey = $('[name="okey"]').val();
		return okey;
	}

    return {
    	f: 'bootstrap3',
		isProcessing: false, //To Avoid multiple AJAX requests
		URL: "http://localhost/BS-OK/html/",
		urlCheck: '/html/',
		position: 2,
		okey: okey
    }
});