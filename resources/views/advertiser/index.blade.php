@extends('layouts.advertiser')
@push('styles')
    <link href="{{asset('admin-assets/plugins/src/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-assets/css/light/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-assets/css/dark/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="middle-content container-xxl p-0">
    <div class="row layout-top-spacing">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">{{__('dashboard.total-campaigns')}}</h6>
                        </div>
                    </div>
                    <div class="w-content my-2">
                        <div class="w-info">
                            <p class="value">{{$total_campaigns}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">{{__('dashboard.active-campaigns')}}</h6>
                        </div>
                    </div>
                    <div class="w-content my-2">
                        <div class="w-info">
                            <p class="value">{{$active_campaigns}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">{{__('dashboard.total-views')}}</h6>
                        </div>
                    </div>
                    <div class="w-content my-2">
                        <div class="w-info">
                            <p class="value">{{$total_views}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">{{__('dashboard.current-month-views')}}</h6>
                        </div>
                    </div>
                    <div class="w-content my-2">
                        <div class="w-info">
                            <p class="value">{{$current_month_views}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-three">
                <div class="widget-heading">
                    <div class="">
                        <h5 class="">{{__('dashboard.last-30-days-stats')}}</h5>
                    </div>

                    {{-- <div class="task-action">
                        <div class="dropdown ">
                            <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>

                            <div class="dropdown-menu left" aria-labelledby="uniqueVisitors">
                                <a class="dropdown-item" href="javascript:void(0);">View</a>
                                <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="widget-content">
                    <div id="viewsStats"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-activity-five">

                <div class="widget-heading">
                    <h5 class="">{{__('dashboard.active-campaigns')}}</h5>

                    <div class="task-action">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>

                            <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                <a class="dropdown-item" href="{{route('advertiser.ads.index')}}">{{__('dashboard.view-all')}}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget-content">

                    <div class="w-shadow-top"></div>

                    <div class="mt-container mx-auto">
                        <div class="timeline-line">
                            @if ($ads->count()>0)
                                @foreach ($ads as $ad)
                                    <div class="item-timeline timeline-new">
                                        <div class="t-dot">
                                            <div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                        </div>
                                        <div class="t-content">
                                            <div class="t-uppercontent">
                                                <h5>{{$ad->title}} - ({{$ad->package->type}})</h5>
                                            </div>
                                            <p>Expiry: {{$ad->ends_on->format('d M, Y')}}
                                                -
                                                <a href="{{route('advertiser.ad.stats',$ad->id)}}" class="text-primary">View</a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center">No Active Campagin</p>
                            @endif
                        </div>
                    </div>

                    <div class="w-shadow-bottom"></div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@php
    $jsonData = json_encode($view_data);
    $jsonLabel = json_encode($view_labels);
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
                    text: '',
                    align: 'left'
                },
                grid: {
                    row: {
                    colors: ['#f1f2f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                    },
                },
                xaxis: {
                    categories: {!! $jsonLabel !!},
                }
            }

            var chart = new ApexCharts(
                document.querySelector("#viewsStats"),
                sline
            );

            chart.render();
    </script>
@endpush
