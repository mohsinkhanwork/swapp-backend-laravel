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
                    <div class="col-12 text-end mb-2">
                        <a href="{{route('advertiser.support.index')}}" class="btn btn-info">{{__('dashboard.go-back')}}</a>
                    </div>
                    <div class="col-12">
                        <div class="widget-content widget-content-area br-8 mb-3">
                            <h4 class="mb-4">{{__('dashboard.subject')}} : {{$ticket->subject}}</h4>
                            <p>
                                <strong>{{__('dashboard.date')}}: </strong>
                                {{$ticket->created_at->format('d M, Y g:i A')}}
                            </p>
                            <p>
                                <strong>{{__('dashboard.status')}}: </strong>
                                {{$ticket->status}}
                            </p>
                            <p>
                                <strong>{{__('dashboard.priority')}}: </strong>
                                {{$ticket->priority}}
                            </p>
                            <p> <strong> {{__('dashboard.description')}}: </strong></p>
                            <div>
                                {!!$ticket->description!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="widget-content widget-content-area br-8 mb-4">
                            @foreach ($ticket->responses as $reply)
                                <div class="media ticket-response">
                                    @if ($reply->admin)
                                        <img class="mr-3" src="{{asset('assets/images/icon.svg')}}" alt="support">
                                    @else
                                        <img class="mr-3" src="{{$ticket->ticketable->avatar}}" alt="user">
                                    @endif
                                    <div class="media-body">
                                        @if ($reply->sender_type=='support')
                                            <h4 class="mb-0">{{$reply->admin->name}}</h4>
                                        @else
                                            <h4 class="mb-0">{{$ticket->ticketable->name}}</h4>
                                        @endif
                                        <h6>{{$reply->created_at->format('d M, Y g:i A')}}</h6>
                                        {!!$reply->description!!}
                                        @if ($reply->file)
                                            <div>
                                                <a href="{{$reply->file}}" class="text-primary" target="_blank"><u>View Attachment</u></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="widget-content widget-content-area br-8">
                            @if ($ticket->status=='solved')
                                <div class="alert alert-success">
                                    This Support Ticket is closed. you can create new Ticket for more queries or support.
                                </div>
                            @else
                                <form action="{{route('advertiser.support.reply',$ticket->ticket_number)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="mb-4">{{__('dashboard.reply')}}</h4>
                                    <div class="mb-3">
                                        <label for="">{{__('dashboard.description')}} <span class="text-danger">*</span></label>
                                        <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="file">{{__('dashboard.file')}}</label>
                                        <input class="form-control file-upload-input" type="file" id="file" name="file">
                                    </div>
                                    <div class="mb-3">
                                        <label class="d-block">{{__('dashboard.solved')}}</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="solved" id="solved-yes" value="1">
                                            <label class="form-check-label" for="solved-yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="solved" id="solved-no" value="0" checked>
                                            <label class="form-check-label" for="solved-no">No</label>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">{{__('dashboard.submit')}}</button>
                                    </div>
                                </form>
                            @endif
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
