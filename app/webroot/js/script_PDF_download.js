$(function() {
	$("#submit_btn").click(function() {

		// validate and process form here -> no me calienta tu validacion, solo voy a copiar lo que me sirve
		if ($("#MainForm").valid()) {
			
			if($("input#email").val() != $("input#email_verificacion").val()){
				alert("El email de verificación no coincide.");
				return true;
			}
			
			$("#leyenda_enviando").css("display", "");
			var name = $("input#nombre").val();
			var email = $("input#email").val();
			var apellido = $("input#apellido").val();
			var empresa = $("input#empresa").val();
			var direccion = $("input#direccion").val();
			var ciudad = $("input#departamento").val();
			var telefono = $("input#telefono").val();
			var comentario = $("textarea#comentario").val();
			
			
			var dataString = 'nombre=' + name + '&email=' + email + '&apellido=' + apellido + '&empresa=' + empresa + '&direccion=' + direccion + '&ciudad=' + ciudad + '&telefono=' + telefono + '&comentario=' + comentario;
			//alert (dataString);return false;
			$.ajax({
				type : "POST",
				data : dataString,
				success : function() {
					$('#content-form2').html('<div id="message" style="display: block;"><h3>Gracias!<br>Te enviamos el presupuesto a tu email.<br>Tambi&eacute;n pod&eacute;s:<br><a href="generate_pdf" target="_self">DESCARGAR EN PDF.</a></h3><br>* Si no lo encuentras entre tus correos recibidos, por favor revisa tu carpeta de Spam.<br> <br></div>');
					$('#main-logo').css('position','fixed');
					$('#main-logo').animate({
						width: '24%',
						top: '12%'
					}, 'slow'						
					);
					$('#back-to-home').fadeIn('slow');
				}
			});
			return false;
		} else {
			//alert("INvalido.");
		}

	});
});
