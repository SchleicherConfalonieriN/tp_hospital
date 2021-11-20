<?php





class Usuario extends Model {
	

	public function datos($dni){

		seguridad::dni_validacion($dni);
		
		$this->db->query("SELECT * from usuarios where dni =" . $dni);
		if (($this->db->numRows()!=1)) return false;
		$c = $this->db->fetch();
			
		return $c;
	}
	
	public function getDatos($dni){
		

		seguridad::dni_validacion($dni);

		$this->db->query("SELECT * from usuarios where dni = " . $dni . " LIMIT 1");
		return $this->db->fetch();
	}
	
	
	public function UsuarioExistente($dni){
		seguridad::dni_validacion($dni);
		$this->db->query("SELECT * from usuarios where dni = " . $dni);
		if (($this->db->numRows()!=0)) return true;
		return false;
	}
	
	public function NombreYApellido($dni){
		

		seguridad::dni_validacion($dni);

		$this->db->query("SELECT * from usuarios where dni = " . $dni . " LIMIT 1");
		$datos= $this->db->fetch();
		if(isset($datos)){
		$string=$datos['nombre'] ." ". $datos['apellido'];
		}
		else{
		$string = "No corresponde";
		}
		return $string;
	}
	
	public function DarDeAlta($dni,$nombre,$apellido,$contra,$mail,$tipo){
		seguridad::dni_validacion($dni);
		seguridad::nombre_validacion($nombre);
		seguridad::apellido_validacion($apellido);
		seguridad::email_validacion($mail);
		seguridad::tipo_validacion($tipo);

		$hashcontra=$s->hash_contra($contra);
		
		$nombre=$this->db->escape($nombre);
		$apellido=$this->db->escape($apellido);
		$this->db->query("INSERT INTO usuarios (dni, nombre, apellido, contrasenia, tipo, mail) VALUES ('$dni', '$nombre', '$apellido', '$hashcontra', $tipo , '$mail')");
	}

	public function verificacion_usuario($dni){
		seguridad::dni_validacion($dni);
		$this->db->query("SELECT * from usuarios where dni = " . $dni . " LIMIT 1");
		$c = $this->db->fetch();
	}
	
	public function buscarPorNombreApellido($texto){
		
		seguridad::descripcion_validacion($texto);
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

//Exceptions

