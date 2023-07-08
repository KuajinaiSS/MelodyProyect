

var data3 = {
    labels: ['Efectivo', 'Tarjeta de crédito', 'Transferencia', 'Tarjeta de debito'],
    datasets: [{
        label: 'Total vendido en términos porcentuales',
        data: [22, 15, 20,30],
        backgroundColor: ['rgba(0,202,220)', 'rgba(	1	122	235)', 'rgba(0,199,135)','rgba(38,7,121)'],
        borderColor: ['rgba(0,202,220)', 'rgba(	1	122	235)', 'rgba(0,199,135)','rgba(38,7,121)'],
        borderWidth: 1
    }]
};
var barOptions = {
    plugins: {
        labels: {
            render: function (args) {
                return args.value + '%';
            },
            precision: 0,
            fontSize: 12,
            fontColor: '#000',
            fontStyle: 'bold'
        }
    }
};

           // Crear el gráfico de pie
                var ctx3 = document.getElementById('chart3').getContext('2d');
                var chart3 = new Chart(ctx3, {
                    type: 'pie',
                    data: data3,
                    options: barOptions
                });
