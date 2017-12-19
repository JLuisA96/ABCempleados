<?php include VIEWS.'/header.php';?>

	<a class="boton_azul" href="<?= BASE_URL.'index.php/empleados/forma'?>">Nuevo</a>
	<table>
	    <thead>
	        <tr>
	            <th>Nombre Completo</th>
	            <th>Fecha Nacimiento</th>
	            <th>Departamento</th>
	            <th>Sueldo</th>
	            <th COLSPAN="2">Acción</th>
	        </tr>
	    </thead>
	    <tbody>

		    	<?php while($datos = $rows->fetch_object()){ ?>
			    	<tr>
			            <td><?php echo $datos->nombre_completo; ?></td>
			            <td><?php echo date('d-m-Y',strtotime($datos->fecnac)); ?></td>
			            <td><?php echo $datos->descripcion; ?></td>
			            <td>$ <?php echo $datos->sueldo ?></td>
			            <td>
			            	<a class="boton_modificar" href="<?= BASE_URL.'index.php/empleados/forma?id='.$datos->id?>">Modificar</a> 
			            	<a class="boton_eliminar" onclick="return confirm('¿Estás seguro de eliminar?')" href="<?= BASE_URL.'index.php/empleados/eliminar?id='.$datos->id?>">Eliminar</a>
			            </td>
			                
			        </tr>
		        <?php } ?>

	    </tbody>
	</table>
	
<?php include VIEWS.'footer.php'; ?>