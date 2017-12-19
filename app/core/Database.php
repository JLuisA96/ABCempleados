<?php
class Database{
    private $db;
    private $select = "*";
    private $joins = [];
    private $wheres = [];
    private $havings = [];
    private $orderby = '';
    private $groupby = '';
    private $limitr = "0";
    private $offsetr = 0;
    
    function __construct(){
        $this->db = new mysqli("localhost","abc","[r5PwW#-42Ov.qXju6}AVc],?klz3!Lt","proyecto_empleados");
        if($this->db->connect_errno)
                die("Error al conectar a la base de datos");
    }
    #ACTIVE RECORD
    function where($field,$val=''){
        if ($val != "")
            $this->wheres[] = "$field = '$val'";
        else
            $this->wheres[] = $field;
        return $this;
    }
    function having($field,$val=""){
        if ($val != "")
            $this->havings[] = "$field = '$val'";
        else
            $this->havings[] = $field;
        return $this;
    }
    function limit($limit,$offset = ''){
        $this->limitr = $limit;
        $this->offsetr = ($offsetr!="")?offsetr:0;
        return $this;
    }
    function query($sql){
        $result = $this->db->query($sql);    
        if($this->db->errno)
            die("Error en la consulta: ".$sql." - ".$this->db->error);
        return $result;
    }
    
    function insert($table,$data){
        $query = "INSERT INTO ".$table."(";
        foreach($data as $i => $value){
            $query.= $i.",";
        }
        $query = substr($query, 0, -1);
        $query.=") VALUES(";
        
        foreach($data as $i => $value){
            $query.= "'".$value."',";
        }
        $query = substr($query, 0, -1);
        $query.=");";
        return $this->query($query);
    }
    
    function update($table,$data,$campo_id,$condicion){
        $query = "UPDATE $table ";
        $query.= "SET ";
        foreach($data as $columna => $value){
            $query.= $columna." = '".$value."',";
        }
        $query = substr($query, 0, -1);
        /*print_r($this->wheres);
        if (count($this->wheres)) 
            $query.= "WHERE ".implode(',', $this->wheres).' ';
        else
            die("REQUIERE AL MENOS UNA CONDICION!");*/
        $query.= ' WHERE ' . $campo_id . ' = ' .$condicion;
        return $this->query($query);
    }
    
    function get($table){//SELECT
        $query = "SELECT ";
        $query .= "* ";
        $query .= "FROM ";
        $query .= $table.' ';
        if (count($this->wheres)){
            $query.= "WHERE ".implode(',', $this->wheres).' ';
        }

        return $this->query($query);
    }
    
    function find($table,$table_id,$id){//SELECT by id
        $query = "SELECT * FROM $table WHERE $table_id ='".$id."'";
        return $this->query($query);
    }
}
   
$db = new Database();