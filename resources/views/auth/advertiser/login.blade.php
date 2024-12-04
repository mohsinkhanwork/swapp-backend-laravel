@extends('layouts.advertiser-auth')
@section('content')
<div class="row">

    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <form action="{{route('advertiser.login')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">

                            <h2>Sign In</h2>
                            <p>Enter your email and password to login</p>

                        </div>
                        @include('partials.errors')
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <div class="mb-3">
                                    <div class="form-check form-check-primary form-check-inline">
                                        <input class="form-check-input me-3" type="checkbox" id="form-check-default">
                                        <label class="form-check-label" for="form-check-default">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <a href="{{route('advertiser.password.request')}}">Forget Password?</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-4">
                                <button class="btn btn-secondary w-100" type="submit">SIGN IN</button>
                            </div>
                        </div>
                        <div class="text-center">
                            Don't have an account?
                            <a href="{{route('advertiser.showRegister')}}">
                              <u>Create Now</u>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
