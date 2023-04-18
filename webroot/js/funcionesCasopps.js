var axel=0;
var aux=0;
var run=1;
var time=0;
var numero = 0;
resultados = [];
var json = 1;
var segundero = 0;
var minutero = 0;
var controlador3 = 0;
var ppm = 138;
var pas = 105;
var pad = 37;
var pam = 52;
var spo2 = 96;
var etco2 = 58;
var rpm = 16;
var veremosloquepasa = 0;
var negativo = [7,7,7,7,7,7,7];
var positivo = [7,7,7,7,7,7,7];
var valoresGrafica1 = [0,0,1,0,-1,8,-5,0,0,3];
var valoresGrafica2 = [5,4,3,2,1,0,9,6,7,6];
var valoresGrafica3 = [0,1,5,5,5,5,5,5,5,0];
var valoresGrafica4 = [5,4,3,2,1,0,9,6,7,6];
var mierda = 0;


//PRIMERA ONDA
(function($){ // encapsulate jQuery
	$(function () {
    $(document).ready(function () {
        Highcharts.setOptions({
            global: {
                useUTC: true
            }
        });

        $('#container1').highcharts({ //Asocia la gráfica al elemento container1 en la vista
					colors: ['green'],
            chart: {
							  backgroundColor: 'black',
                type: 'spline',
                marginRight: 10,
				alignTicks: false,
                events: {
                    load: function () {
                        var series = this.series[0];
                        setInterval(function () {
                          var x = time // El valor de x en la gráfica irá cambiando conforme el tiempo
                          var y = valoresGrafica1[posicionMatriz][aux]; // El valor y irá cambiando según la posición de la matriz a la que apunte
            series.addPoint([x, y], true, true); // Añade un nuevo punto a la gráfica con los valores de x e y que se ha calculado previamente
							}, 10);
                    }
                }
            },
            title: {
                text: false
            },
			credits: {
                enabled: false,
            },

            xAxis: {
                type: 'datetime',
                tickPixelInterval: 0,
								lineWidth: 0,
								minorGridLineWidth: 0,
								lineColor: 'transparent',
								alignTicks: false,
								visible: false,
								labels: {
									enabled: false
								},
								minorTickLength: 0,
								tickLength: 0
				            },
            yAxis: {
							gridLineWidth: 0,

                title: {
                    text: false,
                },
								labels:
								{
								  enabled: false,
								},
                plotLines: [{
                    value: null,
                    width: null,
                    color: 'black',
					showEmpty: false,
					alignTicks: false,
                }]
            },

			plotOptions: {
				series: {
					enableMouseTracking: false
					},
				},
            tooltip: {
			navigator:{
				enabled:false,
			},
            },
            legend: {
                enabled: false
            },
            exporting: {
                enabled: true
            },
            series: [{
                name: 'ECG',
				    marker: {
						enabled: false,
					},
                data: (function () {
                    var data = [],
						aux = time;
                    for (i = -100; i <= 0; i += 1) {
                        data.push({
                            x: time,
                            y: valoresGrafica1[0][aux],
                        });
                    }
                    return data;
                }())
            }]
        });
    });
});
})(jQuery);

//SEGUNDA ONDA
(function($){ // encapsulate jQuery
	$(function () {
    $(document).ready(function () {
        Highcharts.setOptions({
            global: {
                useUTC: true
            }
        });

        $('#container2').highcharts({
					colors: ['yellow'],
            chart: {
							  backgroundColor: 'black',
                type: 'spline',
                marginRight: 10,
				alignTicks: false,
                events: {
                    load: function () {

                        // set up the updating of the chart each second
                        var series = this.series[0];
                        setInterval(function () {
                            var x = time // current time
														var y = valoresGrafica2[posicionMatriz][aux];
							series.addPoint([x, y], true, true);
							}, 0.1);
                    }
                }
            },
            title: {
                text: false
            },
			credits: {
                enabled: false,
            },

            xAxis: {
                type: 'datetime',
                tickPixelInterval: 0,
				alignTicks: false,
				visible: false,
            },
            yAxis: {
							gridLineWidth: 0,
							labels:
							{
								enabled: false,
							},
                title: {
                    text: false,
                },
                plotLines: [{
                    value: null,
                    width: null,
                    color: '#FF0040',
					showEmpty: false,
					alignTicks: false
                }]
            },

			plotOptions: {
				series: {
					enableMouseTracking: false
					},
				},
            tooltip: {
			navigator:{
				enabled:false,
			},
            },
            legend: {
                enabled: false
            },
            exporting: {
                enabled: true
            },
            series: [{
                name: 'Grafica 3',
				    marker: {
						enabled: false,
					},
                data: (function () {
                    var data = [],
                    i;
								for (i = -100; i <= 0; i += 1) {
                        data.push({
                            x: time,
                            y: valoresGrafica2[0][aux]
                        });
                    }
                    return data;
                }())
            }]
        });
    });
});
})(jQuery);

