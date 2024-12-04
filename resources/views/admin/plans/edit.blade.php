@extends('layouts.admin')

@section('breadcrumb', __('dashboard.plans'))

@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-8 mb-4">
                            <h4>{{__('dashboard.update-plan')}}</h4>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{route('admin.plans.index')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                        </div>
                    </div>
                    {{-- errors --}}
                    @include('partials.errors')
                    <form method="POST" action="{{route('admin.plans.update',$plan->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title">{{__('dashboard.title')}}<span class="text-danger">*</span> </label>
                                    <input type="text" name="title" id="title" class="form-control" required value="{{$plan->title}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="type">{{__('dashboard.type')}}<span class="text-danger">*</span> </label>
                                    <input type="text" name="type" id="type" class="form-control" required value="{{$plan->type}}" readonly>
                                </div>
                            </div>
                            @if ($plan->type=='paid')
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="type">{{__('dashboard.price')}}<span class="text-danger">*</span> </label>
                                        <input type="number" step=".01" name="monthly_price" id="type" class="form-control" required value="{{$plan->monthly_price}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="type">{{__('dashboard.price-id')}}<span class="text-danger">*</span> <small class="text-secondary">(price and price Id should be same as on Paddle)</small> </label>
                                        <input type="text" name="monthly_price_id" id="type" class="form-control" required value="{{$plan->monthly_price_id}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="type">{{__('dashboard.yearly-price')}} </label>
                                        <input type="number" step=".01" name="yearly_price" id="type" class="form-control" required value="{{$plan->yearly_price}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="type">{{__('dashboard.yearly-price-id')}} <small class="text-secondary">(price and price Id should be same as on Paddle)</small> </label>
                                        <input type="text" name="yearly_price_id" id="type" class="form-control" required value="{{$plan->yearly_price_id}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>{{__('dashboard.active')}}</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="active" id="activeYes" value="1" {{$plan->active?'checked':''}}>
                                                <label class="form-check-label" for="activeYes">YES</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="active" id="activeNo" value="0" {{$plan->active?'':'checked'}}>
                                                <label class="form-check-label" for="activeNo">NO</label>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="active" value="1">
                            @endif
                            <div class="col-12">
                                <div class="mb-3">
                                    <label>{{__('dashboard.description')}} <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" cols="30" rows="5" required>{{$plan->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>{{__('dashboard.features')}}</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label>{{__('dashboard.monthly-swaps')}}<span class="text-danger">*</span></label>
                                            <input type="number" name="monthly_swaps" class="form-control" value="{{$plan->monthly_swaps}}" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label>{{__('dashboard.retry-exam-duration')}} <span class="text-danger">*</span> <small class="text-secondary">(hours)</small></label>
                                            <input type="number" name="retry_exam_duration" class="form-control" value="{{$plan->retry_exam_duration}}" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label>{{__('dashboard.priority-support')}}</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="priority_support" id="priorityYes" value="1" {{$plan->priority_support?'checked':''}}>
                                                    <label class="form-check-label" for="priorityYes">YES</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="priority_support" id="priorityNo" value="0" {{$plan->priority_support?'':'checked'}}>
                                                    <label class="form-check-label" for="priorityNo">NO</label>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label>{{__('dashboard.show-ads')}}</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="show_ads" id="adYes" value="1" {{$plan->show_ads?'checked':''}}>
                                                    <label class="form-check-label" for="adYes">YES</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="show_ads" id="adNo" value="0" {{$plan->show_ads?'':'checked'}}>
                                                    <label class="form-check-label" for="adNo">NO</label>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
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
