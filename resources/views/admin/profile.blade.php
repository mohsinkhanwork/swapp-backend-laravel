@extends('layouts.admin')

@section('breadcrumb', __('dashboard.profile'))
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="row">
                    <div class="col-12">
                        {{-- errors --}}
                        @include('partials.errors')
                    </div>
                    <div class="col-lg-6">
                        <div class="widget-content widget-content-area br-8">
                            <h4 class="mb-4">{{__('dashboard.profile')}}</h4>
                            <form method="POST" action="{{route('admin.update-profile')}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name">{{__('dashboard.name')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{$user->name}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email">{{__('dashboard.email')}} <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="email" class="d-block">{{__('dashboard.enable-2fa')}}</label>
                                        <div>
                                            <input class="toggle-input" name="enable_2fa" type="checkbox" id="activeToggle" {{$user->enable_2fa?'checked':''}} value="1">
                                            <label for="activeToggle" class="toggle-btn"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary">
                                        {{__('dashboard.save')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="widget-content widget-content-area br-8">
                            <h4 class="mb-4">{{__('dashboard.update-password')}}</h4>
                            <form method="POST" action="{{route('admin.update-password')}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="current_password">{{__('dashboard.current-password')}} <span class="text-danger">*</span> </label>
                                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password">{{__('dashboard.new-password')}} <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password">{{__('dashboard.confirm-password')}} <span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" id="confirm_password" class="form-control" required>
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

        </div>
    </div>
@endsection
