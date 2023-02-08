@extends('template')
@section('title',  $data->name.' Role')
@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center">
        <div style="margin: 2rem" class="align-self-center"></div>
        <div class="col" style="text-decoration: none; width: 64rem;">
            <div class="card mb-3" style="width: 64rem;">
                <div class="row g-0 d-flex flex-row justify-content-center">
                    <div class="col">
                        <div class="card-body mt-4">
                            <form class="p-5" action="/maintenance/{{ $data->id }}" method="POST" enctype="multipart/form-data" style="width: 50vw">
                                @csrf
                                <div class="mb-3">
                                    <label for="role" class="form-label" value="">Role</label>
                                    <select id="role" class="form-control selector" name="role">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}"
                                                @if ($role == $data->role) selected="selected" @endif>{{ $role }}</option>
                                        @endforeach
                                    </select>
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
