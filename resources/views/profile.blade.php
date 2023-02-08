@extends('template')
@section('title', 'Profile')
@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center">
        <div style="margin: 2rem" class="align-self-center"></div>
        <div class="col" style="text-decoration: none; width: 64rem;">
            <div class="card mb-3" style="width: 64rem;">
                <div class="row g-0 d-flex flex-row justify-content-center">
                    <div class="col text-center mt-5">
                        <img src="{{ asset('image/' . $data->display_picture_link) }}" alt="" style="width: 12rem; height:12rem">
                    </div>
                    <div class="col">
                        <div class="card-body mt-4">
                            <form class="p-5" action="{{url('profile',$data->id)}}" method="POST" enctype="multipart/form-data" style="width: 50vw">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value={{ $data->first_name }}>
                                </div>
                                <div class="mb-3">
                                    <label for="lname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="lname" value={{ $data->last_name }}>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                        value={{ $data->email }}>
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label" v>Gender</label>
                                    <br>
                                    <input type="radio" class="radio" id="gender-male" name="gender" value='male'>
                                    <label class="form-check-label" for="gender-male">Male</label>
                                    <br>
                                    <input type="radio" class="radio" id="gender-female" name="gender" value='female'>
                                    <label class="form-check-label" for="gender-female">Female</label>
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Display Picture</label>
                                    <input type="file" class="form-control" id="file" name="file">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                </div>
                                <button type="submit" class="btn btn-warning" value="Register">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
