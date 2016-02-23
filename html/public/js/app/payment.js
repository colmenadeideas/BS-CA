define(['globals' ], function(globals) {

	function startPayment(init_point) {
		$MPC.openCheckout ({
		    url: init_point,
		    mode: "[popup]",
		    onreturn: function(data) {
		        // execute_my_onreturn (Sólo modal)

		        if (data.collection_status=='approved'){
			        alert ('Pago acreditado');
			    } else if(data.collection_status=='pending'){
			        alert ('El usuario no completó el pago');
			    } else if(data.collection_status=='in_process'){    
			        alert ('El pago está siendo revisado');    
			    } else if(data.collection_status=='rejected'){
			        alert ('El pago fué rechazado, el usuario puede intentar nuevamente el pago');
			    } else if(data.collection_status==null){
			        alert ('El usuario no completó el proceso de pago, no se ha generado ningún pago');
			    }
		    }
		});
	}

	return {
		startPayment: 	startPayment
	}

});
