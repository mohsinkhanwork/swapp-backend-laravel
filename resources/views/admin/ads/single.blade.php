@extends('layouts.admin')

@section('breadcrumb', 'Advertisement')
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="col-12 text-end mb-2">
                    <a href="{{route('admin.ads.index')}}" class="btn btn-info">Go Back</a>
                </div>
                <div class="widget-content widget-content-area br-8">
                    @if ($ad->package->type=='notification')
                        <h3>Notification Ad</h3>
                        <hr>
                        <p>
                            <strong>Title: </strong>
                            {{$ad->title}}
                        </p>
                        <p>
                            <strong>Link: </strong>
                            @if ($ad->url)
                                <a href="{{$ad->url}}" target="_blank" class="text-info">{{$ad->url}}</a>
                            @else
                                not added
                            @endif
                        </p>
                        <p>
                            <strong>Skill Category: </strong>
                            {{$ad->skillCategory->title_en??'--'}}
                        </p>
                        <p>
                            <strong>Description: </strong>
                            {{$ad->description}}
                        </p>
                        <div>
                            <strong>content:</strong>
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
