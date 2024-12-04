@extends('layouts.admin')
@push('styles')
    <link href="{{asset('admin-assets/plugins/src/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-assets/css/light/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-assets/css/dark/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-assets/css/light/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-assets/css/dark/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="middle-content container-xxl p-0">
    <div class="row layout-top-spacing">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">{{__('dashboard.users')}}</h6>
                        </div>
                    </div>
                    <div class="w-content my-2">
                        <div class="w-info">
                            <p class="value">{{$users_count}}</p>
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
                            <h6 class="value">{{__('dashboard.number-of-swaps')}}</h6>
                        </div>
                    </div>
                    <div class="w-content my-2">
                        <div class="w-info">
                            <p class="value">{{$swaps_count}}</p>
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
                            <h6 class="value">{{__('dashboard.exams-taken')}}</h6>
                        </div>
                    </div>
                    <div class="w-content my-2">
                        <div class="w-info">
                            <p class="value">{{$exams}}</p>
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
                            <h6 class="value">{{__('dashboard.approved-skills')}}</h6>
                        </div>
                    </div>
                    <div class="w-content my-2">
                        <div class="w-info">
                            <p class="value">{{$approved_skills}}</p>
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
                            <h6 class="value">{{__('dashboard.advertisers')}}</h6>
                        </div>
                    </div>
                    <div class="w-content my-2">
                        <div class="w-info">
                            <p class="value">{{$advertisers_count}}</p>
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
                            <h6 class="value">{{__('dashboard.total-revenue')}}</h6>
                        </div>
                    </div>
                    <div class="w-content my-2">
                        <div class="w-info">
                            <p class="value">$ {{number_format($total_revenue,2)}}</p>
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
                            <h6 class="value">{{__('dashboard.current-month')}}</h6>
                        </div>
                    </div>
                    <div class="w-content my-2">
                        <div class="w-info">
                            <p class="value">$ {{number_format($current_month,2)}}</p>
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
                            <h6 class="value">{{__('dashboard.last-month')}}</h6>
                        </div>
                    </div>
                    <div class="w-content my-2">
                        <div class="w-info">
                            <p class="value">$ {{number_format($last_month,2)}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-three">
                <div class="widget-heading">
                    <div class="">
                        <h5 class="">{{__('dashboard.last-30-days-users')}}</h5>
                    </div>
                </div>

                <div class="widget-content">
                    <div id="registerUsers"></div>
                </div>
            </div>
        </div>
        @can('logs')
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-activity-five">

                    <div class="widget-heading">
                        <h5 class="">{{__('dashboard.activity-logs')}}</h5>

                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                    <a class="dropdown-item" href="{{route('admin.logs.index')}}">{{__('dashboard.view-all')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content">

                        <div class="w-shadow-top"></div>

                        <div class="mt-container mx-auto">
                            <div class="timeline-line">
                                @foreach ($logs as $log)
                                    <div class="item-timeline timeline-new">
                                        <div class="t-content">
                                            <div class="t-uppercontent">
                                                @php
                                                    $causer_name=$log->causer->name;
                                                @endphp
                                                <h5>{!!str_replace('Admin ',"<strong class='fw-bold text-success'>$causer_name </strong>",$log->description)!!}</h5>
                                            </div>
                                            <p>
                                                {{$log->created_at->format('d M, Y')}}
                                                -
                                                <a href="{{route('admin.logs.show',$log->id)}}" class="text-primary">View</a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="w-shadow-bottom"></div>
                    </div>
                </div>
            </div>
        @endcan
        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">{{__('dashboard.recent-swaps')}}</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><div class="th-content">{{__('dashboard.id')}}</div></th>
                                    <th><div class="th-content">{{__('dashboard.user1')}}</div></th>
                                    <th><div class="th-content">{{__('dashboard.user2')}}</div></th>
                                    <th><div class="th-content">{{__('dashboard.date')}}</div></th>
                                    <th><div class="th-content">{{__('dashboard.status')}}</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($swaps as $swap)
                                    <tr>
                                        <td><div class="td-content customer-name"><span>{{$swap->id}}</span></div></td>
                                        @foreach ($swap->users as $user)
                                            <td>
                                                <div class="text-left">
                                                    <p class="m-0">
                                                        {{$user->name}}
                                                    </p>
                                                    <p class="m-0">
                                                        {{$user->email}}
                                                    </p>
                                                </div>
                                            </td>
                                        @endforeach
                                        <td><div class="td-content">{{$swap->created_at->format('d M, Y')}}</div></td>
                                        <td><div class="td-content"><span class="badge badge-success">{{$swap->status}}</span></div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-three">

                <div class="widget-heading">
                    <h5 class="">{{__('dashboard.top-rated-users')}}</h5>
                </div>
                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table table-scroll">
                            <thead>
                                <tr>
                                    <th><div class="th-content">{{__('dashboard.user')}}</div></th>
                                    <th><div class="th-content">{{__('dashboard.total-swaps')}}</div></th>
                                    <th><div class="th-content th-heading">{{__('dashboard.rating')}}</div></th>
                                    <th><div class="th-content th-heading">{{__('dashboard.verified-skills')}}</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td><div class="td-content product-name"><img src="{{$user->avatar}}" alt="product"><div class="align-self-center"><p class="prd-name">{{$user->name}}</p><p class="prd-category text-primary">{{$user->email}}</p></div></div></td>
                                        <td><div class="td-content"><span class="pricing">{{$user->swaps_count}}</span></div></td>
                                        <td><div class=""><span class="discount-pricing">({{number_format($user->avg_rating,2)}}) - {{$user->rating_count}}</span></div></td>
                                        <td><div class="td-content">{{$user->skills_count}}</div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@php
    $jsonData = json_encode($user_data);
    $jsonLabel = json_encode($user_labels);
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
                    name: "Users Registered",
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
                document.querySelector("#registerUsers"),
                sline
            );

            chart.render();
    </script>
@endpush
