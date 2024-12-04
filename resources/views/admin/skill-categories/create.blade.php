@extends('layouts.admin')

@section('breadcrumb', __('dashboard.skill-categories'))

@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-8 mb-4">
                            <h4>{{__('dashboard.add-skill-category')}}</h4>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{route('admin.skill-categories.index')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                        </div>
                    </div>
                    {{-- errors --}}
                    @include('partials.errors')
                    <form method="POST" action="{{route('admin.skill-categories.store')}}">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-6">
                                <label for="name-en">{{__('dashboard.title')}} (en) <span class="text-danger">*</span> </label>
                                <input type="text" name="title_en" id="name-en" class="form-control" placeholder="Title in English" required>
                            </div>
                            <div class="col-6">
                                <label for="name-tr">{{__('dashboard.title')}} (tr) <span class="text-danger">*</span> </label>
                                <input type="text" name="title_tr" id="name-tr" class="form-control" placeholder="Title in Turkish" required>
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
