<?php

require_once  '../backend/config/db.php';

class Negocio{

	private $nombre;
	private $rnc;
	private $direccion;
	private $telefono;
	private $itbis;
	private $moneda;
	private $nota;
	private $nota2;

	private $showfax;
	private $showwhatsapp;
	private $showemail;
	private $showheader;
	private $showfooter;

	public function __construct(){

		$queryn = "SELECT * FROM negocio_settings";
		$result = mysql_query($queryn);

		while($negocio = mysql_fetch_array($result)){

			$this->nombre = $negocio["nombre"];
			$this->rnc = $negocio["rnc"];
			$this->direccion = $negocio["direccion"];
			$this->telefono = $negocio["telefono1"];
			$this->itbis = $negocio["itbis"];
			$this->moneda = $negocio["moneda"];
			$this->nota = $negocio["nota_factura"];
			$this->nota2 = $negocio["nota_factura2"];
			$this->fax = $negocio["fax"];
			$this->whatsapp = $negocio["whatsapp"];
			$this->email = $negocio["email"];

			$this->showfax = $negocio["showFax"];
			$this->showwhatsapp = $negocio["showWhatsapp"];
			$this->showemail = $negocio["showEmail"];
			$this->showheader = $negocio["showHeader"];
			$this->showfooter = $negocio["showFooter"];


		}

	}

	public function getNombre(){
		return $this->nombre;
	}

	public function  getRnc(){
		return $this->rnc;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function getItbis(){
		return $this->itbis;
	}


	public function getMoneda(){
		return $this->moneda;
	}

	public function getNota(){
		return $this->nota;
	}

	public function getNota2(){
		return $this->nota2;
	}


	public function getFax(){
		return $this->fax;
	}

	
	public function getWhatsapp(){
		return $this->whatsapp;
	}

	public function getEmail(){
		return $this->email;
	}


	public function getShowFax(){
		return $this->showfax;
	}


	public function getShowWhatsapp(){
		return $this->showwhatsapp;
	}


	public function getShowEmail(){
		return $this->showemail;
	}


	public function getShowHeader(){
		return $this->showheader;
	}


	public function getShowFooter(){
		return $this->showfooter;
	}


}

//Enf of php file




