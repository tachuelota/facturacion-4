<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturacion_Model extends CI_Model {


	public function __construct()
	{
		$this->load->database();
	}

	public function getInventario(){

		$query = $this->db->query("SELECT * FROM inventario");

		return $query;

	}


	public function guardarFacturacion($cliente, $documento, $ncf, $tipo, $codigo, $qty, $precio, $itbis, $orden){

		$count = count($codigo);

		$total = 0;

		for($i=0; $i < $count; $i++){

			$insert_detalle = "INSERT INTO factura_detalle (id, numero_orden, codigo_producto, precio, qty)
 	 			VALUES (NULL, '$orden', $codigo[$i], $precio[$i],  $qty[$i])
			";

			$this->db->query($insert_detalle);

			$total += ($precio[$i] * $qty[$i]);


		}

		$subtotal = $total;

		$impuesto = ($subtotal * $itbis) / 100;
		$total = ($subtotal + $impuesto);


		$insert_maestra = "INSERT INTO factura_maestra (id, numero_orden, cliente, documento, ncf, tipo, subtotal, monto, itbis, fecha_creacion)
 			VALUES (NULL, '$orden', '$cliente', '$documento', '$ncf', '$tipo',$subtotal, $total, $itbis, NOW())
		";

		$this->db->query($insert_maestra);

	}

	

	public function getArticulo($nombre){

		$query = $this->db->query("SELECT * FROM inventario WHERE nombre = '$nombre' ");

		return $query;

	}

	public function agregarProducto($nombre, $descripcion, $precio, $existencia){

		$query = "INSERT INTO inventario (codigo, nombre, descripcion, precio, existencia) 
		 VALUES (NULL,'$nombre', '$descripcion', $precio, $existencia)";

		if($this->db->query($query)){

			return true;

		}
		else{

			return false;
		}

	}

	public function getProducto($codigo){

		$query = $this->db->query("SELECT * FROM inventario 
			WHERE codigo = '$codigo' ");

		return $query;

	}

	public function editarProducto($codigo, $nombre, $descripcion, $precio, $existencia, $estado){

		$query = "UPDATE inventario SET nombre = '$nombre', descripcion = '$descripcion', 
		precio = $precio, existencia = $existencia, estado = '$estado'
		WHERE codigo = $codigo";

		if($this->db->query($query)){

			return true;

		}
		else{

			return false;
		}

	}

	public function printFacturaMaestra($orden){

		$query = $this->db->query("SELECT * FROM factura_maestra
 									WHERE numero_orden = '$orden'");

		return $query;

	}

	public function printFacturaDetalle($orden){

		$query = $this->db->query("SELECT cd.qty AS 'qty', i.codigo AS 'codigo', cd.precio AS 'precio', i.nombre AS 'nombre'
									FROM factura_detalle cd
									INNER JOIN inventario i ON i.codigo = cd.codigo_producto
									WHERE cd.numero_orden = '$orden'");

		return $query;

	}


	public function getFactura($tipo){

		$query = $this->db->query("SELECT * FROM factura_maestra
 									WHERE tipo = '$tipo'
 									");

		return $query;

	}



	public function getBalance(){

		$query = $this->db->query("SELECT SUM(monto) AS 'balance' 
			FROM factura_maestra 
			WHERE fecha_creacion = CURDATE() 
			AND tipo = 'factura' LIMIT 1 ");

		return $query;

	}


	public function convertirFactura($cotizacion, $ncf){

		$this->db->query("UPDATE factura_maestra SET tipo = 'factura' , ncf = '$ncf'
			WHERE numero_orden = '$cotizacion' ");

	}


	public function editarNegocio($nombre, $rnc, $direccion, $telefono1, 
		$fax, $whatsapp, $email,
		$itbis, $moneda, $nota, $nota2){

		$query = "UPDATE negocio_settings SET nombre = '$nombre', rnc = '$rnc', 
		direccion = '$direccion', telefono1 = '$telefono1',
		fax = '$fax', whatsapp = '$whatsapp', email = '$email',
		itbis = $itbis, moneda = '$moneda', nota_factura = '$nota', nota_factura2 = '$nota2'
		";

		if($this->db->query($query)){

			return true;

		}
		else{

			return false;
		}

	}


	public function getNegocio(){

		$query = $this->db->query("SELECT * FROM negocio_settings");

		return $query;

	}

	public function agregarNcf($numero, $descripcion){

		$query = "INSERT INTO ncf (id, numero, fechaCreacion) 
		 VALUES (NULL,'$numero', NOW())";

		if($this->db->query($query)){

			return true;

		}
		else{

			return false;
		}

	}

	public function getNcf(){

		$query = $this->db->query("SELECT * FROM ncf WHERE estado IN ('activo','inactivo')");


		return $query->result_array();

	}

	public function getNcfActivo(){

		$query = $this->db->query("SELECT * FROM ncf WHERE estado IN ('activo')");


		return $query->result_array();

	}

	public function setNcf($numero, $estado){

		$query = "UPDATE ncf SET estado = '$estado'
		WHERE numero = '$numero' ";

		if($this->db->query($query)){

			return true;

		}
		else{

			return false;
		}

	}

	public function getNcf2($id){

		$query = $this->db->query("SELECT * FROM ncf 
			WHERE id = $id ");

		return $query->result_array();

	}

	public function getCurrentNcf(){

		$ncf = 'N/A';

		$query = $this->db->query("SELECT * FROM ncf 
			WHERE estado = 'activo' ORDER BY id LIMIT 1");

		if($query->num_rows() > 0){

			foreach($query->result_array() as $n){

			$ncf = $n['numero'];

		    }

	    }
		

		return $ncf;


	}

	public function editarNcf($id, $numero, $descripcion, $estado){

		$query = "UPDATE ncf SET numero = '$numero', descripcion = '$descripcion', 
		 estado = '$estado'
		WHERE id = $id";

		if($this->db->query($query)){

			return true;

		}
		else{

			return false;
		}

	}

	public function countFacturas(){

		$query = $this->db->query("SELECT COUNT(id) AS 'count' FROM factura_maestra");
		$count = 0;

		if($query->num_rows() > 0){

			foreach($query->result_array() as $c){

				$count = $c['count'];

			}

		}

		return $count;

	}


}

/* End of file facturacion_model.php */
/* Location: ./application/models/facturacion_model.php */