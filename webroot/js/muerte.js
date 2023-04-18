function matando(valor) {
  if (valor == 1) {
    posicionMatriz = 1;
    posicionMatriz3 = 1;
    contadorMuerte = contadorMuerte + 1;
    if (contadorMuerte > 2)
    {
      posicionMatriz = 0;
      posicionMatriz3 = 0;
    }
  } else {
    contadorMuerte = 0;
  }
}

function protocoloMuerte(valor) {
  document.getElementById("muerte").value = valor;
  document.getElementById("estado").submit();
}

function cambiarMonitor(valor) {
  document.getElementById("encendido").value = valor;
  document.getElementById("estado").submit();
}
