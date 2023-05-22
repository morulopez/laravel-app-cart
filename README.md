# Laravel App APP

# Description
Small application in Laravel to simulate the purchase of products in a cart.

I've created the header(menu) main and footer views separately and put them all together in one layout.
As far as possible I have separated in each view the css and js that I have needed with which I had to deal with a problem and I could not load the styles and js as recommended by Laravel which is this way
put @stack('styles') in the layout part and then @push('styles')
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endpush
in the corresponding file, I don't know why it failed so I chose to put it directly <link href="{{ asset('css/style.css') }}" rel="stylesheet"> and it started working.

Another thing to note is that the task only asked us to add products and create an order on a final screen.
I have seen that the order table contains a user id, since I have not created a login for the user, I have chosen one at random to always insert it.

I have created a session cookie to control the cart so that if the user leaves the page, they will always have their cart available when they return unless the cookie expires or they end up making a purchase, which will make that cart no longer available. or the cookie is forcibly deleted.

I have created the cart table and the products_carts table, you can see it in the migrations since I have seen that there was an orders table that I have added the id_cart and another order_products, I have done it to have the logic more separated and identify what is an order or a trolley.

When adding products and deleting them I have done it through js but I have been forced to reload the page every time I do it to be able to check products added to the cart and be able to delete them, this has been because when loading the The first page loads the vita with the information from the controller and I don't make an asynchronous call to later play with it, due to lack of time that small detail has remained in the air but I think the idea of the app has been achieved.

For anything I am available, thank you very much

