//bar chart in employees info page
let barCharts = {
    series: [
        {
            name: "Present",
            data: [71, 76, 64, 39]
        },
        {
            name: "Late",
            data: [22, 18, 30, 28]
        },
        {
            name: "Absent",
            data: [6, 5, 5, 12]
        }
    ],

    colors: [
        "#BECDE0",
        "#BA494B",
        "#CCCED0"
    ],

    chart: {
        fontFamily: 'Red Rose',
        type: 'bar',
        height: 250,
        stacked: true,
        parentHeightOffset: 4,
        toolbar: {
            show: true,
            tools: {
                download: false
            }
        },
    },

    dataLabels: {
        enabled: false,
    },

    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '50%',
            endingShape: "rounded",
            borderRadius: 8
        },
    },

    stroke: {
        width: 0,
        colors: ['#fff']
    },

    xaxis: {
        categories: ['1st', '2nd', '3rd', '4th'],
        labels: {
            formatter: function (val) {
                return val + " "
            }
        }
    },

    yaxis: {
        title: {
            text: undefined
        },
    },

    title: {
        text: '',
        align: 'center',
        style: {
            fontSize: '18px',
            fontWeight: 10,
            fontFamily: undefined,
            color: '#5D5D81'
        },
    },
    tooltip: {
        //fillSeriesColor: true,
        theme: true,
        x: {
            show: false,
        },
        y: {
            formatter: function(val) {
                return val + "%"
            }
        }
    },
    fill: {
        opacity: 1
    },
    legend: {
        fontFamily: 'Red Rose',
        position: 'bottom',
        horizontalAlign: 'right',
        offsetY: 10,
        markers: {
            radius: 100,
        },
        itemMargin: {
            horizontal: 7,
        }
    }
};

var barsEmp = new ApexCharts(document.querySelector("#bars-emp"), barCharts);
barsEmp.render();