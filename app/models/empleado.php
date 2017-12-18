<?php
	class empleado extends Model{
		protected $table_name = 'empleados';

		function activos(){
        	return $this->db->where('activo','1')->get($this->table_name);	
    	}

    	function join(){
    		return $this->db->query("SELECT CONCAT_WS(' ',e.nombre,e.appaterno,e.apmaterno) as nombre_completo,
    										e.fecnac,
    										d.descripcion,
    										e.sueldo,
    										e.clave_emp as id
    								FROM empleados AS e 
    								INNER JOIN departamentos AS d ON (e.departamento = d.puesto)
    								WHERE e.activo = '1'");
    	}

	}