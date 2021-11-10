<?php



//modelo

class Usuario extends Model {
	
	private $tipo;
	private $nombre;
	private $apellido;
	


	public function datos($dni,$s){

		$s->dni_validacion($dni);
		
		$this->db->query("SELECT * from usuarios where dni =" . $dni);
		if (($this->db->numRows()!=1)) return false;
		$c = $this->db->fetch();
			
		return $c;
	}
	

	// REVISAR SI ESTA FUNCION HACE FALTA
	public function cargarDatos($dni){

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
	
	public function UsuarioExistente($dni,$s){

		$s->dni_validacion($dni);
		$this->db->query("SELECT * from usuarios where dni = " . $dni);
		if (($this->db->numRows()!=0)) return true;
		return false;
	}
	
	public function NombreYApellido(){
		$string= $this->nombre ." ". $this->apellido;
		return $string;
	}
	
	public function DarDeAlta($dni,$nombre,$apellido,$contra,$mail,$tipo,$s){

		$s->dni_validacion($dni);
		$s->nombre_validacion($nombre);
		$s->apellido_validacion($apellido);
		$s->email_validacion($mail);
		$s->especialidad_validacion($especialidad);
		$s->tipo_validacion($tipo);


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

	public function cambiar_contraseña($dni,$contra,$s){

		$s->dni_validacion($dni);
		$s->contra_validacion($contra);
		$hashcontra=$s->hash_contra($contra);
	
		$this->db->query("UPDATE usuarios SET contrasenia  = '$hashcontra' where dni = $dni");
	}
}

