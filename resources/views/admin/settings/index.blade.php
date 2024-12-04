@extends('layouts.admin')

@section('breadcrumb', __('dashboard.settings'))

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
                        <div class="col-8">
                            <h4>{{__('dashboard.settings')}}</h4>
                        </div>
                    </div>
                    <table id="categories" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('dashboard.key')}}</th>
                                <th>{{__('dashboard.value')}}</th>
                                <th>{{__('dashboard.edit')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <td>{{$setting->key}}</td>
                                    <td>
                                        @if (str_contains($setting->key,'google-ad') && $setting->value_type=='textarea' && $setting->value!='')
                                            Google Adsense Code
                                        @else
                                            {!!strip_tags(substr($setting->value, 0, 250))!!}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($setting->value_type=='checkbox')
                                            <input class="toggle-input edit-check-setting" data-key="{{$setting->key}}" type="checkbox" id="activeToggle-{{$setting->id}}" {{$setting->value?'checked':''}}>
                                            <label for="activeToggle-{{$setting->id}}" class="toggle-btn"></label>
                                        @else
                                            <button class="btn btn-primary edit-setting" data-key="{{$setting->key}}" data-val="{{$setting->value}}" data-type="{{$setting->value_type}}">Edit</button>
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
       <div class="modal fade" id="editSettingModal" tabindex="-1" role="dialog" aria-labelledby="editSettingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSettingModalLabel">{{__('dashboard.update-settings')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <svg> ... </svg>
                    </button>
                </div>
                <form action="{{route('admin.settings.update')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="mb-3">
                            <label>{{__('dashboard.key')}}</label>
                            <input type="text" name="key" id="settingKey" class="form-control" required readonly>
                        </div>
                        <div class="mb-3">
                            <label>{{__('dashboard.value')}}</label>
                            <div id="value-placeholder">

                            </div>
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
        $(document).on('click','.edit-setting',function(){
            let val=$(this).data('val');
            let key=$(this).data('key');
            let type=$(this).data('type');
            let value_placeholder='';
            if(type!='textarea'){
                value_placeholder=`<input type="${type}" name="value" id="settingVal" class="form-control" value="${val}" required>`;
            }else{
                value_placeholder=`<textarea name="value" id="settingVal" class="form-control" rows="5" required>${val}</textarea>`;
            }
            $("#value-placeholder").html(value_placeholder);
            $("#settingKey").val(key);
            $("#editSettingModal").modal('show');
        });
        $(document).on('change',".edit-check-setting",function(){
            let value=0;
            let key=$(this).data('key');
            if($(this).is(':checked')){
                value=1;
            }
            let token=$('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:"{{route('admin.settings.update')}}",
                type:"POST",
                data:{key,value},
                success:function(res){
                    toastr.success("Updated Successfully");
                },
                error:function(){
                    alert('something went wrong!');
                }
            });
        });
    </script>
@endpush
