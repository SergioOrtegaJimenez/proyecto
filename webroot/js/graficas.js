// VALORES DE LA GRÁFICA
var posicionMatriz = 2; // Indica la posición de la matriz
var posicionMatriz3 = 2; // Indica la posición de la matriz

var valoresGrafica1 = [[0,0,0,0,0,0,0,0,0,0],
                      [0,0,1,0,-1,5,-3,0,0,1,2],
                      [0,0,0,0,1,0,-1,8,-5,0,0,3],
                      [0,0,0,0,0,1,0,-1,8,-5,0,0,3],                // Conjunto de valores para la gráfica 1
											[0,0,0,0,0,0,1,0,-1,8,-5,0,0,3],
											[0,0,0,0,0,0,0,1,0,-1,8,-5,0,0,3],
											[0,0,0,0,0,0,0,0,1,0,-1,8,-5,0,0,3],
											[0,0,0,0,0,0,0,0,0,1,0,-1,8,-5,0,0,3],
											[0,0,0,0,0,0,0,0,0,0,1,0,-1,8,-5,0,0,3,0],
                      [0,0,0,0,0,0,0,0,0,0,0,1,0,-1,8,-5,0,0,3,0]];

var valoresGrafica2 =
                      [[0,0,0,0,0,0,0,0,0,0],
                      [5,4,1,1,1,0,0,7,5,6,3],
                      [5,4,3,2,1,0,0,0,9,6,7,6],
                      [5,4,3,2,1,0,0,0,0,9,6,7,6],
                      [5,4,3,2,1,0,0,0,0,0,9,6,7,6],                 // Conjunto de valores para la gráfica 2
                      [5,4,3,2,1,0,0,0,0,0,0,9,6,7,6],
                      [5,4,3,2,1,0,0,0,0,0,0,0,9,6,7,6],
                      [5,4,3,2,1,0,0,0,0,0,0,0,0,9,6,7,6],
                      [5,4,3,2,1,0,0,0,0,0,0,0,0,0,9,6,7,6],
                      [5,4,3,2,1,0,0,0,0,0,0,0,0,0,0,9,6,7,6]];

var valoresGrafica3 =
                      [[0,0,0,0],
                      [0,2.5,2.5,2.5,2.5],
                      [0,5,5,5,5,0],
                      [0,5,5,5,5,0,0],
                      [0,5,5,5,5,0,0,0],                            // Conjunto de valores para la gráfica 3
                      [0,5,5,5,5,0,0,0,0],
                      [0,5,5,5,5,0,0,0,0,0],
                      [0,5,5,5,5,0,0,0,0,0,0],
                      [0,5,5,5,5,0,0,0,0,0,0,0],
                      [0,5,5,5,5,0,0,0,0,0,0,0]];

var valoresGrafica4 =
                      [[0,0,0,0,0,0,0,0,0,0],
                      [5,4,1,1,1,0,0,7,5,6,3],
                      [5,4,3,2,1,0,0,0,9,6,7,6],
                      [5,4,3,2,1,0,0,0,0,9,6,7,6],
                      [5,4,3,2,1,0,0,0,0,0,9,6,7,6],                 // Conjunto de valores para la gráfica 4
                      [5,4,3,2,1,0,0,0,0,0,0,9,6,7,6],
                      [5,4,3,2,1,0,0,0,0,0,0,0,9,6,7,6],
                      [5,4,3,2,1,0,0,0,0,0,0,0,0,9,6,7,6],
                      [5,4,3,2,1,0,0,0,0,0,0,0,0,0,9,6,7,6],
                      [5,4,3,2,1,0,0,0,0,0,0,0,0,0,0,9,6,7,6]];

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
													//tiempo3 = time % 10;
                          	var x = tiempo3 // current time
														var y = valoresGrafica3[posicionMatriz3][aux3];
								series.addPoint([x, y], true, true);
							}, 500);
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
                            x: tiempo3,
                            y: valoresGrafica3[posicionMatriz3][aux3]
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
                            y: valoresGrafica4[posicionMatriz][aux]
                        });
                    }
                    return data;
                }())
            }]
        });
    });
});
})(jQuery); // Cierre de la función de Gráfica 4
