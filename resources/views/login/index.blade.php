@extends('layouts.auth')

@section('title', 'Login')

@section('head')
    <link href="/css/signin.css" rel="stylesheet">

    <style>
        form {
            background-color: white;
            padding: 50px 15px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, .4);
        }
    </style>
@endsection

@section('content')
    <main class="form-signin">
        <form action="/login" method="POST">
            @csrf
            <h1 class="h3 mb-4 fw-normal">Login</h1>

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="form-floating mb-2">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder="name@example.com" name="email" required>
                <label for="email">Email address</label>
                @error('email')
                    <p class="text-start muted text-danger mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                <label for="password">Password</label>
                @error('password')
                    <p class="text-start muted text-danger mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </main>
@endsection
