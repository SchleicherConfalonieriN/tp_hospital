<?php

//modelo

class Usuario extends Model {
	
	public function intentarLoguear($dni,$contrasenia){
		if (!ctype_digit($dni)) return false;
		$this->db->query("SELECT * from usuarios where dni =" . $dni);
		if (($this->db->numRows()!=1)) return false;
		$c = $this->db->fetch(); //Hay que hacer lo dde sha5 y validar la contraseña
		if(($c['contrasenia']=$contrasenia)) return true;
		return false;
	}
	
	public function tipoDeUsuario($dni){
		if (!ctype_digit($dni)) die("error");
		$this->db->query("SELECT tipo from usuarios where dni =" . $dni . " limit 1");
		$t = $this->db->fetch();
		return $t['tipo'];
	}
	
	public function UsuarioExistente($dni){
		if (!ctype_digit($dni)) die("error");
		$this->db->query("SELECT * from usuarios where dni = " . $dni);
		if (($this->db->numRows()!=0)) return true;
		return false;
	}
	
	public function NombreYApellido($dni){
		if (!ctype_digit($dni)) die("error");
		$this->db->query("SELECT * from usuarios where dni = " . $dni . " LIMIT 1");
		$datos= $this->db->fetch();
		$string= $datos['nombre'] ." ". $datos['apellido'];
		return $string;
	}
	
	public function DarDeAlta($dni,$nombre,$apellido,$contra,$mail){
		if (!ctype_digit($dni)) die("error");
		$nombre=$this->db->escape($nombre);
		$apellido=$this->db->escape($apellido);
		$this->db->query("INSERT INTO usuarios (dni, nombre, apellido, contrasenia, tipo, mail) VALUES ('$dni', '$nombre', '$apellido', '$contra', 1 , '$mail')");
	}
	
	public function getDatos($dni){
		if (!ctype_digit($dni)) die("error");
		$this->db->query("SELECT * from usuarios where dni = " . $dni . " LIMIT 1");
		return $this->db->fetch();
	}
}

