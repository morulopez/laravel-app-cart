<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel App</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/order.css') }}">
        <script src="https://kit.fontawesome.com/9e78781ab6.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <main>
    <h1>Order Section</h1>
    <h3>
        Here you have a resume of your order.
    </h3>
    <section class="product-cart-list">
        @if(isset($allCartProducts))
            @foreach($allCartProducts as $product)
            <div class="product-card">
                <header>
                    <img class="product-img" src="{{$product['product']['img']}}" alt="{{$product['product']['name']}}"/>
                </header>
                <div class="about-product">
                    <p>Sku: {{$product['product']['sku']}}</p>
                </div>
                <footer>
                    <p>Price: $ {{$product['product']['price']}}</p>
                </footer>
            </div>
            @endforeach
            <div class="total">
                Total: ${{$totalCart}}
            </div>
            <a href="confirm-order" class="btn-confirm">
                << Confirm Order >>
            </a>
        @endif
    </section>
    </main>
    </body>
</html>

