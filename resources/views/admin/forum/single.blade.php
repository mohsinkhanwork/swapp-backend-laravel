@extends('layouts.admin')

@section('breadcrumb', __('dashboard.forum'))
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="col-12 text-end mb-2">
                    <a href="{{route('admin.forum')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                </div>
                <div class="widget-content widget-content-area br-8">
                    <h6> <strong>{{__('dashboard.title')}} : </strong>
                        {{$question->title}}
                    </h6>
                    <h6> <strong>{{__('dashboard.forum')}} : </strong>
                        {{$question->created_at->format('d M, Y g:i A')}}
                    </h6>
                    <h6>{{__('dashboard.question')}}: </h6>
                    <div class="border p-4 rounded">
                        {!!$question->detail!!}
                    </div>
                </div>
                <hr>
                <div class="widget-content widget-content-area br-8">
                    <h4>{{__('dashboard.replies')}}: </h4>
                    @foreach ($question->answers as $reply)
                        <div class="card mb-2">
                            <div class="card-header">
                                <h5>{{$reply->user->name}} - ({{$reply->likes_count}} likes)
                                    @if ($reply->best_answer)
                                        <span class="badge badge-success">{{__('dashboard.marked-as-best')}}</span>
                                    @endif
                                </h5>
                                <p class="m-0">
                                    <strong> {{__('dashboard.time')}}: </strong>
                                    {{$reply->created_at->format('d M, Y g:i A')}}
                                </p>
                            </div>
                            <div class="card-body">
                                {!!$reply->detail!!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
