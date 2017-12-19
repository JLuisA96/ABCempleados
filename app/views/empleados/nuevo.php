<?php include VIEWS."/header.php"; ?>
	<style>
    body{
        background-color: #3f423f; 
        color: #fff;
    }      
        input {
            border: 1px solid lightgray;
            border-radius: 5px;
            padding: 7px;
            width: 95%;
            display: block;
        }       
        button {
            float: right;
            margin-left: 10px;
            margin-top: 15px;
        }
        button:hover{
            background: red;
            color: #fff;
        }
        fieldset{
            border: 3px solid #000;
        }
        legend{
            font-weight: bold;
        }
        input{
            border: 2px solid #000;
        }
    table {font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif; font-size: 15px; width: 480px; text-align: center;   border-collapse: collapse; cursor: pointer; margin-left: 400px; display: block; margin-top: -190px; }

th {     font-size: 18px;     font-weight: normal;     padding: 8px;     background: #4c505d;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #fff; }

td {padding: 8px; background: #e8edff; border-bottom: 1px solid 
    #fff; color: #669; border-top: 1px solid transparent; font-weight: bold; }

tr:hover td { background: #d0dafd; color: #339; }
		form{
			width: 250px;
		}
		form *{
			width: 100%;display: block;box-sizing: border-box;
		}

	</style>
    <?php if (count($error)){ ?>
            <div class="errors">
                <ul>
                    <?php foreach($error as $f => $v){ ?>
                        <li>El campo '<?=$f?>' es requerido</li>
                    <?} ?>
                </ul>
            </div>
        <? }?>
    <form action="" method="post">
    	
    	<div class="field">
    		<label for="txt_nombre">Nombre</label>
    		<input value="<?php if (isset($_GET['id']))
                        echo $datos_departamentos->nombre;
                    ?>" type="text" name="nombre" id="txt_nombre" >
    	</div>

        <div class="field">
            <label for="txt_appaterno">Apellido Paterno</label>
            <input value="<?php if (isset($_GET['id']))
                        echo $datos_departamentos->appaterno;
                    ?>" type="text" name="appaterno" id="txt_appaterno" >
        </div>

        <div class="field">
            <label for="txt_apmaterno">Apellido Materno</label>
            <input value="<?php if (isset($_GET['id']))
                        echo $datos_departamentos->apmaterno;
                    ?>" type="text" name="apmaterno" id="txt_apmaterno" >
        </div>

        <div class="field">
            <label for="txt_fecnac">Fecha de Nacimiento</label>
            <input value="<?php if (isset($_GET['id']))
                        echo $datos_departamentos->fecnac;
                    ?>" type="date" name="fecnac" id="txt_fecnac" >
        </div>

    	<div class="field">
    		<label for="txt_departamento">Departamento</label>
    		<select name="departamento" id="txt_departamento" >
    			<option value="">Seleccione</option>
    			<?php while($row = $datos_departamentos->fetch_object()){?>
    				<?php if ($row->puesto == $datos_departamentos->departamento){?>
                        <option <?= 'selected';?> value=<?= $row->puesto?>><?= $row->descripcion?></option>
                    <?}else{?>
                        <option value=<?= $row->puesto?>><?= $row->descripcion?></option>
                    <?}?>
    			<?}?>
    		</select>
    	</div>

    	<div class="field">
    		<label for="txt_precio">Sueldo</label>
    		<input type="text" name="sueldo" id="txt_sueldo" value="<?php if (isset($_GET['id']))
                        echo $datos_departamentos->sueldo;
                    ?>">
    	</div>
    	
        <button>Guardar</button>

    </form>

<?php include VIEWS."/footer.php"; ?>