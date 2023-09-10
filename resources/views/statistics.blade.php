@if ( Auth::user()->role  === 'admin' || Auth::user()->role === 'manager')
@extends('master')

@section('titleclass')
    statistics_nav
@endsection

@section('css')

@endsection

@section('pagecontent')


<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row">
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow bg-primary text-white border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm bg-primary-light">
                        <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                      </span>
                    </div>
                    <div class="col pr-0">
                      <p class="small text-muted mb-0">صافي الارباح السنويه</p>
                      <span class="h3 mb-0 text-white">{{$statistics_data[0]['net_profit']['total_sales']}}</span>
                      <span class="small text-muted">+{{$statistics_data[0]['net_profit']['total_sales_percentage']}}%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm bg-primary">
                        <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                      </span>
                    </div>
                    <div class="col pr-0">
                      <p class="small text-muted mb-0">المبيعات السنوية</p>
                      <span class="h3 mb-0">{{$statistics_data[0]['annual_profits']['total_sales']}}</span>
                      <span class="small text-success">+{{$statistics_data[0]['annual_profits']['total_sales_percentage']}}%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm bg-primary">
                        <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                      </span>
                    </div>
                    <div class="col pr-0">
                      <p class="small text-muted mb-0">المبيعات الشهريه</p>
                      <span class="h3 mb-0">{{$statistics_data[0]['monthly_profits']['total_sales']}}</span>
                      <span class="small text-success">+{{$statistics_data[0]['monthly_profits']['total_sales_percentage']}}%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm bg-primary">
                        <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                      </span>
                    </div>
                    <div class="col pr-0">
                      <p class="small text-muted mb-0">الخسائر</p>
                      <span class="h3 mb-0">{{$statistics_data[0]['net_loss']['total_loss']}}</span>
                      <span class="small text-success">+{{$statistics_data[0]['net_loss']['total_loss_percentage']}}%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end section -->
          
          <div class="row align-items-center my-2">
            <div class="col-auto ml-auto">
              <form class="form-inline">
                <div class="form-group">
                  <label for="reportrange" class="sr-only">Date Ranges</label>
                  <div id="reportrange" class="px-2 py-2 text-muted">
                    <i class="fe fe-calendar fe-16 mx-2"></i>
                    <span class="small"></span>
                  </div>
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-12 text-muted"></span></button>
                  <button type="button" class="btn btn-sm"><span class="fe fe-filter fe-12 text-muted"></span></button>
                </div>
              </form>
            </div>
          </div>
          <!-- charts-->
          <div class="row my-4">
            <div class="col-md-12">
              <div class="chart-box">
                <div id="StatisticsChart"></div>
              </div>
            </div> <!-- .col -->
          </div> <!-- end section -->
          <!-- info small box -->
          <div class="row">
            <div class="col-md-12">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="card-title">
                    <strong><div class="industries_title"></div></strong>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div id="chart-box">
                        <div id="donutChartWidget"></div>
                      </div>
                    </div>
                    <div class="col-md-12">

                      @foreach ($statistics_data[0]['sectors'] as $sector)
                        <div class="row align-items-center my-3">
                          <div class="col">
                            <strong>{{$sector['name']}}</strong>
                            <div class="my-0 text-muted small">Sales</div>
                          </div>
                          <div class="col-auto">
                            <strong>+{{$sector['growth']}}%</strong>
                          </div>
                          <div class="col-3">
                            <div class="progress" style="height: 4px;">
                              <div class="progress-bar" role="progressbar" style="width: {{$sector['growth']}}%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      @endforeach

                    </div> <!-- .col-md-12 -->
                  </div> <!-- .row -->
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col-md -->
          </div> <!-- / .row -->
        </div>
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->


  </main> <!-- main -->
@endsection

@php $charts_data= json_encode($statistics_data[0]['chart'],true); @endphp

@section('javascript_middle')

  <script src="{{asset('assets/js/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/js/apexcharts.custom.js')}}"></script>

@endsection

@section('javascript_front')

  <script>
    var SalesData = [{
        nameen: "Orders",
        namear: "الطلبات",
        data: [32, 66, 44, 55, 41, 24, 67, 22, 43, 32, 66, 44, 55, 41, 24, 67, 22, 43]
        }, {
        nameen: "Visitors",
        namear: "الزوار",
        data: [7, 30, 13, 23, 20, 12, 8, 13, 27, 7, 30, 13, 23, 20, 12, 8, 13, 27]
    }]

    
    newsstring = '{!! $charts_data !!}'.replace(/\s/g, '');

    var ChartsData = JSON.parse(newsstring);

    function generateChartBase(data){
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
    columnChartCtn = document.querySelector("#StatisticsChart");
    columnChartCtn && (columnChart = new ApexCharts(columnChartCtn, columnChartoptions)).render();
    }

    function generateChartStatistics(lang){
      console.log('this is greate teasfojnd sjiha fhjidsahfuiquiha');
      var finalSalesData = [];

      for(var i = 0;i < ChartsData.length;i++){
        finalSalesData.push({
            name: lang == "ar" ? ChartsData[i].namear : ChartsData[i].nameen,
            data: ChartsData[i].data
        });
      }

      generateChartBase(finalSalesData);
    }
  </script>
@endsection
@else
  <script type="text/javascript">
    window.location = "{{ url('/') }}";//here double curly bracket
  </script>
@endif