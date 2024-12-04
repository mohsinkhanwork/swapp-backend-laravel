@extends('layouts.advertiser')

@section('breadcrumb', 'Advertisement')
@php
    $status_class=[
            'pending'=>'badge-warning',
            'under_review'=>'badge-primary',
            'approved'=>'badge-success',
            'rejected'=>'badge-danger',
            'completed'=>'badge-secondary',
        ];
@endphp
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="col-12 text-end mb-2">
                    <a href="{{route('admin.ads.index')}}" class="btn btn-info">Go Back</a>
                </div>
                <div class="widget-content widget-content-area br-8">
                    <div class="ad-status">
                        <span class="badge {{$status_class[$ad->status]}}">
                            {{str_replace('_',' ',$ad->status)}}
                        </span>
                        @if ($ad->status=='rejected')
                            <div class="mt-2">
                                <strong>Reason: </strong>
                                {{$ad->reject_reason}}
                            </div>
                            <a href="{{route('advertiser.ads.edit',$ad->id)}}" class="text-primary"><u>Click Here to edit and resubmit</u></a>
                        @endif
                        @if ($ad->status=='pending' && !$payment_success)
                            <div class="mt-2">
                                <a href="{{route('advertiser.ad.payment',[$ad->id,$ad->package_quantity])}}" class="text-primary"><u>Click Here to complete payment and publish ad</u></a>
                            </div>
                        @endif
                    </div>
                    <hr>
                    @if ($ad->package->type=='notification')
                        <h3>Notification Ad</h3>
                        <p>
                            <strong class="fw-bold">Title: </strong>
                            {{$ad->title}}
                        </p>
                        <p>
                            <strong class="fw-bold">Status: </strong>
                            {{$ad->title}}
                        </p>
                        <p>
                            <strong class="fw-bold">Link: </strong>
                            @if ($ad->url)
                                <a href="{{$ad->url}}" target="_blank" class="text-info">{{$ad->url}}</a>
                            @else
                                not added
                            @endif
                        </p>
                        <p>
                            <strong class="fw-bold">Skill Category: </strong>
                            {{$ad->skillCategory->title_en??'--'}}
                        </p>
                        <p>
                            <strong class="fw-bold">Description: </strong>
                            {{$ad->description}}
                        </p>
                        <div>
                            <strong class="fw-bold">content:</strong>
                            <div class="px-4 py-2">
                                {!!$ad->content!!}
                            </div>
                        </div>
                    @else
                        @if ($ad->type=='content')
                            <div
                                style="background-color: {{$ad->bg_color}}; color: {{$ad->color}};"
                                class="banner-ad">
                                <div class="banner-description">
                                    <h5 id="ad-title">{{$ad->title}}</h5>
                                    <p id="ad-description">{{$ad->description}}</p>
                                    <div class="banner-features">
                                        @foreach ($ad->features as $feature)
                                            <p class="m-0">
                                                <i class="fas fa-check"></i>
                                                <span id="feature1">{{$feature}}</span>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                                <a class="btn" href="{{$ad->url}}"
                                    style="background-color: {{$ad->button_bg_color}}; color: {{$ad->button_color}};"
                                    target="_blank" id="ad-button">
                                    {{$ad->button_text}}
                                </a>
                            </div>
                        @else
                            <p>
                                <strong>Link: </strong>
                                <a href="{{$ad->url}}" target="_blank" class="text-info">{{$ad->url}}</a>
                            </p>
                            <div class="banner-img-ad">
                                <img src="{{$ad->image}}" alt="banner ad">
                            </div>
                        @endif
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
