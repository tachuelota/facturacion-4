<html>
<head>
<title>Cotizacion</title>
<link rel="stylesheet" href="css/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>



<div>
<form action="backend/proccess_cotizacion.php" method="post" id="frmcotizacion">

<div  style="float: left; width: 800px;padding: 10px; border: 1px blue solid;clear: both;" >

<div class="input_container">
Search Product: <input type="text" id="search" onkeyup="autocomplet()" autocomplete="off" /><button class="add_field_button" onclick="return false;">Agregar Articulo +</button>
<ul id="country_list_id"></ul>
</div>
				
<br />
<div class="input_fields_wrap"></div>
<br />

<br /><br />
<input type="hidden" name="total" id="total" value="0" />

</div>

<div id="displayBalance" style="float: right;margin-right: 20px;width: 300px;padding: 10px; border: 1px blue solid;">
<p>Nombre Cliente: <input type="text" name="cliente" />

</p>	

<p>Subtotal: <span id="sum"></span></p>
<p>Total Descuento %: <span id=""></span></p>
<p>Total: <span id="sum"></span></p>
<p><input type="submit" value="Cotizar" /></p>
</div>

</form>
<br />

</div>

<br>
<script type="text/javascript">
var max_fields      = 7; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
	
	
    var x = 0; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
       

			$.post("http://localhost/cotizacion/backend/cotizacion.php",
				{
					"nombre":$("#search").val()
				},
				function(data){
				//x++; //text box increment
            $(wrapper).append(data); //add input box
             //$("#sum").append(data); //add input box
             update();	
			});
		
        		
   			
		
    });



$("#search").keypress(function(event){
    if(event.keyCode == 13){
     		
    }
});

 function update(){
 	var test_price = 0;
$("input[name^='productPrice']").each(function() { 
                test_price +=  parseInt($(this).val());
                console.log(test_price);

                $("#sum").html(test_price);
                $("#total").val(test_price);
            });

$("#search").val("");
 }

 function change(qty){
 	
 }
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
        update();	
    });


    var $form = $('#frmcotizacion'),
$summands = $form.find('.qty'),
$sumDisplay = $('#sum');

$form.delegate('.qty', 'change', function ()
{
var sum = 0;
$summands.each(function ()
{
    var value = Number($(this).val());
    if (!isNaN(value)) sum += value;
});

$sumDisplay.html(sum);
});


// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#search').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'http://localhost/cotizacion/backend/ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#country_list_id').show();
				$('#country_list_id').html(data);
			}
		});
	} else {
		$('#country_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#search').val(item);
	// hide proposition list
	$('#country_list_id').hide();
}

</script>
</body>
</html>