@extends('layouts.advertiser-auth')
@section('content')
<div class="row">

    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <form action="{{route('advertiser.otp-verification')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h2>Verify Code</h2>
                            <p>Enter the verification code send to your email</p>
                        </div>
                        @include('partials.errors')
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Code</label>
                                <input type="text" class="form-control" name="code" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-4">
                                <button class="btn btn-secondary w-100" type="submit">Verify Code</button>
                            </div>
                        </div>
                        <div class="text-center">
                            Back to Login Page?
                            <a href="{{route('advertiser.showLogin')}}">
                              <u>Login Now</u>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
