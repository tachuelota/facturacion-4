<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Negocio extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');

	}

	public function index()
	{
		 $this->load->model('facturacion_model');

		$data['negocio'] = $this->facturacion_model->getNegocio();
		
		$this->load->view('negocio_settings', $data);
	}

	

	public function processNegocio(){

		   $this->load->model('facturacion_model');

			
			$nombre = $this->input->post("nombre");
			$rnc = $this->input->post("rnc");
			$direccion = $this->input->post("direccion");
			$telefono1 = $this->input->post("telefono1");
			$fax = $this->input->post("fax");
			$whatsapp = $this->input->post("whatsapp");
			$email = $this->input->post("email");
			$itbis = $this->input->post("itbis");
			$moneda = $this->input->post("moneda");
			$nota = $this->input->post("nota");
			$nota2 = $this->input->post("nota2");

			$showFax = $_POST["showFax"];
			$showWhatsapp = $_POST["showWhatsapp"];
			$showEmail = $_POST["showEmail"];
			$showHeader = $_POST["showHeader"];
			$showFooter = $_POST["showFooter"];

			if(isset($showFax )){

				$showFax = '1';

			}else{

				$showFax = '0';

			}


			if(isset($showWhatsapp)){

				$showWhatsapp = '1';

			}else{

				$showWhatsapp = '0';

			}

			if(isset($showEmail)){

				$showEmail = '1';

			}else{

				$showEmail = '0';

			}

			if(isset($showHeader)){

				$showHeader = '1';

			}else{

				$showHeader = '0';

			}

			if(isset($showFooter)){

				$showFooter = '1';

			}else{

				$showFooter = '0';

			}


			if($this->facturacion_model->editarNegocio($nombre, $rnc, $direccion, $telefono1,
			 	$fax, $whatsapp, $email,
				$itbis, $moneda, $nota, $nota2, $showFax, $showWhatsapp, 
				$showEmail, $showHeader, $showFooter)){

				$this->session->set_flashdata('success', 'Datos Actualizados Correctamente');

				redirect(base_url() ."index.php/negocio/");

			}
			else{

				$this->session->set_flashdata('error', 'Error Actualizando la informacion, por favor trate nuevamente.');

				redirect(base_url() ."index.php/negocio/");

			}

			

	}

	

	
}

/* End of file inventario.php */
/* Location: ./application/controllers/inventario.php */
