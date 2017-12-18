<? include VIEWS.'/header.php';?>

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

		    	<?while($datos = $rows->fetch_object()){?>
			    	<tr>
			            <td><?= $datos->nombre_completo ?></td>
			            <td><?= date('d-m-Y',strtotime($datos->fecnac))?></td>
			            <td><?= $datos->descripcion ?></td>
			            <td>$<?= number_format($datos->sueldo,2); ?></td>
			            <td>
			            	<a class="boton_modificar" href="<?= BASE_URL.'index.php/empleados/forma?id='.$datos->id?>">Modificar</a> 
			            	<a class="boton_eliminar" onclick="return confirm('¿Estás seguro de eliminar?')" href="<?= BASE_URL.'index.php/empleados/eliminar?id='.$datos->id?>">Eliminar</a>
			            </td>
			                
			        </tr>
		        <?}?>

	    </tbody>
	</table>
	
<? include VIEWS.'footer.php';?>