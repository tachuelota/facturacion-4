<?php $this->load->view('header'); ?>
<?php $this->load->view('nav'); ?>

<div id="content">
<form action="<?php echo base_url(); ?>index.php/facturacion/guardarFacturacion" class="form-horizontal" method="post" id="factura-form" novalidate="novalidate">
		
	<div class="container">

	

		  <?php if($this->session->flashdata('error')){ ?>

			<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">&times;</a>
		 	<h4 class="alert-heading">Error!</h4>
			<?php echo $this->session->flashdata('error') ?>
			</div>

		  <?php } ?>

		  <?php  if($this->session->flashdata('info')){ ?>

			<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">&times;</a>
		 	<h4 class="alert-heading">Informacion!</h4>
			<?php echo $this->session->flashdata('info') ?>
			</div>

		  <?php } ?>

		  <?php  if(!$this->session->flashdata('info') && $info !=''){ ?>

			<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">&times;</a>
		 	<h4 class="alert-heading">Informacion!</h4>
			<?php echo $info; ?>
			</div>

		   <?php } ?>

		     <?php  if(!$this->session->flashdata('info') && $warning !=''){ ?>

			<div class="alert alert-warning">
			<a class="close" data-dismiss="alert" href="#">&times;</a>
		 	<h4 class="alert-heading">Alerta!</h4>
			<?php echo $warning; ?>
			</div>

		   <?php } ?>


	
	<div id="page-title" class="clearfix">
			
			<ul class="breadcrumb">
			   <li class="active">Crear Facturas / Cotizaciones</li>
			</ul>
			
		</div> <!-- /.page-title -->
		
		<div class="row">

		<div class="span2">
		
				<div class="widget">
					
					<div class="widget-header">
						<h3>
							<i class="icon-bookmark"></i> 
							Menu						
						</h3>
						
						
					</div> <!-- /.widget-header -->
					
					<div class="widget-content">
						
						<div class="shortcuts" >
							<a href="<?php echo base_url(); ?>index.php/facturacion/mostrarFactura/factura" class="shortcut" style="width:100px;">
								<i class="shortcut-icon icon-list-alt"></i>
								<span class="shortcut-label">Ver Facturas</span>
							</a>

							<a href="<?php echo base_url(); ?>index.php/facturacion/mostrarFactura/cotizacion" class="shortcut" style="width:100px;">
								<i class="shortcut-icon icon-list-alt"></i>
								<span class="shortcut-label">Ver Cotizaciones</span>
							</a>

							<a href="<?php echo base_url(); ?>index.php/inventario/agregarArticulo" class="shortcut" style="width:100px;">
								<i class="shortcut-icon icon-list-alt"></i>
								<span class="shortcut-label">Inventario</span>
							</a>
							
															
						</div> <!-- /.shortcuts -->
						
					</div> <!-- /.widget-content -->

					<br />
					<div class="widget">
					<!--
					<div class="widget-header" style="padding-bottom: 20px;">
						<h3>
							
							 <?php echo "Ventas Facturadas Hoy " . date("d-m-Y") ?>
							 <br />	

						</h3>
						
						
					</div> 
					
					<div class="widget-content">
						
						<?php foreach($balance->result_array() as $data){

							$ba = $data['balance'];

						}
						?>

						<span style="font-weight: bold; font-size: 14pt;color: #3A87AD; text-align: center;">
						<?php echo "RD$" . number_format($ba); ?>
						</span>

						<br />


						
					</div>
					-->	
					<div class="widget widget-accordion">
					
					
					
					<div class="widget-content">
						
						<div class="accordion" id="sample-accordion">
				             <div class="accordion-group">
				              <div class="accordion-heading">
				                <a class="accordion-toggle" data-toggle="collapse" data-parent="#sample-accordion" href="#collapseTwo">
				                  <?php echo "Mostrar / Ocultar Ventas Facturadas Hoy " . date("d-m-Y") ?>
							 <br />	
				                </a>
				                
				                <i class="icon-plus toggle-icon"></i>
				              </div>
				              <div id="collapseTwo" class="accordion-body collapse">
				                <div class="accordion-inner">
				                <?php foreach($balance->result_array() as $data){

							$ba = $data['balance'];

						}
						?>

						<span style="font-weight: bold; font-size: 14pt;color: #3A87AD; text-align: center;">
						<?php echo $negocio->getMoneda() .' '. number_format($ba, 2); ?>
						</span>

						<br />

				                </div>
				              </div>
				            </div>
				           
				          </div>					
						
					</div> <!-- /.widget-content -->
					
				</div> <!-- /.widget -->
					
				</div> <!-- /.widget --><!-- /.widget -->
				
					
				</div> <!-- /.widget --><!-- /.widget -->
				
							
			</div> <!-- /.span2 -->
			
				
		
				
							
			
			
						
			<div class="span7">
				
				
	<div class="widget">
					
					<div class="widget-header">
						
						<h3>
							<i class="icon-tasks"></i> 
							Facturacion Articulos							
						</h3>
						
					</div> <!-- /.widget-header -->
					
					<div class="widget-content">	

					<div>


