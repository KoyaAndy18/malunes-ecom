@extends('components.default')

@section('content')
<h1 class="text-center mt-3">Today's on sale!</h1>

<style>
    /* Optional custom styles if needed */
    .product {
        width: 250px;
        border: 1px solid #ddd;
        padding: 15px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        background: #fff;
    }
    .product img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }
</style>

<br><br><br><br><br>
<div class="container mt-4">
    <div class="input-group mb-3">
        <input type="text" id="searchBox" class="form-control" placeholder="Search for products..." autocomplete="off">
        <button id="searchButton" class="btn btn-primary">Search</button>
    </div>
</div>

<div class="container mt-5 pt-3" id="productContainer">
    <div class="row" id="productResults">
        @foreach($products as $product)
            <div class="col-md-4 product-item">
                <div class="card mb-4">
                    <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title product-title">{{ $product['title'] }}</h5>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <p class="card-text"><strong>${{ $product['price'] }}</strong></p>
                        
                        <!-- 🔥 Pass individual product attributes -->
                        <button class="btn btn-primary" onclick="addToCart(
                            '{{ $product['id'] }}',
                            '{{ addslashes($product['title']) }}',
                            '{{ $product['price'] }}',
                            '{{ $product['image'] }}'
                        )">Add to Cart</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function addToCart(id, title, price, image) {
        let isAuthenticated = {{ Auth::check() ? 'true' : 'false' }}; // Check if user is logged in

        if (!isAuthenticated) {
            window.location.href = "{{ route('login') }}"; // Redirect to login page
            return;
        }

        fetch("{{ route('cart.add') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                id: id,
                title: title,
                price: price,
                image: image
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Product added to cart!");
            } else {
                alert("Failed to add product.");
            }
        })
        .catch(error => console.error("Error:", error));
    }
</script>

@endsection
