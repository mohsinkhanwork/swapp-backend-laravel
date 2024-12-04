@extends('layouts.admin')

@section('breadcrumb', __('dashboard.users'))

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/plugins/src/table/datatable/datatables.css')}}">
    <style>
         .modal-content{
            background: white;
        }
        .skills{
           white-space: normal;
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
                            <h4>{{__('dashboard.users')}}</h4>
                        </div>
                    </div>
                    <form action="{{ route('admin.users.index') }}" method="GET">
                        <div class="row mb-5">
                            <div class="col-md-12 d-flex align-items-center">
                                <!-- Skill filter -->
                                <div class="me-2">
                                    <label for="skillFilter" class="form-label">{{ __('dashboard.skills') }}</label>
                                    <select name="skill" class="form-control">
                                        <option value="">--select--</option>
                                        @foreach($skills as $skill)
                                            <option
                                                {{request()->has('skill') && request()->skill == $skill->id ? 'selected' : '' }}
                                                value="{{$skill->id}}">{{$skill->title_.getLanguage()}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Banned and Hold filters -->
                                <div class="form-check me-2 pt-4 pe-5 px-5">
                                    <input {{request()->has('banned') ? 'checked':''}} type="checkbox" class="form-check-input" id="bannedFilter" name="banned">
                                    <label class="form-check-label" for="bannedFilter">{{ __('dashboard.ban-account') }} </label>
                                </div>
                                <div class="form-check pt-4">
                                    <input {{request()->has('hold') ? 'checked':''}}  type="checkbox" class="form-check-input" id="holdFilter" name="hold">
                                    <label class="form-check-label" for="holdFilter">{{ __('dashboard.hold-account') }}</label>
                                </div>

                                <!-- Filter button -->
                                <div class="ms-auto pt-4">
                                    <button type="submit" class="btn btn-primary">{{ __('index.filter') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table id="categories" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('dashboard.no.')}}</th>
                                <th>{{__('dashboard.name')}}</th>
                                <th>{{__('dashboard.email')}}</th>
                                <th>{{__('dashboard.plan')}}</th>
                                <th>{{__('dashboard.skills')}}</th>
                                <th>{{__('dashboard.rating')}}</th>
                                <th class="no-content">{{__('dashboard.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $status_class=[
                                        0=>'badge-warning',
                                        1=>'badge-success',
                                        2=>'badge-danger',
                                    ];
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->plan->title??'-'}}</td>
                                    <td>
                                        <div class="skills">
                                            @foreach($user->skills as $skill)
                                                <span class="badge {{$status_class[$skill->pivot->status]}} m-1">
                                                    {{ $skill->title }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        ({{number_format($user->avg_rating,2)}}) - {{$user->rating_count}}
                                    </td>
                                    <td>
                                        @if ($user->status=='banned')
                                            <p class="text-danger">This account is permanently banned.</p>
                                        @elseif ($user->status=='hold')
                                            <p class="text-warning">This account is on hold until {{$user->banned_until->format('d M, Y')}}.</p>
                                        @else
                                            <button class="btn btn-warning hold-account" data-url="{{route('admin.users.hold-account',$user->id)}}">{{__('dashboard.hold-account')}}</button>
                                            <form action="{{route('admin.users.ban-account',$user->id)}}" class="d-inline" method="post">
                                                @csrf
                                                <button class="btn btn-danger btn-icon m-2 ban-account" type="button">
                                                    {{__('dashboard.ban-account')}}
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="holdAccountModal" tabindex="-1" role="dialog" aria-labelledby="holdAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="holdAccountModalLabel">{{__('dashboard.hold-account')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <svg> ... </svg>
                    </button>
                </div>
                <form action="" method="post" id="holdAccountForm">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label>{{__('dashboard.date')}}</label>
                            <input type="date" name="date"  class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn btn-light-dark" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> {{__('dashboard.discard')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('dashboard.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('admin-assets/plugins/src/table/datatable/datatables.js')}}"></script>
    <script>
        $('#categories').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10
        });
        $(document).on('click','.ban-account',function(){
            let delete_form=$(this).parent('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to permanently ban this account!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, ban account!'
            }).then((result) => {
                if (result.isConfirmed) {
                   delete_form[0].submit();
                }
            })
        });
        $(document).on('click','.hold-account',function(){
            let url=$(this).data('url');
            $("#holdAccountForm").attr('action',url);
            $("#holdAccountModal").modal('show');
        });
    </script>
@endpush
