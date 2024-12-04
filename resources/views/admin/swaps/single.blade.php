@extends('layouts.admin')

@section('breadcrumb', 'Swap')

@push('styles')

@endpush
@php
    $status_class=[
        'pending'=>'badge-warning',
        'progress'=>'badge-success',
        'rejected'=>'badge-danger',
        'completed'=>'badge-primary',
    ];
@endphp
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="row">
                    <div class="col-12 text-end">
                        <a href="{{route('admin.swaps.index')}}" class="btn btn-info mb-2">Go Back</a>
                    </div>
                    <div class="col-12">
                        <div class="widget-content widget-content-area br-8 mb-3">
                            <h4 class="mb-4">Id : {{$swap->id}}</h4>
                            <p>
                                <strong>Date Created: </strong>
                                {{$swap->created_at->format('d M, Y g:i A')}}
                            </p>
                            <p>
                                <strong>Status: </strong>
                                <span class="badge {{$status_class[$swap->status]}}">
                                    {{$swap->status}}
                                </span>
                            </p>
                            @if ($swap->status=='rejected')
                                <p>
                                    <strong>Reject Reason: </strong>
                                {{$swap->reject_reason}}
                                </p>
                            @endif
                            <p>
                                <strong>Requester: </strong>
                                {{$swap->requester->name}} - ({{$swap->requester->email}})
                            </p>
                            <p> <strong> Proposal: </strong></p>
                            <div class="mb-2">
                                {{$swap->proposal}}
                            </div>
                            <p> <strong> Response: </strong></p>
                            <div class="mb-2">
                                {{$swap->response}}
                            </div>
                            <h3 class="my-3">Users</h3>
                            @foreach ($swap->swapUsers as $user)
                                <div class="border p-3 rounded mb-3">
                                    <p>
                                        <strong>Name: </strong>
                                        {{$user->user->name}}
                                    </p>
                                    <p>
                                        <strong>Email: </strong>
                                        {{$user->user->email}}
                                    </p>
                                    <p>
                                        <strong>Skill Offered: </strong>
                                        {{$user->skill->title_en}}
                                    </p>
                                    <p>
                                        <strong>Status: </strong>
                                        {{$user->status}}
                                    </p>
                                    <p>
                                        <strong>Rating: </strong>
                                        {{$user->rating}}
                                    </p>
                                    <p>
                                        <strong>Review: </strong>
                                        {{$user->review}}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
