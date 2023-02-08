@extends('template')

@section('title', 'Home')

@section('content')
    <div class="row row-cols-1 row-cols-md-5 g-4 p-5">
        @foreach ($products as $product)
            <div class="col" style="text-decoration: none">
                <div class="card h-100" style="width: 12rem; overflow: hidden">
                    <img src="assets/vege1.png" class="card-img-top" alt={{ $product->name }}
                        style="width: 12rem; height:12rem">
                    <div class="card-body text-center">
                        <p class="card-text" style="color: black">{{ $product->name }}</p>
                        <a class="card-text" href="/product/{{ $product->id }}">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div style="" class="align-self-center text-center">
        {{ $products->links() }}
    </div>
@endsection
