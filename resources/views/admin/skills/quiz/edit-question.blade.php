@extends('layouts.admin')

@section('breadcrumb', __('dashboard.quiz'))

@push('styles')

@endpush
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <div class="row mb-4">
                        <div class="col-8">
                            <h4>
                                {{__('dashboard.update-question')}}
                            </h4>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{route('admin.skill-quiz',$skill->id)}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="shadow-sm rounded border p-3 mb-5">
                                @include('partials.errors')
                                <form action="{{route('admin.quiz.update-question',[$skill->id,$question->id])}}" method="post" id="addQuestionForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="mb-3">
                                                <label>{{__('dashboard.question')}}</label>
                                                <input type="text" class="form-control" name="question" required value="{{$question->text}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>{{__('dashboard.language')}}</label>
                                                <select name="language" class="form-control" required>
                                                    <option value="en" {{$question->language=='en'?'selected':''}}>English</option>
                                                    <option value="tr" {{$question->language=='tr'?'selected':''}}>Turkish</option>
                                                </select>
                                            </div>
                                        </div>
                                        @php
                                            $count=1;
                                            $correct=1;
                                        @endphp
                                        @foreach ($question->answers as $option)
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label>{{__('dashboard.option')}} {{$count}}</label>
                                                    <input type="text" name="options[]" class="form-control" required value="{{$option->text}}">
                                                </div>
                                            </div>
                                            @php
                                                if($option->is_correct){
                                                    $correct=$count;
                                                }
                                                $count++;
                                            @endphp
                                        @endforeach
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>{{__('dashboard.select-correct-option')}}</label>
                                                <select name="correct_answer" class="form-control">
                                                    <option value="1" {{$correct==1?'selected':''}}>{{__('dashboard.option')}} 1</option>
                                                    <option value="2" {{$correct==2?'selected':''}}>{{__('dashboard.option')}} 2</option>
                                                    <option value="3" {{$correct==3?'selected':''}}>{{__('dashboard.option')}} 3</option>
                                                    <option value="4" {{$correct==4?'selected':''}}>{{__('dashboard.option')}} 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="text-end mb-3">
                                                <button class="btn btn-success" type="submit">{{__('dashboard.update')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
