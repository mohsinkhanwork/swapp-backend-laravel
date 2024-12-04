@extends('layouts.advertiser')

@section('breadcrumb', 'Ad Package')

@push('styles')
    <link href="{{asset('admin-assets/plugins/src/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-assets/css/light/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-assets/css/dark/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-content widget-content-area br-8 p-4">
                            <div class="row justify-content-between">
                                <div class="col-md-8">
                                    <h4 class="mb-4">
                                        {{$ad->title}}
                                    </h4>
                                </div>
                                <div class="col-md-3">
                                    <form action="" method="get">
                                        <select name="month" id="monthFilter" class="form-control">
                                            <option value="current">This Month</option>
                                            <option value="last" {{request('month')=='last'?'selected':''}}>Last Month</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <div id="adStats"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@php
    $jsonData = json_encode($data);
    $jsonLabel = json_encode($labels);
@endphp
@push('scripts')
    <script src="{{asset('admin-assets/plugins/src/apex/apexcharts.min.js')}}"></script>
    <script>
      var sline = {
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                enabled: false
                },
                toolbar: {
                show: false,
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            series: [{
                name: "Views",
                data: {!! $jsonData !!}
            }],
            title: {
                text: 'Views by Month',
                align: 'left'
            },
            grid: {
                row: {
                colors: ['#f1f2f3', 'transparent'],
                opacity: 0.5
                },
            },
            xaxis: {
                categories: {!! $jsonLabel !!},
            }
        }

        var chart = new ApexCharts(
        document.querySelector("#adStats"),
        sline
        );
        chart.render();

        $(document).ready(function(){
            $("#monthFilter").on('change',function(){
                $(this).parents('form')[0].submit();
            })
        });
    </script>
@endpush
