@extends('layouts.admin')

@section('breadcrumb', __('dashboard.quiz'))

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/plugins/src/table/datatable/datatables.css')}}">
@endpush
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-7">
                            <h4>
                                <strong>
                                    {{__('dashboard.quiz')}}:
                                </strong>
                                {{$skill->title}}
                            </h4>
                        </div>
                        <div class="col-5 d-flex align-items-center justify-content-end">
                            <form action="" method="get">
                                <select name="language" id="languageFilter" class="form-control form-control-sm">
                                    <option value="en" {{request('language')=='en'?'selected':''}}>English</option>
                                    <option value="tr" {{request('language')=='tr'?'selected':''}}>Turkish</option>
                                </select>
                            </form>
                            <a class="btn btn-success ms-2" href="{{route('admin.quiz.add-questions',$skill->id)}}">{{__('dashboard.add-new-questions')}}</a>
                        </div>
                    </div>
                    <table id="skillQuestions" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('dashboard.no.')}}</th>
                                <th>{{__('dashboard.question')}}</th>
                                <th>{{__('dashboard.options')}}</th>
                                <th class="no-content">{{__('dashboard.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question)
                                <tr>
                                    <td>{{$question->id}}</td>
                                    <td>{{$question->text}}</td>
                                    <td>
                                        @php
                                            $count=1;
                                        @endphp
                                        @foreach($question->answers as $answer)
                                           {{$count++}}. {{ $answer->text }}
                                            @unless($loop->last)
                                                <br />
                                            @endunless
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-icon" href="{{route('admin.quiz.edit-question',[$skill->id,$question->id])}}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{route('admin.quiz.destroy-question',$skill->id)}}" class="d-inline" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$question->id}}">
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-icon m-2 delete-question" type="button">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
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
        $('#skillQuestions').DataTable({
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
        $(document).on('click','.delete-question',function(){
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
        $(document).ready(function(){
            $("#languageFilter").on('change',function(){
                $(this).parents('form')[0].submit();
            });
        });
    </script>
@endpush
