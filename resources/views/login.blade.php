@extends('template')

@section('title', 'Login')

@section('content')

<div class="container-sm d-flex flex-column flex-wrap gap-4 justify-content-center align-items-center my-5">
    <div class=" shadow-lg justify-content-center d-flex flex-column align-items-center" style="width: 50vw">
        <div class="display-4 m-2">Login</div>
        <form class="bg-light p-5" action="/login" method="POST" style="width: 50vw">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email Address: </label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                    value={{ Cookie::get('email_cookie') !=null ?
                    Cookie::get('email_cookie') : old('email') }}>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password: </label>
                <input type="password" class="form-control" id="password" name="password"
                    value={{ Cookie::get('password_cookie') !=null ?
                    Cookie::get('password_cookie') : '' }}>
            </div>
            <button type="submit" class="btn btn-warning" value="Login">Login</button>

            <div class="mt-5"><a href="/register">Don't have an account? click here to sign up</a></div>
        </form>
    </div>
</div>

@endsection
