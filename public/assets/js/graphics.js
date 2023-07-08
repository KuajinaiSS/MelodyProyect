// Obtener el contexto del lienzo
var data = {
    labels: ['aaaaaaa', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
    datasets: [{
        label: 'Ventas',
        data: [120, 150, 200, 100, 180],
        backgroundColor: 'rgba(54, 162, 235, 0.5)', // Color de fondo de las barras
        borderColor: 'rgba(54, 162, 235, 1)', // Color del borde de las barras
        borderWidth: 1 // Ancho del borde de las barras
    }]
};

// Configuración del gráfico
var options = {
    scales: {
        y: {
            beginAtZero: true // Iniciar el eje Y en cero
        }
    }
};

// Crear el gráfico de barras
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
});