<div  >

<div class="input_container">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #666;font-size: 14px;">Buscar Articulos:</span> <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="search" onkeyup="autocomplet()" autocomplete="off"  placeholder="Digite Articulo ha agregar..." />&nbsp;<button class="btn btn-primary add_field_button" onclick="return false;">Agregar Articulo +</button>
<ul id="country_list_id"></ul>
<br /><br />

</div>
				
<br /><br /><br /><br />
<div class="input_fields_wrap" style="margin-left: 25px;">
<div>
	<tr>
	<td><input style='text-align: center;font-size: 14px; color: blue;' disabled="disabled" 
	 type='text' class='input-large' value='Nombre Articulo' size='80' /></td>
	<td><input style='text-align: center;font-size: 14px; color: blue;' disabled="disabled"  type='text' class='input-small'  size='3' value='Cantidad' id='productQty' class='qty'  /></td>
	<td><input style='text-align: center;font-size: 14px; color: blue;' disabled="disabled"  type='text' class='input-small' size='6' id='productPrice' value='Precio' /></td>
	<td><input style='text-align: center;font-size: 14px; color: blue;' disabled="disabled"  type='text' class='input-small'  size='3' value='Total' /></td>
	<td><img src='<?php echo base_url(); ?>third_party/template/img/b.png' style='border: none;' alt='' title=''></td>
	</tr>
	</div>
</div>
<br />

<br /><br />
<input type="hidden" name="total" id="total" value="0" />

</div>




<br />

</div>

<br>
					
				
						
					</div> <!-- /.widget-content -->
					
				</div> <!-- /.widget -->
				
				
	
				
			</div> <!-- /.span8 -->


			<div class="span3">
		
				<div class="widget">
					
					<div class="widget-header">
						
						<h3>
							<i class="icon-tasks"></i> 
							Balance						
						</h3>
						
					</div> <!-- /.widget-header -->
					
					<div class="widget-content">		
						
						<div id="displayBalance">


 <div class="control-group">
<label class="" for="name">Nombre Cliente</label>
<div class="controls" style="margin: 0px;">
<input type="text" class="input-large" name="cliente" id="cliente" placeholder="Digite Nombre Cliente..." />
</div>
</div>

 <div class="control-group">
<label class="" for="name">RNC / Cedula / Pasaporte</label>
<div class="controls" style="margin: 0px;">
<input type="text" class="input-large" name="documento" id="documento" placeholder="Digite Documento..." />
</div>
</div>

<div class="control-group">
<label class="" for="name">Tipo</label>
<div class="controls" style="margin: 0px;">
<input type="radio"  name="tipo" value="factura" onclick="showncf();" checked /><span style="font-weight: normal;" >Factura</span>
<br />
<input type="radio"  name="tipo" value="cotizacion" onclick="hidencf();" /><span style="font-weight: normal;" >Cotizacion</span>
</div>
</div>

<div class="control-group" id="myncf">
<label class="" for="name">NCF</label>
<div class="controls" style="margin: 0px;">
<select name="ncf" id="ncf" class="input-large">
<option value="N/A">Sin NCF</option>
<?php foreach($ncf as $n){?>
<option value="<?php echo $n['numero']; ?>"><?php echo $n['numero']; ?></option>
<?php } ?>
</select>
<a href="<?php echo base_url()?>index.php/facturacion/ncf" target="_blank">Gestionar NCF</a>
</div>
</div>


								
<br /><br />

