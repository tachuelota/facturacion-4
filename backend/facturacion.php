<?php

require '../backend/config/db.php';


//$codigo = $_POST["codigo"];

//$query = "SELECT * FROM inventario WHERE codigo = $codigo";

$nombre = $_POST["nombre"];
$number = $_POST["number"];

$query = "SELECT * FROM inventario WHERE nombre = '$nombre' ";
$result = mysql_query($query);

$out = "";

while($datos = mysql_fetch_array($result)){

	$codigo = $datos["codigo"];
	$nombre = $datos["nombre"];
	//$descripcion = $datos["descripcion"];
	$precio = $datos["precio"];

	$total = $precio * 1;


	/*$out .= "<div><input type='hidden' name='productCodigo[]' value='$codigo' />
	&nbsp;<input type='text' name='productName[]' value='$nombre' />
	&nbsp;<input type='text' name='productQty[]' value='1' id='productQty' class='qty' onblur='change(this.id)' />
	&nbsp;<input type='text' name='productPrice[]' id='productPrice' value='$precio' />
	&nbsp;<input type='text' name='productDiscount[]' value='0' />
	&nbsp;<a href='#' class='remove_field' style='text-decoration: none;'>
	&nbsp;<img src='images/delete.png' style='border: none;'></a></div>";*/

	$out .= "<div>
	<tr>
	<td>
	<input type='hidden' name='productCodigo[]' value='$codigo' />
	</td>
	<td>
	<input type='text' class='input-large' name='productName[]' id='productName' value='$nombre' size='80' />
	</td>
	<td>
	<input type='text' class='input-small' name='productQty[]' size='3' value='1' id='productQty$number' class='qty' onblur='changeQty(this.id)' />
	</td>
	<td>
	<input type='text' class='input-small' name='productPrice[]' size='6' id='productPrice$number' value='$precio' onblur='changePrice(this.id)' />
	</td>
	<td>
	<input type='text' class='input-small' name='productTotal[]' size='3' value='$total' id='productTotal$number' readonly />
	</td>
	<td>
	<a href='#' class='remove_field' style='text-decoration: none;'><img src='http://localhost/facturacion/third_party/template/img/delete.png' style='border: none;' alt='Remover Articulo' title='Remover Articulo'></a>
	</td>
	</tr>
	</div>";

}

echo $out;