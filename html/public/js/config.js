var modo = 'local';//local or server

var f = 'bootstrap3';
//To Avoid multiple AJAX requests
var isProcessing = false;

if (modo === 'local') {
	//var URL = "http://192.168.1.107/Edil/Web/";
	var URL = "http://localhost/CapitanAmerica/BS-CA/html/";
	var urlCheck = '/html/';

	var position = 2;

} else {
	var URL = "http://";
	var urlCheck = '/';
	var position = 1;

}
