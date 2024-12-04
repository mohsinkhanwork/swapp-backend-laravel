@extends('layouts.advertiser')

@section('breadcrumb', __('ad.update-notification-ad'))
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <style>
        .select2-container--default .select2-selection{
            border: 1px solid #bfc9d4;
            height: 48px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered{
            line-height: 48px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            height: 48px;
        }
        .select2-container--default .select2-selection .select2-selection__choice{
            height: 35px;
            line-height: 35px;
            font-size: 17px;
        }
        .select2-container--default .select2-search--inline .select2-search__field{
            height: 30px;
            line-height: 30px;
            font-size: 17px;
            margin: 8px 5px;
        }
        .ck-editor__editable {
            min-height: 250px;
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
                            <h4>{{__('ad.update-notification-ad')}}</h4>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{route('advertiser.ads.index')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                        </div>
                    </div>
                    {{-- errors --}}
                    @include('partials.errors')
                    <form method="POST" action="{{route('advertiser.ads.update',$ad->id)}}" id="postAdForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if ($ad->status=='rejected')
                            <div class="alert alert-danger">
                                <strong>{{__('dashboard.reject-reason')}}: </strong>
                                {{$ad->reject_reason}}
                            </div>
                        @endif
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title">{{__('dashboard.title')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" required value="{{$ad->title}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="link">{{__('ad.website-or-other-link')}}</label>
                                    <input type="url" name="url" id="link" class="form-control" placeholder="link" value="{{$ad->url}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="category">{{__('dashboard.skill-category')}} <span class="text-danger">*</span></label>
                                    <select name="skill_category_id" id="category" class="form-control" required>
                                        <option value="">--select--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{$ad->skill_category_id==$category->id?'selected':''}}>{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="desc">{{__('dashboard.description')}} <span class="text-danger">*</span> <small class="text-primary">(max length: 100 characters)</small> </label>
                                    <textarea name="description" id="desc" class="form-control" placeholder="Description" rows="2" required maxlength="100">{{$ad->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="">{{__('dashboard.content')}} <span class="text-danger">*</span></label>
                                    <textarea name="content" class="form-control" id="blog-content" cols="30" rows="10">{{$ad->content}}</textarea>
                                    @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary" type="submit">
                                {{__('dashboard.submit')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
@php
    $uploadUrl = route("admin.upload-editor-media").'?_token='.csrf_token();
@endphp
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $('#category').select2();

        var uploadUrl = '{{$uploadUrl}}' ;

        CKEDITOR.ClassicEditor.create(document.getElementById("blog-content"), {
            ckfinder: {
                    uploadUrl: uploadUrl,
                },
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', '|',
                    'bulletedList', 'numberedList', '|',
                    'undo', 'redo',
                    '-',
                     'fontColor', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },

            removePlugins: [
                'ExportPdf',
                'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                'MathType'
            ]
        });
        $(document).ready(function(){
            $("#postAdForm").on('submit',function(e){
                e.preventDefault();
                Swal.fire({
                title: 'Please Confirm all the information is correct',
                text: "After form submission, your ad will again go to admin for short review and then published automatically.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Proceed!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#postAdForm")[0].submit();
                    }
                })
            });
        });
    </script>
@endpush
