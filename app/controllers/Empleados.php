<?php
class Empleados{

	function __construct(){
        require CONTROLLERS . 'Departamentos.php';
        require MODELS . 'empleado.php';

        $this->empleado 	= new empleado();
        $this->departamentos = new Departamentos();
    }

	function forma(){  //nuevo y modificacion 
        $error = [];   
        $datas = [];

        if(!empty($_POST)){
            
            $datas['nombre'] = isset($_POST['nombre'])?trim($_POST['nombre']):FALSE;
            if(!$datas['nombre']){
                $error['nombre'] = 1;
            }
            $datas['appaterno'] = isset($_POST['appaterno'])?trim($_POST['appaterno']):FALSE;
            if(!$datas['appaterno']){
                $error['appaterno'] = 1;
            }

            $datas['apmaterno'] = isset($_POST['apmaterno'])?trim($_POST['apmaterno']):FALSE;
            if(!$datas['apmaterno']){
                $error['apmaterno'] = 1;
            }

            $datas['fecnac'] = isset($_POST['fecnac'])?trim($_POST['fecnac']):FALSE;
            if(!$datas['fecnac']){
                $error['fecnac'] = 1;
            }

            $datas['departamento'] = isset($_POST['departamento'])?trim($_POST['departamento']):FALSE;
            if(!$datas['departamento']){
                $error['departamento'] = 1;
            }

            $datas['sueldo'] = isset($_POST['sueldo'])?trim($_POST['sueldo']):FALSE;
            if(!$datas['sueldo']){
                $error['sueldo'] = 1;
            }

            if (count($error)==0){
                
                if(isset($_GET['id'])){
                        
                    $registros = $this->empleado->update($datas,'clave_emp',$_GET['id']);
                    
                }else{

                    $this->empleado->insert($datas);
                	header("Location: ".BASE_URL);
                    
                }
            }        
        }

        if(isset($_GET['id'])){
            $datos_empleado = $this->empleado->find($_GET['id']);
            $datos_empleado = $datos_empleado->fetch_object();
        }
        
        $datos_departamentos 	= $this->departamentos->index();
        
        include VIEWS.'empleados/forma.php';
	}

	function listado(){
		$rows = $this->empleado->join();
		include VIEWS.'empleados/listado.php';
	}

	function eliminar(){
		$arreglo = array("activo"=>'0');
        $this->empleado->update($arreglo,'clave_emp',$_GET['id']);
		header('Location: '.BASE_URL);
	}
}