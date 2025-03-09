@extends('components.default')

@section('content')
<br><br><br><br><br>
<div class="d-flex flex-column min-vh-100">
    <div class="container mt-5 flex-grow-1">

        <!-- Display success or error messages -->
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <h2>Checkout</h2>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{ env('STRIPE_KEY') }}"
                    data-amount="5000"
                    data-name="Your Store"
                    data-description="Order Payment"
                    data-currency="usd">
            </script>
        </form>
    </div>

    <!-- Footer pushed to the bottom -->
    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">© {{ date('Y') }} Your Store. All rights reserved.</p>
    </footer>
</div>
@endsection
