function doctorLoadDetails() {
	
	template = document.getElementById("item-details").firstChild.textContent;
	var currentHash = window.location.hash; 
	var id = currentHash.split("/");
	var context = $.getJSON(URL+"api/doctor/"+id[2] ,function(data) { 
		console.log(data);
		
		var context = data;
		$('#doc-details').html(Mark.up(template, context));
				
		//transform or not the Main Form if in details View
//		checkSearchView();		
		
		//Activate Rating		
		$(".rating").rating(); 
	});
	
	//Build Other views
	
}
