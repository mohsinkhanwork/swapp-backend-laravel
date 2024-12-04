@extends('layouts.advertiser')

@section('breadcrumb', __('ad.update-ad'))
@push('styles')
    <style>
        .banner-ad-type{
            background: #f4ffdb;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #d3d3d3;
        }
        .banner-ad-type label{
            margin: 0px;
        }
        </style>
        @if ($ad->type=='content')

            <style>
                .image-ad{
                    display: none;
                }
            </style>
        @else
            <style>
                .content-ad{
                    display: none;
                }
            </style>
        @endif

@endpush
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-8">
                            <h4>{{__('ad.update-ad')}}</h4>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{route('advertiser.ads.index')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                        </div>
                    </div>
                    @if ($ad->status=='rejected')
                        <div class="alert alert-danger">
                            <strong>{{__('dashboard.reject-reason')}}: </strong>
                            {{$ad->reject_reason}}
                        </div>
                    @endif
                    {{-- errors --}}
                    @include('partials.errors')
                    <div class="banner-ad-type">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input ad-type" type="radio" name="ad_type" id="contentAd" value="content" {{$ad->type=='content'?'checked':''}}>
                            <label class="form-check-label" for="contentAd">{{__('ad.design-your-ad-now')}}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input ad-type" type="radio" name="ad_type" id="imageAd" value="image" {{$ad->type=='image'?'checked':''}}>
                            <label class="form-check-label" for="imageAd">{{__('ad.upload-your-advertisement')}}</label>
                        </div>
                    </div>
                    <div class="content-ad">
                        <form method="POST" action="{{route('advertiser.ads.update',$ad->id)}}" id="postAdForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="type" value="content">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="title">{{__('dashboard.title')}} <span class="text-danger">*</span> </label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{$ad->title}}" required>
                                    </div>
                                </div>
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>{{__('ad.feature')}} 1</label>
                                        <input type="text" name="feature1" class="form-control" value="{{$ad->features[0]??''}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>{{__('ad.feature')}} 2</label>
                                        <input type="text" name="feature2" class="form-control" value="{{$ad->features[1]??''}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>{{__('ad.button-text')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="button_text" class="form-control" value="{{$ad->button_text??'Visit Now'}}" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>{{__('ad.button-link')}} <span class="text-danger">*</span></label>
                                        <input type="url" name="url" class="form-control" value="{{$ad->url}}" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="d-block">{{__('ad.text-color')}}</label>
                                        <input type="color" name="color" value="{{$ad->color}}" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="d-block">{{__('ad.background-color')}}</label>
                                        <input type="color" name="bg_color" value="{{$ad->bg_color??'#edffc5'}}" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="d-block">{{__('ad.button-text-color')}}</label>
                                        <input type="color" name="button_color" value="{{$ad->button_color??'#ffffff'}}" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="d-block">{{__('ad.button-background-color')}}</label>
                                        <input type="color" name="button_bg_color" value="{{$ad->button_bg_color}}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="desc">{{__('dashboard.description')}} <span class="text-danger">*</span> <small class="text-primary">(max length: 200 characters)</small> </label>
                                        <textarea name="description" id="desc" class="form-control" placeholder="Description" rows="2" required maxlength="200">{{$ad->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary" type="submit">
                                    {{__('dashboard.submit')}}
                                </button>
                            </div>
                        </form>
                        <hr>
                        <div class="my-3">
                            <h3>{{__('ad.preview')}}</h3>
                            <div
                                style="background-color: {{$ad->bg_color}}; color: {{$ad->color}};"
                                class="banner-ad">
                                <div class="banner-description">
                                    <h5 id="ad-title">{{$ad->title}}</h5>
                                    <p id="ad-description">{{$ad->description??'Ad Description'}}</p>
                                    <div class="banner-features">
                                        <p class="m-0">
                                            <i class="fas fa-check"></i>
                                            <span id="feature1">{{$ad->features[0]??'Feature 1'}}</span>
                                        </p>
                                        <p class="m-0">
                                            <i class="fas fa-check"></i>
                                            <span id="feature2">{{$ad->features[1]??'Feature 2'}}</span>
                                        </p>
                                    </div>
                                </div>
                                <button
                                    style="background-color: {{$ad->button_bg_color}}; color: {{$ad->button_color}};"
                                    class="btn" id="ad-button">{{$ad->button_text??'Visit Now'}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="image-ad">
                        <form method="POST" action="{{route('advertiser.ads.update',$ad->id)}}" id="postImageAdForm" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="type" value="image">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="title">{{__('dashboard.title')}} <span class="text-danger">*</span> </label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{$ad->title}}" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>{{__('ad.ad-link')}} <span class="text-danger">*</span></label>
                                        <input type="url" name="url" class="form-control" value="{{$ad->url}}" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">{{__('ad.upload-ad')}} <span class="text-danger">*</span><strong class="text-info">(Recommended size: 1080 * 200)</strong> </label>
                                        <input class="form-control" name="image" type="file" id="image" accept="image/*" {{$ad->image?'':'required'}}>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary" type="submit">
                                    {{__('dashboard.submit')}}
                                </button>
                            </div>
                        </form>
                        <hr>
                        <div class="my-3">
                            <h3>{{__('ad.preview')}}</h3>
                            <div class="banner-img-ad">
                                @if ($ad->image)
                                    <img src="{{$ad->image}}" alt="">
                                @else
                                    <img src="{{asset('assets/images/banner-placeholder.jpg')}}" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $("#postAdForm,#postImageAdForm").on('submit',function(e){
                let form=$(this);
                e.preventDefault();
                Swal.fire({
                    title: 'Please Confirm all the information is correct',
                    text: "After form submission, your ad will again go to admin for short review and then published automatically.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Proceed!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form[0].submit();
                        }
                    });
                });
            $("input").on('keyup',function(){
                let input_name=$(this).attr('name');
                let val=$(this).val();
                if(input_name=='title'){
                    $("#ad-title").text(val);
                }
                else if(input_name=='feature1'){
                    $("#feature1").text(val);
                }
                else if(input_name=='feature2'){
                    $("#feature2").text(val);
                }
                else if(input_name=='button_text'){
                    $("#ad-button").text(val);
                }
            });
            $("input").on('change',function(){
                let input_name=$(this).attr('name');
                let val=$(this).val();
                if(input_name=='bg_color'){
                    $(".banner-ad").css('background-color',val);
                }
                else if(input_name=='color'){
                    $(".banner-ad").css('color',val);
                }
                else if(input_name=='button_color'){
                    $("#ad-button").css('color',val);
                }
                else if(input_name=='button_bg_color'){
                    $("#ad-button").css('background-color',val);
                }
            });
            $("#desc").on('keyup',function(){
                $("#ad-description").html($(this).val());
            });
            $(".ad-type").on('change',function(){
                let val=$('.ad-type:checked').val();
                if(val=='content'){
                    $(".image-ad").hide();
                    $(".content-ad").show();
                }else{
                    $(".content-ad").hide();
                    $(".image-ad").show();
                }
            });
        });
        const input = document.getElementById('image');
        input.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
            const fileSize = file.size / (1024 * 1024);
            if (fileSize > 5) {
                alert('File size exceeds 5MB limit.');
                input.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                $(".banner-img-ad img").attr('src',e.target.result);
            };
            reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
