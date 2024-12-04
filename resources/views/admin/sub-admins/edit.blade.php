@extends('layouts.admin')

@section('breadcrumb', __('dashboard.sub-admins'))
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 mb-4">
                            <h4>{{__('dashboard.update-sub-admin')}}</h4>
                        </div>
                    </div>
                    {{-- errors --}}
                    @include('partials.errors')
                    <form method="POST" action="{{route('admin.sub-admins.update',$admin->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name">{{__('dashboard.name')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required value="{{$admin->name}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="email">{{__('dashboard.email')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" required value="{{$admin->email}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="password">{{__('dashboard.password')}}</label>
                                    <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="">{{__('dashboard.roles')}} <span class="text-danger">*</span></label>
                                @foreach ($roles as $role)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{$role->name}}" id="role-{{$role->id}}" {{in_array($role->id,$admin->roles()->pluck('id')->toArray())?'checked':''}}>
                                        <label class="form-check-label" for="role-{{$role->id}}">{{$role->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary" type="submit">
                                {{__('dashboard.submit')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
