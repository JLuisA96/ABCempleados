<?php include VIEWS."/header.php"; ?>


    <?php if (count($error)){ ?>
            <div class="errors">
                <ul>
                    <?php foreach($error as $f => $v){ ?>
                        <li>El campo '<?=$f?>' es requerido</li>
                    <?php } ?>
                </ul>
            </div>
        <?php }?>
    <form action="" method="post" id="forma" >
        
        <div class="field">
            <label for="txt_nombre">Nombre</label>
            <input value="<?php if (isset($_GET['id']))
                        echo $datos_empleado->nombre;
                    ?>" type="text" name="nombre" id="txt_nombre" for="Nombre" >
        </div>

        <div class="field">
            <label for="txt_appaterno">Apellido Paterno</label>
            <input value="<?php if (isset($_GET['id'])) echo $datos_empleado->appaterno; ?>" type="text" name="appaterno" id="txt_appaterno" >
        </div>

        <div class="field">
            <label for="txt_apmaterno">Apellido Materno</label>
            <input value="<?php if (isset($_GET['id'])) echo $datos_empleado->apmaterno; ?>" type="text" name="apmaterno" id="txt_apmaterno" >
        </div>

        <div class="field">
            <label for="txt_fecnac">Fecha de Nacimiento</label>
            <input value="<?php if (isset($_GET['id'])) echo date('Y-m-d',strtotime($datos_empleado->fecnac)); ?>" type="date" name="fecnac" id="txt_fecnac" >
        </div>

        <div class="field">
            <label for="txt_departamento">Departamento</label>
            <select name="departamento" id="txt_departamento" >
                <option value="">Seleccione</option>
                <?php while($row = $datos_departamentos->fetch_object()){?>
                    <?php if ($row->puesto == $datos_empleado->departamento){?>
                        <option <?= 'selected';?> value=<?= $row->puesto?>><?= $row->descripcion?></option>
                    <?php }else{?>
                        <option value=<?= $row->puesto?>><?= $row->descripcion?></option>
                    <?php }?>
                <?php }?>
            </select>
        </div>

        <div class="field">
            <label for="txt_precio">Sueldo</label>
            <input type="text" name="sueldo" id="txt_sueldo" value="<?php if (isset($_GET['id']))
                        echo $datos_empleado->sueldo;
                    ?>" onkeyPress="return soloNumeros(event, this);">
        </div>
        
        <button class="boton_azul" onclick="return OnSubmit();">Guardar</button>

    </form>
    <a class="boton_azul" href="<?= BASE_URL?>">Ver Listado</a>

<?php include VIEWS."/footer.php"; ?>