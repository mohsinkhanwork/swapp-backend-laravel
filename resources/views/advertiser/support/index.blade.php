@extends('layouts.advertiser')

@section('breadcrumb', __('dashboard.support'))

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/plugins/src/table/datatable/datatables.css')}}">
@endpush
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-8">
                            <h4>{{__('dashboard.support')}}</h4>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end gap-2">
                            <form action="" method="get">
                                <select name="status" id="statusFilter" class="form-control form-control-sm">
                                    <option value="" {{request('status')==''?'selected':''}}>All Tickets</option>
                                    <option value="open" {{request('status')=='open'?'selected':''}}>Open</option>
                                    <option value="solved" {{request('status')=='solved'?'selected':''}}>Solved</option>
                                </select>
                            </form>
                            <a href="{{route('advertiser.support.create-ticket')}}" class="btn btn-success">{{__('dashboard.create-ticket')}}</a>
                        </div>
                    </div>
                    <table id="advertisers-table" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('dashboard.no.')}}</th>
                                <th>{{__('dashboard.subject')}}</th>
                                <th>{{__('dashboard.priority')}}</th>
                                <th>{{__('dashboard.status')}}</th>
                                <th>{{__('dashboard.view')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{$ticket->id}}</td>
                                    <td>{{$ticket->subject}}</td>
                                    <td>
                                        @if ($ticket->priority=='urgent')
                                            <span class="badge badge-danger">{{$ticket->priority}}</span>
                                        @else
                                            <span class="badge badge-primary">{{$ticket->priority}}</span>
                                        @endif
                                    </td>
                                    <td>{{str_replace('_',' ',$ticket->status)}}</td>
                                    <td>
                                        <a href="{{route('advertiser.support.tickets.show',$ticket->ticket_number)}}" class="btn btn-sm btn-secondary">
                                            {{__('dashboard.view')}}
                                        </a>
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
    </script>
@endpush
