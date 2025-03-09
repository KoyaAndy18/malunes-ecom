@extends('components.default')

@section('content')
<div class="container mt-6 pt-5 d-flex justify-content-center">
    <div class="card shadow-lg p-4 rounded" style="max-width: 500px; width: 100%;">
        <h2 class="text-center mb-4">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Name</label>
                <input type="text" name="name" class="form-control rounded-pill" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="email" name="email" class="form-control rounded-pill" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control rounded-pill" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control rounded-pill" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 fw-bold shadow-sm rounded-pill">Register</button>
        </form>
        <p class="text-center mt-3">
            Already have an account? 
            <a href="{{ route('login') }}" class="fw-bold text-primary">Login here</a>
        </p>
    </div>
</div>
@endsection
