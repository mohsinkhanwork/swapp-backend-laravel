@extends('layouts.admin')

@section('breadcrumb', __('dashboard.ad-packages'))

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
                            <h4>{{__('dashboard.ad-packages')}}</h4>
                        </div>
                    </div>
                    <table id="packages-table" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('dashboard.no.')}}</th>
                                <th>{{__('dashboard.type')}}</th>
                                <th>{{__('dashboard.title')}}</th>
                                <th>{{__('dashboard.price')}}</th>
                                <th>{{__('dashboard.active')}}</th>
                                <th class="no-content">{{__('dashboard.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $package)
                                <tr>
                                    <td>{{$package->id}}</td>
                                    <td>{{$package->type}}</td>
                                    <td>{{$package->title}}</td>
                                    <td>{{number_format($package->price)}}</td>
                                    <td>
                                        <input class="toggle-input change-status" data-id="{{$package->id}}" type="checkbox" id="activeToggle-{{$package->id}}" {{$package->active?'checked':''}}>
                                        <label for="activeToggle-{{$package->id}}" class="toggle-btn"></label>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-icon" href="{{route('admin.ad-packages.edit',$package->id)}}">
                                            <i class="fa-solid fa-pen-to-square"></i>
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
        $('#packages-table').DataTable({
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
        let status_url="{{route('admin.ad-package.update-status','package_id')}}";
        $(document).on('change','.change-status',function(){
            let id=$(this).data('id');
            let status=0;
            if($(this).is(':checked')){
                status=1;
            }
            $.ajax({
                type:'POST',
                url:status_url.replace('package_id',id),
                data:{status},
                success:function(){
                    toastr.success("Updated Successfully");
                },
                error:function(err){
                    alert('something went wrong please contact technical support team.')
                }
            });
        });
    </script>
@endpush
