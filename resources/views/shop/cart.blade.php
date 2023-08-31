@extends('layouts.front')

@section('content')
    <section class="hero text-center py-5">
        <div class="container">
            <h1>Welcome to Our Ecommerce Store</h1>
            <p>Discover the latest trends in fashion and technology.</p>
        </div>
    </section>

    <div class="container">
        <h2>Your Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="cart-items">

            </tbody>
        </table>
        <button class="btn btn-primary" id="checkout-button" onclick="document.preventDefault()">Checkout</button>
    </div>

    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="checkout-form">
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="user_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Your Address</label>
                            <textarea class="form-control" id="address" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="checkout-confirm">Confirm Order</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            const cart = JSON.parse(localStorage.getItem('cart')) || {};
            console.log(cart);
            const cartItemsContainer = $('#cart-items');

            for (const productId in cart) {
                if (cart.hasOwnProperty(productId)) {
                    const {
                        name,
                        quantity
                    } = cart[productId];

                    const row = `
                    <tr>
                        <td>${name}</td>
                        <td>${quantity}</td>
                        <td>
                            <button class="btn btn-sm btn-primary update-item" data-product-id="${productId}">Update</button>
                            <button class="btn btn-sm btn-danger delete-item" data-product-id="${productId}">Delete</button>
                        </td>
                    </tr>
                `;

                    cartItemsContainer.append(row);
                }
            }

            // Update item quantity
            $('.update-item').click(function() {
                const productId = $(this).data('product-id');
                const newQuantity = parseInt(prompt('Enter the new quantity:'));

                if (!isNaN(newQuantity) && newQuantity >= 1) {
                    cart[productId].quantity = newQuantity;
                    localStorage.setItem('cart', JSON.stringify(cart));
                    location.reload(); // Refresh the page to update the table
                }
            });

            // Delete item
            $('.delete-item').click(function() {
                const productId = $(this).data('product-id');
                delete cart[productId];
                localStorage.setItem('cart', JSON.stringify(cart));
                location.reload(); // Refresh the page to update the table
            });

            $('#checkout-button').click(function() {
                $('#checkoutModal').modal('show');
            });
            $('#checkout-confirm').click(function() {
                const userName = $('#user_name').val();
                const address = $('#address').val();

                if (userName && address) {
                    const cart = JSON.parse(localStorage.getItem('cart')) || {};
                    const products = [];

                    for (const productId in cart) {
                        if (cart.hasOwnProperty(productId)) {
                            const {
                                quantity
                            } = cart[productId];
                            products.push({
                                product_id: productId,
                                quantity
                            });
                        }
                    }

                    const data = {
                        user_name: userName,
                        address: address,
                        products: products
                    };
                    $.ajax({
                        url: '/api/order',
                        type: 'POST',
                        data: data,
                        dataType: 'json',
                        success: function(response) {
                            alert('Order placed successfully!');
                            localStorage.removeItem('cart');
                            location.reload(); // Refresh the page to clear the cart
                        },
                        error: function(error) {
                            alert('Error placing the order.');
                        }
                    });
                }
            });

        });
    </script>
@endsection
