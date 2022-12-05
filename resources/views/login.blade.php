@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">{{ $title }} Form</h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" autofocus required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror 
                </div>
                <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="floatingPassword">Password</label>
                @error('password') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror 
                </div>
                <button class="w-100 btn btn-lg btn-info text-light" type="submit">Login</button>
            </form>
            <small class="d-block mt-3">Have Registered? <a href="/register">Register now!</a></small>
            </main>
        </div>
    </div>
@endsection