//TERCERA ONDA
(function($){ // encapsulate jQuery
	$(function () {
    $(document).ready(function () {
        Highcharts.setOptions({
            global: {
                useUTC: true
            }
        });

        $('#container3').highcharts({
					colors: ['white'],
            chart: {
							  backgroundColor: 'black',
                type: 'spline',
                marginRight: 10,
				alignTicks: false,
                events: {
                    load: function () {

                        // set up the updating of the chart each second
                        var series = this.series[0];
												if (controlador3 == 0) {
                        setInterval(function () {
													tiempo3 = time % 10;
                          	var x = time // current time
														var y = valoresGrafica3[tiempo3];
								series.addPoint([x, y], true, true);
							}, 100);
						} else 	{
              setInterval(function () {
									tiempo3 = segundero % 10;
									var hola = 1;
                  var x = time // current time
									var y = valoresGrafica3[tiempo3];
									series.addPoint([x, y], true, true);
								}, 1000);
							}
						                    }
                }
            },
            title: {
                text: false
            },
			credits: {
                enabled: false,
            },

            xAxis: {
                type: 'datetime',
                tickPixelInterval: 0,
				alignTicks: false,
				visible: false,
            },
            yAxis: {
							labels:
							{
								enabled: false,
							},
							gridLineWidth: 0,

                title: {
                    text: false,

                },
                plotLines: [{
                    value: null,
                    width: null,
                    color: '#FF0040',
					showEmpty: false,
					alignTicks: false
                }]
            },

			plotOptions: {
				series: {
					enableMouseTracking: false
					},
				},
            tooltip: {
			navigator:{
				enabled:false,
			},
            },
            legend: {
                enabled: false
            },
            exporting: {
                enabled: true
            },
            series: [{
                name: 'Latidos',
				    marker: {
						enabled: false,
					},
                data: (function () {
                    var data = [],
					i;


							for (i = -20; i <= 0; i += 1) {
                        data.push({
                            x: time,
                            y: valoresGrafica3[aux]
                        });
                    }
                    return data;
                }())
            }]
        });
    });
});
})(jQuery);