<p><span style="font-weight: bold; font-size: 14pt;color: #666;">Subtotal: </span><span style="font-weight: bold; font-size: 14pt;color: #3A87AD;" id="sum">0.00</span></p>
<p><span style="font-weight: bold; font-size: 14pt;color: #666;">Itbis %: </span><input type="text"  name="itbis" value="<?php echo $negocio->getItbis(); ?>" size="5" class='input-small' id='itbis' style="font-weight: bold; font-size: 14pt;color: red;" onblur="update();" /></p>
<p><span style="font-weight: bold; font-size: 14pt;color: #666;">Total: </span> <span style="font-weight: bold; font-size: 14pt;color: #3A87AD;"  id="totals">0.00</span></p>
<p style="text-align: center;">
<input type="submit" value="Procesar Factura" class="btn btn-primary btn-large" />
<br /><br />
<a href="<?php echo base_url(); ?>" class="btn btn-danger btn-large">Cancelar Factura</a>
</p>
</div>
						
					</div> <!-- /.widget-content -->
					
				</div> <!-- /.widget -->
				
							
			</div> <!-- /.span4 -->
			
		</div> <!-- /.row -->
		
		
	</div> <!-- /.container -->
	</form>
</div> <!-- /#content -->


<script type="text/javascript">
$("#search").focus();
//alert("shit");
var max_fields      = 7; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
	
	
    var x = 0; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
       x++; //text box increment

			$.post("<?php echo base_url(); ?>backend/facturacion.php",
				{
					"nombre":$("#search").val(),
					"number": x
				},
				function(data){
				
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

 	var itbis = $("#itbis").val();
 	var impuesto = 0;
 	var subtotal = 0;
 	var total = 0;

	$("input[name^='productTotal']").each(function() { 
        
    	subtotal +=  parseInt($(this).val());
              
	});

	impuesto = (itbis * subtotal) / 100;

	total = (subtotal + impuesto);

	if($("input[name^='productPrice']").length < 1){

		subtotal = 0;
		total = 0;

	}

	console.log(subtotal);
	$("#sum").html(subtotal);
	$("#totals").html(total);

	$("#search").val("");
	$("#search").focus();

 }

 function changePrice(value){

     //productPrice1
     //productPrice10
     //productPrice100


     if(value.length == 13){

     	var n = value.substr(12, 1);
     	var price = $("#productPrice"+n).val();
     	var qty = $("#productQty"+n).val();
     	var total = parseInt(price * qty);

     	$("#productTotal"+n).val(total);

     }
     else if(value.length == 14){
     	var n = value.substr(12, 2);
     	var price = $("#productPrice"+n).val();
     	var qty = $("#productQty"+n).val();
     	var total = parseInt(price * qty);

     	$("#productTotal"+n).val(total);

     }
      else if(value.length == 15){
     	var n = value.substr(12, 3);
     	var price = $("#productPrice"+n).val();
     	var qty = $("#productQty"+n).val();
     	var total = parseInt(price * qty);

     	$("#productTotal"+n).val(total);
     }

 	
     update();
 	//alert(total);
 	
 }

 function changeQty(value){

     //productQty1
     //productQty10
     //productQty100


     if(value.length == 11){

     	var n = value.substr(10, 1);
     	var price = $("#productPrice"+n).val();
     	var qty = $("#productQty"+n).val();
     	var total = parseInt(price * qty);

     	$("#productTotal"+n).val(total);

     }
     else if(value.length == 13){
     	var n = value.substr(10, 2);
     	var price = $("#productPrice"+n).val();
     	var qty = $("#productQty"+n).val();
     	var total = parseInt(price * qty);

     	$("#productTotal"+n).val(total);
     }
      else if(value.length == 13){
     	var n = value.substr(10, 3);
     	var price = $("#productPrice"+n).val();
     	var qty = $("#productQty"+n).val();
     	var total = parseInt(price * qty);

     	$("#productTotal"+n).val(total);
     }

 	
     update();
 	//alert(total);
 	
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
			url: '<?php echo base_url(); ?>backend/ajax_refresh.php',
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



function hidencf(){

	$("#myncf").hide();


}

function showncf(){

	$("#myncf").show();


}


</script>
	
<?php $this->load->view('footer'); ?>
