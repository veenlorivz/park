@extends('layouts.dashboard')

@section('title')
    My Account
@endsection

@section('account', 'active')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
            <h1 class="h2">My Profile</h1>
        </div>
        @foreach ($user as $u)
            <form action="/dashboard/account/{{ $u->id }}" class="shadow rounded col-md-7 p-4">
                @method('put')
                @csrf
                <div class="d-flex">
                    <div class="col justify-content-center p-4">
                        <img src="/user.png" alt="user" width="100">
                    </div>
                    <div class="mb-3 col-8">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name"
                                    value={{ old('name', Auth::user()->name) }}>
                                @error('name')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail"
                                    value={{ old('email', Auth::user()->email) }}>
                                @error('staticEmail')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword"
                                    value={{ old('password', Auth::user()->password) }}>
                                @error('inputPassword')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success col-md-3 mt-2">Save</button>
            </form>
        @endforeach
    </main>
@endsection
