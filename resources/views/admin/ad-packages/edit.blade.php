@extends('layouts.admin')

@section('breadcrumb', __('dashboard.ad-packages'))

@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-8 mb-4">
                            <h4>{{__('dashboard.update-ad-packages')}}</h4>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{route('admin.ad-packages.index')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                        </div>
                    </div>
                    {{-- errors --}}
                    @include('partials.errors')
                    <form method="POST" action="{{route('admin.ad-packages.update',$package->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title">{{__('dashboard.title')}}<span class="text-danger">*</span> </label>
                                    <input type="text" name="title" id="title" class="form-control" required value="{{$package->title}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="type">{{__('dashboard.price')}}<span class="text-danger">*</span> </label>
                                    <input type="number" name="price" id="type" class="form-control" required value="{{$package->price}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="priceId">{{__('dashboard.price-id')}}<span class="text-danger">*</span> </label>
                                    <input type="text" name="price_id" id="priceId" class="form-control" required value="{{$package->price_id}}">
                                </div>
                            </div>
                            @if ($package->type!='notification')
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="">{{__('dashboard.duration')}}</label>
                                        <select name="duration" class="form-control" required>
                                            <option value="14">14 days</option>
                                            <option value="30">30 days</option>
                                            <option value="180">180 days</option>
                                            <option value="365">365 days</option>
                                        </select>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="duration" value="1">
                            @endif
                            <div class="col-12">
                                <div class="mb-3">
                                    <label>{{__('dashboard.description')}} <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" cols="30" rows="5" required>{{$package->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary">
                                {{__('dashboard.submit')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
