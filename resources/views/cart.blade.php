@extends('template')

@section('title', 'Cart')

@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h3 class=""><u>Cart</u></h3>
        @if (count($carts) == 0)
            <div class="mb-5">No cart items to be displayed</div>
        @endif
        <div style="margin: 2rem" class="align-self-center"></div>
        @foreach ($carts as $cart)
            <a class="col" style="text-decoration: none; width: 64rem;" href="/product/{{ $cart->product->id }}">
                <div class="card mb-3" style="width: 64rem;">
                    <div class="row g-0 d-flex flex-row justify-content-center">
                        <div class="col text-center">
                            <img src="assets/vege1.png" class="img-fluid rounded-start" alt={{ $cart->product->name }}
                                style="width: 12rem; height:12rem">
                        </div>
                        <div class="col">
                            <div class="card-body text-center mt-5">
                                <h5 class="card-title" style="color: #747474">{{ $cart->product->name }}</h5>
                                <p class="card-text" style="color: #747474">Total Price: Rp. {{ number_format($cart->subTotal, 0, ',', '.').',-' }}</p>
                                <a href="{{ url('deletecart', $cart->id) }}">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
        @if (count($carts) != 0)
        <form action="{{ route('purchase') }}" class="d-flex flex-row align-items-center justify-content-center mt-5"
            method="POST">
            @csrf
            <div class="me-5 display-6 font-weight-bold">TOTAL: Rp. {{number_format($totalPrice, 0, ',', '.').',-' }}</div>
            <button type="submit" class="btn btn-warning" value="Purchase">Check Out</button>
        </form>
        @endif
    </div>
@endsection
