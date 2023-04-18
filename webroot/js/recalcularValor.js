function recalcular_valor(valorOriginal , tiempoRecarga, tiempoActual, posicion){
	if ((tiempoActual % tiempoRecarga) == 0)
		if (Math.random()*negativo[posicion] > Math.random()*positivo[posicion])
		{
			negativo[posicion] = negativo[posicion] - 1;
			positivo[posicion] = positivo[posicion] + 1;
			valorOriginal = valorOriginal - 1;
		} else {
			negativo[posicion] = negativo[posicion] + 1;
			positivo[posicion] = positivo[posicion] - 1;
			valorOriginal = valorOriginal + 1;
		}
	return valorOriginal;
}

function controladorTiempos() {
	ppm = recalcular_valor(ppm, 5, segundero, 0);
	pas = recalcular_valor(pas, 5, segundero, 1);
	pad = recalcular_valor(pad, 5, segundero, 2);
	spo2 = recalcular_valor(spo2, 5, segundero, 3);
	etco2 = recalcular_valor(etco2, 5, segundero, 4);
	rpm = recalcular_valor(rpm, 5, segundero, 5);


	segundero = segundero + 1;

	if (segundero > 59) {
		segundero = 0;
		minutero = minutero + 1;
	}
	if (segundero > 5) {
		controlador3 = 1;
		//document.getElementById("f2").submit();
	}

	if (segundero == 0 && minutero == 1 && (etapa == 1))
		etapa = 3;

	if (segundero == 30 && minutero == 1 && etapa == 3)
		etapa = 4;

	if (segundero == 0 && minutero == 2 && etapa == 4)
	{
		etapa = 5;
	}

	if (segundero == 30 && minutero == 2 && etapa == 5)
		muerte = 1;

	if (contadorMuerte > 2)
	{
		document.getElementById("final").value = 'Muerto';
		document.getElementById("f2").submit();
	}

	if (etapa == 2)
	{
		contadorVida += 1;
		if (contadorVida > 2)
		{
			document.getElementById("final").value = 'Vivo';
			document.getElementById("f2").submit();
		}
	}

	switch (etapa) {
		case 3:
			ppm = 190;
			rpm =  20;
			pam = 40;
			pas = 78;
			pad = 28;
			spo2 = 92;
			etco2 = 68;
			break;

		case 4:
			ppm = 200;
			rpm =  8;
			pam = 32;
			pas = 68;
			pad = 20;
			spo2 = 88;
			etco2 = 78;
			break;

		case 5:
			ppm = 6;
			rpm =  0;
			pam = 28;
			pas = 52;
			pad = 10;
			spo2 = 82;
			etco2 = 3;
			break;
	}

	if (opcion1 == 1 && opcion2 == 1 && opcion3 == 1) // Comprueba si se han administrado los 3 medicamentos
	{
		ppm = 160;
		rpm =  17;
		pam = 77;
		pas = 150;
		pad = 52;
		spo2 = 98;
		etco2 = 65;
		opcion4 = 1;
	}

	if ((encendido == 1) && (opcion4 == 1) && (fr == 15) && (vt == 150)) // Comprueba que el ventilador está correcto y se han administrado los medicamentos
	{
		ppm = 152;
		rpm =  17;
		pam = 72;
		pas = 147;
		pad = 62;
		spo2 = 99;
		etco2 = 41;
		etapa = 2;
	}

	imprimirValores();
}
