<?php
class Departamentos{
	
	function __construct(){
        require MODELS.'Departamento.php';
        $this->departamentos = new Departamento();
    }

    function index(){        
        $data = $this->departamentos->activos();
        return $data;
    }

}