// 
//	jQuery Validate example script
//
//	Prepared by David Cochran
//	
//	Free for your use -- No warranties, no guarantees!
//

$(document).ready(function(){

	// Validate
	// http://bassistance.de/jquery-plugins/jquery-plugin-validation/
	// http://docs.jquery.com/Plugins/Validation/
	// http://docs.jquery.com/Plugins/Validation/validate#toptions
	
		$('#factura-form').validate({
	    rules: {
	      cliente: {
	        minlength: 2,
	        required: true
	      },
	       documento: {
	        minlength: 2,
	        number : true
	      },
	       productName: {
	        minlength: 5,
	        required: true
	      }

	    },
	    focusCleanup: false,
	    
	    highlight: function(label) {
	    	$(label).closest('.control-group').removeClass ('success').addClass('error');
	    },
	    success: function(label) {
	    	label
	    		.text('OK!').addClass('valid')
	    		.closest('.control-group').addClass('success');
		},
		errorPlacement: function(error, element) {
	     error.appendTo( element.parents ('.controls') );
	   }
	  });


	$('#inventario-form').validate({
	    rules: {
	      nombre: {
	        minlength: 5,
	        required: true
	      },
	       precio: {
	        minlength: 1,
	        required: true,
	        number : true
	      },
	        existencia: {
	        minlength: 1,
	        required: true,
	        number : true
	      }

	    },
	    focusCleanup: false,
	    
	    highlight: function(label) {
	    	$(label).closest('.control-group').removeClass ('success').addClass('error');
	    },
	    success: function(label) {
	    	label
	    		.text('OK!').addClass('valid')
	    		.closest('.control-group').addClass('success');
		},
		errorPlacement: function(error, element) {
	     error.appendTo( element.parents ('.controls') );
	   }
	  });
	  	

	  $('.form').eq (0).find ('input').eq (0).focus ();
	  
}); // end document.ready