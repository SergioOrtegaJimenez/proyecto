function imprimirValores() {

  if (muerte == 1) {  // Si muerte vale 1, se procede a matar al animal
    matando(1);
    ppm = 0;
    pas = 0;
    pad = 0;
    pam = 0;
    spo2 = 0;
    etco2 = 0;
    rpm = 0;
    etiso = 0;
    fio2 = 0;
    pva = 0;
    vt = 0;
    peep = 0;
		fr = 0;
		encendido = 0;
  }  else
    matando(0);

  if (ppm > 100)
    posicionMatriz = 2;
  if (ppm < 100 && ppm > 90)
    posicionMatriz = 3;
  if (ppm < 90 && ppm > 35)
    posicionMatriz = 4;
  if (ppm < 80 && ppm > 35)
    posicionMatriz = 5;
  if (ppm < 70 && ppm > 35)
    posicionMatriz = 6;
  if (ppm < 60 && ppm > 35)
    posicionMatriz = 7;
  if (ppm < 50 && ppm > 35)
    posicionMatriz = 8;
  if (ppm < 50 && ppm > 1)
    posicionMatriz = 9;

  if (rpm > 15)
    posicionMatriz3 = 2;
  if (rpm <= 14 && rpm > 13)
    posicionMatriz3 = 3;
  if (rpm <= 12 && rpm > 11)
    posicionMatriz3 = 4;
  if (rpm <= 10 && rpm > 9)
    posicionMatriz3 = 5;
  if (rpm <= 8 && rpm > 7)
    posicionMatriz3 = 7;
  if (rpm <= 6 && rpm > 5)
    posicionMatriz3 = 8;
  if (rpm < 4 && rpm >1)
    posicionMatriz3 = 9;


  //CONTROLA EL VALOR DE LPM
  if (ppm<=40 || ppm>=155)
    document.getElementById("lpm").innerHTML = '<span style="color:red">' + ppm + '</span>'; // Si el valor no está entre los límites, imprime el número en rojo
  else
    document.getElementById("lpm").innerHTML = '<span style="color:white">' + ppm + '</span>'; // Si el valor está entre los límites, imprime el número en blanco

  //CONTROLA EL VALOR DE PPM1
  if (ppm<=40 || ppm>=155)
    document.getElementById("ppm1").innerHTML = '<span style="color:red">' + ppm + '</span>'; // Si el valor no está entre los límites, imprime el número en rojo
  else
    document.getElementById("ppm1").innerHTML = '<span style="color:white">' + ppm + '</span>'; // Si el valor está entre los límites, imprime el número en blanco

  //CONTROLA EL VALOR DE PPM2
  if (ppm<=40 || ppm>=155)
    document.getElementById("ppm2").innerHTML = '<span style="color:red">' + ppm + '</span>'; // Si el valor no está entre los límites, imprime el número en rojo
  else
    document.getElementById("ppm2").innerHTML = '<span style="color:white">' + ppm + '</span>'; // Si el valor está entre los límites, imprime el número en blanco

  //CONTROLA EL VALOR DE ETCO2
  if (etco2<=35 || etco2>=45)
    document.getElementById("etc0").innerHTML = '<span style="color:red">' + etco2 + '</span>'; // Si el valor no está entre los límites, imprime el número en rojo
  else
    document.getElementById("etc0").innerHTML = '<span style="color:white">' + etco2 + '</span>'; // Si el valor está entre los límites, imprime el número en blanco

	if (spo2 >= 93)
		document.getElementById("spo2").innerHTML = '<span style="color:white">' + spo2 + '</span>';
	else
		document.getElementById("spo2").innerHTML = '<span style="color:red">' + spo2 + '</span>';

	if (pas >= 130)
		document.getElementById("pas").innerHTML = '<span style="color:white">' + pas + '</span>';
	else
		document.getElementById("pas").innerHTML = '<span style="color:red">' + pas + '</span>';

	if (pad >= 60)
		document.getElementById("pad").innerHTML = '<span style="color:white">' + pad + '</span>';
	else
		document.getElementById("pad").innerHTML = '<span style="color:red">' + pad + '</span>';

	if (pam>140 || pam<60)
		document.getElementById("pam").innerHTML = '<span style="color:red">' + pam + '</span>';
	else
		document.getElementById("pam").innerHTML = '<span style="color:white">' + pam + '</span>';

	if (rpm<10 || rpm>30)
		document.getElementById("rpm").innerHTML = '<span style="color:red">' + rpm + '</span>';
	else
		document.getElementById("rpm").innerHTML = '<span style="color:white">' + rpm + '</span>';

  document.getElementById("fr").innerHTML = '<span style="color:white">' + fr + '</span>';
  document.getElementById("pva").innerHTML = '<span style="color:white">' + pva + '</span>';
  document.getElementById("vt").innerHTML = '<span style="color:white">' + vt + '</span>';
  document.getElementById("peep").innerHTML = '<span style="color:white">' + peep + '</span>';

	if (monitorGases == 1)
	{
		document.getElementById("etiso").innerHTML = '<span style="color:white">' + etiso + '</span>';
		document.getElementById("fio2").innerHTML = '<span style="color:white">' + fio2 + '</span>';
	} else {
    if(segundero < 10) {
      document.getElementById("tiempo").innerHTML = minutero + ':0' + segundero;
    } else {
    document.getElementById("tiempo").innerHTML = minutero + ':' + segundero;
    }
	}

  if (encendido == "1") {
    document.getElementById("led").innerHTML = '<img src="../../img/led-verde.png" height="25">';
  }  else {
    document.getElementById("led").innerHTML = '<img src="../../img/led-rojo.png" height="25">';
  }



}
