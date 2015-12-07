<?php

require '../backend/config/db.php';

//$ = $_POST[""];

$cliente = $_POST["cliente"];
$codigo = $_POST["productCodigo"];
$qty = $_POST["productQty"];
$total = $_POST["total"];

$orden = date("Ymdhis");

$count = count($codigo);



for($i=0; $i < $count; $i++){

	$insert_detalle = "INSERT INTO cotizacion_detalle (id, numero_orden, codigo_producto, qty)
 	 VALUES (NULL, '$orden', $codigo[$i], $qty[$i])
	";

	mysql_query($insert_detalle);

}


$insert_maestra = "INSERT INTO cotizacion_maestra (id, numero_orden, cliente, monto, fecha_creacion)
 VALUES (NULL, '$orden', '$cliente', $total, NOW())
";

mysql_query($insert_maestra);

header("Location: http://localhost/cotizacion/backend/cotizacion_pdf.php?orden=$orden");

