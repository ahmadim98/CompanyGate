var SalesData = [{
        nameen: "Orders",
        namear: "الطلبات",
        data: [32, 66, 44, 55, 41, 24, 67, 22, 43, 32, 66, 44, 55, 41, 24, 67, 22, 43]
    }, {
        nameen: "Visitors",
        namear: "الزوار",
        data: [7, 30, 13, 23, 20, 12, 8, 13, 27, 7, 30, 13, 23, 20, 12, 8, 13, 27]
}]

var IndustriesLabels = [{nameen:"Clothing",namear:"الملابس"}, {nameen:"Shoes",namear:"الاحذية"}, 
{nameen:"Others",namear:"أخرى"}, {nameen:"Electronics",namear:"الالكترونيات"}, 
{nameen:"Books",namear:"الكتب"}];

//here is our base of code
function generateCChart(data){
    var columnChart = {
        series: data,
        chart: {
            type: "bar",
            height: 350,
            stacked: !1,
            columnWidth: "70%",
            zoom: {
                enabled: !0
            },
            toolbar: {
                show: !1
            },
            background: "transparent"
        },
        dataLabels: {
            enabled: !1
        },
        theme: {
            mode: colors.chartTheme
        },
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    position: "bottom",
                    offsetX: -10,
                    offsetY: 0
                }
            }
        }],
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "40%",
                radius: 30,
                enableShades: !1,
                endingShape: "rounded"
            }
        },
        xaxis: {
            type: "datetime",
            categories: ["01/01/2020 GMT", "01/02/2020 GMT", "01/03/2020 GMT", "01/04/2020 GMT", "01/05/2020 GMT", "01/06/2020 GMT", "01/07/2020 GMT", "01/08/2020 GMT", "01/09/2020 GMT", "01/10/2020 GMT", "01/11/2020 GMT", "01/12/2020 GMT", "01/13/2020 GMT", "01/14/2020 GMT", "01/15/2020 GMT", "01/16/2020 GMT", "01/17/2020 GMT", "01/18/2020 GMT"],
            labels: {
                show: !0,
                trim: !0,
                minHeight: void 0,
                maxHeight: 120,
                style: {
                    colors: colors.mutedColor,
                    cssClass: "text-muted",
                    fontFamily: base.defaultFontFamily
                }
            },
            axisBorder: {
                show: !1
            }
        },
        yaxis: {
            labels: {
                show: !0,
                trim: !1,
                offsetX: -10,
                minHeight: void 0,
                maxHeight: 120,
                style: {
                    colors: colors.mutedColor,
                    cssClass: "text-muted",
                    fontFamily: base.defaultFontFamily
                }
            }
        },
        legend: {
            position: "top",
            fontFamily: base.defaultFontFamily,
            fontWeight: 400,
            labels: {
                colors: colors.mutedColor,
                useSeriesColors: !1
            },
            markers: {
                width: 10,
                height: 10,
                strokeWidth: 0,
                strokeColor: "#fff",
                fillColors: [extend.primaryColor, extend.primaryColorLighter],
                radius: 6,
                customHTML: void 0,
                onClick: void 0,
                offsetX: 0,
                offsetY: 0
            },
            itemMargin: {
                horizontal: 10,
                vertical: 0
            },
            onItemClick: {
                toggleDataSeries: !0
            },
            onItemHover: {
                highlightDataSeries: !0
            }
        },
        fill: {
            opacity: 1,
            colors: [base.primaryColor, extend.primaryColorLighter]
        },
        grid: {
            show: !0,
            borderColor: colors.borderColor,
            strokeDashArray: 0,
            position: "back",
            xaxis: {
                lines: {
                    show: !1
                }
            },
            yaxis: {
                lines: {
                    show: !0
                }
            },
            row: {
                colors: void 0,
                opacity: .5
            },
            column: {
                colors: void 0,
                opacity: .5
            },
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            }
        }
    };

    console.log();

    var columnChart, columnChartoptions = columnChart,
    columnChartCtn = document.querySelector("#columnChart");
    columnChartCtn && (columnChart = new ApexCharts(columnChartCtn, columnChartoptions)).render();
}

function generateDChart(data,labels){
    var donutChartWidget, donutChartWidgetOptions = {
        series: data,
        chart: {
            type: "donut",
            height: 180,
            zoom: {
                enabled: !1
            },
            toolbar: {
                show: !1
            }
        },
        theme: {
            mode: colors.chartTheme
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "40%",
                    background: "transparent"
                },
                expandOnClick: !1
            }
        },
        labels: labels,
        dataLabels: {
            enabled: !0,
            style: {
                fontSize: "10px",
                fontFamily: base.defaultFontFamily,
                fontWeight: "300"
            }
        },
        legend: {
            show: !1
        },
        stroke: {
            show: !1,
            colors: colors.borderColor,
            width: 1,
            dashArray: 0
        },
        fill: {
            opacity: 1,
            colors: chartColors
        }
    },
    donutChartWidgetCtn = document.querySelector("#donutChartWidget");
    donutChartWidgetCtn && (donutChartWidget = new ApexCharts(donutChartWidgetCtn, donutChartWidgetOptions)).render();
}

function generateCharts(lang){
    var finalSalesData = [];
    
    var finalIndustriesData = [44, 55, 20, 41, 17];

    var finalIndustiresLabel = [];

    for(var i = 0;i < SalesData.length;i++){
        finalSalesData.push({
            name: lang == "ar" ? SalesData[i].namear : SalesData[i].nameen,
            data: SalesData[i].data
        });
    }

    for(var i = 0;i < IndustriesLabels.length;i++){
        finalIndustiresLabel.push(lang == "ar" ? IndustriesLabels[i].namear : IndustriesLabels[i].nameen);
    }

    generateCChart(finalSalesData);
    //generateDChart(finalIndustriesData,finalIndustiresLabel);
}



