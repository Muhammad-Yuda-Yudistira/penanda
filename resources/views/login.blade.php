@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">{{ $title }} Form</h1>
            <form action="/dashboard" method="post">
                @csrf
                <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-info text-light" type="submit">Login</button>
            </form>
            <small class="d-block mt-3">Have Registered? <a href="/register">Register now!</a></small>
            </main>
        </div>
    </div>
@endsection