<html>
<head>
<title>Cotizacion | Inventario</title>
</head>
<body>
<table border="1">
<tr>
<th>Codigo</th>
<th>Nombre</th>
<th>Precio</th>
</tr>
<?php foreach($inventario->result_array() as $row){ ?>
	<tr>
	<td><?php echo $row['codigo']; ?></td>
	<td><?php echo $row['nombre']; ?></td>
	<td><?php echo $row['precio']; ?></td>
	</tr>
<?php }?>	
</table>
</body>
</html>