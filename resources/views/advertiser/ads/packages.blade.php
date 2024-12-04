@extends('layouts.advertiser')

@section('breadcrumb', 'Ad Package')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/plugins/src/table/datatable/datatables.css')}}">
@endpush
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-content widget-content-area br-8 p-4">
                            <h4 class="mb-4">{{__('ad.select-ad-package')}}</h4>
                            <div class="row">
                                @foreach ($packages as $package)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="package text-center border py-4 px-3 rounded border-primary">
                                            <h5>{{$package->title}}</h5>
                                            <h2 class="my-4 text-primary fw-bold">${{number_format($package->price,2)}}</h2>
                                            <p class="mb-4">{{$package->description}}</p>
                                            <a href="{{route('advertiser.ads.create',$package->id)}}" class="btn btn-primary">{{__('ad.select-package')}}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('admin-assets/plugins/src/table/datatable/datatables.js')}}"></script>
@endpush
