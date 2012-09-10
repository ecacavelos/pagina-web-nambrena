$(function() {
	$("#submit_btn").click(function() {

		// validate and process form here -> no me calienta tu validacion, solo voy a copiar lo que me sirve
		if ($("#MainForm").valid()) {
			$('#content-form2').append("<p> Enviando.. </p>");
			var name = $("input#nombre").val();
			var email = $("input#email").val();

			var dataString = 'nombre=' + name + '&email=' + email;
			//alert (dataString);return false;
			$.ajax({
				type : "POST",
				data : dataString,
				success : function() {
					$('#content-form2').html("<div id='message'></div>");
					$('#message').html("<h2>Gracias!. Te enviamos el presupuesto a tu email. Tambien podes descargar en PDF!.</h2>").append('<a href="generate_pdf" target="_self" class="transition-back"> DESCARGAR</a>').hide().fadeIn(1500);
				}
			});
			return false;
		} else {
			//alert("INvalido.");
		}

	});
});
