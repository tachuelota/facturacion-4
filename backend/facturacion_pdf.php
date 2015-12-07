<?php

require  '../backend/print_pdf_class.php';
require  '../backend/config/db.php';
require  '../backend/negocio.class.php';

$negocio = new Negocio();

$orden = $_GET["orden"];
$out ='';

$query1 = "
SELECT * FROM factura_maestra
 WHERE numero_orden = '$orden'";

$result1 = mysql_query($query1);

$tipo = '';

while($data1 = mysql_fetch_array($result1)){

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
	-------------------------------------------------------------------------------------------------------------------------<br />
	<br />
	' . $negocio->getNota2() . '</div><br /><br /><br />';

}



//END SHOW



$out .= '
<div id="header" style="text-align: center; paddig: 0px;">
<h1>'.$negocio->getNombre().'</h1>
<p>
'.$negocio->getNota().'<br />
RNC '.$negocio->getRnc().'<br />
'.$negocio->getDireccion().'<br />
Tel.: '.$negocio->getTelefono().'<br />
'.$mfax.'
'.$mwhatsapp.'
'.$memail.'
</p>
</div>


<h1 style="text-align:center;text-decoration: underline;">'.$label.'</h1>
<b>Numero Orden: </b>' .$data1["numero_orden"].' <br /> 
<b>Fecha Cotizacion: </b>' .$data1["fecha_creacion"].' <br />
<b>Nombre Cliente: </b>' .$data1["cliente"].' <br />
<b>Cedula / RNC / Pasaporte: </b>' .$data1["documento"].' <br /> 
<b>NCF: </b>' .$data1["ncf"].' 
<br /><br /><br />

';	
}

$query2 = "
SELECT cd.qty AS 'qty', i.codigo AS 'codigo', cd.precio AS 'precio', i.nombre AS 'nombre'
FROM factura_detalle cd
INNER JOIN inventario i ON i.codigo = cd.codigo_producto
WHERE cd.numero_orden = '$orden'";

$result2 = mysql_query($query2);

$out .='
<table border="1">
<tr>
<th align="center" width="50%" style="background-color: lightgray;font-weight: bold;">NOMBRE ARTICULO</th>
<th align="center" width="14%" style="background-color: lightgray;font-weight: bold;">CANTIDAD</th>
<th align="center" width="18%" style="background-color: lightgray;font-weight: bold;">PRECIO</th>
<th align="center" width="18%" style="background-color: lightgray;font-weight: bold;">TOTAL</th>
</tr>
';

while($data2 = mysql_fetch_array($result2)){

$out .= '
<tr>
<td align="center" width="50%">' .$data2["nombre"].'</td>
<td align="center" width="14%">' .$data2["qty"].'</td>
<td align="center" width="18%">RD$ ' .number_format($data2["precio"],2).'</td>
<td align="center" width="18%">RD$ ' .number_format($data2["qty"] * $data2["precio"],2).'</td>
</tr>
';			
}

$out .='</table>
<br />

<div style="text-align: left;" >
<b>Subtotal: </b>RD$ ' .$subtotal.' <br />
<b>ITBIS: </b>RD$' .$impuesto.'<br />
<b>Total: </b>RD$ ' .$total.' <br />
</div>
<div style="text-align: center;">
'.$mfooter.'
</div>
';



$pdf = new printPDF();
$pdf->print_pdf($out, 'Cotizacion '.$orden.'.pdf');


