<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Thanks For Shopping</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
    </head>
    <body class="antialiased">
        <section class="container">
            <div>
                <h1>Thanks For Shopping {{$customer_name}}</h1>
                <p>
                    Your Order Reference is: <strong>{{$order_reference}}</strong>
                </p>
                <a href="/" class="btn-back">Back To Shopping</a>
            </div>    
        </section>
    </body>
</html>
