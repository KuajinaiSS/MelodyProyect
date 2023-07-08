// Obtener referencias a los elementos del DOM
let select = document.getElementById('chartType'); // Referencia al elemento select con el ID 'chartType'
let chartContainer = document.getElementById('chartContainer'); // Referencia al contenedor del gráfico con el ID 'chartContainer'
let ctx = document.getElementById('myChart'); // Referencia al elemento canvas con el ID 'myChart'
let chartHTML = document.getElementById('chart'); // Referencia al elemento con el ID 'chart'
let spinner = document.getElementById('spinner'); // Referencia al elemento con el ID 'spinner'

let chart = null; // Variable para almacenar la instancia del gráfico

// Función para generar el gráfico según la selección del <select>
function generateChart() {
    console.log('entra');
    // Obtener el valor seleccionado del <select>
    let selectedValue = select.value;
    console.log(selectedValue);

    // Eliminar el gráfico existente si lo hay
    console.log(chart);
    if (chart) {
        chart.destroy(); // Destruye la instancia del gráfico anterior
        chartHTML.hidden = true; // Oculta el elemento del gráfico anterior
    }

    // Generar el nuevo gráfico según el valor seleccionado
    if (selectedValue === 'bar-concerts') {
        // Realizar una solicitud Fetch para obtener el listado de conciertos con su total vendido
        fetch('/all-concert-sales')
            .then(response => response.json())
            .then(data => {
                // Procesar los datos obtenidos

                const concerts = data;
                console.log(concerts);

                // Extraer las etiquetas y los valores de los conciertos
                const labels = concerts.map(concert => concert.name);
                const values = concerts.map(concert => {
                    if (concert.detail_order_sum_total) {
                        return parseInt(concert.detail_order_sum_total);
                    }
                    return 0;
                });

                // Crear el contexto del gráfico
                // const ctx = document.getElementById('myChart');

                // Crear el gráfico de barras
                chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: null,
                            data: values,
                            backgroundColor: [
                                'rgba(0	202	220)',
                                'rgba(1	122	235)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        responsive: true,
                        scales: {
                            x: {
                                ticks: {
                                    autoSkip: false,
                                    maxRotation: 0,
                                    minRotation: 0
                                }
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                chartHTML.hidden = false; // Mostrar el elemento del gráfico
            })
            .catch(error => {
                console.error('Error al obtener el listado de conciertos:', error);
            });
    } else if (selectedValue === 'bar-payment') {
        // Realizar una solicitud fetch para obtener los datos relacionados con los detalles de orden
        fetch('/all-detail-orders')
            .then(response => response.json())
            .then(data => {
                // Procesar los datos obtenidos

                const detail_orders = data;
                // console.log(detail_orders);

                // Crear un objeto para almacenar las sumas totales por método de pago
                const paymentTotals = {
                    'Efectivo': 0,
                    'Transferencia': 0,
                    'Débito': 0,
                    'Crédito': 0,
                };

                // Calcular la suma total por cada método de pago
                detail_orders.forEach(detail => {
                    let paymentMethod = detail.payment_method;
                    const total = detail.total;

                    switch (paymentMethod) {
                        case 1:
                            paymentMethod = 'Efectivo';
                            break;
                        case 2:
                            paymentMethod = 'Transferencia';
                            break;
                        case 3:
                            paymentMethod = 'Débito';
                            break;
                        case 4:
                            paymentMethod = 'Crédito';
                            break;
                    }

                    // console.log(paymentMethod);

                    paymentTotals[paymentMethod] += total;
                });

                // Extraer las etiquetas y los valores de las sumas totales por método de pago
                const labels = Object.keys(paymentTotals);
                const values = Object.values(paymentTotals);

                // Crear el contexto del gráfico
                // const ctx = document.getElementById('myChart2');

                // Crear el gráfico de barras
                chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Monto Total Vendido',
                            data: values,
                            backgroundColor: [
                                'rgba(0	202	220)',
                                'rgba(1	122	235)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });

                console.log(chart.data.datasets[0].data);
                chartHTML.hidden = false; // Mostrar el elemento del gráfico
            })
            .catch(error => {
                console.error('Error al obtener el listado de conciertos:', error);
            });
    }else if (selectedValue === 'pie-payment'){
        fetch('/all-concert-sales')
            .then(response => response.json())
            .then(data => {
                // Procesar los datos obtenidos

                const concerts = data;
                console.log(concerts);

                // Extraer las etiquetas y los valores de los conciertos
                const labels = concerts.map(concert => concert.name);
                const values = concerts.map(concert => {
                    if (concert.detail_order_sum_total) {
                        return parseInt(concert.detail_order_sum_total);
                    }
                    return 0;
                });

                // Crear el contexto del gráfico
                // const ctx = document.getElementById('myChart');

                // Crear el gráfico de barras
                chart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: null,
                            data: values,
                            backgroundColor: [
                                'rgba(0,202,220)',
                                'rgba(	1	122	235)',
                                'rgba(0,199,135)',
                                'rgba(38,7,121)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        responsive: true,
                        scales: {
                            x: {
                                ticks: {
                                    autoSkip: false,
                                    maxRotation: 0,
                                    minRotation: 0
                                }
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                chartHTML.hidden = false; // Mostrar el elemento del gráfico
            })
            .catch(error => {
                console.error('Error al obtener el listado de conciertos:', error);
            });
    }
}


// Evento de cambio en el <select>
select.addEventListener('change', generateChart);

// Generar el gráfico inicialmente
generateChart();
