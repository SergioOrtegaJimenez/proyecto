// INICIALIZACIÓN DE VARIABLES GLOBALES

var aux=0;
var time = 0; // Contador que controla el paso del tiempo
var segundero = 0; // Variable que contabiliza los segundos
var minutero = 0; // Variable que contabiliza los minutos
resultados = [];
json = [];
var controlador3 = 0;
var tiempo3 = 0;
var aux3 = 0;
var contadorMuerte = 0; // Controla los ciclos dentro de la función muerte
var contadorVida = 0; // Controla los ciclos dentro de la etapa 3

var ppm = 142; // Variable que representa el valor de ppm en el monitor
var pas = 110; // Variable que representa el valor de pas en el monitor
var pad = 42; // Variable que representa el valor de pad en el monitor
var pam = Math.round(pas * (1/3) + pad * (2/3)); // Variable que representa el valor de pam en el monitor
var spo2 = 96; // Variable que representa el valor de spo2 en el monitor
var etco2 = 62; // Variable que representa el valor de etco2 en el monitor
var rpm = 18; // Variable que representa el valor de rpm en el monitor

var etiso = 0; // Variable que representa el valor de etiso en el monitor de gases
var fio2 = 0; // Variable que representa el valor de fio2 en el monitor de gases

var pva = 10; // Variable que representa el valor de pva en el ventilador mecánico
var vt = 0; // Variable que representa el valor de vt en el ventilador mecánico
var peep = 2; // Variable que representa el valor de peep en el ventilador mecánico
var fr = 0; // Variable que representa el valor de peep en el ventilador mecánico

var encendido = 0; // Variable que representa si el monitor está encendido o apagado, por defecto apagado
var muerte = 0; // Variable que representa si el animal está muerto o no, por defecto no está muerto
var etapa = 1; // Controla la etapa del tratamiento en el que está el animal
var opcion1 = 0;
var opcion2 = 0;
var opcion3 = 0;
var opcion4 = 0;
var monitorGases = 0; // Hace que no se imprima el monitor de gases

var negativo = [7,7,7,7,7,7]; //Controla las variaciones de las variables del monitor
var positivo = [7,7,7,7,7,7]; //Controla las variaciones de las variables del monitor


//FUNCIONES

function contador()
{
	aux++;
  time++;
	aux = aux % (10 + posicionMatriz); //Comprueba que el valor de aux no se pase del tamaño del vector
}

function contador2()
{
	aux3++;
	tiempo3++;
	aux3 = aux3 % (10 + posicionMatriz); //Comprueba que el valor de aux no se pase del tamaño del vector
}

function suministrar_medicamento(){
  valor = document.f1.medicamentos[document.f1.medicamentos.selectedIndex].value;
	if (valor != 0) {
		if ( segundero < 10)
			segundosGuardar = '0' + segundero;
		else
			segundosGuardar = segundero;
		resultados.push('<br>' + 'Seleccionó ' + valor + ' en el minuto ' + minutero + ':' + segundosGuardar);
		document.getElementById("result").value = resultados;
		cambiar_valores_medicamentos(valor);
	}
}

function cambiar_ventilador(){
  valor = document.f1.ventilador[document.f1.ventilador.selectedIndex].value;
	if (valor != 0) {
		if (segundero < 10)
			segundosGuardar = '0' + segundero;
		else
			segundosGuardar = segundero;
		resultados.push('<br>' + 'Seleccionó ' + valor + ' en el minuto ' + minutero + ':' + segundosGuardar);
		document.getElementById("result").value = resultados;
		cambiar_valores_ventilador(valor);
	}
}

function cambiar_valores_medicamentos(valor)
{
	switch (valor)
	{
		case 'Subir fluidoterapia':
			ppm += 2;
			opcion1 = 1;
			break
		case 'Atropina':
			ppm = 190;
			pam = 52;
			pas = 93;
			pad = 38;
			break
		case 'Sustituir fluidos':
			break
		case 'Almidon':
			ppm += 2;
			opcion2 = 1;
			break
		case 'Lidocaína':
			break
		case 'Naloxona':
			break
		case 'Aumentar anestésico':
			pam = 42;
			pas = 81;
			pad = 31;
			ppm = 86;
			rpm = 6;
			etco2 = 73;
			etapa = 4;
			minutero = 1;
			segundero = 45;
 			break
		case 'Dopamina':
			ppm += 10;
			opcion3 = 1;
			break
		case 'Esmolol':
			pam = 42;
			pas = 81;
			pad = 31;
			rpm = 6;
			etco2 = 73;
			spo2 = 88;
			etapa = 4;
			minutero = 1;
			segundero = 45;
			break
	}
}

function cambiar_valores_ventilador(valor)
{
	switch (valor) {
		case 'Encender':
			encendido = 1;
			break
		case 'Apagar':
			encendido = 0;
			break
		case 'FR5':
			fr = 5;
			break
		case 'FR15':
			fr = 15;
			break
		case 'FR25':
			fr = 25;
			break
		case 'VT50':
			vt = 50;
			break
		case 'VT150':
			vt = 150;
			break
		case 'VT250':
			vt = 250;
			break
		case 'Manual':
			etco2 = 30;
			rpm = 60;
			break
	}
}

window.onload = function() {
setInterval(contador,1);
setInterval(controladorTiempos, 1000);
setInterval(contador2, 500); // Llama a la función contador cada 500 milisegundo
}
