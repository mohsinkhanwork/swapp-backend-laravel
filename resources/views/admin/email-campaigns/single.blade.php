@extends('layouts.admin')

@section('breadcrumb', 'Advertisement')
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="col-12 text-end mb-2">
                    <a href="{{route('admin.email-campaigns.index')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                </div>
                <div class="widget-content widget-content-area br-8">
                    <h6> <strong>{{__('dashboard.added-by')}} : </strong>
                        {{$compaign->admin->name}} - ({{$compaign->admin->email}})
                    </h6>
                    <h6> <strong>{{__('dashboard.subject')}} : </strong>
                        {{$compaign->subject}}
                    </h6>
                    <h6> <strong>{{__('dashboard.date')}} : </strong>
                        {{$compaign->created_at->format('d M, Y g:i A')}}
                    </h6>
                    <h6> <strong>{{__('dashboard.users-reached')}} : </strong>
                        {{$compaign->users_reached}}
                    </h6>
                    <h6>{{__('dashboard.content')}}: </h6>
                    <div class="border p-4 rounded">
                        {!!$compaign->body!!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
