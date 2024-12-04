@extends('layouts.advertiser-auth')
@section('content')
<div class="row">

    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <form action="{{route('advertiser.register')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h2>Register</h2>
                            <p>Create Advertiser Account</p>
                        </div>
                        @include('partials.errors')
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                            </div>
                        </div>
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
                            <div class="mb-4">
                                <button class="btn btn-secondary w-100" type="submit">Create Account</button>
                            </div>
                        </div>
                        <div class="text-center">
                            Already have an account?
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
