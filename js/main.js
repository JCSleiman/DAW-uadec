function valida_alumno(){
	var js_mtr = document.getElementById("imatricula").value.trim();
	var js_nom = document.getElementById("inombre").value.trim();
	var js_corr = document.getElementById("icorreo").value.trim();
	var js_tel = document.getElementById("itelefono").value.trim();
	var js_gra = document.getElementById("igrado").selectedIndex;
	var js_cra = document.getElementById("icarrera").selectedIndex;
	var js_mat = document.getElementById("imaterias").selectedIndex;
	var js_est = document.getElementById("iestatus").selectedIndex;
	var auth = grecaptcha.getResponse();

	if (js_mtr.length == 0){
		alert("Error: Campo 'MATRICULA' no debe estar vacio");
		return false;
	}

	else if (js_nom.length == 0){
		alert("Error: Campo 'NOMBRE' no debe estar vacio");
		return false;
	}

	else if (js_corr.length == 0){
		alert("Error: Campo 'CORREO' no debe estar vacio");
		return false;
	}

	else if (js_tel.length == 0){
		alert("Error: Campo 'TELEFONO' no debe estar vacio");
		return false;
	}

	else if (js_gra == null || js_gra == 0){
		alert("Error: Campo 'GRADO' no debe estar vacio");
		return false;
	}

	else if (js_cra == null || js_cra == 0){
		alert("Error: Campo 'CARRERA' no debe estar vacio");
		return false;
	}

	else if (js_mat == null || js_mat == 0){
		alert("Error: Campo 'MATERIA' no debe estar vacio");
		return false;
	}

	else if (js_est == null || js_est == 0) {
		alert("Error: Campo 'ESTATUS' no debe estar vacio");
		return false;
	}

	else if (auth.length == 0){
		alert("Captcha no verificado.");
		return false;
	}

	if (validar_email(js_corr) == false){
		alert("Error: 'CORREO INVALIDO'");
		return false;
	}

	alert("Formulario Autorizado. :)");
	window.location.href = "testt_db.php";
}

function validar_mtr(evt){
	var ch = String.fromCharCode(evt.which);

	if(!(/[0-9]/.test(ch))){
		evt.preventDefault();
	}

}

function validar_email( email ) {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }