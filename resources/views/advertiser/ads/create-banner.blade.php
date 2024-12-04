@extends('layouts.advertiser')

@section('breadcrumb', __('dashboard.post-new-ad'))
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
        .image-ad{
            display: none;
        }
    </style>
@endpush
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-8">
                            <h4>{{__('dashboard.post-new-ad')}}</h4>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{route('advertiser.ads.index')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                        </div>
                    </div>
                    {{-- errors --}}
                    @include('partials.errors')
                    <div class="banner-ad-type">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input ad-type" type="radio" name="ad_type" id="contentAd" value="content" checked>
                            <label class="form-check-label" for="contentAd">{{__('ad.design-your-ad-now')}}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input ad-type" type="radio" name="ad_type" id="imageAd" value="image">
                            <label class="form-check-label" for="imageAd">{{__('ad.upload-your-advertisement')}}</label>
                        </div>
                    </div>
                    <div class="content-ad">
                        <form method="POST" action="{{route('advertiser.ads.store',$package->id)}}" id="postAdForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="package_quantity" value="1" class="quantity">
                            <input type="hidden" name="type" value="content">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="title">{{__('dashboard.title')}} <span class="text-danger">*</span> </label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
                                    </div>
                                </div>
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>{{__('ad.feature')}} 1</label>
                                        <input type="text" name="feature1" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>{{__('ad.feature')}} 2</label>
                                        <input type="text" name="feature2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>{{__('ad.button-text')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="button_text" class="form-control" value="Visit Now" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>{{__('ad.button-link')}} <span class="text-danger">*</span></label>
                                        <input type="url" name="url" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="d-block">{{__('ad.text-color')}}</label>
                                        <input type="color" name="color" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="d-block">{{__('ad.background-color')}}</label>
                                        <input type="color" name="bg_color" required value="#edffc5">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="d-block">{{__('ad.button-text-color')}}</label>
                                        <input type="color" name="button_color" required value="#ffffff">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="d-block">{{__('ad.button-background-color')}}</label>
                                        <input type="color" name="button_bg_color" required value="#000000">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="desc">{{__('dashboard.description')}} <span class="text-danger">*</span> <small class="text-primary">(max length: 200 characters)</small> </label>
                                        <textarea name="description" id="desc" class="form-control" placeholder="Description" rows="2" required maxlength="200"></textarea>
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
                            <div class="banner-ad">
                                <div class="banner-description">
                                    <h5 id="ad-title">Ad Title</h5>
                                    <p id="ad-description">Ad Description</p>
                                    <div class="banner-features">
                                        <p class="m-0">
                                            <i class="fas fa-check"></i>
                                            <span id="feature1">{{__('ad.feature')}} 1</span>
                                        </p>
                                        <p class="m-0">
                                            <i class="fas fa-check"></i>
                                            <span id="feature2">{{__('ad.feature')}} 2</span>
                                        </p>
                                    </div>
                                </div>
                                <button class="btn" id="ad-button">{{__('ad.visit-now')}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="image-ad">
                        <form method="POST" action="{{route('advertiser.ads.store',$package->id)}}" id="postImageAdForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="package_quantity" value="1" class="quantity">
                            <input type="hidden" name="type" value="image">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="title">{{__('dashboard.title')}} <span class="text-danger">*</span> </label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>{{__('ad.ad-link')}}<span class="text-danger">*</span></label>
                                        <input type="url" name="url" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">{{__('ad.upload-ad')}} <span class="text-danger">*</span> <strong class="text-info">(Recommended size: 1080 * 200)</strong> </label>
                                        <input class="form-control" name="image" type="file" id="image" accept="image/*" required >
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
                                <img src="{{asset('assets/images/banner-placeholder.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="packageQuantityModal" tabindex="-1" role="dialog" aria-labelledby="packageQuantityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="packageQuantityModalLabel">{{__('ad.post-advertisement')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <svg> ... </svg>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <div class="alert alert-warning">
                            {{__('ad.payment-description')}}
                        </div>
                        <p>
                            <strong class="fw-bold">
                                {{__('dashboard.price')}}:
                            </strong>
                            ${{number_format($package->price,2)}} * <span class="qty-text">1</span>
                        </p>
                        <p>
                            <strong class="fw-bold">
                                {{__('dashboard.duration')}}:
                            </strong>
                            {{$package->duration}} * <span class="qty-text">1</span> (days)
                        </p>
                        <p>
                            <strong class="fw-bold">
                                {{__('dashboard.total')}}:
                            </strong>
                            <span id="total">
                                ${{number_format($package->price,2)}}
                            </span>
                        </p>
                        <label>{{__('dashboard.quantity')}}</label>
                        <input type="number" class="form-control" min="1" value="1" id="packageQty">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn btn-light-dark" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> {{__('dashboard.discard')}}</button>
                    <button type="button" class="btn btn-primary" id="proceed">{{__('dashboard.proceed')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $("#postAdForm,#postImageAdForm").on('submit',function(e){
                e.preventDefault();
                $("#packageQuantityModal").modal('show');
            });
            $("#proceed").on('click',function(e){
                let val=$('.ad-type:checked').val();
                if(val=='content'){
                    $("#postAdForm")[0].submit();
                }else{
                    $("#postImageAdForm")[0].submit();
                }
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
            let price={{$package->price}};
            $("#packageQty").on('change',function(){
                let quantity=$(this).val();
                $(".qty-text").text(quantity);
                $(".quantity").val(quantity);
                let total=price*quantity
                $("#total").text(`$${total}`);
            });
            $("#packageQty").on('keyup',function(){
                let quantity=$(this).val();
                $(".qty-text").text(quantity);
                $(".quantity").val(quantity);
                let total=price*quantity
                $("#total").text(`$${total}`);
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
