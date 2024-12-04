@extends('layouts.admin')

@section('breadcrumb', __('dashboard.email-campaigns'))
@push('styles')
    <style>
        .ck-editor__editable {
            min-height: 150px;
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
                            <h4>{{__('dashboard.new-email-campaign')}}</h4>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{route('admin.email-campaigns.index')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                        </div>
                    </div>
                    {{-- errors --}}
                    @include('partials.errors')
                    <form method="POST" action="{{route('admin.email-campaigns.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="alert alert-success">
                            {{__('dashboard.active-newsletter-subscribers')}}: <strong>{{number_format($active_users)}}</strong>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="subject">{{__('dashboard.subject')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="subject" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="">{{__('dashboard.content')}} <span class="text-danger">*</span></label>
                                    <textarea name="body" class="form-control" id="blog-content" cols="30" rows="10"></textarea>
                                    @error('body')
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
    <script>
        var uploadUrl = '{{$uploadUrl}}';
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
