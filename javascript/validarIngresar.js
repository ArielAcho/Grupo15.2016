function validarIngresar(){
	if (document.sesion.email.value.length==0){
		window.alert("tiene que escribir su email");
		document.sesion.usuario.focus();
		return false;
	}
    else if (document.sesion.email.value.indexOf('@') == -1){
		window.alert("el e-mail debe contener un @");
		document.sesion.email.focus();
		return false;
	}
    else if(document.sesion.email.value.indexOf('.') == -1){
        window.alert("El e-mail debe contener un .");
        document.sesion.email.focus();
        return false;
    }
	else if (document.sesion.email.value.indexOf('@') == -1){
		window.alert("debe ingresar un email valido");
		document.sesion.email.focus();
		return false;
	}
	else if (document.sesion.password.value.length==0){
		window.alert("tiene que escribir su contraseña");
		document.sesion.password.focus();
		return false;
	}
	document.sesion.submit();
	return true;
}