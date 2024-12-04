@extends('layouts.admin')

@section('breadcrumb', __('dashboard.plans'))

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
                            <h4>{{__('dashboard.plans')}}</h4>
                        </div>
                        <div class="col-4 text-end">
                            <a class="btn btn-success" href="{{route('admin.plans.create')}}">{{__('dashboard.add-new')}}</a>
                        </div>
                    </div>
                    <table id="plans" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('dashboard.no.')}}</th>
                                <th>{{__('dashboard.type')}}</th>
                                <th>{{__('dashboard.title')}}</th>
                                <th>{{__('dashboard.price')}}</th>
                                <th>{{__('dashboard.active')}}</th>
                                <th>{{__('dashboard.features')}}</th>
                                <th class="no-content">{{__('dashboard.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plans as $plan)
                                <tr>
                                    <td>{{$plan->id}}</td>
                                    <td>{{$plan->type}}</td>
                                    <td>{{$plan->title}}</td>
                                    <td>{{number_format($plan->monthly_price)}}</td>
                                    <td>{{$plan->active?'YES':'NO'}}</td>
                                    <td>
                                        <p class="m-0">
                                            <strong class="fw-bold">Monthly Swaps: </strong>
                                            {{$plan->monthly_swaps}}
                                        </p>
                                        <p class="m-0">
                                            <strong class="fw-bold">Show Ads: </strong>
                                            {{$plan->show_ads?'true':'false'}}
                                        </p>
                                        <p class="m-0">
                                            <strong class="fw-bold">Priority Support: </strong>
                                            {{$plan->priority_support?'Yes':'No'}}
                                        </p>
                                        <p class="m-0">
                                            <strong class="fw-bold">Retry Exam Duration: </strong>
                                            {{$plan->retry_exam_duration}}
                                        </p>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-icon" href="{{route('admin.plans.edit',$plan->id)}}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        @if ($plan->type!='free')
                                            <form action="{{route('admin.plans.destroy',$plan->id)}}" class="d-inline" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-icon m-2 delete-plan" type="button">
                                                    <i class="fa-solid fa-trash"></i>
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
        $('#plans').DataTable({
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
        $(document).on('click','.delete-plan',function(){
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
