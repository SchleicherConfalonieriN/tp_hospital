<?php

//modelo

class Usuario extends Model {
	
	private $tipo;
	private $nombre;
	private $apellido;
	
	
	public function datos($dni){
		
		$this->db->query("SELECT * from usuarios where dni =" . $dni);
		if (($this->db->numRows()!=1)) return false;
		$c = $this->db->fetch();
			
		return $c;
	}
	
	public function cargarDatos($dni){
		if (!ctype_digit($dni)) die("error");
		$this->db->query("SELECT * from usuarios where dni = " . $dni . " LIMIT 1");
		if (($this->db->numRows()!=1)) {
			$this->nombre="";
			$this->apellido="";
			return;
		}
		$c = $this->db->fetch();
		$this->nombre=$c['nombre'];
		$this->apellido=$c['apellido'];
	}
	
	/*public function tipoDeUsuario(){ REVISAR SI HACE FALTA ESTA FUNCION
		return $this->tipo;
	}*/ 
	
	public function UsuarioExistente($dni){
		if (!ctype_digit($dni)) die("error");
		$this->db->query("SELECT * from usuarios where dni = " . $dni);
		if (($this->db->numRows()!=0)) return true;
		return false;
	}
	
	public function NombreYApellido(){
		$string= $this->nombre ." ". $this->apellido;
		return $string;
	}
	
	public function DarDeAlta($dni,$nombre,$apellido,$contra,$mail,$tipo){
		if (!ctype_digit($dni)) die("error");
		$nombre=$this->db->escape($nombre);
		$apellido=$this->db->escape($apellido);
		$this->db->query("INSERT INTO usuarios (dni, nombre, apellido, contrasenia, tipo, mail) VALUES ('$dni', '$nombre', '$apellido', '$contra', $tipo , '$mail')");
	}

	public function verificacion_usuario($dni){

		$this->db->query("SELECT * from usuarios where dni = " . $dni . " LIMIT 1");
		$c = $this->db->fetch();
		

	}

}

