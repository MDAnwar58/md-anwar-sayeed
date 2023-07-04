@extends('backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin: 5rem 0 0 0;">
            @if (Session::has('error'))
                <div class="col-md-12 text-center">
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                </div>
            @endif
            <div class="col-md-3">
                <div class="card">
                    <h4 class="card-header text-center">SignUp Account</h4>
                    <div class="card-body">
                        <form action="{{ route('register.request') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-2">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
