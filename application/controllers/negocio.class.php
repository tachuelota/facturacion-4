<?php

class Negocio{

	private $nombre;
	private $rnc;
	private $direccion;
	private $telefono;
	private $itbis;
	private $moneda;
	private $nota;
	private $nota2;

	public function __construct(){

		$host = 'localhost';
		$user = 'root';
		$password = 'root';
		$db_name = 'facturacion';

		$conn =  mysqli_connect($host, $user, $password) or die('[ERROR]: ' . mysql_error());
		mysqli_select_db($conn, $db_name);


		$queryn = "SELECT * FROM negocio_settings";
		$result = mysqli_query($conn, $queryn);

		while($negocio = mysqli_fetch_array($result)){

			$this->nombre = $negocio["nombre"];
			$this->rnc = $negocio["rnc"];
			$this->direccion = $negocio["direccion"];
			$this->telefono = $negocio["telefono1"];
			$this->itbis = $negocio["itbis"];
			$this->moneda = $negocio["moneda"];
			$this->nota = $negocio["nota_factura"];
			$this->nota2 = $negocio["nota_factura2"];

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


}

//Enf of php file




