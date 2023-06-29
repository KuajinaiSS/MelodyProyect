const fondo = document.getElementById('fondo');
const colores = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
let contadorColor = 0;

function cambiaColor() {
  fondo.style.backgroundColor = colores[contadorColor];
  contadorColor = (contadorColor + 1) % colores.length;
}

setInterval(cambiaColor, 100);
