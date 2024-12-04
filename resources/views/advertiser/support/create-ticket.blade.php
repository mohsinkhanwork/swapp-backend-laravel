@extends('layouts.advertiser')

@section('breadcrumb', __('dashboard.support'))

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/plugins/src/table/datatable/datatables.css')}}">
    <style>
        .ck-editor__editable {
            min-height: 200px;
        }
    </style>
@endpush
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="row">
                    <div class="col-12">
                        {{-- errors --}}
                        @include('partials.errors')
                    </div>
                    <div class="col-12 mb-2 text-end">
                        <a href="{{route('advertiser.support.index')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                    </div>
                    <div class="col-12">
                        <div class="widget-content widget-content-area br-8">
                            <form action="{{route('advertiser.support.store-ticket')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h4 class="mb-4">{{__('dashboard.create-ticket')}}</h4>
                                <div class="mb-3">
                                    <label for="file">{{__('dashboard.subject')}} <span class="text-danger">*</span> </label>
                                    <input class="form-control file-upload-input" type="text" id="subject" name="subject" required>
                                </div>
                                <div class="mb-3">
                                    <label for="file">{{__('dashboard.file')}}</label>
                                    <input class="form-control file-upload-input" type="file" id="file" name="file">
                                </div>
                                <div class="mb-3">
                                    <label for="">{{__('dashboard.description')}} <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">{{__('dashboard.submit')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <script>
        CKEDITOR.ClassicEditor.create(document.getElementById("description"), {
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
    </script>
@endpush
