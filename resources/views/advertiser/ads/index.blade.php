@extends('layouts.advertiser')

@section('breadcrumb', __('dashboard.my-campaigns'))

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/plugins/src/table/datatable/datatables.css')}}">
@endpush
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-12">
                @if ($payment_success)
                    <div class="alert alert-success">
                        Payment completed successfully. Status will update in few seconds. It will be published once approved by admin.
                    </div>
                @endif
            </div>
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-8">
                            <h4>{{__('dashboard.campaigns')}}</h4>
                        </div>
                        <div class="col-4 text-end">
                            <a class="btn btn-success" href="{{route('advertiser.ads.packages')}}">{{__('dashboard.add-new')}}</a>
                        </div>
                    </div>
                    <table id="categories" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('dashboard.no.')}}</th>
                                <th>{{__('dashboard.title')}}</th>
                                <th>{{__('dashboard.expiry')}}</th>
                                <th>{{__('dashboard.expiry')}}</th>
                                <th>{{__('dashboard.views')}}</th>
                                <th>{{__('dashboard.status')}}</th>
                                <th>{{__('dashboard.view')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $status_class=[
                                        'pending'=>'badge-warning',
                                        'under_review'=>'badge-primary',
                                        'approved'=>'badge-success',
                                        'rejected'=>'badge-danger',
                                        'completed'=>'badge-secondary',
                                    ];
                            @endphp
                            @foreach ($ads as $ad)
                                <tr>
                                    <td>{{$ad->id}}</td>
                                    <td>{{$ad->title}}</td>
                                    <td>
                                        @if ($ad->ends_on && $ad->status!='completed')
                                            {{$ad->ends_on->format('d M, Y')}}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>{{$ad->impressions}}</td>
                                    <td>
                                        <span>
                                            {{number_format($ad->views)}}
                                        </span>
                                        -
                                        <a href="{{route('advertiser.ad.stats',$ad->id)}}" class="text-info">
                                           <u>{{__('dashboard.stats')}}</u>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge {{$status_class[$ad->status]}}">
                                            {{str_replace('_',' ',$ad->status)}}
                                        </span>
                                        @if ($ad->status=='rejected')
                                            <div class="mt-2">
                                                <strong>{{__('dashboard.reason')}}: </strong>
                                                {{$ad->reject_reason}}
                                            </div>
                                            <a href="{{route('advertiser.ads.edit',$ad->id)}}" class="text-primary"><u>{{__('dashboard.click-to-edit-and-resubmit')}}</u></a>
                                        @endif
                                        @if ($ad->status=='pending' && !$payment_success)
                                            <div class="mt-2">
                                                <a href="{{route('advertiser.ad.payment',[$ad->id,$ad->package_quantity])}}" class="text-primary"><u>Click Here to complete payment and publish ad</u></a>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('advertiser.ads.show',$ad->id)}}" class="text-primary"> <u>{{__('dashboard.view')}}</u></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
        $(document).on('click','.delete-skill',function(){
            let delete_form=$(this).parent('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                   delete_form[0].submit();
                }
            })
        });
    </script>
@endpush
