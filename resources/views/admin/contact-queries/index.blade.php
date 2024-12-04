@extends('layouts.admin')

@section('breadcrumb', __('dashboard.contact-queries'))

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/plugins/src/table/datatable/datatables.css')}}">
    <style>
        .message{
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
                            <h4>{{__('dashboard.contact-queries')}}</h4>
                        </div>
                        <div class="col-4">
                            <div class="d-flex align-items-center justify-content-end">
                                <form action="" method="get">
                                    <select name="status" id="statusFilter" class="form-control form-control-sm">
                                        <option value="0" {{request('status')=='0'?'selected':''}}>Unread</option>
                                        <option value="1" {{request('status')=='1'?'selected':''}}>Readed</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table id="categories" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('dashboard.no.')}}</th>
                                <th>{{__('dashboard.name')}}</th>
                                <th>{{__('dashboard.email')}}</th>
                                <th>{{__('dashboard.message')}}</th>
                                <th class="no-content">{{__('dashboard.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($queries as $query)
                                <tr>
                                    <td>{{$query->id}}</td>
                                    <td>
                                        {{$query->name}}
                                    </td>
                                    <td>{{$query->email}}</td>
                                    <td>
                                        <div class="message">
                                            {{$query->message}}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($query->seen)
                                            <button class="btn btn-info btn-icon m-2" type="button" disabled>
                                                Readed
                                            </button>
                                        @else
                                            <form action="{{route('admin.contact-queries.mark-read',$query->id)}}" class="" method="post">
                                                @csrf
                                                <button class="btn btn-info btn-icon m-2" type="submit">
                                                    {{__('dashboard.mark-as-read')}}
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
        $(document).ready(function(){
            $("#statusFilter").on('change',function(){
                $(this).parents('form')[0].submit();
            });
        });
    </script>
@endpush
