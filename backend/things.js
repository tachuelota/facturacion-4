var max_fields      = 7; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
	
	
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){
			
			if(($("input[id=donation]:last").val())== ''){	

				alert('Donation Field is Empty');
				return

		}
			
			if(($("input[id=mac]:last").val())!== ''){	
			
			if(!validateMac($("input[id=mac]:last").val())){
				alert('The following MAC Addresss are invalid. The MAC Address must begin with 00:1A:79 or 00:1A:78 and match with the one configured in your STB. Please verify: \n\n' + $("input[id=mac]:last").val());
				return
		
			}
			}
			
		//if(validateMac($("input[id=mac]:last").val())){
        		x++; //text box increment
            $(wrapper).append('<div><b>#'+x+'</b>&nbsp;<input type="text" name="routesIptv[]" placeholder="Enter your Donation..." />&nbsp;<b>MAC #'+x+'</b> (Optional)&nbsp;<input type="text" name="macAddress[]" placeholder="Enter your MAC Address" id="mac" id="donation" /><a href="#" class="remove_field" style="text-decoration: none;">&nbsp;<img src="delete.png" style="border: none;"></a></div>'); //add input box
       
		//}else{
		//alert("Mac Address "+x+" is incorrect, please verify");
		//}
		}
						
			
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
	