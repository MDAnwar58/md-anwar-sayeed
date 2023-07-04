@extends('backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin: 10rem 0 0 0;">
            @if (Session::has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                </div>
            @endif
            <div class="col-md-3">
                <div class="card">
                    <h4 class="card-header text-center">SignIn Account</h4>
                    <div class="card-body">
                        <form action="{{ route('login.request') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                                @error('email')
                                    <span class="alert text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @error('password')
                                    <span class="alert text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-2">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
