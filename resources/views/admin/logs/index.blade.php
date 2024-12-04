@extends('layouts.admin')

@section('breadcrumb', __('dashboard.logs'))

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
@endpush
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-8">
                            <h4>{{__('dashboard.logs')}}</h4>
                        </div>
                        <div class="col-4">
                            <div class="d-flex align-items-center justify-content-end">
                                {{-- <form action="" method="get">
                                    <select name="status" id="statusFilter" class="form-control form-control-sm">
                                        <option value="" {{request('status')==''?'selected':''}}>All Admins</option>
                                        <option value="1" {{request('status')=='1'?'selected':''}}>Subscribed</option>
                                        <option value="0" {{request('status')=='0'?'selected':''}}>UnSubscribed</option>
                                    </select>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                    <table class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('dashboard.no.')}}</th>
                                <th>{{__('dashboard.user')}}</th>
                                <th>{{__('dashboard.model')}}</th>
                                <th>{{__('dashboard.description')}}</th>
                                <th>{{__('dashboard.time')}}</th>
                                <th>{{__('dashboard.view')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{$log->id}}</td>
                                    <td>
                                        <p class="m-0">{{$log->causer->name}}</p>
                                        <p class="m-0">{{$log->causer->email}}</p>
                                    </td>
                                    <td>{{str_replace("App\Models\\",'',$log->subject_type)}}</td>
                                    <td>{{$log->description}}</td>
                                    <td>{{$log->created_at->format('d M, Y g:i A')}}</td>
                                    <td>
                                        <a href="{{route('admin.logs.show',$log->id)}}" class="btn btn-primary">
                                            {{__('dashboard.view')}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$logs->links()}}
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#statusFilter").on('change',function(){
                $(this).parents('form')[0].submit();
            });
        });
    </script>
@endpush
