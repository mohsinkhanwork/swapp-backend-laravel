@php
    $current_route=Route::currentRouteName();
    $current_route=str_replace('advertiser.','',$current_route);
    $support_count=GetAdvertiserSupportCount();
@endphp
<nav id="sidebar">
    <div class="navbar-nav theme-brand flex-row  text-center">
        <div class="nav-logo">
            <div class="nav-item theme-text">
                <a href="{{route('advertiser.dashboard')}}" class="nav-link"> SwapSkill </a>
            </div>
        </div>
        <div class="nav-item sidebar-toggle">
            <div class="btn-toggle sidebarCollapse">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
            </div>
        </div>
    </div>
    <div class="shadow-bottom"></div>
    <ul class="list-unstyled menu-categories" id="accordionExample">
        <li class="menu {{$current_route=='dashboard'?'active':''}}">
            <a href="{{route('advertiser.dashboard')}}" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span>{{__('dashboard.dashboard')}}</span>
                </div>
            </a>
        </li>
        <li class="menu {{$current_route=='ads.index'?'active':''}}">
            <a href="{{route('advertiser.ads.index')}}" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                    <span>{{__('dashboard.my-campaigns')}}</span>
                </div>
            </a>
        </li>
        <li class="menu {{$current_route=='ads.packages'?'active':''}}">
            <a href="{{route('advertiser.ads.packages')}}" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                    <span>{{__('dashboard.post-new-ad')}}</span>
                </div>
            </a>
        </li>
        <li class="menu {{$current_route=='support.index'?'active':''}}">
            <a href="{{route('advertiser.support.index')}}" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 2" viewBox="0 0 35 35" id="support"><path d="M29.07,16.57a1.25,1.25,0,0,1-1.25-1.25V11.79c0-5-4.62-9-10.3-9s-10.3,4.05-10.3,9v3.53a1.25,1.25,0,0,1-2.5,0V11.79C4.72,5.43,10.47.25,17.52.25s12.8,5.18,12.8,11.54v3.53A1.24,1.24,0,0,1,29.07,16.57Z"></path><path d="M25.69 28.33a1.25 1.25 0 0 1-1.25-1.25V15.21A1.25 1.25 0 0 1 25.69 14c4.31 0 7.82 3.23 7.82 7.19S30 28.33 25.69 28.33zm1.25-11.74V25.7A4.86 4.86 0 0 0 31 21.15 4.86 4.86 0 0 0 26.94 16.59zM9.31 28.33c-4.31 0-7.82-3.22-7.82-7.18S5 14 9.31 14a1.25 1.25 0 0 1 1.25 1.25V27.08A1.25 1.25 0 0 1 9.31 28.33zM8.06 16.59A4.86 4.86 0 0 0 4 21.15 4.86 4.86 0 0 0 8.06 25.7z"></path><path d="M25.28,32.4H21.14a1.25,1.25,0,0,1,0-2.5h4.14a2.44,2.44,0,0,0,2.44-2.44v-.55a1.25,1.25,0,1,1,2.5,0v.55A4.94,4.94,0,0,1,25.28,32.4Z"></path><path d="M19,34.75H16.53a3.42,3.42,0,0,1-3.42-3.42v-.14a3.42,3.42,0,0,1,3.42-3.41H19a3.41,3.41,0,0,1,3.41,3.41v.14A3.42,3.42,0,0,1,19,34.75Zm-2.45-4.47a.92.92,0,0,0-.92.91v.14a.92.92,0,0,0,.92.92H19a.92.92,0,0,0,.91-.92v-.14a.91.91,0,0,0-.91-.91Z"></path></svg>
                    <span>{{__('dashboard.support')}}</span>
                    @if ($support_count>0)
                        <span class="badge badge-primary sidebar-label">
                            {{$support_count}}
                        </span>
                    @endif
                </div>
            </a>
        </li>
        <li class="menu {{$current_route=='profile'?'active':''}}">
            <a href="{{route('advertiser.profile')}}" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 101 101" id="user"><path d="M50.4 54.5c10.1 0 18.2-8.2 18.2-18.2S60.5 18 50.4 18s-18.2 8.2-18.2 18.2 8.1 18.3 18.2 18.3zm0-31.7c7.4 0 13.4 6 13.4 13.4s-6 13.4-13.4 13.4S37 43.7 37 36.3s6-13.5 13.4-13.5zM18.8 83h63.4c1.3 0 2.4-1.1 2.4-2.4 0-12.6-10.3-22.9-22.9-22.9H39.3c-12.6 0-22.9 10.3-22.9 22.9 0 1.3 1.1 2.4 2.4 2.4zm20.5-20.5h22.4c9.2 0 16.7 6.8 17.9 15.7H21.4c1.2-8.9 8.7-15.7 17.9-15.7z"></path></svg>
                    <span>{{__('dashboard.profile')}}</span>
                </div>
            </a>
        </li>
    </ul>
</nav>
