@extends('layouts.admin')

@section('breadcrumb', __('dashboard.blogs'))
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <style>
        .select2-container--default .select2-selection--multiple{
            border: 1px solid #bfc9d4;
            height: 48px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
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
        .blog-thumbnail{
            height: 100px;
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
                            <h4>{{__('dashboard.update-blog')}}</h4>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{route('admin.blogs.index')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                        </div>
                    </div>
                    {{-- errors --}}
                    @include('partials.errors')
                    <form method="POST" action="{{route('admin.blogs.update',$blog->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title">{{__('dashboard.title')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" required value="{{$blog->title}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="thumbnail">{{__('dashboard.image')}} </label>
                                    <input class="form-control file-upload-input" type="file" id="thumbnail" name="thumbnail">
                                    <img src="{{asset($blog->thumbnail)}}" class="blog-thumbnail" alt="thumbnail">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="parent">{{__('dashboard.category')}} <span class="text-danger">*</span></label>
                                    <select name="category_id" id="parent" class="form-control" required>
                                        <option value="">--select--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{$blog->blog_category_id==$category->id?'selected':''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="tags">{{__('dashboard.tags')}}</label>
                                    <select class="form-control select2TagList" multiple name="tags[]" id="tags">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->name }}" {{ in_array($tag->id, $blog->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="metaTitle">{{__('dashboard.meta-title')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="meta_title" id="metaTitle" class="form-control" placeholder="Meta Title" required value="{{$blog->meta_title}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="metaDesc">{{__('dashboard.meta-description')}} <span class="text-danger">*</span> </label>
                                    <textarea name="meta_description" id="metaDesc" class="form-control" placeholder="Meta Description" rows="5" required>{{$blog->meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="">{{__('dashboard.summary')}} <span class="text-danger">*</span></label>
                                    <textarea name="summary" class="form-control" id="summary" cols="30" rows="10">
                                        {{$blog->summary}}
                                    </textarea>
                                    @error('summary')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="">{{__('dashboard.content')}} <span class="text-danger">*</span></label>
                                    <textarea name="content" class="form-control" id="blog-content" cols="30" rows="10">
                                        {{$blog->content}}
                                    </textarea>
                                    @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="published">{{__('dashboard.publish')}}</label>
                                <select name="published" id="published" class="form-control">
                                    <option value="1" {{$blog->published?'selected':''}}>Publish</option>
                                    <option value="0" {{!$blog->published?'selected':''}}>Unpublished</option>
                                </select>
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
        $('.select2TagList').select2({
            tags: true,
            tokenSeparators: [',', ' '], // Allow comma or space to create new tags
            placeholder: 'Select tags or type to add new ones'
        });

        var uploadUrl = '{{$uploadUrl}}' ;
        CKEDITOR.ClassicEditor.create(document.getElementById("summary"), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', '|',
                    'bulletedList', 'numberedList', '|',

                    'undo', 'redo',

                    'alignment', '|',
                    'link', 'blockQuote', 'insertTable', '|',
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
    </script>
@endpush
