<?php
	class departamento extends Model{
		protected $table_name = 'departamentos';

		function activos(){
			return $this->db->where('activo','1')->get($this->table_name);
    	}
	}