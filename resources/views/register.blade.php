@extends('template')

@section('title', 'Register')

@section('content')
<div class="container-sm d-flex flex-column flex-wrap gap-4 justify-content-center align-items-center my-5">
    <a href="/register/{{__('auth.link')}}" class="btn btn-warning fs-5 me-1">{{__('auth.Change')}}</a>
    <div class=" shadow-lg justify-content-center d-flex flex-column align-items-center" style="width: 50vw">
        <div class="display-4 m-2">Register</div>
        <form class="bg-light p-5" action="/register" method="POST" enctype="multipart/form-data" style="width: 50vw">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{__('auth.First')}}</label>
                <input type="text" class="form-control" id="name" name="name"
                    value={{old('name') }}>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">{{__('auth.Last')}}</label>
                <input type="text" class="form-control" id="lname" name="lname"
                    value={{old('lname') }}>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                    value={{old('email') }}>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label" value="">{{__('auth.Role')}}</label>
                <select id="role" class="form-control selector" name="role">
                    <option value="" disabled selected> </option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">{{__('auth.Gender')}}</label>
                <br>
                <input type="radio" class="radio" id="gender-male" name="gender" value='male'>
                <label class="form-check-label" for="gender-male">{{__('auth.Male')}}</label>
                <br>
                <input type="radio" class="radio" id="gender-female" name="gender" value='female'>
                <label class="form-check-label" for="gender-female">{{__('auth.Female')}}</label>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">{{__('auth.Display')}}</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">{{__('auth.Password')}}</label>
                <input type="password" class="form-control" id="password" name="password"
                    >
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">{{__('auth.Confirm')}}</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
            </div>
            <button type="submit" class="btn btn-warning" value="Register">Register</button>
            <div class="mt-5"><a href="/login">Already have an account? click here to login in</a></div>
        </form>
    </div>
</div>

@endsection
