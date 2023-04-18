// INICIALIZACIÓN DE VARIABLES GLOBALES

var aux = 0;
var time = 0; // Contador que controla el paso del tiempo
var segundero = 0; // Variable que contabiliza los segundos
var minutero = 0; // Variable que contabiliza los minutos
var controlador3 = 0;
var tiempo3 = 0;
var aux3 = 0;
var contadorMuerte = 0; // Controla los ciclos dentro de la función muerte
var returns = 0;

// INICIALIZACIÓN DE VARIABLES DEL MONITOR

var ppm = 0; // Variable que representa el valor de ppm en el monitor
var pas = 0; // Variable que representa el valor de pas en el monitor
var pad = 0; // Variable que representa el valor de pad en el monitor
var pam = 0; // Variable que representa el valor de pam en el monitor
var spo2 = 0; // Variable que representa el valor de spo2 en el monitor
var etco2 = 0; // Variable que representa el valor de etco2 en el monitor
var rpm = 0; // Variable que representa el valor de rpm en el monitor

var etiso = 0; // Variable que representa el valor de etiso en el monitor
var fio2 = 0; // Variable que representa el valor de fio2 en el monitor

var pva = 0; // Variable que representa el valor de pva en el ventilador mecánico
var vt = 0; // Variable que representa el valor de vt en el ventilador mecánico
var peep = 0; // Variable que representa el valor de peep en el ventilador mecánico
var fr = 0; // Variable que representa el valor de peep en el ventilador mecánico

var encendido = 0; // Variable que representa si el monitor está encendido o apagado, por defecto apagado
var muerte = 0; // Variable que representa si el animal está muerto o no, por defecto no está muerto
var monitorGases = 1; // Hace que se imprima el monitor de gases


//FUNCIONES

function contador()
{
	if (aux == 0)
		returns += 1;
	aux++;
	time++;
	aux = aux % (10 + posicionMatriz); //Comprueba que el valor de aux no se pase del tamaño del vector
}

function contador2()
{
	aux3++;
	tiempo3++;
	aux3 = aux3 % (3 + posicionMatriz3); //Comprueba que el valor de aux no se pase del tamaño del vector
}

ajaxCall(); // Llama a la función de Ajax al cargar por primera vez la página

window.onload = function() { //Función que se inicia al cargar la página
setInterval(contador, 1); // Llama a la función contador cada 1 milisegundo
setInterval(contador2, 500); // Llama a la función contador cada 500 milisegundo
setInterval(controladorTiempos, 1000); // Llama a la función que controla el tiempo cada 1 segundos
setInterval(ajaxCall, (4 * 1000)); // Llama a la función de Ajax cada 4 segundos

}
