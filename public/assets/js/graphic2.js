


var data2 = {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'] ,
    datasets: [{
        label:'Total vendido por medio de pago',
        data: [80, 120, 90, 150, 110],
        backgroundColor: ['rgba(	0	202	220)', 'rgba(1	122	235)'],
        borderColor: ['rgba(	0	202	220)', 'rgba(1	122	235)'],
        borderWidth: 1
    }],


};

var barOptions = {
    scales: {
        y: {
            beginAtZero: true
        }
    },
    plugins: {
        legend: {
            display: false
        }
    }
};

var ctx2 = document.getElementById('chart2').appendChild(ctx2);
var chart2 = new Chart(ctx2, {
    type: 'bar',
    data: data2,
    options: barOptions
});


'rgba(251, 77, 66, 0.25)',
                        'rgba(4, 101, 255, 0.25)',
                        'rgba(255, 209, 3, 0.25)',
                        'rgba(255, 1, 190,0.25)',
                        'rgba(0, 212, 161, 0.25)'
