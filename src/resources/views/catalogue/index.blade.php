
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
    <script src="{{ asset('js/products.js') }}"></script>
    @extends('layouts.main')
    @section('content')
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <h1 class="title-products">Products List</h1>
            <div class="product-list">
            @if(isset($products))
                @foreach($products as $product)
                <div class="product-card">
                    @php
                        $productId = $product->id;
                        $isInCart = in_array($productId, $cartProductIds);
                    @endphp
                    <header>
                        <img class="product-img" src="{{$product->img}}" alt="{{$product->name}}"/>
                    </header>
                    <div class="about-product">
                        <p>{{$product->sku}}</p>
                        <p>{{$product->description}}</p>
                    </div>
                    <footer>
                        @if($isInCart)
                            <button class="btn-delete" onclick="removeToCart({{$product->id}})">Delete To Cart <i class="fas fa-cart-shopping"></i></button>
                            @else
                            <button class="btn-add"  onclick="addToCart({{$product->id}})">Add To Cart  <i class="fas fa-cart-shopping"></i></button>
                        @endif
                        <p>$ {{$product->price}}</p>
                    </footer>
                </div>
                @endforeach
            @endif
            </div>
        </div>
    @endsection
