<? include VIEWS."/header.php"; ?>


    <? if (count($error)){ ?>
            <div class="errors">
                <ul>
                    <?foreach($error as $f => $v){ ?>
                        <li>El campo '<?=$f?>' es requerido</li>
                    <?} ?>
                </ul>
            </div>
        <? }?>
    <form action="" method="post" id="forma" >
    	
    	<div class="field">
    		<label for="txt_nombre">Nombre</label>
    		<input value="<? if (isset($_GET['id']))
                        echo $datos_empleado->nombre;
                    ?>" type="text" name="nombre" id="txt_nombre" for="Nombre" >
    	</div>

        <div class="field">
            <label for="txt_appaterno">Apellido Paterno</label>
            <input value="<? if (isset($_GET['id']))
                        echo $datos_empleado->appaterno;
                    ?>" type="text" name="appaterno" id="txt_appaterno" >
        </div>

        <div class="field">
            <label for="txt_apmaterno">Apellido Materno</label>
            <input value="<? if (isset($_GET['id']))
                        echo $datos_empleado->apmaterno;
                    ?>" type="text" name="apmaterno" id="txt_apmaterno" >
        </div>

        <div class="field">
            <label for="txt_fecnac">Fecha de Nacimiento</label>
            <input value="<? if (isset($_GET['id']))
                        echo date('Y-m-d',strtotime($datos_empleado->fecnac));
                    ?>" type="date" name="fecnac" id="txt_fecnac" >
        </div>

    	<div class="field">
    		<label for="txt_departamento">Departamento</label>
    		<select name="departamento" id="txt_departamento" >
    			<option value="">Seleccione</option>
    			<?while($row = $datos_departamentos->fetch_object()){?>
    				<?if ($row->puesto == $datos_empleado->departamento){?>
                        <option <?= 'selected';?> value=<?= $row->puesto?>><?= $row->descripcion?></option>
                    <?}else{?>
                        <option value=<?= $row->puesto?>><?= $row->descripcion?></option>
                    <?}?>
    			<?}?>
    		</select>
    	</div>

    	<div class="field">
    		<label for="txt_precio">Sueldo</label>
    		<input type="text" name="sueldo" id="txt_sueldo" value="<? if (isset($_GET['id']))
                        echo number_format($datos_empleado->sueldo,2);
                    ?>" onkeyPress="return soloNumeros(event, this);">
    	</div>
    	
        <button class="boton_azul" onclick="return OnSubmit();">Guardar</button>

    </form>
    <a class="boton_azul" href="<?= BASE_URL?>">Ver Listado</a>

<? include VIEWS."/footer.php"; ?>