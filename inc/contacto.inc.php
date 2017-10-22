<?php



class Contacto{
	
	private $idContacto;
	private $nombre;
	private $apellido1;
	private $apellido2;
	private $telefono;

	public function __construct($idContacto, $nombre, $apellido1, $apellido2, $telefono){

		$this->idContacto = $idContacto;
		$this->nombre = $nombre;
		$this->apellido1 = $apellido1;				
		$this->apellido2 = $apellido2;
		$this->telefono = $telefono;

	}


	// set y get para los atributos
	public function __set($atributo, $valor){

		$this->$atributo = $valor;

	}

	public function __get($atributo){

		return $this->$atributo;
	}

	public function __toString(){

		return $this->idContacto .' - '. $this->nombre .' - '. $this->apellido1 .' - '. $this->apellido2 .' - '. $this->telefono;
	}




}





?>