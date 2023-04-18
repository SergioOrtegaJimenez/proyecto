function controladorTiempos() {

	segundero = segundero + 1;

	if (segundero > 59) {
		segundero = 0;
		minutero = minutero + 1;
	}

  //TOMA DE VALORES JSON

	valoresJSON = document.getElementById("valoresGraficas").innerHTML;
  valoresJSON = JSON.parse(valoresJSON);
  ppm = valoresJSON.ppm;
  pas = valoresJSON.pas;
  pad = valoresJSON.pad;
  pam = Math.round(pas * (1/3) + pad * (2/3));
  spo2 = valoresJSON.spo2;
  etco2 = valoresJSON.etco2;
  rpm = valoresJSON.rpm;
  etiso = valoresJSON.etiso;
  fio2 = valoresJSON.fio2;
  pva = valoresJSON.pva;
  vt = valoresJSON.vt;
  fr = valoresJSON.fr;
  peep = valoresJSON.peep;
  encendido = valoresJSON.encendido;
  muerte = valoresJSON.muerte;

  imprimirValores();
}
