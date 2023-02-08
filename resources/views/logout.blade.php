@extends('template')

@section('title', 'Log Out')

@section('content')
    <style>
        .circle {
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

        .center h2{
            font-size: 35px;
            text-align: center;
        }
        .center h4{
            font-size: 20px;
        }
    </style>
    <div class="circle">
        <div class="col text-center">
            <h2 class="center">
                Log Out Success!
            </h2>
        </div>
    </div>

@endsection
