<?php

?>

<script>
    //Dashboard Monthly Attendance Bar Chart
    let monthlyAttendance = {
        series: [
            {
                name: "Present",
                data: [81, 86, 74, 59, 61, 43, 46, 78, 87, 75, 68, 90]
            },
            {
                name: "Late",
                data: [17, 10, 20, 28, 33, 46, 49, 15, 10, 20, 28, 5]
            },
            {
                name: "Absent",
                data: [1, 3, 5, 12, 5, 10, 4, 6, 2, 4, 3, 4]
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
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
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
            text: 'monthly attendance of skæn employees',
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

    var bars = new ApexCharts(document.querySelector("#bars"), monthlyAttendance);
    bars.render();
</script>
