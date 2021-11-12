<?php



//modelo

class Usuario extends Model {
	

	public function datos($dni,$s){

		$s->dni_validacion($dni);
		
		$this->db->query("SELECT * from usuarios where dni =" . $dni);
		if (($this->db->numRows()!=1)) return false;
		$c = $this->db->fetch();
			
		return $c;
	}
	
	public function getDatos($dni){
		if (!ctype_digit($dni)) die("error");
		$this->db->query("SELECT * from usuarios where dni = " . $dni . " LIMIT 1");
		return $this->db->fetch();
	}
	
	
	public function UsuarioExistente($dni,$s){
		$s->dni_validacion($dni);
		$this->db->query("SELECT * from usuarios where dni = " . $dni);
		if (($this->db->numRows()!=0)) return true;
		return false;
	}
	
	public function NombreYApellido($dni,$s){
		
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
	
	public function DarDeAlta($dni,$nombre,$apellido,$contra,$mail,$tipo,$s){
		$s->dni_validacion($dni);
		$s->nombre_validacion($nombre);
		$s->apellido_validacion($apellido);
		$s->email_validacion($mail);
		//$s->tipo_validacion($tipo);

		$hashcontra=$s->hash_contra($contra);
		
		$nombre=$this->db->escape($nombre);
		$apellido=$this->db->escape($apellido);
		$this->db->query("INSERT INTO usuarios (dni, nombre, apellido, contrasenia, tipo, mail) VALUES ('$dni', '$nombre', '$apellido', '$hashcontra', $tipo , '$mail')");
	}

	public function verificacion_usuario($dni,$s){
		$s->dni_validacion($dni);
		$this->db->query("SELECT * from usuarios where dni = " . $dni . " LIMIT 1");
		$c = $this->db->fetch();
	}
	
	public function buscarPorNombreApellido($texto){
		//validarrr
		$this->db->query("SELECT * from usuarios where nombre like '%" . $texto . "%' or apellido like '%" . $texto . "%'");
		return $this->db->fetchAll();
	}

	public function cambiar_contraseña($dni,$contra,$s){

		$s->dni_validacion($dni);
		$s->contra_validacion($contra);
		$hashcontra=$s->hash_contra($contra);
	
		$this->db->query("UPDATE usuarios SET contrasenia  = '$hashcontra' where dni = $dni");
	}
}

