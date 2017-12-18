<?php
class Model{
    protected $table_id = 'clave_emp';
    protected $table_name = 'empleados';
    protected $db;
    function __construct(){
        $this->db = new Database();
        if(empty($this->table_name))
            $this->table_name = strtolower(get_class($this)).'s';
    }
    
    function insert($data){
        $data = $this->db->insert($this->table_name,$data);
        return $data;
    }
    
    function update($data,$campo_id,$condicion){           
        $data = $this->db->update($this->table_name,$data,$campo_id,$condicion);
        return $data; 
    }
    
    function get(){
        
        $data = $this->db->get($this->table_name);
        return $data;
        
    }
    
    function find($id){
        
        $data = $this->db->find(
            $this->table_name,
            $this->table_id,
            $id);
        
        return $data;
    }
}