function ajaxCall() {
		$.ajax({
				url: "http://desarrollo/consultaSQL.php",  // Llama al fichero consultaSQL.php
				success: (function (result) {
						$("#valoresGraficas").html(result); // Si se produce bien la llamada, guarda el resultado en valoresGraficas
				})
		})
}
