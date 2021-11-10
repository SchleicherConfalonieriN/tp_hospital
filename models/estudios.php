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
	
	
	public function DarDeAlta($indentificador,$nombre,$descripcion,$precio,$s){

		$s->nombre_validacion($nombre);
		$s->dni_validacion($identificador);
		$this->db->query("INSERT INTO estudios (Identificador,Nombre, Descripcion, Precio) VALUES ('$Identificador,$nombre', '$descripcion', '$precio')");
	}



	public function Eliminar($Identificador,$s){
		$s->dni_validacion($identificador);
		$this->db->query("delete from estudios where Identificador='$Identificador'");
	}


}// FIN DE CLASE
 ?>