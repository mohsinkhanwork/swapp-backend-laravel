@extends('layouts.advertiser')

@section('breadcrumb', 'Notifications')
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing justify-content-center">
            <div class="col-lg-8  layout-spacing">
                <div class="card">
                    <div class="card-header">
                        <h4>All Notifications</h4>
                    </div>
                    <div class="card-body">
                        <div class="all-notifications">
                            @foreach ($notifications as $notification)
                                <a class="single-notification {{$notification->read_at?'readed':''}}" href="{{route('advertiser.notifications.show',$notification->id)}}">
                                    <h5 class="text-primary">{{$notification->data['title']}} - <small class="text-muted">{{$notification->created_at->diffForHumans()}}</small></h5>
                                    <p class="m-0">{{$notification->data['description']}}</p>
                                </a>
                            @endforeach
                        </div>
                        {{$notifications->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
