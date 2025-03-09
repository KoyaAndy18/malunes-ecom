<x-default></x-default>

<div class="container my-5">
    <h1 class="text-center mb-4">Your Shopping Cart</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(isset($cart) && count($cart) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-light">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ $item['title'] ?? 'No Title' }}</td>
                            <td>${{ number_format($item['price'] ?? 0, 2) }}</td>
                            <td>{{ $item['quantity'] ?? 1 }}</td>
                            <td>
                                @if(isset($item['id']))
                                    <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-danger btn-sm">Remove</a>
                                @else
                                    <span class="text-danger">Error: Missing ID</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center">Your cart is empty.</p>
    @endif

    <a href="{{ route('checkout') }}" class="btn btn-success mt-3">Place Order</a>
</div>
