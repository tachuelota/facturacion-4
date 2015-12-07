<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturacion extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');

	}

	public function index()
	{

		$this->load->model('facturacion_model');

		$data['info'] = '';
		$data['warning'] = '';

		//IF IT THE DEMO VERSION
		if($this->config->item('version_demo')){
			
			$max_facturas = $this->config->item('max_facturas');
			$count_facturas = $this->facturacion_model->countFacturas();

			if($count_facturas == $this->config->item('warning_facturas')){

				$data['warning'] = 'Usted esta casi llegando al maximo de Facturas permitadas para esta version de prueba. Si desea la version Full de este sistema comuniquese a <a href="'.base_url().'backend/contacto.html" target="_blank">http://natanaelsanchez.comxa.com/#/contacto</a>';
			
			}

			if($count_facturas >= $max_facturas){

				$data['info'] = 'Usted ha llegado al maximo de Facturas permitadas para esta version de prueba. Si desea la version Full de este sistema comuniquese a <a href="'.base_url().'backend/contacto.html" target="_blank">http://natanaelsanchez.comxa.com/#/contacto</a>';
			

			}

			
		}
		//END DEMO VERSION

		require 'negocio.class.php';
				
		$data['negocio'] = new Negocio();

		$data['balance'] = $this->facturacion_model->getBalance();
		$data['ncf'] = $this->facturacion_model->getNcfActivo();
		
		$this->load->view('facturacion', $data);
	}

	
	public function guardarFacturacion(){

		$this->load->model('facturacion_model');

		//IF IT THE DEMO VERSION
		if($this->config->item('version_demo')){
			
			$max_facturas = $this->config->item('max_facturas');
			$count_facturas = $this->facturacion_model->countFacturas();

			if($count_facturas >= $max_facturas){

			$this->session->set_flashdata('info', 'Usted ha llegado al maximo de Facturas permitadas para esta version de prueba. Si desea la version Full de este sistema comuniquese a <a href="http://natanaelsanchez.comxa.com/#/contacto" target="_blank">http://natanaelsanchez.comxa.com/#/contacto</a>');
			redirect(base_url() ."index.php/facturacion/");
			exit;

			}
		}
		//END DEMO VERSION

		
		$cliente = $this->input->post("cliente");
		$documento = $this->input->post("documento");

		if($documento == ''){

			$documento = '00000000000';

		}

		$ncf = $this->input->post("ncf");
		$tipo = $this->input->post("tipo");
		$codigo  = $this->input->post("productCodigo");
		$qty 	 = $this->input->post("productQty");
		$precio  = $this->input->post("productPrice");
		$itbis  = $this->input->post("itbis");
		//$total	 = $this->input->post("total");


		if(empty($codigo) || empty($qty) || empty($precio)){

			$this->session->set_flashdata('error', 'Debes Agregar Articulos a la factura, por favor trate nuevamente.');

			redirect(base_url() . "index.php/facturacion/");	

			exit;

		}


		if($tipo == 'factura'){

			$orden = "F" . date("ymdhis");

			if($ncf != 'N/A'){

			//Inactivar NCF Utilizado
			$this->inactivarNcf($ncf, 'inactivo');

		}



		}else if($tipo == 'cotizacion'){

			$orden = "C" . date("ymdhis");

		}


		
		

		$this->facturacion_model->guardarFacturacion($cliente, $documento, $ncf, $tipo, $codigo, $qty , $precio, $itbis , $orden);

		

		redirect(base_url() . "index.php/facturacion/printFactura/$orden");

				
	}

	public function printFactura($orden){

		$this->load->model('facturacion_model');

		//$orden = $this->input->get("orden");
		require 'negocio.class.php';
		
		//$negocio = new Negocio();

		$data['negocio'] = new Negocio();
		$data['result1'] = $this->facturacion_model->printFacturaMaestra($orden);
		$data['result2'] = $this->facturacion_model->printFacturaDetalle($orden);

		$this->load->view('imprimir_factura', $data);


	}


	public function mostrarFactura($tipo){

		$this->load->model('facturacion_model');

		if($tipo == 'cotizacion'){

			$data['cotizacion'] = $this->facturacion_model->getFactura($tipo);
			$this->load->view('mostrar_cotizacion', $data);

		}else if($tipo == 'factura'){

			$data['factura'] = $this->facturacion_model->getFactura($tipo);
			$this->load->view('mostrar_factura', $data);

		}


	}


	public function convertirFactura($cotizacion, $estado){

		$this->load->model('facturacion_model');

		if($estado == 'NO_NCF'){

			$ncf = 'N/A';

		}
		else if($estado == 'SI_NCF'){

			$ncf = $this->facturacion_model->getCurrentNcf();
			$this->inactivarNcf($ncf, 'inactivo');

		}

		$this->facturacion_model->convertirFactura($cotizacion , $ncf);

		redirect(base_url() ."index.php/facturacion/printFactura/$cotizacion");

	}

	
	public function template(){
		$this->load->view('imprimir_factura');
	}

	public function getNcf(){

		$this->load->model('facturacion_model');

		var_dump($this->facturacion_model->getNcf());


	}


	public function processAgregarNcf(){

			$this->load->model('facturacion_model');

			$numero = $this->input->post("numero");
			//$descripcion = $this->input->post("descripcion");
			$descripcion = '';
			if($this->facturacion_model->agregarNcf($numero, $descripcion)){

							
				$this->session->set_flashdata('success', 'NCF Guardado Correctamente');
				redirect(base_url() ."index.php/facturacion/ncf");

			}else{

				$this->session->set_flashdata('error', 'Error Guardando el NCF, por favor trate nuevamente.');
				redirect(base_url() ."index.php/facturacion/ncf");

			}

			

	}

	public function ncf(){

		$this->load->model('facturacion_model');

		$data['ncf'] = $this->facturacion_model->getNcf();

		$this->load->view('form_agregar_ncf', $data);

	}

	public function setNcf($numero, $estado){

		//echo $numero . ' ---> ' . $estado;

		$this->load->model('facturacion_model');

		if($this->facturacion_model->setNcf($numero, $estado)){
				
			$this->session->set_flashdata('success', 'NCF Actualizado Correctamente');
			redirect(base_url() ."index.php/facturacion/ncf");

		}else{

			$this->session->set_flashdata('error', 'Error Actualizado el NCF, por favor trate nuevamente.');
			redirect(base_url() ."index.php/facturacion/ncf");

		}

	}

	public function inactivarNcf($numero, $estado){

		
		$this->load->model('facturacion_model');

		$this->facturacion_model->setNcf($numero, $estado);
		

	}

	public function editarNcf($id){

		$this->load->model('facturacion_model');

		$data['ncf'] = $this->facturacion_model->getNcf2($id);

		$this->load->view('form_editar_ncf', $data);


	}

	public function processEditarNcf(){

			$this->load->model('facturacion_model');

			$id = $this->input->post("id");
			$numero = $this->input->post("numero");
			$descripcion = $this->input->post("descripcion");
			$estado = $this->input->post("estado");

			if($this->facturacion_model->editarNcf($id, $numero, $descripcion, $estado)){

				$this->session->set_flashdata('success', 'NCF Actualizado Correctamente');

				redirect(base_url() ."index.php/facturacion/editarNcf/$id");

			}else{

				$this->session->set_flashdata('error', 'Error Actualizando el producto, por favor trate nuevamente.');

				redirect(base_url() ."index.php/facturacion/editarNcf/$id");


			}

		
	}

	public function test(){

		$this->load->model('facturacion_model');
		
		echo 'COUNT FACTURAS: ' . $this->facturacion_model->countFacturas();
		echo '<br />';
		echo 'MAXIMO FACTURAS: ' . $this->config->item('max_facturas');


	}


	

}

/* End of file facturacion.php */
/* Location: ./application/controllers/facturacion.php */
