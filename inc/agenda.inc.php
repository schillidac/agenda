<?php

require_once('inc/contacto.inc.php');

class Agenda{

	public static $contactos;


	public function crearContacto($idContacto, $nombre, $apellido1, $apellido2, $telefono){

		self::$contactos[] = new Contacto($idContacto, $nombre, $apellido1, $apellido2, $telefono);

	}


	public function eliminarContactos($id){

		unset(self::$contactos[$id]);

		self::$contactos = array_values(self::$contactos);

		/*
			eliminar contacto con get

			foreach($this->contactos as $contacto){
				
				if($contacto->idContacto == $id){
	
					unset(self::$contactos);
				}

			}


		*/

	}


	public function __toString(){

		$agenda = '';

		foreach(self::$contactos as $indice => $contacto){

			$agenda .= $indice .' '. $contacto . '<br>';

		}

		return $agenda;

	}


}


?>