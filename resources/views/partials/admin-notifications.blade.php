@php
    $admin=Auth::guard('admin')->user();
    $notifications=$admin->notifications()->orderBy('id','desc')->take(15)->get();
    $unread_notifications=$admin->unreadNotifications()->count();
@endphp
<li class="nav-item dropdown notification-dropdown">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
        @if ($unread_notifications>0)
            <span class="badge badge-success"></span>
        @endif
    </a>

    <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
        <div class="notification-scroll">
            <div class="drodpown-title notification mb-0">
                <h6 class="d-flex justify-content-between">
                    <span class="align-self-center">Notifications</span>
                    @if ($unread_notifications>0)
                        <span class="badge badge-secondary">{{$unread_notifications}} New</span>
                    @endif
                </h6>
            </div>
            @if ($notifications->count()>0)
                @foreach ($notifications as $notification)
                    <a href="{{route('admin.notifications.show',$notification->id)}}" class="dropdown-item {{$notification->read_at?'readed':''}}">
                        <div class="media server-log">
                            <div class="media-body">
                                <div class="data-info">
                                    <h6 class="">{{$notification->data['description']}}</h6>
                                    <p class="">{{$notification->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                <div class="text-center my-3">
                    <a href="{{route('admin.notifications.index')}}" class="text-primary">
                        <u>
                            View All
                        </u>
                    </a>
                </div>
            @else
                <p class="text-center my-3">No New Notifications</p>
            @endif
        </div>
    </div>

</li>
