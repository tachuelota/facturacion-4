<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventario extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');


	}

	public function index()
	{

		
		$this->load->view('form_agregar_producto');
	}

	
	public function agregarArticulo(){

		$this->load->model('facturacion_model');

		$data['inventario'] = $this->facturacion_model->getInventario();

		$this->load->view('form_agregar_producto', $data);



	}

	public function processAgregarArticulo(){

			$this->load->model('facturacion_model');

			$nombre = $this->input->post("nombre");
			$descripcion = $this->input->post("descripcion");
			$precio = $this->input->post("precio");
			$existencia = $this->input->post("existencia");

			if($this->facturacion_model->agregarProducto($nombre, $descripcion, $precio, $existencia)){
				
				$this->session->set_flashdata('success', 'Producto Guardado Correctamente');
				redirect(base_url() ."index.php/inventario/agregarArticulo");

			}else{

				$this->session->set_flashdata('error', 'Error Guardando el producto, por favor trate nuevamente.');
				redirect(base_url() ."index.php/inventario/agregarArticulo");

			}

			

	}


	public function editarArticulo($codigo){

		$this->load->model('facturacion_model');

		$data['producto'] = $this->facturacion_model->getProducto($codigo);

		$this->load->view('form_editar_producto', $data);


	}

	public function processEditarArticulo(){

			$this->load->model('facturacion_model');

			$codigo = $this->input->post("codigo");
			$nombre = $this->input->post("nombre");
			$descripcion = $this->input->post("descripcion");
			$precio = $this->input->post("precio");
			$existencia = $this->input->post("existencia");
			$estado = $this->input->post("estado");

			if($this->facturacion_model->editarProducto($codigo, $nombre, $descripcion, $precio, $existencia, $estado)){

				$this->session->set_flashdata('success', 'Producto Actualizado Correctamente');

				redirect(base_url() ."index.php/inventario/editarArticulo/$codigo");

			}else{

				$this->session->set_flashdata('error', 'Error Actualizando el producto, por favor trate nuevamente.');

				redirect(base_url() ."index.php/inventario/editarArticulo/$codigo");


			}

			

	}

	public function test(){

		echo base_url();

	}

	
}

/* End of file inventario.php */
/* Location: ./application/controllers/inventario.php */
