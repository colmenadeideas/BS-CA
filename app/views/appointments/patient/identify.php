<script>
	// Will show login/Register restrinction 
	console.log("show register/login modal!");

	$("#LoginRegisterPatient").modal({
		keyboard: false,
	  	backdrop: 'static',
	  	show: true
	});

	require(['app/login'], function(Login) {							
		Login.signin();
	});
	
</script>