//CUARTA ONDA
(function($){ // encapsulate jQuery
	$(function () {
    $(document).ready(function () {
        Highcharts.setOptions({
            global: {
                useUTC: true
            }
        });

        $('#container4').highcharts({ //Asocia la gráfica al elemento container4 en la vista
					colors: ['red'],
            chart: {
							  backgroundColor: 'black',
                type: 'spline',
                marginRight: 10,
				alignTicks: false,
                events: {
                    load: function () {
                        var series = this.series[0];
                        setInterval(function () {
                            var x = time // El valor de x en la gráfica irá cambiando conforme el tiempo
														var y = valoresGrafica4[posicionMatriz][aux]; // El valor y irá cambiando según la posición de la matriz a la que apunte
							series.addPoint([x, y], true, true); // Añade un nuevo punto a la gráfica con los valores de x e y que se ha calculado previamente
							}, 0);
                    }
                }
            },
            title: {
                text: false
            },
			credits: {
                enabled: false,
            },

            xAxis: {
                type: 'datetime',
                tickPixelInterval: null,
				alignTicks: false,
				visible: false,
            },
            yAxis: {
							gridLineWidth: 0,
							labels:
							{
								enabled: false,
							},
                title: {
                    text: false,
                },
                plotLines: [{
                    value: null,
                    width: null,
                    color: '#FF0040',
					showEmpty: false,
					alignTicks: false
                }]
            },

			plotOptions: {
				series: {
					enableMouseTracking: false
					},
				},
            tooltip: {
			navigator:{
				enabled:false,
			},
            },
            legend: {
                enabled: false
            },
            exporting: {
                enabled: true
            },
            series: [{
                name: 'Grafica 4',
				    marker: {
						enabled: false,
					},
                data: (function () {
                    var data = [],
										i;

							for (i = -100; i <= 0; i += 1) { //Se establece el tamaño que tendrá la gráfica, en este caso 100 puntos
                        data.push({
                            x: time,
                            y: valoresGrafica4[aux]
                        });
                    }
                    return data;
                }())
            }]
        });
    });
});
})(jQuery); // Cierre de la función de Gráfica 4





//FUNCIONES

function contador()
{
	aux++;
	aux = aux % 10 //30 pulsaciones;
	if (aux == 0)
		numero = numero + 1;
}
function contador2()
{
	time = time + 1;
}

function cambia_valor(){
  valor = document.f1.medicamentos[document.f1.medicamentos.selectedIndex].value;
	resultados.push(valor + minutero + segundero);
	json = JSON.stringify(resultados, null, 2);
	document.getElementById("result").value = resultados;
}

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
	pam = recalcular_valor(pam, 5, segundero, 3);
	spo2 = recalcular_valor(spo2, 5, segundero, 4);
	etco2 = recalcular_valor(etco2, 5, segundero, 5);
	rpm = recalcular_valor(rpm, 5, segundero, 6);


	segundero = segundero + 1;

	if (segundero > 59) {
		segundero = 0;
		minutero = minutero + 1;
	}
	if (segundero > 5) {
		controlador3 = 1;
		//document.getElementById("f2").submit();
	}


	//CONTROLA LPM
	if (ppm<=40 || ppm>=150)
		document.getElementById("lpm").innerHTML = '<span style="color:red">' + ppm + '</span>';
	else
	document.getElementById("lpm").innerHTML = '<span style="color:white">' + ppm + '</span>';

	//CONTROLA PPM1
	if (ppm<=40 || ppm>=150)
		document.getElementById("ppm1").innerHTML = '<span style="color:red">' + ppm + '</span>';
	else
	document.getElementById("ppm1").innerHTML = '<span style="color:white">' + ppm + '</span>';

	//CONTROLA PPM2
	if (ppm<=40 || ppm>=150)
		document.getElementById("ppm2").innerHTML = '<span style="color:red">' + ppm + '</span>';
	else
	document.getElementById("ppm2").innerHTML = '<span style="color:white">' + ppm + '</span>';

	//CONTROLA PPM2
	if (ppm<=35 || ppm>=45)
		document.getElementById("etc0").innerHTML = '<span style="color:red">' + etco2 + '</span>';
	else
	document.getElementById("etc0").innerHTML = '<span style="color:white">' + etco2 + '</span>';


	document.getElementById("spo2").innerHTML = '<span style="color:white">' + spo2 + '</span>';
	document.getElementById("pas").innerHTML = '<span style="color:white">' + pas + '</span>';
	document.getElementById("pad").innerHTML = '<span style="color:white">' + pad + '</span>';
	document.getElementById("pam").innerHTML = '<span style="color:white">' + pam + '</span>';
	document.getElementById("rpm").innerHTML = '<span style="color:white">' + rpm + '</span>';



	if(segundero < 10) {
		document.getElementById("tiempo").innerHTML = minutero + ':0' + segundero;
	} else {
	document.getElementById("tiempo").innerHTML = minutero + ':' + segundero;
	}
}

window.onload = function() {
setInterval(contador,1);
setInterval(controladorTiempos, 1000);
setInterval(contador2,1) ;
}
