$(function() {
	$("#submit_btn").click(function() {

		// validate and process form here -> no me calienta tu validacion, solo voy a copiar lo que me sirve
		if ($("#MainForm").valid()) {
			$("#leyenda_enviando").css("display", "");
			var name = $("input#nombre").val();
			var email = $("input#email").val();

			var dataString = 'nombre=' + name + '&email=' + email;
			//alert (dataString);return false;
			$.ajax({
				type : "POST",
				data : dataString,
				success : function() {
					$('#content-form2').html('<div id="message" style="display: block;"><h3>Gracias! <br/> Te enviamos el presupuesto a tu email<br/> Tambi&eacute;n pod&eacute;s <a href="generate_pdf" target="_self">DESCARGAR EN PDF!</a></h3></div>');
					}
			});
			return false;
		} else {
			//alert("INvalido.");
		}

	});
});
