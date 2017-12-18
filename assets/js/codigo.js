function number_format(amount, decimals) {

    amount += '';
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); 

    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}

function OnSubmit(){
	var status = verificarCampos();
	var guardar = false;

	if(status == true){
		var res = confirm("¿Estás seguro de guardar?");

		if(res)
			guardar = true;
		else
			guardar = false;
	}else{
		guardar = false;
	}

	return guardar;
}

function verificarCampos(){
	var campos = ['txt_nombre','txt_appaterno','txt_apmaterno','txt_fecnac','txt_departamento','txt_sueldo'];
	var campos_nombre = ['Nombre','Apellido paterno','Apellido materno','Fecha de nacimiento','Departamento','Sueldo'];
	var bandera = true;

	for (var i = 0; i < campos.length; i++) {
		if (document.getElementById(campos[i]).value.length == 0) {
			alert("Debe de completar el campo " + campos_nombre[i]);
            bandera = false;
            break;
		}
	}
	return bandera;
}

function soloNumeros(evt, element){
    var e = element;
    var charCode = (evt.which) ? evt.which : event.keyCode;
            
    if (charCode > 31 && (charCode < 48 || charCode > 57 ) && charCode != 46){
        
        return false;
    }else{
        if(charCode == 46){
            if(e.value.indexOf(".") > -1){
                return false;
            }
        }
        
        return true;
    }

}
