@extends('layouts.admin')

@section('breadcrumb', 'Logs')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/themes/prism.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="row">
                    <div class="col-12 text-end mb-3">
                        <a href="{{route('admin.logs.index')}}" class="btn btn-info">Go Back</a>
                    </div>
                    <div class="col-12">
                        <div class="widget-content widget-content-area br-8 mb-3">
                            <h4 class="mb-4">Model: {{str_replace("App\Models\\",'',$log->subject_type)}} - {{$log->subject_id}}</h4>
                            <p>
                                <strong>User Name: </strong>
                                {{$log->causer->name}}
                            </p>
                            <p>
                                <strong>User Email: </strong>
                                {{$log->causer->email}}
                            </p>
                            <p>
                                <strong>Date Created: </strong>
                                {{$log->created_at->format('d M, Y g:i A')}}
                            </p>
                            <p>
                                <strong>Description: </strong>
                                {{$log->description}}
                            </p>
                            <p> <strong> Changes: </strong></p>
                            <div>
                                <pre><code class="language-php">{{printLogData($log->properties)}}</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/prism.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Prism.highlightAll();
        });
    </script>
@endpush
