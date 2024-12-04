@extends('layouts.admin')

@section('breadcrumb', __('dashboard.quiz'))

@push('styles')
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
                            <h4>
                                <strong>
                                    {{__('dashboard.quiz')}}:
                                </strong>
                                {{$skill->title}}
                            </h4>
                        </div>
                        <div class="col-4 text-end">
                            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#importModal">
                                {{__('dashboard.import-questions')}}
                              </button>
                            <a href="{{route('admin.skill-quiz',$skill->id)}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="shadow-sm rounded border p-3 mb-5">
                                @include('partials.errors')
                                <form action="{{route('admin.quiz.store-question',$skill->id)}}" method="post" id="addQuestionForm">
                                    @csrf
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="mb-3">
                                                <label>{{__('dashboard.question')}}</label>
                                                <input type="text" class="form-control" name="question" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>{{__('dashboard.language')}}</label>
                                                <select name="language" class="form-control" required>
                                                    <option value="en">English</option>
                                                    <option value="tr">Turkish</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>{{__('dashboard.option')}} 1</label>
                                                <input type="text" name="options[]" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>{{__('dashboard.option')}} 2</label>
                                                <input type="text" name="options[]" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>{{__('dashboard.option')}} 3</label>
                                                <input type="text" name="options[]" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>{{__('dashboard.option')}} 4</label>
                                                <input type="text" name="options[]" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>{{__('dashboard.select-correct-option')}}</label>
                                                <select name="correct_answer" class="form-control">
                                                    <option value="1">{{__('dashboard.option')}} 1</option>
                                                    <option value="2">{{__('dashboard.option')}} 2</option>
                                                    <option value="3">{{__('dashboard.option')}} 3</option>
                                                    <option value="4">{{__('dashboard.option')}} 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="text-end mb-3">
                                                <button class="btn btn-success" type="submit">{{__('dashboard.save')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="questions">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Questions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <svg> ... </svg>
                    </button>
                </div>
                <form action="{{route('admin.quiz.import-questions',$skill->id)}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="alert alert-warning">
                            <p class="mb-1">
                                First value should be language (en or tr). second value should be question. next 4 values should be options and last value should be the correct answer (A,B,C,D)
                            </p>
                            <h5>Example</h5>
                            <p class="mb-0">
                                en, what is the sum of 2+2?, 6, 8, 10, 4, D
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="file">CSV file <span class="text-danger">*</span> </label>
                            <input class="form-control file-upload-input" type="file" id="file" name="file" accept=".csv" required>
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
    <script>
        let question_url="{{route('admin.quiz.store-question',$skill->id)}}";
        let delete_url="{{route('admin.quiz.destroy-question',$skill->id)}}";
        $(document).ready(function(){
            $("#addQuestionForm").on('submit',function(e){
                e.preventDefault();
                let data=new FormData($(this)[0]);
                $.ajax({
                    url:question_url,
                    type:"POST",
                    data,
                    processData:false,
                    contentType:false,
                    success:function(res){
                        let question=res.data;
                        let question_template=`<div class="mb-3 shadow-sm border-gray p-4 single-question border rounded" id="question-${question.id}">
                                <h4>Q: <span>${question.question}</span> </h4>
                                <div class="ps-2">
                                    <p>A. ${question['options'][0]['text']}</p>
                                    <p>B. ${question['options'][1]['text']}</p>
                                    <p>C. ${question['options'][2]['text']}</p>
                                    <p>D. ${question['options'][3]['text']}</p>
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-danger btn-icon m-2 delete-question" data-id="${question.id}" type="button">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>`;
                        $("#questions").prepend(question_template);
                        $("#addQuestionForm")[0].reset();
                    },
                    error:function(err){
                        alert('something went wrong please try again.');
                    }
                });
            });
        });
        $(document).on('click','.delete-question',function(){
            let id=$(this).data('id');
            $.ajax({
                url:delete_url,
                type:"DELETE",
                data:{id},
                success:function(res){
                    $(`#question-${id}`).remove();
                },
                error:function(err){
                    alert('something went wrong please try again.');
                }
            });
        });
    </script>
@endpush
