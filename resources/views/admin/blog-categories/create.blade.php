@extends('layouts.admin')

@section('breadcrumb', 'Blog Categories')

@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-8">
                            <h4>Add Blog Categories</h4>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{route('admin.blog-categories.index')}}" class="btn btn-info">Go Back</a>
                        </div>
                    </div>
                    {{-- errors --}}
                    @include('partials.errors')
                    <form method="POST" action="{{route('admin.blog-categories.store')}}">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-6">
                                <label for="name">Name <span class="text-danger">*</span> </label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-6">
                                <label for="parent">Parent Category</label>
                                <select name="parent_id" id="parent" class="form-control">
                                    <option value="">--select--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
