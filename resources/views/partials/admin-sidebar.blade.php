@php
    $current_route=Route::currentRouteName();
    $current_route=str_replace('admin.','',$current_route);
    $ads_review=GetAdsInReviewCount();
    $support_count=GetSupportCount();
    $contact_count=GetContactQueriesCount();
@endphp
<nav id="sidebar">
    <div class="navbar-nav theme-brand flex-row  text-center">
        <div class="nav-logo">
            <div class="nav-item theme-text">
                <a href="{{route('admin.dashboard')}}" class="nav-link"> SwapSkill </a>
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
            <a href="{{route('admin.dashboard')}}" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span>{{__('dashboard.dashboard')}}</span>
                </div>
            </a>
        </li>
        @can('users')
            <li class="menu {{$current_route=='users.index'?'active':''}}">
                <a href="{{route('admin.users.index')}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>{{__('dashboard.users')}}</span>
                    </div>
                </a>
            </li>
        @endcan
        @can('invoices')
            <li class="menu {{$current_route=='invoices.index'?'active':''}}">
                <a href="{{route('admin.invoices.index')}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="invoice"><path fill="#231f20" d="M53.987,49.063c0-.022.013-.041.013-.063V5a3,3,0,0,0-3-3H13a3,3,0,0,0-3,3V59a3,3,0,0,0,3,3H41a1.005,1.005,0,0,0,.707-.293l12-12a1,1,0,0,0,.2-.293c.014-.031.022-.062.033-.094A.945.945,0,0,0,53.987,49.063ZM12,59V5a1,1,0,0,1,1-1H51a1,1,0,0,1,1,1V48H43a3,3,0,0,0-3,3v9H13A1,1,0,0,1,12,59Zm30-.414V51a1,1,0,0,1,1-1h7.586Z"></path><path fill="#231f20" d="M23 22H19a1 1 0 0 1-1-1 1 1 0 0 0-2 0 3 3 0 0 0 3 3h1v1a1 1 0 0 0 2 0V24h1a3 3 0 0 0 3-3V19a3 3 0 0 0-3-3H19a1 1 0 0 1-1-1V13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1 1 1 0 0 0 2 0 3 3 0 0 0-3-3H22V9a1 1 0 0 0-2 0v1H19a3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h4a1 1 0 0 1 1 1v2A1 1 0 0 1 23 22zM31 13H47a1 1 0 0 0 0-2H31a1 1 0 0 0 0 2zM31 21H47a1 1 0 0 0 0-2H31a1 1 0 0 0 0 2zM31 29H47a1 1 0 0 0 0-2H31a1 1 0 0 0 0 2zM17 37H47a1 1 0 0 0 0-2H17a1 1 0 0 0 0 2zM47 45a1 1 0 0 0 0-2H17a1 1 0 0 0 0 2z"></path></svg>
                        <span>{{__('dashboard.invoices')}}</span>
                    </div>
                </a>
            </li>
        @endcan
        @can('swaps')
            <li class="menu {{$current_route=='swaps.index'?'active':''}}">
                <a href="{{route('admin.swaps.index')}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="swap"><g data-name="Layer 2"><path d="M4 9h13l-1.6 1.2a1 1 0 0 0-.2 1.4 1 1 0 0 0 .8.4 1 1 0 0 0 .6-.2l4-3a1 1 0 0 0 0-1.59l-3.86-3a1 1 0 0 0-1.23 1.58L17.08 7H4a1 1 0 0 0 0 2zm16 7H7l1.6-1.2a1 1 0 0 0-1.2-1.6l-4 3a1 1 0 0 0 0 1.59l3.86 3a1 1 0 0 0 .61.21 1 1 0 0 0 .79-.39 1 1 0 0 0-.17-1.4L6.92 18H20a1 1 0 0 0 0-2z" data-name="swap"></path></g></svg>
                        <span>{{__('dashboard.swaps')}}</span>
                    </div>
                </a>
            </li>
        @endcan
        @canany(['blogs','blog-categories'])
            <li class="menu {{Str::contains($current_route, ['blogs.', 'blog-categories.'])?'active':''}}">
                <a href="#menuLevel1" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                        <span>{{__('dashboard.blogs')}}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{Str::contains($current_route, ['blogs.', 'blog-categories.'])?'show':''}}" id="menuLevel1" data-bs-parent="#accordionExample">
                    @can('blogs')
                        <li class="{{$current_route=='blogs.index'?'active':''}}">
                            <a href="{{route('admin.blogs.index')}}"> {{__('dashboard.list')}}</a>
                        </li>
                        <li class="{{$current_route=='blogs.create'?'active':''}}">
                            <a href="{{route('admin.blogs.create')}}">{{__('dashboard.add')}}</a>
                        </li>
                    @endcan
                    @can('blog-categories')
                        <li>
                            <a href="#level-three" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"> {{__('dashboard.categories')}} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="collapse list-unstyled sub-submenu {{Str::contains($current_route, ['blog-categories.'])?'show':''}}" id="level-three" data-bs-parent="#pages">
                                <li class="{{$current_route=='blog-categories.index'?'active':''}}">
                                    <a href="{{route('admin.blog-categories.index')}}"> {{__('dashboard.list')}}</a>
                                </li>
                                <li class="{{$current_route=='blog-categories.create'?'active':''}}">
                                    <a href="{{route('admin.blog-categories.create')}}"> {{__('dashboard.add')}}</a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany
        @canany(['skills','skill-categories'])
            <li class="menu {{Str::contains($current_route, ['skills.', 'skill-categories.'])?'active':''}}">
                <a href="#skills" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <span>{{__('dashboard.skills')}}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{Str::contains($current_route, ['skills.', 'skill-categories.'])?'show':''}}" id="skills" data-bs-parent="#accordionExample">
                    @can('skills')
                        <li class="{{$current_route=='skills.index'?'active':''}}">
                            <a href="{{route('admin.skills.index')}}"> {{__('dashboard.list')}}</a>
                        </li>
                        <li class="{{$current_route=='skills.create'?'active':''}}">
                            <a href="{{route('admin.skills.create')}}">{{__('dashboard.add')}}</a>
                        </li>
                    @endcan
                    @can('skill-categories')
                        <li>
                            <a href="#skill-categories" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"> {{__('dashboard.categories')}} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="collapse list-unstyled sub-submenu {{Str::contains($current_route, ['skill-categories.'])?'show':''}}" id="skill-categories" data-bs-parent="#pages">
                                <li class="{{$current_route=='skill-categories.index'?'active':''}}">
                                    <a href="{{route('admin.skill-categories.index')}}"> {{__('dashboard.list')}}</a>
                                </li>
                                <li class="{{$current_route=='skill-categories.create'?'active':''}}">
                                    <a href="{{route('admin.skill-categories.create')}}"> {{__('dashboard.add')}} </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany
        @can('admin-management')
            <li class="menu {{Str::contains($current_route, ['sub-admins.', 'roles.'])?'active':''}}">
                <a href="#subadmins" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>{{__('dashboard.sub-admins')}}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{Str::contains($current_route, ['sub-admins.', 'roles.'])?'show':''}}" id="subadmins" data-bs-parent="#accordionExample">
                    <li class="{{$current_route=='sub-admins.index'?'active':''}}">
                        <a href="{{route('admin.sub-admins.index')}}"> {{__('dashboard.list')}}</a>
                    </li>
                    <li class="{{$current_route=='sub-admins.create'?'active':''}}">
                        <a href="{{route('admin.sub-admins.create')}}">{{__('dashboard.add')}}</a>
                    </li>

                    <li>
                        <a href="#roles" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"> {{__('dashboard.roles')}} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="collapse list-unstyled sub-submenu {{Str::contains($current_route, ['roles.'])?'show':''}}" id="roles" data-bs-parent="#pages">
                             <li class="{{$current_route=='roles.index'?'active':''}}">
                                <a href="{{route('admin.roles.index')}}"> {{__('dashboard.list')}}</a>
                            </li>
                             <li class="{{$current_route=='roles.create'?'active':''}}">
                                <a href="{{route('admin.roles.create')}}"> {{__('dashboard.add')}} </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        @endcan
        @can('plan-management')
            <li class="menu {{$current_route=='plans.index'?'active':''}}">
                <a href="{{route('admin.plans.index')}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>{{__('dashboard.plans')}}</span>
                    </div>
                </a>
            </li>
        @endcan
        @canany(['advertisers','advertiser-plans','ads-management'])
            <li class="menu {{Str::contains($current_route, ['advertisers.', 'ad-packages.','ads.'])?'active':''}}">
                <a href="#advertisers" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                        <span>
                            {{__('dashboard.advertisers')}}
                        </span>
                        @if ($ads_review>0)
                            <span class="badge badge-primary sidebar-label">{{$ads_review}}</span>
                        @endif
                    </div>
                    @if ($ads_review==0)
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    @endif
                </a>
                <ul class="collapse submenu list-unstyled {{Str::contains($current_route, ['advertisers.', 'ad-packages.','ads.'])?'show':''}}" id="advertisers" data-bs-parent="#accordionExample">
                    @can('advertisers')
                        <li class="{{$current_route=='advertisers.index'?'active':''}}">
                            <a href="{{route('admin.advertisers.index')}}"> {{__('dashboard.list')}}</a>
                        </li>
                    @endcan
                    @can('ads-management')
                        <li class="{{$current_route=='ads.index'?'active':''}}">
                            <a href="{{route('admin.ads.index')}}" class="align-items-center">
                                {{__('dashboard.ads-list')}}
                                @if ($ads_review>0)
                                    <span class="badge badge-primary">{{$ads_review}}</span>
                                @endif
                            </a>
                        </li>
                    @endcan
                    @can('advertiser-plans')
                        <li>
                            <a href="#adPackages" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"> {{__('dashboard.packages')}} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="collapse list-unstyled sub-submenu {{Str::contains($current_route, ['ad-packages.'])?'show':''}}" id="adPackages" data-bs-parent="#pages">
                                <li class="{{$current_route=='ad-packages.index'?'active':''}}">
                                    <a href="{{route('admin.ad-packages.index')}}"> {{__('dashboard.list')}}</a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany
        @can('forum')
            <li class="menu {{$current_route=='forum'?'active':''}}">
                <a href="{{route('admin.forum')}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>{{__('dashboard.forum')}}</span>
                    </div>
                </a>
            </li>
        @endcan
        @can('support')
            <li class="menu {{$current_route=='support'?'active':''}}">
                <a href="{{route('admin.support')}}" class="dropdown-toggle">
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
        @endcan
        @can('contact-queries')
            <li class="menu {{$current_route=='contact-queries'?'active':''}}">
                <a href="{{route('admin.contact-queries')}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 512 512" id="mail"><path d="M445.011,82.7H67.022a50.057,50.057,0,0,0-50,50V379.3a50.057,50.057,0,0,0,50,50H445.01a50.057,50.057,0,0,0,50-50V132.7A50.055,50.055,0,0,0,445.011,82.7Zm-88.9,173.232,118.9-93.318V371.352ZM67.022,102.7H445.01a30.034,30.034,0,0,1,30,30v4.49L282.6,288.208a39.972,39.972,0,0,1-49.246-.04L37.022,137.152V132.7A30.034,30.034,0,0,1,67.022,102.7Zm92.438,153.86L37.022,371.755V162.384ZM445.011,409.3H67.022a30.007,30.007,0,0,1-25.538-14.28l134.034-126.1L221.1,303.98a59.937,59.937,0,0,0,73.816-.019L340.235,268.4,470.6,394.94A30.011,30.011,0,0,1,445.011,409.3Z"></path></svg>
                        <span>{{__('dashboard.contact-queries')}}</span>
                        @if ($contact_count>0)
                            <span class="badge badge-primary sidebar-label">
                                {{$contact_count}}
                            </span>
                        @endif
                    </div>
                </a>
            </li>
        @endcan
        @can('newsletter')
            <li class="menu {{$current_route=='newsletter'?'active':''}}">
                <a href="{{route('admin.newsletter')}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 8.467 8.467" id="article"><path d="M5.816.792a.265.265 0 0 0-.038.004h-4.72a.265.265 0 0 0-.265.266v5.555c0 .581.477 1.057 1.059 1.057h4.763a.265.265 0 0 0 .095-.01c.537-.05.964-.498.964-1.047V4.5a.265.265 0 0 0-.266-.264H6.086V1.062a.265.265 0 0 0-.27-.27Zm-4.494.534h4.235V4.45a.265.265 0 0 0 0 .092v2.074c0 .193.056.373.148.529H1.852a.522.522 0 0 1-.53-.53zm.768 1.059a.265.265 0 0 0 .027.529h2.644a.265.265 0 1 0 0-.53H2.117a.265.265 0 0 0-.027 0zm0 1.058a.265.265 0 0 0 .027.53h2.644a.265.265 0 1 0 0-.53H2.117a.265.265 0 0 0-.027 0zM2.117 4.5a.265.265 0 1 0 0 .529h2.644a.265.265 0 1 0 0-.53zm3.969.265h1.059v1.852c0 .296-.23.528-.527.529a.265.265 0 0 0-.003 0 .522.522 0 0 1-.53-.53zm-3.995.793a.265.265 0 0 0-.001 0 .265.265 0 0 0 .027.53h2.644a.265.265 0 1 0 0-.53H2.117a.265.265 0 0 0-.026 0z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;text-orientation:mixed;shape-padding:0;isolation:auto;mix-blend-mode:normal"></path></svg>
                        <span>{{__('dashboard.newsletter')}}</span>
                    </div>
                </a>
            </li>
        @endcan
        @can('email-campaigns')
            <li class="menu {{$current_route=='email-campaigns.index'?'active':''}}">
                <a href="{{route('admin.email-campaigns.index')}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="marketing"><path d="M2 11.01v6.03a3.011 3.011 0 0 0 3 3.01h5V8H5a3.011 3.011 0 0 0-3 3.01zm18.68-5.49a2.981 2.981 0 0 0-2.79-.3L12 7.57v12.96l5.89 2.35a3.038 3.038 0 0 0 1.11.21 2.99 2.99 0 0 0 3-3V8a2.99 2.99 0 0 0-1.32-2.48zM4 25.05a3 3 0 0 0 6 0V22H4zm25-12.002h-3a1 1 0 0 0 0 2h3a1 1 0 0 0 0-2zm-3-5a.991.991 0 0 0 .446-.106l2-1a1 1 0 1 0-.894-1.789l-2 1A1 1 0 0 0 26 8.048zm2.447 13.105-2-1a1 1 0 1 0-.894 1.789l2 1a.991.991 0 0 0 .446.106 1 1 0 0 0 .448-1.895z" data-name="Layer 2"></path></svg>
                        <span>{{__('dashboard.email-campaigns')}}</span>
                    </div>
                </a>
            </li>
        @endcan
        @can('logs')
            <li class="menu {{$current_route=='logs.index'?'active':''}}">
                <a href="{{route('admin.logs.index')}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64" id="log-document"><path d="M56.78,64H7.22c-0.43,0-0.78-0.35-0.78-0.78V0.78C6.44,0.35,6.79,0,7.22,0H42.5c0.43,0,0.78,0.35,0.78,0.78v14.09h13.5
                            c0.43,0,0.78,0.35,0.78,0.78v47.57C57.56,63.65,57.21,64,56.78,64z M8,62.44h48V16.43H42.5c-0.43,0-0.78-0.35-0.78-0.78V1.56H8
                            V62.44z"></path><path d="M56.78 16.43c-.2 0-.41-.08-.56-.24L41.94 1.32c-.3-.31-.29-.81.02-1.1.31-.3.8-.29 1.1.02l14.28 14.87c.3.31.29.81-.02 1.1C57.17 16.36 56.97 16.43 56.78 16.43zM37.93 13.57H13.95c-.43 0-.78-.35-.78-.78 0-.43.35-.78.78-.78h23.98c.43 0 .78.35.78.78C38.71 13.23 38.36 13.57 37.93 13.57zM50.88 22.8H13.95c-.43 0-.78-.35-.78-.78 0-.43.35-.78.78-.78h36.93c.43 0 .78.35.78.78C51.66 22.45 51.31 22.8 50.88 22.8zM50.88 32.03H13.95c-.43 0-.78-.35-.78-.78 0-.43.35-.78.78-.78h36.93c.43 0 .78.35.78.78C51.66 31.68 51.31 32.03 50.88 32.03z"></path><g><path d="M48.46,58.01H15.54c-1.31,0-2.37-1.06-2.37-2.37V39.3c0-1.31,1.06-2.37,2.37-2.37h32.92c1.31,0,2.37,1.06,2.37,2.37
                            v16.34C50.83,56.94,49.77,58.01,48.46,58.01z M15.54,38.48c-0.45,0-0.81,0.36-0.81,0.81v16.34c0,0.45,0.36,0.81,0.81,0.81h32.92
                            c0.45,0,0.81-0.36,0.81-0.81V39.3c0-0.45-0.36-0.81-0.81-0.81H15.54z"></path><path d="M30.59 52.26c-2.2 0-3.8-1.94-3.8-4.62 0-2.78 1.57-4.73 3.82-4.73 2.5 0 3.8 2.33 3.8 4.63C34.4 50.32 32.83 52.26 30.59 52.26zM30.6 44.47c-1.66 0-2.26 1.71-2.26 3.17 0 1.47.7 3.06 2.24 3.06 1.56 0 2.26-1.58 2.26-3.16C32.84 46.07 32.14 44.47 30.6 44.47zM40.54 52.26c-2.69 0-4.44-1.81-4.44-4.6 0-2.79 1.8-4.59 4.59-4.59.92 0 1.68.15 2.41.47.39.17.57.64.4 1.03-.18.4-.64.57-1.03.4-.36-.16-.88-.34-1.78-.34-1.9 0-3.03 1.13-3.03 3.03 0 1.93 1.05 3.04 2.87 3.04.36 0 .64-.03.85-.06v-1.46h-1.15c-.43 0-.78-.35-.78-.78s.35-.78.78-.78h1.93c.43 0 .78.35.78.78v2.83c0 .3-.17.57-.43.7C41.97 52.2 41.14 52.26 40.54 52.26zM25.39 52.26h-4.18c-.43 0-.78-.35-.78-.78v-8.03c0-.43.35-.78.78-.78.43 0 .78.35.78.78v7.25h3.4c.43 0 .78.35.78.78S25.82 52.26 25.39 52.26z"></path></g></svg>
                        <span>{{__('dashboard.logs')}}</span>
                    </div>
                </a>
            </li>
        @endcan
        <li class="menu {{$current_route=='profile'?'active':''}}">
            <a href="{{route('admin.profile')}}" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 101 101" id="user"><path d="M50.4 54.5c10.1 0 18.2-8.2 18.2-18.2S60.5 18 50.4 18s-18.2 8.2-18.2 18.2 8.1 18.3 18.2 18.3zm0-31.7c7.4 0 13.4 6 13.4 13.4s-6 13.4-13.4 13.4S37 43.7 37 36.3s6-13.5 13.4-13.5zM18.8 83h63.4c1.3 0 2.4-1.1 2.4-2.4 0-12.6-10.3-22.9-22.9-22.9H39.3c-12.6 0-22.9 10.3-22.9 22.9 0 1.3 1.1 2.4 2.4 2.4zm20.5-20.5h22.4c9.2 0 16.7 6.8 17.9 15.7H21.4c1.2-8.9 8.7-15.7 17.9-15.7z"></path></svg>
                    <span>{{__('dashboard.profile')}}</span>
                </div>
            </a>
        </li>
        @can('settings')
            <li class="menu {{$current_route=='settings'?'active':''}}">
                <a href="{{route('admin.settings')}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        <span>{{__('dashboard.settings')}}</span>
                    </div>
                </a>
            </li>
        @endcan
    </ul>
</nav>
