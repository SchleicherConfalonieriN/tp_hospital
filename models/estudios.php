<<?php 



class estudios extends Model{


public function getTodos(){

			$this->db->query("SELECT * from estudios");
		return $this->db->fetchAll();

	}
public function UsuarioExistente($dni,$s){

		$s->dni_validacion($dni);
		$this->db->query("SELECT * from usuarios where dni = " . $dni);
		if (($this->db->numRows()!=0)) return true;
		return false;
	}
	
	
	public function DarDeAlta($nombre,$descripcion,$precio){

		$this->db->query("INSERT INTO estudios (Nombre, Descripcion, Precio) VALUES ('$nombre', '$descripcion', '$precio')");
	}



	public function Eliminar($nombre){

		$this->db->query("delete from estudios where nombre='$nombre'");
	}


}// FIN DE CLASE
 ?>