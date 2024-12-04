@extends('layouts.admin')

@section('breadcrumb', __('dashboard.skills'))

@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-8 mb-4">
                            <h4>{{__('dashboard.update-skill')}}</h4>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{route('admin.skills.index')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                        </div>
                    </div>
                    {{-- errors --}}
                    @include('partials.errors')
                    <form method="POST" action="{{route('admin.skills.update',$skill->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name-en">{{__('dashboard.title')}} (en) <span class="text-danger">*</span> </label>
                                    <input type="text" name="title_en" id="name-en" class="form-control" placeholder="Title in English" required value="{{$skill->title_en}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name-tr">{{__('dashboard.title')}} (tr) <span class="text-danger">*</span> </label>
                                    <input type="text" name="title_tr" id="name-tr" class="form-control" placeholder="Title in Turkish" required value="{{$skill->title_tr}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="category">{{__('dashboard.category')}} <span class="text-danger">*</span></label>
                                    <select name="category_id" id="category" class="form-control" required>
                                        <option value="">--select--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id==$skill->category_id?'selected':''}}>{{$category->title_en}}</option>
                                        @endforeach
                                    </select>
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
