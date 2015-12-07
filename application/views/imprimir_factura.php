<?php $this->load->view('header'); ?>
<?php $this->load->view('nav'); ?>


<div id="content">
		
	<div class="container">

			<div class="row">
			


<div class="span12">
	      		
	      		<div class="widget widget-table">
						
					<div class="widget-header">						
						<h3>
							<i class="icon-th-list"></i>
							Imprimir Factura							
						</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">

					<?php


$out ='';


$tipo = '';

foreach($result1->result_array() as $data1){
$orden = $data1["numero_orden"];
$tipo = $data1["tipo"];

$subtotal = $data1["subtotal"];
$itbis = $data1["itbis"];


$impuesto = ($subtotal * $itbis) / 100;
$total = ($subtotal + $impuesto);

$subtotal = number_format($subtotal, 2);
$impuesto = number_format($impuesto, 2);
$total = number_format($total, 2);

if($tipo == 'factura'){

	$label = "Factura";

}else if($tipo == 'cotizacion'){

	$label = "Cotizacion";

}

//BEGIN SHOW
$mfax = '';
$mwhatsapp = '';
$memail = '';
$mheader = '';
$mfooter = '';

if($negocio->getShowFax() == '1'){

	$mfax = 'Fax.: ' .$negocio->getFax().' <br /> ';

}

if($negocio->getShowWhatsapp() == '1'){

	$mwhatsapp = 'Whatsapp.: ' .$negocio->getWhatsapp().' <br /> ';

}


if($negocio->getShowEmail() == '1'){

	$memail = 'Email: ' .$negocio->getEmail().' <br /> ';

}


if($negocio->getShowHeader() == '1'){

	$mheader = $negocio->getNota().' <br /> ';

}


if($negocio->getShowFooter() == '1'){

	$mfooter = '<div style="text-align: center;">
	<br />
	--------------------------------------------------------------------------------------------------------------------------------------------------<br />
	<br />
	' . $negocio->getNota2() . '</div><br /><br /><br />';

}



//END SHOW



$out .= '
<div id="printdiv" style="width: 600px;margin: 0px auto;">
<div id="" style="text-align: center; paddig: 0px;">
<h3>'.$negocio->getNombre().'</h3>
<p>
'.$mheader.'
RNC '.$negocio->getRnc().'<br />
'.$negocio->getDireccion().'<br />
Tel.: '.$negocio->getTelefono().'<br /> 
'.$mfax.'
'.$mwhatsapp.'
'.$memail.'
</p>
</div>

<div style="margin-left: 20px;">
<h3 style="text-align:center;text-decoration: underline;">'.$label.'</h3><br /><br />
<b>Numero Orden: </b>' .$data1["numero_orden"].' <br /> 
<b>Fecha Cotizacion: </b>' .$data1["fecha_creacion"].' <br />
<b>Nombre Cliente: </b>' .$data1["cliente"].' <br />
<b>Cedula / RNC / Pasaporte: </b>' .$data1["documento"].' <br /> 
<b>NCF: </b>' .$data1["ncf"].' 
<br /><br /><br />

';	
}


$out .='
<center>
<table width="100%" class="table table-striped" >
<thead>
<tr>
<th  align="left" width="50%" style="background-color: lightgray;font-weight: bold;">Nombre Articulo</th>
<th  align="left" width="20%" style="background-color: lightgray;font-weight: bold;">Cantidad</th>
<th  align="left" width="18%" style="background-color: lightgray;font-weight: bold;">Precio</th>
<th  align="left" width="18%" style="background-color: lightgray;font-weight: bold;">Total</th>
</tr>
</thead>
';

foreach($result2->result_array() as $data2){

$out .= '
<tbody>
<tr>
<td>' .$data2["nombre"].'</td>
<td>' .$data2["qty"].'</td>
<td>' .number_format($data2["precio"],2).'</td>
<td>' .number_format($data2["qty"] * $data2["precio"],2).'</td>
</tr>
</tbody>
';			
}

$out .='</table>
</center>
<br /><br />

<div style="text-align: left;" >
<b>Subtotal: </b>RD$ ' .$subtotal.' <br />
<b>ITBIS: </b>RD$' .$impuesto.'<br />
<b>Total: </b>RD$ ' .$total.' <br />
</div>
<br />
<div style="text-align: center;">
</div>
</div>
'.$mfooter.'
</div>

';



?>

<?php echo $out; ?>

<div style="text-align: center;">
<input type="button" value="Imprimir" onclick="PrintElem('#printdiv')" class="btn btn-primary btn-large"/>
&nbsp;&nbsp;&nbsp;
<a href="<?php echo base_url(); ?>backend/facturacion_pdf.php?orden=<?php echo $orden;?>" target="__blank" class="btn btn-primary btn-large">Imprimir PDF</a>
&nbsp;&nbsp;&nbsp;
<input type="button" value="Nueva Factura" onclick="window.location='<?php echo base_url(); ?>index.php/facturacion/'" class="btn btn-primary btn-large"/>
</div>
<br /><br />

<script type="text/javascript">
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', '', 'height=auto,width=900');
        mywindow.document.write('<html><head><title></title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();
        return true;
    }
</script>
					
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->	
				
		    </div> <!-- /span12 -->
		    

		</div> <!-- /.row -->
		
		
	</div> <!-- /.container -->
	
</div> <!-- /#content -->

<?php $this->load->view('footer'); ?>


