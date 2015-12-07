<?php
/*
require '../backend/config/db.php';


$codigo = $_POST["codigo"];

$query = "SELECT * FROM inventario WHERE codigo = $codigo";
$result = mysql_query($query);

$out = "";

while($datos = mysql_fetch_array($result)){

	$codigo = $datos["codigo"];
	$nombre = $datos["nombre"];
	//$descripcion = $datos["descripcion"];
	$precio = $datos["precio"];


	$out .= "<div><input type='hidden' name='productId[]' value='$codigo' />
	&nbsp;<input type='text' name='productName[]' value='$nombre' />
	&nbsp;<input type='text' name='productQty[]' value='1' id='productQty' class='qty' onblur='change(this.id)' />
	&nbsp;<input type='text' name='productPrice[]' id='productPrice' value='$precio' />
	&nbsp;<input type='text' name='productDiscount[]' value='0' />
	&nbsp;<a href='#' class='remove_field' style='text-decoration: none;'>
	&nbsp;<img src='delete.png' style='border: none;'></a></div>";

}
*/
echo 'GOOD';