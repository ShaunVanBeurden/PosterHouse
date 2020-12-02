let charts = $('.cline-data');
if (charts.length) {
    charts.each(function (i) {
        let $el = $(this);

        let canvas = $el.find('canvas')[0];
        let ctx = canvas.getContext("2d");

        let labels = $el.data('labels');
        let data = $el.data('data');

        let dat = {
            labels: labels,
            datasets: [
                {
                    label: "Pagina weergaven",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(75,192,192,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: data
                }
            ]
        };


        new Chart(ctx , {
            type: "line",
            data: dat,
        });
    });
}