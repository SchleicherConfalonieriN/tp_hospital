<?php

//modelo
require_once '../class_helper/seguridad.php';

class Usuario extends Model {
	
	public function intentarLoguear($dni,$contrasenia){

		seguridad::dni_validacion($dni);
		

		$this->db->query("SELECT * from usuarios where dni = " . $dni . " limit 1");
		if (($this->db->numRows()!=1)) return false;
		$c = $this->db->fetch();
		$hashcontra=seguridad::hash_contra($contrasenia);
		if (password_verify($contrasenia, $c['contrasenia'])) {return true;}
		return false;
	}
	
	public function tipoDeUsuario($dni){	
		seguridad::dni_validacion($dni);
		$this->db->query("SELECT tipo from usuarios where dni =" . $dni . " limit 1");
		if (($this->db->numRows()==0)) throw new ValidationException("Dni invalido");
		$t = $this->db->fetch();
		return $t['tipo'];
	}
	
	public function usuarioExistente($dni){		
		seguridad::dni_validacion($dni);
		$this->db->query("SELECT * from usuarios where dni = " . $dni);
		if (($this->db->numRows()!=0)) return true;
		return false;
	}
	
	public function darDeAlta($dni,$nombre,$apellido,$contra,$mail,$tipo){		
		seguridad::dni_validacion($dni);
		seguridad::nombre_validacion($nombre);
		seguridad::nombre_validacion($apellido);
		seguridad::email_validacion($mail);
		if (($tipo!=1) and ($tipo!=2)) throw new ValidationException('Tipo de usuario inválido');
		$hashcontra=seguridad::hash_contra($contra);		
		$nombre=$this->db->escape($nombre);
		$apellido=$this->db->escape($apellido);
		$mail=$this->db->escape($mail);
		$this->db->query("INSERT INTO usuarios (dni, nombre, apellido, contrasenia, tipo, mail) VALUES ('$dni', '$nombre', '$apellido', '$hashcontra', $tipo , '$mail')");
	}
		
	public function getDatos($dni){		
		seguridad::dni_validacion($dni);
		$this->db->query("SELECT * from usuarios where dni = " . $dni . " LIMIT 1");
		if (($this->db->numRows()==0)) throw new ValidationException("Dni invalido"); 
		return $this->db->fetch();
	}
	
	public function nombreYApellido($dni){		
		seguridad::dni_validacion($dni);
		$this->db->query("SELECT * from usuarios where dni = " . $dni . " LIMIT 1");
		$datos= $this->db->fetch();
		if (($this->db->numRows()==0)) throw new ValidationException("Dni invalido"); 
		$string= $datos['nombre'] ." ". $datos['apellido'];
		return $string;
	}
	
	public function buscarPorNombreApellido($texto){
		$texto=$this->db->escape($texto);
		$texto=$this->db->escapeWildcards($texto);
		$this->db->query("SELECT * from usuarios where nombre like '%" . $texto . "%' or apellido like '%" . $texto . "%'");
		return $this->db->fetchAll();
	}

	public function cambiar_contraseña($dni,$contra){
		seguridad::dni_validacion($dni);
		seguridad::contra_validacion($contra);
		$hashcontra=seguridad::hash_contra($contra);	
		$this->db->query("UPDATE usuarios SET contrasenia  = '$hashcontra' where dni = $dni");
	}
}

