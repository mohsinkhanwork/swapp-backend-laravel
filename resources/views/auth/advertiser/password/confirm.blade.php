@extends('layouts.advertiser-auth')
@section('content')
<div class="row">

    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <form action="{{route('advertiser.password.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h2>Reset Password</h2>
                        </div>
                        @include('partials.errors')
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{$email}}" required readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-4">
                                <label class="form-label">{{ $t('confirm_password') }}</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-4">
                                <button class="btn btn-secondary w-100" type="submit">Update Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
