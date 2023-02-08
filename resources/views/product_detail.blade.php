@extends('template')

@section('title', $product->name.' details')

@section('content')
<div class="d-flex flex-column">
    <div class="d-flex flex-row g-4 p-5 justify-content-center">
        <div class="rounded-5">
            <h5 class="ms-5 font-weight-bold"><u>{{$product->name}}</u></h5>
            <img src="/assets/vege1.png" class=" img-fluid rounded-start"
                style="width: 15rem; max-height: 15rem;">
        </div>
        <div class="rounded-end p-5">
            <div class="card-body">
                <br>
                <div class="d-flex flex-row mb-5 font-weight-bold">
                    <div class="me-5 font-weight-bold">Price: </div>
                    <div class="font-weight-bold">{{'Rp. '.number_format($product->price, 0, ',', '.').',-'}}</div>
                </div>
                <div style="width: 54rem" class="d-flex flex-row mb-5">
                    <div>{{$product->description}}</div>
                </div>
                @auth
                @if (Auth::user()->role != null)
                <form action="/product/{{$product->id}}" class="d-flex flex-column" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning" value="Purchase">Buy</button>
                </form>
                @endif
                @endauth

            </div>
        </div>
    </div>

</div>
@endsection
