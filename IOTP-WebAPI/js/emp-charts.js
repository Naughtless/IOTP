//line chart in employees page
var options = {
    chart: {
        height: 180,
        fontFamily: 'Red Rose',
        type: "line",
        stacked: false
    },
    dataLabels: {
        enabled: false
    },
    colors: ["#BECDE0", "#BA494B", "CCCED0"],
    series: [
        {
            name: "Present",
            data: [80, 77, 69, 88, 56, 79, 66]
        },
        {
            name: "Late",
            data: [77, 29, 44, 36, 58, 45, 50]
        },
        {
            name: "On Leave",
            data: [2, 5, 10, 4, 3, 3, 9]
        },
    ],
    stroke: {
        width: [4, 4],
        curve: 'smooth'
    },
    plotOptions: {
        bar: {
            columnWidth: "20%"
        }
    },
    xaxis: {
        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
    },
    yaxis: [
        {
            axisTicks: {
                show: true
            },
            axisBorder: {
                show: false,
                color: "#5D5D81"
            },
            labels: {
                style: {
                    colors: "#5D5D81"
                }
            },
            title: {
                text: "Percentage",
                style: {
                    color: "#5D5D81"
                }
            }
        },
    ],
    tooltip: {
        shared: false,
        intersect: true,
        x: {
            show: false
        }
    },
    legend: {
        horizontalAlign: "left",
        offsetX: 40,
        show: false,
    }
};

var chart = new ApexCharts(document.querySelector("#line-chart"), options);
chart.render();

