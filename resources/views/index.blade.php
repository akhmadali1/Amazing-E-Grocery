@extends('template')

@section('title', 'Index')

@section('content')
<style>
    .circle{
        height: 500px;
        width: 500px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        border: 10px solid #FBDF52;
        outline-style: solid;
        outline-color: #FBDF52;
    }
    .center{
        font-size: 35px;
        text-align: center;
    }
</style>
        @if ($lang == 'en')
            <form class="text-center mb-2" action="/" method="POST" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-danger" id="submit" name="submit" value="id">Click for Indonesia Language</button>
            </form>
            @elseif ($lang == 'id')
            <form class="text-center mb-2" action="/" method="POST" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-warning" id="submit" name="submit" value="en">Klik untuk Bahasa Inggris</button>
            </form>
            @endif
<div class="circle">
    <h1 class="center">
        {{__('auth.Text')}}
    </h1>
</div>

@endsection
