@extends('layouts.advertiser')

@section('breadcrumb', 'Profile')
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing justify-content-center">
            <div class="col-lg-8 col-sm-12  layout-spacing">
                <div class="card">
                    <div class="card-header">
                        <h4 class="m-0">{{$title}}</h4>
                    </div>
                    <div class="card-body">
                        {{$description}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
