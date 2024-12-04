@extends('layouts.admin')

@section('breadcrumb', __('dashboard.ads'))

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/plugins/src/table/datatable/datatables.css')}}">
    <style>
        .modal-content{
            background: white;
        }
    </style>
@endpush
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-7">
                            <h4>{{__('dashboard.ads')}}</h4>
                        </div>
                        <div class="col-5 d-flex align-items-center justify-content-end">
                            <form action="" method="get">
                                <select name="status" id="statusFilter" class="form-control form-control-sm">
                                    <option value="under_review" {{request('status')=='under_review'?'selected':''}}>Under Review</option>
                                    <option value="pending" {{request('status')=='pending'?'selected':''}}>Pending</option>
                                    <option value="approved" {{request('status')=='approved'?'selected':''}}>Approved</option>
                                    <option value="rejected" {{request('status')=='rejected'?'selected':''}}>Rejected</option>
                                    <option value="completed" {{request('status')=='completed'?'selected':''}}>Completed</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-12">
                            <span class="badge badge-warning">Pending: {{$pending}}</span>
                            <span class="badge badge-primary">Under review: {{$under_review}}</span>
                            <span class="badge badge-success">Approved: {{$approved}}</span>
                            <span class="badge badge-danger">Rejected: {{$rejected}}</span>
                            <span class="badge badge-secondary">Completed: {{$completed}}</span>
                        </div>
                    </div>
                    <table id="advertisers-table" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('dashboard.no.')}}</th>
                                <th>{{__('dashboard.advertiser')}}</th>
                                <th>{{__('dashboard.type')}}</th>
                                <th>{{__('dashboard.title')}}</th>
                                <th>{{__('dashboard.price')}}</th>
                                <th>{{__('dashboard.total')}}</th>
                                <th>{{__('dashboard.duration')}} <small>(days)</small></th>
                                <th>{{__('dashboard.view')}}</th>
                                <th class="no-content">{{__('dashboard.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ads as $ad)
                                <tr>
                                    <td>{{$ad->id}}</td>
                                    <td>
                                        <p class="mb-0 fw-bold">
                                            {{$ad->advertiser->name}}
                                        </p>
                                        <p class="mb-0 fw-bold">
                                            {{$ad->advertiser->email}}
                                        </p>
                                    </td>
                                    <td>{{$ad->package->type}}
                                        <p>
                                            <strong>Expiry: </strong>
                                            @if ($ad->ends_on)
                                                {{$ad->ends_on->format('d M, Y')}}
                                            @else
                                                --
                                            @endif
                                        </p>
                                    </td>
                                    <td>{{$ad->title}}</td>
                                    <td>${{number_format($ad->price,2)}} * {{$ad->package_quantity??1}}</td>
                                    <td>${{number_format($ad->total,2)}}</td>
                                    <td>{{$ad->duration}}</td>
                                    <td>
                                        <a href="{{route('admin.ads.show',$ad->id)}}" class="btn btn-sm btn-secondary">
                                            {{__('dashboard.view')}}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($ad->status=='under_review')
                                            <button class="btn btn-danger btn-icon m-1 reject-ad" data-id="{{$ad->id}}" type="button">
                                                {{__('dashboard.approve')}}
                                            </button>
                                            <form action="{{route('admin.ad.approve',$ad->id)}}" class="d-inline" method="post">
                                                @csrf
                                                <button class="btn btn-success btn-icon m-1 approve-ad" type="button">
                                                    {{__('dashboard.reject')}}
                                                </button>
                                            </form>
                                            @if ($ad->reject_reason!='')
                                                <div class="mt-2">
                                                    <strong>{{__('dashboard.reject-reason')}}: </strong>
                                                    <p class="m-0">
                                                        {{$ad->reject_reason}}
                                                    </p>
                                                </div>
                                            @endif
                                        @elseif($ad->status=='pending')
                                            Payment is pending
                                        @elseif($ad->status=='approved')
                                            Approved
                                        @elseif($ad->status=='rejected')
                                            rejected
                                            <div class="mt-2">
                                                <strong>Reason: </strong>
                                                {{$ad->reject_reason}}
                                            </div>
                                        @elseif($ad->status=='completed')
                                            completed
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
    <div class="modal fade" id="rejectAdModal" tabindex="-1" role="dialog" aria-labelledby="rejectAdModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectAdModalLabel">Reject Advertisement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <svg> ... </svg>
                    </button>
                </div>
                <form action="" method="post" id="rejectAdForm">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label>Reason</label>
                            <textarea name="reject_reason" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn btn-light-dark" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('admin-assets/plugins/src/table/datatable/datatables.js')}}"></script>
    <script>
        $('#advertisers-table').DataTable({
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
        $(document).ready(function(){
            $("#statusFilter").on('change',function(){
                $(this).parents('form')[0].submit();
            });
        });
        let reject_url="{{route('admin.ad.reject','ad_id')}}";
        $(document).on('click','.reject-ad',function(){
            let id=$(this).data('id');
            $("#rejectAdForm").attr('action',reject_url.replace('ad_id',id));
            $("#rejectAdModal").modal('show');
        })
        $(document).on('click','.approve-ad',function(){
            let approve_form=$(this).parent('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "This ad will be published on your approval!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Approve!'
            }).then((result) => {
                if (result.isConfirmed) {
                   approve_form[0].submit();
                }
            })
        });
    </script>
@endpush
