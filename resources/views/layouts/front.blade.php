<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Ecommerce Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart') }}">Cart</a>
                    </li>
                    @auth

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.home') }}">Dashboard</a>
                        </li>
                        
                        <li class="nav-item">
                            <span class="nav-link">Welcome, {{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @yield('scripts')

    <!-- Cart Script !-->
    <script>
        $(document).ready(function() {
            $('.add-to-cart-form').submit(function(event) {
                event.preventDefault();

                const form = $(this);
                const productId = form.data('product-id');
                const productName = form.data('product-name'); // Get the product name
                const quantity = form.find('input[name="quantity"]').val();

                const cart = JSON.parse(localStorage.getItem('cart')) || {};

                if (cart[productId]) {
                    cart[productId].quantity += parseInt(quantity);
                } else {
                    cart[productId] = {
                        quantity: parseInt(quantity),
                        name: productName
                    };
                }

                localStorage.setItem('cart', JSON.stringify(cart));

                toastr.success(
                    `Added ${quantity} ${quantity > 1 ? 'items' : 'item'} of ${productName} to cart.`);

                return false;
            });

            
        });
    </script>
</body>

</html>
